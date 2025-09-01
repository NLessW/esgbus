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
                    value="esg.index"
                    :selected="route().current('esg.index')"
                >
                    ESG경영
                </option>
                <option
                    value="esg.leader"
                    :selected="route().current('esg.leader')"
                >
                    ESG리더
                </option>
            </select>
        </div>
        <ul
            class="hidden max-w-screen-lg mx-auto text-md font-bold text-center text-gray-500 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400"
        >
            <li class="w-full focus-within:z-10">
                <Link
                    preserve-scroll
                    :href="route('esg.index')"
                    :class="
                        'tab-default border-r rounded-s-lg ' +
                        (route().current('esg.index')
                            ? ' text-white bg-primary'
                            : 'bg-white hover:bg-gray-50')
                    "
                    >ESG경영</Link
                >
            </li>
            <li class="w-full focus-within:z-10">
                <Link
                    preserve-scroll
                    :href="route('esg.leader')"
                    :class="
                        'tab-default border-s-0 rounded-e-lg ' +
                        (route().current('esg.leader')
                            ? ' text-white bg-primary'
                            : 'bg-white hover:bg-gray-50')
                    "
                    >ESG리더</Link
                >
            </li>
        </ul>
    </div>
</template>
