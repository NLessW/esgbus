<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import BookingMenu from "@/Sections/BookingMenu.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="체험 견적" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="체험 견적" sub-title="체험 예약" />
        </div>

        <BookingMenu />

        <section class="bg-gray-50">
            <div
                class="mx-auto max-w-screen-lg text-2xl text-center px-4 py-16 sm:px-0 lg:px-0"
            >
                <!-- <PDF src="/file/sample.pdf" /> -->
                체험 견적에 대한 자세한 문의는 대표번호로 연락해 주세요.
                <div class="mt-8 text-2xl font-NanumSquareNeo">
                    문의 :
                    <a href="tel:1644-1224" class="font-bold text-pink-600">
                        1644-1224
                    </a>
                </div>
            </div>
        </section>
    </FrontLayout>
</template>
