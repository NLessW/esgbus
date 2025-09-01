<script setup>
import NoData from "@/Components/NoData.vue";
import FrontLayout from "@/Layouts/FrontLayout.vue";
import CommunityMenu from "@/Sections/CommunityMenu.vue";
import CommunityPrivate from "@/Sections/CommunityPrivate.vue";
import CommunityPrivateMobile from "@/Sections/CommunityPrivateMobile.vue";
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
    <Head title="1:1문의" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle title="1:1문의" sub-title="커뮤니티" />
        </div>

        <CommunityMenu />

        <section class="bg-white">
            <div class="mx-auto max-w-screen-lg py-8 px-4 sm:px-0 lg:px-0">
                <template v-if="props.boards.data.length > 0">
                    <div class="hidden md:block">
                        <CommunityPrivate
                            :boards="props.boards"
                            :limit="props.limit"
                            :page="props.page"
                        />
                    </div>
                    <div class="block md:hidden">
                        <CommunityPrivateMobile
                            :boards="props.boards"
                            :limit="props.limit"
                            :page="props.page"
                        />
                    </div>
                </template>
                <NoData v-else />
            </div>
        </section>
    </FrontLayout>
</template>
