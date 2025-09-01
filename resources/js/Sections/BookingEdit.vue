<script setup>
import NumberInput from "@/Components/NumberInput.vue";
import { router, useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { useScreens } from "vue-screen-utils";
const props = defineProps({
    booking: Object,
    bookedDates: Array,
});

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
const disabledDates = ref([]);

const initForm = {
    id: props.booking.id,
    bookingDate: props.booking.booking_date,
    numberAdult: props.booking.number_adult,
    numberTeenager: props.booking.number_teenager,
    numberChild: props.booking.number_child,
};

const form = useForm(initForm);

onMounted(() => {
    document.querySelector("#adult").value = form.numberAdult;
    document.querySelector("#teenager").value = form.numberTeenager;
    document.querySelector("#child").value = form.numberChild;
    if (props.bookedDates.length) {
        props.bookedDates.forEach((date) => {
            disabledDates.value.push({
                start: date,
                end: date,
            });
        });
    }
});

const submitForm = (e) => {
    if (!form.bookingDate) {
        alert("예약일자를 선택해 주세요.");
        return;
    }

    if (form.bookingDate !== props.booking.booking_date) {
        // https://anywaydevlog.tistory.com/46
        form.bookingDate = new Date(
            form.bookingDate.getTime() -
                form.bookingDate.getTimezoneOffset() * 60000
        ).toISOString();
    }

    form.numberAdult = Number(document.querySelector("#adult").value);
    form.numberTeenager = Number(document.querySelector("#teenager").value);
    form.numberChild = Number(document.querySelector("#child").value);

    if (form.numberAdult == 0) {
        alert("인원(어른 기준)을 1명이상 선택해 주세요");
        return;
    }

    form.put(route("booking.update"), {
        preserveScroll: true,
        onSuccess: (page) => {
            if (page.props.flash.success) {
                alert(page.props.flash.success);
                router.get(route("booking.index"));
            }
            if (page.props.flash.error) {
                alert(page.props.flash.error);
            }
        },
    });
};

const back = () => {
    window.history.back();
};
</script>

<!-- https://www.hyperui.dev/components/marketing/forms#component-4 -->
<template>
    <div class="flex justify-center">
        <div class="rounded-lg bg-white p-8 shadow-lg lg:p-12 w-full lg:w-3/5">
            <form method="POST" @submit.prevent="submitForm" class="space-y-4">
                <div>
                    <label for="booking-date" class="text-sm">날짜선택</label>
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
                <!-- <hr
                            class="my-6 border-gray-100 sm:mx-auto dark:border-gray-700 lg:my-8"
                        /> -->
                <div>
                    <label for="adult" class="text-sm">인원선택</label>
                    <div
                        class="grid grid-cols-2 gap-3 sm:grid-cols-3 border p-4 mt-2 rounded-lg bg-gray-50"
                    >
                        <NumberInput
                            label="어른"
                            age="만 19세 이상"
                            id="adult"
                            :initValue="form.numberAdult"
                        />
                        <NumberInput
                            label="청소년"
                            age="만 13세 이상 ~ 만 18세"
                            id="teenager"
                            :initValue="form.numberTeenager"
                        />
                        <NumberInput
                            label="어린이"
                            age="36개월 이상~ 만 12세"
                            id="child"
                            :initValue="form.numberChild"
                        />
                    </div>
                </div>
                <div class="mt-4">
                    <button
                        type="submit"
                        class="text-sm inline-block w-full rounded-lg bg-primary px-5 py-2.5 font-medium text-white sm:w-auto"
                    >
                        예약변경
                    </button>
                    <button
                        type="button"
                        @click="back"
                        class="mt-2 lg:mt-0 md:ml-2 text-sm inline-block w-full rounded-lg bg-white px-5 py-2.5 font-medium text-gray-700 sm:w-auto border border-gray-200"
                    >
                        취소
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
