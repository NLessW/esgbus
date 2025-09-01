<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import HomeNews from "@/Sections/HomeNews.vue";
// import HomeSlider from "@/Sections/HomeSlider.vue";
import HomeVideo from "@/Sections/HomeVideo.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    notices: Object,
    galleries: Object,
});
</script>

<template>
    <Head title="메인" />
    <FrontLayout>
        <div
            class="bg-[url('/images/home-bg-dark.jpg')] bg-cover bg-center h-screen flex items-center"
        >
            <!-- <HomeSlider /> -->

            <div
                class="animate-fade pl-4 lg:p-12 max-w-screen-xl text-white w-full mx-auto leading-normal md:leading-normal lg:leading-normal text-3xl md:text-4xl lg:text-5xl font-extrabold"
            >
                찾아가는 자원순환 CAMP <br />
                여러분과 함께하는 <br />
                으쓱버스입니다. <br />
            </div>

            <div class="absolute w-full bottom-5">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-12 text-gray-300 animate-bounce mx-auto"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                    />
                </svg>
            </div>
        </div>

        <!-- <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <HomeSlider />
        </div> -->

        <div
            class="mx-auto rounded-xl bg-gray-50 border-t border-gray-100 border-b py-16 mb-8"
        >
            <div class="max-w-screen-xl mx-auto">
                <HomeVideo />
            </div>
        </div>

        <div class="max-w-screen-xl py-16 mx-auto">
            <HomeNews :notices="notices" :galleries="galleries" />
        </div>
    </FrontLayout>
</template>
