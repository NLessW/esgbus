<script setup></script>

<template>
    <nav class="bg-white border-gray-200 dark:border-gray-600 dark:bg-gray-900">
        <div
            class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4"
        >
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/images/logo.png" class="h-12" alt="Flowbite Logo" />
                <!-- <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                >
                    Flowbite
                </span> -->
            </a>
            <button
                data-collapse-toggle="mega-menu-full-cta"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mega-menu-full-cta"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="{2}"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <div
                id="mega-menu-full-cta"
                class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
            >
                <ul
                    id="mega-menu-full-cta-dropdown-button"
                    class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse md:gap-20 cursor-pointer"
                    data-collapse-toggle="mega-menu-full-cta-dropdown"
                    data-dropdown-placement="bottom"
                    data-collapse-trigger="hover"
                    data-dropdown-trigger="hover"
                >
                    <li>
                        <button
                            class="flex items-center justify-between w-full py-2 px-3 font-bold text-lg text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            으쓱버스 소개
                        </button>
                    </li>
                    <li>
                        <button
                            class="flex items-center justify-between w-full py-2 px-3 font-bold text-lg text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            체험 예약
                        </button>
                    </li>
                    <li>
                        <button
                            class="flex items-center justify-between w-full py-2 px-3 font-bold text-lg text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            커뮤니티
                        </button>
                    </li>
                    <li>
                        <button
                            class="flex items-center justify-between w-full py-2 px-3 font-bold text-lg text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            후원
                        </button>
                    </li>
                    <li>
                        <button
                            class="flex items-center justify-between w-full py-2 px-3 font-bold text-lg text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            ESG
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div
            id="mega-menu-full-cta-dropdown"
            class="hidden absolute w-full z-50 bg-white border-gray-200 shadow-sm border-y dark:bg-gray-800 dark:border-gray-600"
        >
            <div
                class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4"
            >
                <div></div>
                <div
                    id="mega-menu-full-cta"
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                >
                    <ul
                        class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse"
                    >
                        <li>
                            <ul class="space-y-4 sm:mb-4 md:mb-0 text-gray-500">
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        소개
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        CI
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="w-36">
                            <ul class="space-y-4 sm:mb-4 md:mb-0 text-gray-500">
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        예약하기
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        예약 확인 및 수정
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        체험견적
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="w-36">
                            <ul class="space-y-4 sm:mb-4 md:mb-0 text-gray-500">
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        공지사항
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        포토 갤러리
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        1:1 문의
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        뉴스룸
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="w-28">
                            <ul
                                class="space-y-4 sm:mb-4 md:mb-0 w-18 text-gray-500"
                            >
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        기부하기
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="w-28">
                            <ul class="space-y-4 sm:mb-4 md:mb-0 text-gray-500">
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        ESG경영
                                    </a>
                                </li>
                                <li class="text-right">
                                    <a href="#" class="hover:text-gray-900">
                                        ESG리더
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>
