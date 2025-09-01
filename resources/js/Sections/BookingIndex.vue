<script setup>
import Pagination from "@/Components/Pagination.vue";
import { Link, router } from "@inertiajs/vue3";

defineProps({
    bookings: Object,
});
const cancel = (id) => {
    if (!confirm("예약을 정말로 취소하시겠습니까?")) {
        return false;
    }

    router.patch(route("booking.cancel", { id: id }), {
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
</script>
<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-sm text-gray-900 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3 min-w-32">예약일</th>
                    <th scope="col" class="px-6 py-3 min-w-24">어른</th>
                    <th scope="col" class="px-6 py-3 min-w-24">청소년</th>
                    <th scope="col" class="px-6 py-3 min-w-24">어린이</th>
                    <th scope="col" class="px-6 py-3 min-w-24">신청일</th>
                    <th scope="col" class="px-6 py-3 min-w-24">파일</th>
                    <th scope="col" class="px-6 py-3 min-w-36">신청현황</th>
                    <th scope="col" class="px-6 py-3 min-w-32">변경/취소</th>
                </tr>
            </thead>
            <tbody class="text-gray-900">
                <tr
                    v-for="booking in bookings.data"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                >
                    <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        {{ booking.booking_date }}
                    </th>
                    <td class="px-6 py-4">{{ booking.number_adult }}</td>
                    <td class="px-6 py-4">{{ booking.number_teenager }}</td>
                    <td class="px-6 py-4">{{ booking.number_child }}</td>
                    <td class="px-6 py-4 text-gray-500">
                        {{ booking.reg_date }}
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        <a
                            :href="booking.image_url"
                            target="_blank"
                            class="text-gray-500"
                        >
                            <svg
                                v-if="booking.image_url"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                />
                            </svg>
                        </a>
                    </td>

                    <td
                        class="px-6 py-4 text-gray"
                        :class="{
                            'font-bold text-blue-500': booking.active === 1,
                            'font-bold text-red-500': booking.active === 2,
                        }"
                    >
                        {{ booking.status }}
                    </td>
                    <td class="px-6 py-4">
                        <Link
                            v-if="booking.active == 0"
                            :href="
                                route('booking.index', { code: booking.code })
                            "
                            class="font-medium text-white text-xs bg-primary border py-1 px-2 rounded-md dark:text-blue-500"
                            >변경하기</Link
                        >

                        <button
                            @click="cancel(booking.id)"
                            v-if="booking.active == 0"
                            class="font-medium text-white text-xs bg-red-600 border py-1 px-2 rounded-md dark:text-blue-500"
                        >
                            취소하기
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <Pagination :links="bookings.meta.links" />
    </div>
</template>
