<script setup>
import menus from "@/menu";
import { Link, usePage } from "@inertiajs/vue3";
const donationUrl = usePage().props.donationUrl;
</script>
<template>
    <footer class="bg-gray-900">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-12">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0 text-gray-200 text-sm leading-6">
                    <p>
                        주소 : 경기 부천시 소사구 양지로 237 광양프런티어밸리 5차 지식산업센터 620호
                    </p>
                    <p>문의 : 1644-1224</p>
                    <p>Email : esgbus@naver.com</p>
                    <p>상담시간 : 월요일-금요일 AM 09:00 - PM 06:00</p>
                </div>
                <hr
                    class="my-8 border-gray-700 sm:mx-auto dark:border-gray-700"
                />
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-5">
                    <div v-for="(menu, index) in menus" :key="index">
                        <h2
                            class="mb-6 text-sm font-semibold text-white uppercase"
                        >
                            {{ menu.name }}
                        </h2>
                        <ul
                            class="text-gray-400 text-sm dark:text-gray-400 font-medium"
                        >
                            <li
                                v-for="(submenu, index2) in menu.submenus"
                                class="mb-2"
                            >
                                <a
                                    v-if="!!submenu.external"
                                    :href="donationUrl"
                                    target="_blank"
                                    class="hover:text-gray-100"
                                    >{{ submenu.name }}</a
                                >
                                <Link
                                    v-else
                                    :href="route(submenu.route)"
                                    class="hover:text-gray-100"
                                    >{{ submenu.name }}</Link
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr
                class="my-6 border-gray-700 sm:mx-auto dark:border-gray-700 lg:my-8"
            />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span
                    class="text-sm text-gray-300 sm:text-center dark:text-gray-400"
                    >© 2024 <span class="font-bold">으쓱버스</span>. All Rights
                    Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0"></div>
            </div>
        </div>
    </footer>
</template>
