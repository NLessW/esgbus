<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import About1 from "@/Sections/About1.vue";
import About2 from "@/Sections/About2.vue";
import About3 from "@/Sections/About3.vue";
import About4 from "@/Sections/About4.vue";
import { Head } from "@inertiajs/vue3";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { onMounted } from "vue";

onMounted(() => {
    //https://codepen.io/jdabgotra/pen/ZExwXJy
    gsap.registerPlugin(ScrollTrigger);
    scrollAnimation();
});
const scrollAnimation = () => {
    gsap.to("#scroll-content", {
        ease: "none",
        y: "-100%",
        scrollTrigger: {
            // trigger: "#pinned-section",
            pin: true,
            start: "top",
            end: "+=300%",
            scrub: true,
            // pinSpacing: true,
            scroller: "#scroller",
            onEnter: () => {
                console.log("entering pinned slide"); // fires when scrolling past slide
            },
            onLeave: () => {
                console.log("leaving pinned slide");
            },
        },
    });
};
</script>

<template>
    <Head title="소개" />
    <FrontLayout>
        <!-- <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="소개" sub-title="으쓱버스 소개" />
        </div> -->
        <div
            id="scroller"
            class="bg-[url('/images/about-bg-dark.jpg')] bg-cover bg-center h-screen"
        >
            <section
                class="animate-fade text-white text-3xl md:text-4xl lg:text-4xl font-extrabold leading-normal md:leading-normal lg:leading-normal"
            >
                <div class="px-4 md:px-0">
                    <p class="mb-4 md:text-5xl">
                        우리나라 1명이 <br class="block md:hidden" />
                        1년간 사용하는 페트병
                    </p>
                    <p class="mb-8 text-5xl md:text-6xl">
                        약 <span class="text-esg-s">500</span>개
                    </p>
                    <p>
                        그렇다면 이 많은 페트병의 재활용이 잘 이루어지고
                        있을까요?
                    </p>
                </div>
            </section>
            <section
                class="animate-fade text-white text-3xl md:text-4xl lg:text-4xl font-extrabold leading-normal md:leading-normal lg:leading-normal"
            >
                <div class="px-4 md:px-0">
                    <ul
                        class="mb-4 text-left md:w-[420px] mx-auto text-lg md:text-2xl space-y-2"
                    >
                        <li>28% - 고급(의류, 신발, 가방 등)</li>
                        <li>57% - 중저급(부직포 또는 하우스 덮개 등)</li>
                        <li class="text-2xl md:text-3xl">
                            15% - 기타 플라스틱 제품
                        </li>
                    </ul>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-16 mx-auto"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z"
                        />
                    </svg>
                    <p class="text-2xl md:text-5xl">
                        하지만, 투명 페트병 재활용 비율은
                        <span class="text-esg-g md:text-6xl">0%</span>
                    </p>

                    <p class="md:text-5xl mt-4">
                        새로운 페트병은 계속 만들어지고 있습니다.
                    </p>
                </div>
            </section>
            <section
                class="text-white text-3xl md:text-4xl lg:text-4xl font-extrabold leading-normal md:leading-normal lg:leading-normal"
            >
                <div class="px-4 md:px-0">
                    <p class="mb-4 text-3xl md:text-4xl">
                        투명 페트병이 순환하는 구조를 만들기 위해서는
                    </p>
                    <p class="mb-4 text-4xl md:text-5xl">
                        우리 모두가 관심을 가져야 합니다.
                    </p>
                </div>
            </section>
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

        <!-- 으쓱버스 함께해요 -->
        <div
            data-aos="fade-up"
            data-aos-duration="1000"
            class="mx-auto bg-gray-50"
        >
            <div class="max-w-screen-xl mx-auto">
                <About1 />
            </div>
        </div>

        <!-- 으쓱버스 체험과정 -->
        <div class="py-12 mb-8">
            <div class="max-w-screen-md mx-auto">
                <About2 />
            </div>
        </div>

        <!-- 으쓱버스 메시지 -->
        <div class="mx-auto bg-primary">
            <div class="max-w-screen-xl mx-auto">
                <About3 />
            </div>
        </div>

        <!-- 으쓱버스 체험하러가기 -->
        <div class="mx-auto bg-gray-50">
            <div class="max-w-screen-xl mx-auto">
                <About4 />
            </div>
        </div>
    </FrontLayout>
</template>

<style scoped>
section {
    color: white;
    height: 100vh;
    scroll-snap-align: start;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

#scroller {
    scroll-snap-type: y mandatory;
    max-height: 100vh;
    overflow-y: scroll;
}
</style>
