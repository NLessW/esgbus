<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import helper from "@/helper";
import { Head, router } from "@inertiajs/vue3";
const props = defineProps({
    board: Object,
    page: Number,
});
const back = () => {
    router.get(
        route("community." + props.board.data.type, { page: props.page })
    );
};
const deleteBoard = (id) => {
    if (!confirm("정말 삭제하시겠습니까?")) {
        return false;
    }

    router.visit(route("community.private.delete"), {
        method: "delete",
        data: {
            id: id,
        },
        preserveScroll: true,
        onSuccess: (page) => {
            if (page.props.flash.success) {
                alert(page.props.flash.success);
                router.get(route("community.private"));
            }
            if (page.props.flash.error) {
                alert(page.props.flash.error);
            }
        },
    });
};
</script>

<template>
    <Head :title="board.data.title" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle :title="board.data.type_label" sub-title="커뮤니티" />
        </div>

        <section class="bg-white">
            <div class="mx-auto max-w-screen-lg py-8 px-4 sm:px-0 lg:px-0">
                <div
                    class="border-t-2 border-t-gray-500 border-b border-gray-400 py-4 mb-8"
                >
                    <h3 class="mb-2 text-2xl font-bold">
                        {{ board.data.title }}
                    </h3>
                    <p class="text-gray-500">
                        {{ board.data.name }} / {{ board.data.reg_date }}
                    </p>
                </div>

                <div
                    class="text-lg min-h-56 pb-8 border-b border-gray-400"
                    v-html="helper.removeATags(board.data.content)"
                ></div>

                <div
                    v-if="!!board.data.commented_at"
                    class="bg-gray-50 text-lg min-h-56 border-b border-gray-400 pt-4 pl-10"
                >
                    <div class="mb-6 font-semibold">
                        {{ board.data.commented_at }} 에 답변이 작성되었습니다.
                    </div>
                    <div v-html="board.data.comment" class="pb-4"></div>
                </div>

                <div class="mt-4 flex justify-between">
                    <button
                        class="inline-flex gap-1 items-center overflow-hidden rounded-md bg-white px-3 py-2.5 text-gray-800 border border-gray-700"
                        @click="back"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-5"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                            />
                        </svg>

                        <span
                            class="text-sm font-medium transition-all group-hover:ms-4"
                        >
                            목록보기
                        </span>
                    </button>
                    <div
                        v-if="
                            board.data.type == 'private' &&
                            board.data.commented_at == null
                        "
                        class="flex items-center"
                    >
                        <button
                            class="inline-flex gap-1 items-center overflow-hidden rounded-md bg-primary px-3 py-2.5 text-white focus:outline-none focus:ring active:bg-primary"
                            type="button"
                            @click="
                                router.get(
                                    route('community.private.create', {
                                        id: board.data.id,
                                        page: props.page,
                                    })
                                )
                            "
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-3"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                                />
                            </svg>
                            <span
                                class="text-sm font-medium transition-all group-hover:ms-4"
                            >
                                수정하기
                            </span>
                        </button>
                        <button
                            class="ml-2 inline-flex gap-1 items-center overflow-hidden rounded-md bg-orange-500 px-3 py-2.5 text-white focus:outline-none focus:ring active:bg-primary"
                            type="button"
                            @click="deleteBoard(board.data.id)"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-4"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                />
                            </svg>

                            <span
                                class="text-sm font-medium transition-all group-hover:ms-4"
                            >
                                삭제하기
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </FrontLayout>
</template>
