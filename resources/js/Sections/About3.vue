<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div class="py-32 text-center text-white text-3xl md:text-4xl font-bold">
        <div
            data-aos="fade-up"
            data-aos-duration="1000"
            class="w-fit flex mx-auto items-center mb-12 flex-col space-y-3 md:flex-row"
        >
            <p class="mr-3">여러분이</p>
            <img
                src="/images/logo2.png"
                class="h-10 mr-3 sm:h-12"
                alt="으쓱버스"
            />
            <p>에 참여한다면</p>
        </div>
        <div data-aos="fade-up" data-aos-duration="2000" class="mb-6">
            <p class="text-xl font-light py-2">
                (500ml 투명 페트병 1,000개 기준)
            </p>
            탄소 배출량 약 <span class="text-esg-s">30.8kg</span> 감축할 수
            있어요!
        </div>
        <div data-aos="fade-up" data-aos-duration="3000" class="mb-16">
            30년산 소나무 <span class="text-esg-e">4.6그루</span>를 심은 것과
            같아요!
            <p class="text-base font-light text-gray-400 py-2">
                * 30년산 소나무 1그루가 1년간 흡수하는 탄소량은 약6.6kg입니다
            </p>
        </div>
        <div class="px-4 md:px-0">
            <!-- https://tailus.io/blocks/call-to-action -->
            <Link
                :href="route('booking.create')"
                class="relative flex h-16 w-full mx-auto items-center justify-center px-8 before:absolute before:inset-0 before:rounded-full before:bg-white before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max"
            >
                <span class="relative text-2xl font-bold text-primary"
                    >으쓱버스 체험하러 가기</span
                >
            </Link>
        </div>
    </div>
</template>
