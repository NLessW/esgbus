<script setup>
import { Link, router } from "@inertiajs/vue3";
const goPage = (page) => {
    router.get(route(page));
};
</script>
<template>
    <!-- https://flowbite.com/docs/components/tabs/#full-width-tabs -->

    <div class="mb-12">
        <div class="sm:hidden px-4">
            <label for="tabs" class="sr-only hidden">메뉴선택</label>
            <select
                id="tabs"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                @change="goPage($event.target.value)"
            >
                <option
                    value="community.notice"
                    :selected="route().current('community.notice')"
                >
                    공지사항
                </option>
                <option
                    value="community.gallery"
                    :selected="route().current('community.gallery')"
                >
                    갤러리
                </option>
                <option
                    value="community.private"
                    :selected="route().current('community.private')"
                >
                    1:1문의
                </option>
                <option
                    value="community.newsroom"
                    :selected="route().current('community.newsroom')"
                >
                    뉴스룸
                </option>
            </select>
        </div>
        <ul
            class="hidden max-w-screen-lg mx-auto text-md font-bold text-center text-gray-500 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400"
        >
            <li class="w-full focus-within:z-10">
                <Link
                    preserve-scroll
                    :href="route('community.notice')"
                    :class="
                        'tab-default border-r rounded-s-lg ' +
                        (route().current('community.notice')
                            ? ' text-white bg-primary'
                            : 'bg-white hover:bg-gray-50')
                    "
                    >공지사항</Link
                >
            </li>
            <li class="w-full focus-within:z-10">
                <Link
                    preserve-scroll
                    :href="route('community.gallery')"
                    :class="
                        'tab-default border-r  ' +
                        (route().current('community.gallery')
                            ? ' text-white bg-primary'
                            : 'bg-white hover:bg-gray-50')
                    "
                    >갤러리</Link
                >
            </li>
            <li class="w-full focus-within:z-10">
                <Link
                    preserve-scroll
                    :href="route('community.private')"
                    :class="
                        'tab-default border-r  ' +
                        (route().current('community.private')
                            ? ' text-white bg-primary'
                            : 'bg-white hover:bg-gray-50')
                    "
                    >1:1문의</Link
                >
            </li>
            <li class="w-full focus-within:z-10">
                <Link
                    preserve-scroll
                    :href="route('community.newsroom')"
                    :class="
                        'tab-default border-s-0 rounded-e-lg ' +
                        (route().current('community.newsroom')
                            ? ' text-white bg-primary'
                            : 'bg-white hover:bg-gray-50')
                    "
                    >뉴스룸</Link
                >
            </li>
        </ul>
    </div>
</template>
