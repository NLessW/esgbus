<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head, router, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
const props = defineProps({
    title: String,
    board: Object,
    page: Number,
});
const back = () => {
    window.history.back();
};

const initForm = {
    type: "private",
    id: null,
    name: null,
    title: null,
    content: null,
    password: null,
};
const form = useForm(initForm);

onMounted(() => {
    if (props.board?.id) {
        form.type = props.board.type;
        form.id = props.board.id;
        form.name = props.board.name;
        form.title = props.board.title;
        form.content = props.board.content;
    }
});

const submitForm = (e) => {
    if (props.board?.id) {
        form.put(route("community.private.update"), {
            preserveScroll: true,
            onSuccess: (page) => {
                if (page.props.flash.success) {
                    alert(page.props.flash.success);
                    router.get(
                        route("community.show", {
                            board: props.board.id,
                            page: props.page,
                        })
                    );
                }
                if (page.props.flash.error) {
                    alert(page.props.flash.error);
                }
            },
        });
    } else {
        form.post(route("community.private.store"), {
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
    }
};
</script>

<template>
    <Head :title="props.title" />
    <FrontLayout>
        <div class="max-w-screen-xl mx-auto rounded-2xl pt-6 lg:pt-24">
            <PageTitle :title="props.title" sub-title="커뮤니티" />
        </div>

        <section class="bg-white">
            <div class="mx-auto max-w-screen-lg py-8 px-4 sm:px-0 lg:px-0">
                <form
                    method="POST"
                    @submit.prevent="submitForm"
                    class="space-y-4"
                >
                    <div
                        class="border-t-2 border-t-gray-500 border-b border-gray-400 py-4 mb-8"
                    >
                        <h3 class="mb-2">
                            <div class="flex items-center flex-col md:flex-row">
                                <label
                                    for="name"
                                    class="text-base w-full md:w-1/6"
                                    >이름 *</label
                                >
                                <input
                                    v-model="form.name"
                                    type="text"
                                    class="bg-gray-50 w-full md:w-1/6 rounded-lg border-gray-300 p-3 text-sm my-2"
                                    :class="{
                                        'font-bold': props.board?.id,
                                    }"
                                    placeholder="이름을 입력해 주세요"
                                    id="name"
                                    :readonly="props.board?.id"
                                    required
                                />
                            </div>
                            <div class="flex items-center flex-col md:flex-row">
                                <label
                                    for="name"
                                    class="text-base w-full md:w-1/6"
                                    >제목 *</label
                                >
                                <input
                                    v-model="form.title"
                                    type="text"
                                    class="bg-gray-50 w-full md:w-3/6 rounded-lg border-gray-300 p-3 text-sm my-2"
                                    placeholder="제목을 입력해 주세요"
                                    id="title"
                                    required
                                />
                            </div>
                            <div class="flex items-center flex-col md:flex-row">
                                <label
                                    for="name"
                                    class="text-base w-full md:w-1/6"
                                    >문의내용 *</label
                                >
                                <textarea
                                    v-model="form.content"
                                    name="content"
                                    class="bg-gray-50 w-full md:w-5/6 rounded-lg border-gray-300 p-3 text-sm my-2 h-40"
                                    required
                                    placeholder="문의내용을 입력해 주세요"
                                ></textarea>
                            </div>
                            <div
                                v-if="!props.board?.id"
                                class="flex items-center flex-col md:flex-row"
                            >
                                <label
                                    for="name"
                                    class="text-base w-full md:w-1/6"
                                    >비밀번호 *</label
                                >
                                <div class="w-full md:w-5/6">
                                    <input
                                        v-model="form.password"
                                        type="password"
                                        class="bg-gray-50 w-full md:w-1/6 rounded-lg border-gray-300 p-3 text-sm my-2"
                                        placeholder="비밀번호"
                                        id="password"
                                        required
                                    />
                                    <p class="text-gray-500 text-sm">
                                        문의글 확인시 필요하오니 꼭 기억해
                                        주세요
                                    </p>
                                </div>
                            </div>
                        </h3>
                    </div>
                    <div class="flex justify-between">
                        <button
                            v-if="!props.board?.id"
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
                        <button
                            v-else
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
                                    d="M6 18 18 6M6 6l12 12"
                                />
                            </svg>

                            <span
                                class="text-sm font-medium transition-all group-hover:ms-4"
                            >
                                취소하기
                            </span>
                        </button>
                        <button
                            class="inline-flex gap-1 items-center overflow-hidden rounded-md bg-primary px-3 py-2.5 text-white focus:outline-none focus:ring active:bg-primary"
                            type="submit"
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
                                v-if="!props.board?.id"
                                class="text-sm font-medium transition-all group-hover:ms-4"
                            >
                                등록완료
                            </span>
                            <span
                                v-else
                                class="text-sm font-medium transition-all group-hover:ms-4"
                            >
                                수정완료
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </FrontLayout>
</template>
