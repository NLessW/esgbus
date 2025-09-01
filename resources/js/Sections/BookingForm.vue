<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import Modal from "@/Components/Modal.vue";
import NumberInput from "@/Components/NumberInput.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import BookingPreview from "@/Sections/BookingPreview.vue";
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { useScreens } from "vue-screen-utils";
const props = defineProps({
    bookedDates: Array,
});

const confirmingBooking = ref(false);
const popover = ref({
    visibility: "click",
    //   placement: 'right',
});
const { mapCurrent } = useScreens({
    xs: "0px",
    sm: "640px",
    md: "768px",
    lg: "1024px",
});
const columns = mapCurrent({ lg: 2 }, 1);
const expanded = mapCurrent({ lg: true }, true);
const masks = {
    input: "YYYY-MM-DD",
};
const disabledDates = ref([
    // { start: new Date(2024, 7, 20), end: new Date(2024, 7, 20) },
]);

onMounted(() => {
    if (props.bookedDates.length) {
        props.bookedDates.forEach((date) => {
            disabledDates.value.push({
                start: date,
                end: date,
            });
        });
    }
});

const initForm = {
    bookingDate: null,
    numberAdult: 0,
    numberTeenager: 0,
    numberChild: 0,
    name: null,
    contact: null,
    email: null,
    image: null,
};

const form = useForm(initForm);

// Number(document.querySelector("#adult").value) 구문 참조
const updateAge = (e) => {
    // console.log(`🚀 ~ updateAge ~ id:`, e.id);
    /*
    switch (e.id) {
        case "adult":
            form.numberAdult = e.value;
            break;
        case "teenager":
            form.numberTeenager = e.value;
            break;
        case "child":
            form.numberChild = e.value;
            break;
        default:
    } */
};

const previewForm = (e) => {
    if (!form.bookingDate) {
        alert("예약일자를 선택해 주세요.");
        return;
    }

    // https://anywaydevlog.tistory.com/46
    form.bookingDate = new Date(
        form.bookingDate.getTime() -
            form.bookingDate.getTimezoneOffset() * 60000
    ).toISOString();

    form.numberAdult = Number(document.querySelector("#adult").value);
    form.numberTeenager = Number(document.querySelector("#teenager").value);
    form.numberChild = Number(document.querySelector("#child").value);

    if (form.numberAdult + form.numberTeenager + form.numberChild == 0) {
        alert("인원을 1명이상 선택해 주세요");
        return;
    }

    confirmingBooking.value = true;
};

const submitForm = (e) => {
    form.post(route("booking.store"), {
        preserveScroll: true,
        onSuccess: (page) => {
            console.log(page);
            if (page.props.flash.success) {
                console.log(
                    `🚀 ~ form.post ~ page.props.flash.success:`,
                    page.props.flash.success
                );
                alert(page.props.flash.success);
                // closeModal();
                // form.reset();
                location.reload();
            }
            if (page.props.flash.error) {
                alert(page.props.flash.error);
            }
        },
    });
};

const setMobileFormat = (e) => {
    form.contact = form.contact
        .replace(/[^0-9]/g, "")
        .replace(/^(\d{2,3})(\d{3,4})(\d{4})$/, `$1-$2-$3`);
};

const confirmBooking = () => {
    confirmingBooking.value = true;
};

const closeModal = () => {
    confirmingBooking.value = false;
    // form.reset();
};
</script>

<!-- https://www.hyperui.dev/components/marketing/forms#component-4 -->
<template>
    <div
        data-aos="fade-up"
        data-aos-duration="1000"
        class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5"
    >
        <div class="lg:col-span-2 lg:py-12">
            <p
                class="max-w-xl text-sm md:text-base font-NanumSquareNeo leading-relaxed"
            >
                문의사항이 있으실 경우 관리자에게 문의해 주세요. <br />
                입금을 완료하셔야 예약이 정상적으로 확정됩니다.<br />
                <!-- <br />
                입금 계좌번호 : <br />
                <span class="font-bold"
                    >신협 131022343884 <br />이에스지경영사회적협동조합</span
                >
                <br /> -->
            </p>

            <div class="mt-8 text-xl md:text-2xl font-NanumSquareNeo">
                문의 :
                <a href="tel:1644-1224" class="font-bold text-pink-600">
                    1644-1224
                </a>

                <!-- <address class="mt-2 not-italic">
                            282 Kevin Brook, Imogeneborough, CA 58517
                        </address> -->
            </div>
        </div>

        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
            <form method="POST" @submit.prevent="previewForm" class="space-y-4">
                <div>
                    <label for="booking-date" class="text-sm">날짜선택 *</label>
                    <div class="my-2">
                        <VDatePicker
                            v-model="form.bookingDate"
                            :masks="masks"
                            :popover="popover"
                            :min-date="new Date()"
                            :expanded="expanded"
                            :columns="columns"
                            :disabled-dates="disabledDates"
                            :initial-page="{
                                month: new Date().getMonth(),
                                year: new Date().getFullYear(),
                            }"
                        >
                            <template #default="{ inputValue, inputEvents }">
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        :value="inputValue"
                                        v-on="inputEvents"
                                        readonly
                                        required
                                        id="booking-date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="예약날자를 선택해 주세요"
                                    />
                                </div>
                            </template>
                        </VDatePicker>
                    </div>
                </div>
                <div>
                    <label for="adult" class="text-sm">인원선택 *</label>
                    <div
                        class="grid grid-cols-2 gap-3 sm:grid-cols-3 border p-4 mt-2 rounded-lg bg-gray-50"
                    >
                        <NumberInput
                            label="어른"
                            age="만 19세 이상"
                            id="adult"
                            @updateAge="updateAge"
                        />
                        <NumberInput
                            label="청소년"
                            age="만 13세 이상 ~ 만 18세"
                            id="teenager"
                            @updateAge="updateAge"
                        />
                        <NumberInput
                            label="어린이"
                            age="36개월 이상~ 만 12세"
                            id="child"
                            @updateAge="updateAge"
                        />
                    </div>
                </div>

                <hr
                    class="my-6 border-gray-100 sm:mx-auto dark:border-gray-700 lg:my-8"
                />

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="text-sm">이름 *</label>
                        <input
                            v-model="form.name"
                            class="bg-gray-50 w-full rounded-lg border-gray-300 p-3 text-sm my-2"
                            placeholder="실명을 입력해 주세요"
                            type="text"
                            id="name"
                            required
                        />
                    </div>
                    <div>
                        <label for="contact" class="text-sm">연락처 *</label>
                        <input
                            v-model="form.contact"
                            class="bg-gray-50 w-full rounded-lg border-gray-300 p-3 text-sm my-2"
                            placeholder="'-'없이 입력해 주세요"
                            @input="setMobileFormat"
                            @blur="setMobileFormat"
                            type="text"
                            id="contact"
                            required
                        />
                    </div>
                    <div>
                        <label for="email" class="text-sm">Email *</label>
                        <input
                            v-model="form.email"
                            class="bg-gray-50 w-full rounded-lg border-gray-300 p-3 text-sm my-2"
                            placeholder="Email을 입력해 주세요"
                            type="email"
                            id="email"
                            required
                        />
                    </div>
                    <div>
                        <label for="attach" class="text-sm"
                            >세금계산서 발행용</label
                        >
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 my-2"
                            aria-describedby="user_avatar_help"
                            id="attach"
                            type="file"
                            accept="image/*"
                            @input="form.image = $event.target.files[0]"
                        />
                    </div>
                </div>
                <div class="mt-4">
                    <button
                        type="submit"
                        class="inline-block w-full rounded-lg bg-primary px-5 py-2.5 font-medium text-white sm:w-auto"
                    >
                        예약하기
                    </button>
                </div>
            </form>
            <Modal :show="confirmingBooking" @close="closeModal" maxWidth="xl">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        아래와 같이 예약을 진행하시겠습니까?
                    </h2>

                    <BookingPreview :form="form" />

                    <div class="mt-6 flex justify-end">
                        <SecondaryButton @click="closeModal">
                            취소
                        </SecondaryButton>

                        <DangerButton
                            class="ms-3"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="submitForm"
                        >
                            예약하기
                        </DangerButton>
                    </div>
                </div>
            </Modal>
        </div>
    </div>
</template>
