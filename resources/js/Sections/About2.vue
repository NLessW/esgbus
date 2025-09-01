<script setup>
const contents = [
    {
        content: "탄소중립과 자원순환에 대해 이해합니다.",
        url: "/images/home-photo-1.jpg",
    },
    {
        content:
            "투명 페트병이 순환하는 과정을 눈으로 직접 보고 체험할 수 있습니다.",
        url: "/images/home-photo-2.jpg",
    },
    {
        content: "멸종 위기 동물과 소통하며 기후 위기에 공감할 수 있습니다.",
        url: "/images/home-photo-3.jpg",
    },
    {
        content: "병뚜껑으로 만든 다양한 업사이클링 굿즈를 만듭니다.",
        url: "/images/home-photo-4.jpg",
    },
];
</script>
<template>
    <!-- source: https://github.com/mfg888/Responsive-Tailwind-CSS-Grid/blob/main/index.html -->
    <!-- https://tailwindflex.com/@arya/responsive-products-grid -->
    <div class="text-center py-16">
        <div
            data-aos="fade-up"
            data-aos-duration="1000"
            class="flex items-center mx-auto w-fit mb-4"
        >
            <img
                src="/images/logo.png"
                class="h-12 mr-3 sm:h-14"
                alt="으쓱버스"
            />
            <h1 class="font-bold text-4xl md:text-5xl">체험과정</h1>
        </div>
    </div>

    <div class="grid gap-12 px-4 sm:px-0 lg:grid-cols-2">
        <template v-for="(item, index) in contents" :key="index" class="group">
            <div
                class="relative rounded-3xl space-y-6 overflow-hidden duration-500 hover:scale-105 hover:shadow-xl"
            >
                <img
                    class="mx-auto h-[380px] w-full object-cover object-top"
                    :src="item.url"
                    :alt="item.content"
                    loading="lazy"
                    width="640"
                    height="805"
                />
                <div
                    class="absolute bottom-0 inset-x-0 h-max mt-auto px-8 py-6 bg-[#a7ba3b] dark:bg-white translate-y-0 transition duration-300 ease-in-out"
                >
                    <div>
                        <h4
                            class="text-xl font-bold dark:text-gray-700 text-white"
                        >
                            {{ item.content }}
                        </h4>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
