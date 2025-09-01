<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="CI" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="CI" sub-title="으쓱버스 소개" />
        </div>

        <section class="bg-gray-50">
            <div class="mx-auto max-w-screen-lg py-32 px-4">
                <!-- https://www.tailbits.com/components/free?id=616d103499d49f4ae8c35e52 -->
                <div
                    class="grid items-start md:grid-cols-2 md:gap-x-20 gap-y-10"
                >
                    <div
                        class="relative pl-16 pr-10 sm:pl-6 md:pl-0 xl:pr-0 md:order-2"
                    >
                        <img
                            src="/images/ci2.png"
                            alt="ESG"
                            loading="lazy"
                            class="h-72 mx-auto"
                        />
                    </div>

                    <div class="md:order-1">
                        <h2
                            class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl"
                        >
                            심벌마크
                        </h2>
                        <p
                            class="mt-4 text-base sm:text-lg leading-relaxed text-gray-600 font-NanumSquareNeo"
                        >
                            으쓱버스의 체험 차량을 이미지화하여 표현한
                            심벌마크입니다. 탄소중립 실천을 위해 사람들에게
                            재밌게 다가가 교육하고자 하는 의미를 담고 있습니다.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-white">
            <div class="mx-auto max-w-screen-lg py-32 px-4">
                <!-- https://www.tailbits.com/components/free?id=616d103499d49f4ae8c35e52 -->
                <h2
                    class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl mb-12"
                >
                    로고
                </h2>

                <div
                    class="w-full lg:flex justify-between items-center mb-12 lg:border lg:border-gray-300 lg:shadow-xl"
                >
                    <div class="w-full lg:w-1/2">
                        <div class="py-8 px-8">
                            <img
                                src="/images/logo2.png"
                                alt="ESG"
                                loading="lazy"
                                class="mx-auto max-w-54"
                            />
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="py-8 px-8 bg-primary">
                            <img
                                src="/images/logo.png"
                                alt="ESG"
                                loading="lazy"
                                class="mx-auto max-w-54"
                            />
                        </div>
                    </div>
                </div>
                <p
                    class="mt-4 text-base sm:text-lg leading-relaxed text-gray-600 font-NanumSquareNeo"
                >
                    으쓱버스의 “으쓱”은 ESG를 한글 발음대로 읽어 표현한
                    것입니다. 중앙에 있는 화살표는 으쓱버스 체험 프로그램을 통해
                    지속 가능한 ESG경영을 실천하며 탄소중립 교육에 힘써
                    나아가겠다는 의미를 담고 있습니다.
                </p>

                <!-- <a
                            href="#"
                            title=""
                            class="inline-flex items-center justify-center px-8 py-3 mt-8 text-base font-semibold text-white transition-all duration-200 bg-blue-600 rounded-md hover:bg-blue-700 focus:bg-blue-700"
                            role="button"
                        >
                            Start exploring
                        </a> -->
            </div>
        </section>
    </FrontLayout>
</template>
