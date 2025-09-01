<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import BookingForm from "@/Sections/BookingForm.vue";
import BookingMenu from "@/Sections/BookingMenu.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps({
    bookedDates: Array,
});
</script>

<template>
    <Head title="예약하기" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="예약하기" sub-title="체험 예약" />
        </div>

        <BookingMenu />

        <section class="bg-gray-50">
            <div class="mx-auto max-w-screen-lg px-4 py-16 sm:px-0 lg:px-0">
                <BookingForm :bookedDates="props.bookedDates" />
            </div>
        </section>
    </FrontLayout>
</template>
