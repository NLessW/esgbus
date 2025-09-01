<script setup>
import FrontLayout from "@/Layouts/FrontLayout.vue";
import PageTitle from "@/Sections/PageTitle.vue";
import { Head, router, useForm } from "@inertiajs/vue3";
const props = defineProps({
    board: Object,
    page: Number,
});
const back = () => {
    router.get(route("community.private", { page: props.page }));
};

const initForm = {
    type: "private",
    id: null,
    page: null,
    password: null,
};
const form = useForm(initForm);

const submitForm = (e) => {
    form.id = props.board.data.id;
    form.page = props.page;
    form.post(route("community.private.password"), {
        preserveScroll: true,
        onSuccess: (page) => {
            if (page.props.flash.success) {
                // router.get(
                //     route("community.show", {
                //         board: props.board.data.id,
                //         page: page,
                //     })
                // );
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

        <section class="bg-gray-50">
            <div class="mx-auto max-w-screen-lg px-4 py-16 sm:px-0 lg:px-0">
                <section
                    class="container relative m-auto text-gray-500 md:px-12 xl:px-40"
                >
                    <div class="m-auto space-y-8 md:w-10/12 lg:w-6/12 xl:w-2/3">
                        <div
                            data-aos="fade-up"
                            data-aos-duration="1000"
                            class="rounded-3xl border border-gray-100 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 backdrop-blur-2xl"
                        >
                            <div class="p-8 py-12 sm:p-16">
                                <h2
                                    class="mb-8 text-xl md:text-2xl font-bold text-gray-800 dark:text-white"
                                >
                                    게시글 확인을 위한 인증
                                </h2>
                                <form
                                    method="POST"
                                    @submit.prevent="submitForm"
                                    class="space-y-4"
                                >
                                    <div>
                                        <label for="password" class="text-sm"
                                            >비밀번호</label
                                        >
                                        <input
                                            v-model="form.password"
                                            class="bg-white w-full rounded-lg border-gray-300 p-3 text-sm my-2"
                                            placeholder="비밀번호를 입력해 주세요"
                                            type="password"
                                            id="name"
                                            required
                                        />
                                    </div>

                                    <button
                                        type="submit"
                                        class="relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95"
                                    >
                                        <span
                                            class="relative text-base font-semibold text-white dark:text-dark"
                                            >인증하기</span
                                        >
                                    </button>
                                    <button
                                        type="button"
                                        @click="back"
                                        class="relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-white before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 before:border before:border-gray-300"
                                    >
                                        <span
                                            class="relative text-base font-semibold text-primary dark:text-dark"
                                            >취소하기</span
                                        >
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </FrontLayout>
</template>
