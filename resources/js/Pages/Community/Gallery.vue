<script setup>
import NoData from "@/Components/NoData.vue";
import FrontLayout from "@/Layouts/FrontLayout.vue";
import CommunityGallery from "@/Sections/CommunityGallery.vue";
import CommunityMenu from "@/Sections/CommunityMenu.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps({
    boards: Object,
    limit: Number,
    page: Number,
    title: String,
});
const boardNumber = (index) => {
    return (
        props.boards.meta.total - props.page * props.limit + props.limit - index
    );
};
</script>

<template>
    <Head :title="title" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle :title="title" sub-title="커뮤니티" />
        </div>

        <CommunityMenu />

        <section class="bg-white">
            <div class="mx-auto max-w-screen-lg py-8 px-4 sm:px-0 lg:px-0">
                <CommunityGallery
                    v-if="props.boards.data.length > 0"
                    :boards="props.boards"
                />
                <NoData v-else />
            </div>
        </section>
    </FrontLayout>
</template>
