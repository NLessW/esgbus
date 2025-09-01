<script setup>
import Pagination from "@/Components/Pagination.vue";
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    boards: Object,
    limit: Number,
    page: Number,
});
const boardNumber = (index) => {
    return (
        props.boards.meta.total - props.page * props.limit + props.limit - index
    );
};
</script>

<template>
    <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
    >
        <thead
            class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-t-2 border-t-gray-500 border-b border-b-gray-400"
        >
            <tr>
                <th scope="col" class="px-6 py-3">NO</th>
                <th scope="col" class="px-6 py-3">제목</th>
                <th scope="col" class="px-6 py-3 hidden md:block">이름</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="(board, index) in boards.data"
                :key="index"
                class="bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
            >
                <th
                    scope="row"
                    class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap dark:text-white"
                >
                    {{ boardNumber(index) }}
                </th>
                <td class="px-6 py-4 flex items-center">
                    <Link
                        :href="
                            route('community.show', {
                                board: board,
                                page: page,
                            })
                        "
                        class="text-base text-gray-500 hover:underline hover:underline-offset-4"
                        :class="{
                            'font-semibold text-gray-700': board.open,
                        }"
                    >
                        {{ board.title_limit }}
                    </Link>
                    <svg
                        v-if="board.open"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-5 ml-2 text-esg-g"
                    >
                        <path
                            d="M18 1.5c2.9 0 5.25 2.35 5.25 5.25v3.75a.75.75 0 0 1-1.5 0V6.75a3.75 3.75 0 1 0-7.5 0v3a3 3 0 0 1 3 3v6.75a3 3 0 0 1-3 3H3.75a3 3 0 0 1-3-3v-6.75a3 3 0 0 1 3-3h9v-3c0-2.9 2.35-5.25 5.25-5.25Z"
                        />
                    </svg>

                    <svg
                        v-else
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-5 ml-2 text-esg-g"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <svg
                        v-if="board.commented"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-5 ml-2 text-esg-g"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </td>
                <td class="px-6 py-4 hidden md:block">
                    {{ board.name }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-2">
        <Pagination :links="boards.meta.links" />
    </div>

    <div class="mt-2 flex justify-end">
        <button
            class="inline-flex gap-1 items-center overflow-hidden rounded-md bg-primary px-3 py-2.5 text-white focus:outline-none focus:ring active:bg-primary"
            @click="$inertia.get(route('community.private.create'))"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-3"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                />
            </svg>
            <span class="text-sm font-medium transition-all group-hover:ms-4">
                문의하기
            </span>
        </button>
    </div>
</template>
