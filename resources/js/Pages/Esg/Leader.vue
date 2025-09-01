<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import EsgMenu from "@/Sections/EsgMenu.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="ESG리더" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="ESG리더" sub-title="ESG경영" />
        </div>

        <EsgMenu />

        <section class="bg-white">
            <div class="mx-auto max-w-screen-lg py-16 px-4">
                <!-- https://tailus.io/blocks/team -->
                <div class="xl:container mx-auto">
                    <div
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        class="mb-16"
                    >
                        <h2
                            class="mb-4 text-2xl font-bold text-gray-800 dark:text-white md:text-4xl"
                        >
                            ESG 리더 양성
                        </h2>
                        <p
                            class="text-gray-600 dark:text-gray-300 mb-1 font-NanumSquareNeo"
                        >
                            각 지역의 대학생을 선발하여 ESG리더로 성장할 수
                            있도록 교육합니다.
                        </p>
                        <p
                            class="text-gray-600 dark:text-gray-300 mb-1 font-NanumSquareNeo"
                        >
                            초·중학교 학생들의 멘토로 활동하여 직접 ESG리더를
                            양성합니다.
                        </p>
                        <p
                            class="text-gray-600 dark:text-gray-300 font-NanumSquareNeo"
                        >
                            탄소중립 및 자원순환에 대한 필요성에 공감하고,
                            스스로 실천할 수 있는 ESG리더로 성장하길 희망합니다.
                        </p>
                    </div>
                    <div class="mb-16 shadow-2xl bg-white drop-shadow-2xl p-4">
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                            <img
                                class="w-full"
                                src="/images/cert2.png"
                                alt="ESG 리더증"
                            />
                            <img
                                class="w-full"
                                src="/images/cert1.png"
                                alt="ESG 리더증"
                            />
                        </div>
                    </div>
                    <div>
                        <img
                            class="w-2/3 mx-auto"
                            src="/images/esg-ci-en.png"
                            alt="Social Coop ESG"
                        />
                    </div>
                </div>
            </div>
        </section>
    </FrontLayout>
</template>
