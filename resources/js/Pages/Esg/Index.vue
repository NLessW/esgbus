<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head, usePage } from "@inertiajs/vue3";

const appName = usePage().props.appName;
const props = defineProps({
    esgUrl: String,
});

const goEsg = () => {
    window.open(props.esgUrl);
};
</script>

<template>
    <Head title="ESG경영" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="ESG경영" sub-title="ESG경영" />
        </div>

        <!-- <EsgMenu /> -->

        <section class="bg-white">
            <div class="mx-auto max-w-screen-lg py-16 px-4">
                <!-- https://tailus.io/blocks/team -->
                <div class="xl:container mx-auto">
                    <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        class="mb-16 md:w-2/3 lg:w-2/3"
                    >
                        <h2
                            class="mb-4 text-2xl font-bold text-gray-800 dark:text-white md:text-4xl"
                        >
                            ESG의 의미
                        </h2>
                        <p
                            class="text-gray-600 dark:text-gray-300 mb-4 font-NanumSquareNeo"
                        >
                            <b>ESG</b>는 Environmental(환경), Social(사회),
                            Governance(지배구조)의 첫 글자를 조합한 단어로,
                            재무적인 이익만 추구하는 것이 아니라 위의 비재무적
                            핵심 가치를 중요시하여 지속 가능한 성장을 이뤄야
                            한다는 경영 방식입니다.
                        </p>
                        <p
                            class="text-gray-600 dark:text-gray-300 font-NanumSquareNeo"
                        >
                            기업의 이익을 창출하기 위해 환경을 파괴하고,
                            노동자의 인권을 고려하지 않는 등의 비윤리적인 경영이
                            지속적으로 발생하면서 기업의 향후 가치를 판단하는
                            기준으로 ESG경영이 도입되기 시작했고, 현재 그
                            중요성은 점점 높아지고 있습니다.
                        </p>
                    </div>
                    <div
                        class="grid gap-6 px-4 sm:px-0 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3"
                    >
                        <div
                            class="group relative rounded-3xl space-y-6 overflow-hidden"
                        >
                            <img
                                class="mx-auto h-[26rem] w-full object-cover object-top transition duration-500 group-hover:scale-105 group-hover:grayscale-0"
                                src="/images/esg-1.jpg"
                                alt="woman"
                                loading="lazy"
                                width="640"
                                height="805"
                            />
                            <div
                                class="absolute bottom-0 inset-x-0 h-max mt-auto px-8 py-6 bg-gray-800 dark:bg-white translate-y-0 md:translate-y-24 transition duration-300 ease-in-out group-hover:translate-y-0"
                            >
                                <div>
                                    <h4
                                        class="text-2xl font-semibold dark:text-gray-700 text-white text-center"
                                    >
                                        Environmental
                                    </h4>
                                </div>
                                <ul
                                    class="mt-8 text-gray-100 dark:text-gray-600 text-center"
                                >
                                    <li>온실가스 배출량 저감</li>
                                    <li>지속 가능한 자원의 활용</li>
                                    <li>생물 다양성 보호</li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="group relative rounded-3xl space-y-6 overflow-hidden"
                        >
                            <img
                                class="mx-auto h-[26rem] w-full object-cover object-top transition duration-500 group-hover:scale-105 group-hover:grayscale-0"
                                src="/images/esg-2.jpg"
                                alt="woman"
                                loading="lazy"
                                width="640"
                                height="805"
                            />
                            <div
                                class="absolute bottom-0 inset-x-0 h-max mt-auto px-8 py-6 bg-gray-800 dark:bg-white translate-y-0 md:translate-y-24 transition duration-300 ease-in-out group-hover:translate-y-0"
                            >
                                <div>
                                    <h4
                                        class="text-2xl font-semibold dark:text-gray-700 text-white text-center"
                                    >
                                        Social
                                    </h4>
                                </div>
                                <ul
                                    class="mt-8 text-gray-100 dark:text-gray-600 text-center"
                                >
                                    <li>근로자 인권 및 안전 보장</li>
                                    <li>소비자 정보 보호</li>
                                    <li>지역사회 관계</li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="group relative rounded-3xl space-y-6 overflow-hidden"
                        >
                            <img
                                class="mx-auto h-[26rem] w-full object-cover object-top transition duration-500 group-hover:scale-105 group-hover:grayscale-0"
                                src="/images/esg-3.jpg"
                                alt="woman"
                                loading="lazy"
                                width="640"
                                height="805"
                            />
                            <div
                                class="absolute bottom-0 inset-x-0 h-max mt-auto px-8 py-6 bg-gray-800 dark:bg-white translate-y-0 md:translate-y-24 transition duration-300 ease-in-out group-hover:translate-y-0"
                            >
                                <div>
                                    <h4
                                        class="text-2xl font-semibold dark:text-gray-700 text-white text-center"
                                    >
                                        Governance
                                    </h4>
                                </div>
                                <ul
                                    class="mt-8 text-gray-100 dark:text-gray-600 text-center"
                                >
                                    <li>투명한 경영</li>
                                    <li>독립적인 이사회 구성</li>
                                    <li>준법 정신</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div
            data-aos="fade-up"
            data-aos-duration="1000"
            class="max-w-screen-sm md:mx-auto mx-2 py-8 mb-16"
        >
            <button
                class="relative flex h-16 w-full mx-auto items-center justify-center px-8 before:absolute before:inset-0 before:rounded-full before:bg-[#a7ba3b] before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max"
                @click="goEsg"
            >
                <span class="relative text-lg md:text-2xl font-bold text-white"
                    >{{ appName }}의 ESG경영 활동 알아보기</span
                >
            </button>
        </div>
    </FrontLayout>
</template>
