<script setup>
import menus from "@/menu";
import { Link, usePage } from "@inertiajs/vue3";
import { computed, onMounted, ref } from "vue";

const donationUrl = usePage().props.donationUrl;
const open = ref(false);
const scrolled = ref(false);

onMounted(() => {
    window.addEventListener("scroll", updateScroll);
});

const updateScroll = () => {
    if (window.scrollY > 0) {
        scrolled.value = true;
    } else {
        scrolled.value = false;
    }
};

const navClass = computed(() => {
    const borderBottom =
        (route().current("home") || route().current("about.index")) &&
        !scrolled.value
            ? ""
            : "border-b";

    const bgWhite =
        route().current("home") || route().current("about.index")
            ? ""
            : "bg-white";

    if (scrolled.value) {
        return "bg-white text-gray-700 " + borderBottom;
    } else {
        return bgWhite + " " + borderBottom;
    }
});

const openMobileMenu = () => {
    document.getElementById("mobile-menu").classList.toggle("hidden");
};
</script>

<template>
    <header
        @mouseover="open = true"
        @mouseleave="open = false"
        class="lg:fixed w-full z-50 group"
    >
        <!-- <nav class="bg-white/95 border-gray-200 py-3 dark:bg-gray-900"> -->
        <nav
            class="py-3 dark:bg-gray-900 group-hover:bg-white group-hover:text-gray-700 transition duration-500 group-hover:border-none"
            :class="navClass"
        >
            <div
                class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto"
            >
                <a :href="route('home')" class="flex items-center">
                    <img
                        src="/images/logo.png"
                        class="h-10 mr-3 sm:h-12"
                        alt="으쓱버스"
                    />
                </a>
                <div class="flex items-center lg:order-2 lg:hidden">
                    <!-- <a href="#" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a> -->
                    <!-- <a
                        href="https://themesberg.com/product/tailwind-css/landing-page"
                        class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800"
                        >Download</a
                    > -->
                    <button
                        type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-expanded="false"
                        @click="openMobileMenu"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <svg
                            class="hidden w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </div>
                <div
                    id="mobile-menu"
                    class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1"
                >
                    <ul
                        class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
                    >
                        <li
                            v-for="(menu, index) in menus"
                            :key="index"
                            class="lg:w-32"
                        >
                            <a
                                href="#"
                                class="group-hover:text-gray-700 text-lg font-bold"
                                :class="
                                    scrolled
                                        ? 'link-default'
                                        : route().current('home') ||
                                          route().current('about.index')
                                        ? 'text-white'
                                        : ''
                                "
                                >{{ menu.name }}</a
                            >
                            <ul
                                class="block lg:hidden ml-8 mt-2 text-gray-700 font-medium"
                            >
                                <li
                                    v-for="(submenu, index2) in menu.submenus"
                                    :key="index2"
                                    class="mb-1"
                                >
                                    <a
                                        v-if="!!submenu.external"
                                        :href="donationUrl"
                                        target="_blank"
                                        class="hover:text-primary"
                                    >
                                        {{ submenu.name }}
                                    </a>
                                    <Link
                                        v-else
                                        :href="route(submenu.route)"
                                        class="hover:text-primary"
                                    >
                                        {{ submenu.name }}
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- 서브메뉴 -->
        <Transition>
            <nav
                v-show="open"
                class="hidden lg:block bg-white border-gray-200 pb-6 dark:bg-gray-900 group-hover:border-b"
            >
                <div
                    class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto"
                >
                    <a href="/" class="flex items-center">
                        <!-- <img
                        src="/images/logo.png"
                        class="h-10 mr-3 sm:h-12"
                        alt="으쓱버스"
                    /> -->
                    </a>
                    <div class="flex items-center lg:order-2 lg:hidden"></div>
                    <div
                        class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1"
                    >
                        <ul
                            class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
                        >
                            <li
                                v-for="(menu, index) in menus"
                                :key="index"
                                class="w-32"
                            >
                                <ul class="mt-2 text-gray-700 font-medium">
                                    <li
                                        v-for="(
                                            submenu, index2
                                        ) in menu.submenus"
                                        class="mb-1"
                                    >
                                        <a
                                            v-if="submenu.external"
                                            :href="donationUrl"
                                            target="_blank"
                                            class="hover:text-primary"
                                        >
                                            {{ submenu.name }}
                                        </a>
                                        <template v-else>
                                            <Link
                                                v-if="!!submenu.html"
                                                :href="route(submenu.route)"
                                                class="hover:text-primary"
                                                v-html="submenu.html"
                                            ></Link>
                                            <Link
                                                v-else
                                                :href="route(submenu.route)"
                                                class="hover:text-primary"
                                            >
                                                {{ submenu.name }}
                                            </Link>
                                        </template>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </Transition>
    </header>
</template>

<!-- https://vuejs.org/guide/built-ins/transition:w
  -->
<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
