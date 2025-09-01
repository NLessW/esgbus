<script setup>
import NoData from "@/Components/NoData.vue";
import FrontLayout from "@/Layouts/FrontLayout.vue";
import CommunityMenu from "@/Sections/CommunityMenu.vue";
import CommunityNotice from "@/Sections/CommunityNotice.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps({
    boards: Object,
    limit: Number,
    page: Number,
    title: String,
});
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
                <CommunityNotice
                    v-if="props.boards.data.length > 0"
                    :boards="props.boards"
                    :limit="props.limit"
                    :page="props.page"
                />
                <NoData v-else />
            </div>
        </section>
    </FrontLayout>
</template>
