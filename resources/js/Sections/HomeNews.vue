<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    notices: Object,
    galleries: Object,
});
</script>

<!-- https://tailus.io/blocks/team -->
<!-- https://tailus.io/blocks/blog -->
<template>
    <div class="py-16">
        <div class="xl:container m-auto px-6 text-gray-600 xl:px-0">
            <div class="grid gap-12 md:gap-6 md:grid-cols-2 lg:gap-12">
                <div class="space-y-6">
                    <div class="flex justify-between items-end">
                        <h3
                            class="text-3xl font-bold text-gray-800 dark:text-white"
                        >
                            소식
                        </h3>
                        <div>
                            <a :href="route('community.notice')">더보기</a>
                        </div>
                    </div>
                    <hr />
                    <div class="py-4">
                        <div class="grid grid-cols-2 gap-4 sm:grid-cols-2">
                            <Link
                                v-for="(notice, index) in notices.data"
                                :key="index"
                                class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-primary hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                                :href="
                                    route('community.show', { board: notice })
                                "
                            >
                                <span
                                    class="inline-block rounded-lg bg-gray-50 p-3"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="size-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46"
                                        />
                                    </svg>
                                </span>

                                <h2 class="mt-2 mb-2 font-bold lg:text-xl">
                                    {{ notice.title_limit }}
                                </h2>

                                <p
                                    class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600"
                                >
                                    {{ notice.reg_date }}
                                </p>
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="flex justify-between items-end">
                        <h3
                            class="text-3xl font-bold text-gray-800 dark:text-white"
                        >
                            포토갤러리
                        </h3>
                        <div>
                            <Link :href="route('community.gallery')"
                                >더보기</Link
                            >
                        </div>
                    </div>
                    <hr />
                    <div class="py-4">
                        <div class="xl:container mx-auto">
                            <div class="grid gap-6 px-4 sm:px-0 lg:grid-cols-2">
                                <Link
                                    v-for="(gallery, index) in galleries.data"
                                    :key="index"
                                    :href="
                                        route('community.show', {
                                            board: gallery,
                                        })
                                    "
                                    class="group relative rounded-3xl space-y-6 overflow-hidden"
                                >
                                    <img
                                        class="mx-auto h-[380px] w-full object-cover object-top transition duration-500 group-hover:scale-105 group-hover:grayscale-0"
                                        :src="gallery.image_url"
                                        :alt="gallery.title"
                                        loading="lazy"
                                        width="640"
                                        height="805"
                                    />
                                    <div
                                        class="absolute bottom-0 inset-x-0 h-max mt-auto px-8 py-6 bg-primary dark:bg-white translate-y-0 transition duration-300 ease-in-out"
                                    >
                                        <div>
                                            <h4
                                                class="text-xl font-semibold dark:text-gray-700 text-white"
                                            >
                                                {{ gallery.title_limit }}
                                            </h4>
                                            <span
                                                class="block text-sm text-gray-100"
                                                >{{ gallery.reg_date }}</span
                                            >
                                        </div>
                                        <!-- <p
                                            class="mt-8 text-gray-300 dark:text-gray-600"
                                        >
                                            Quae labore quia tempora dolor
                                            impedit. Possimus, sint ducimus
                                            ipsam?
                                        </p> -->
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
