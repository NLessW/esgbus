<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import BookingEdit from "@/Sections/BookingEdit.vue";
import BookingIndex from "@/Sections/BookingIndex.vue";
import BookingMenu from "@/Sections/BookingMenu.vue";
import SignIn from "@/Sections/SignIn.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    bookings: Object,
    booking: Object,
    auth: Boolean,
});
</script>

<template>
    <Head title="메인" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="예약하기" sub-title="체험 예약" />
        </div>

        <BookingMenu />

        <section class="bg-gray-50">
            <div class="mx-auto max-w-screen-lg px-4 py-16 sm:px-0 lg:px-0">
                <SignIn v-if="!auth" />
                <template v-else>
                    <BookingEdit
                        v-if="!!booking?.data?.id"
                        :booking="booking.data"
                    />
                    <BookingIndex v-else :bookings="bookings" />
                </template>
            </div>
        </section>
    </FrontLayout>
</template>
