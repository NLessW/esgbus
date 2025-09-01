<script setup>
import { onMounted, ref } from "vue";
import { YoutubeVue3 } from "youtube-vue3";
const videoId = "ZNmfgKXvjxY";
const youtube = ref(null);
const playCurrentVideo = () => {
    youtube.value.player.playVideo();
};
const stopCurrentVideo = () => {
    youtube.value.player.stopVideo();
};
const pauseCurrentVideo = () => {
    youtube.value.player.pauseVideo();
};
const onEnded = () => {
    // console.log("## OnEnded");
};
const onPaused = () => {
    // console.log("## OnPaused");
};
const onPlayed = () => {
    // console.log("## OnPlayed");
};

const onPlayerReady = (event) => {
    // Add scroll event listener
    window.addEventListener("scroll", function () {
        var videoElement = document.getElementById("youtube-video");
        var position = videoElement.getBoundingClientRect();

        // Check if the video is in the viewport
        if (position.top >= 0 && position.bottom <= window.innerHeight) {
            playCurrentVideo();
        } else {
            pauseCurrentVideo();
        }
    });
};

onMounted(() => {
    stopCurrentVideo();
    onPlayerReady();
    console.log("## onMounted");
});
</script>
<!-- https://tailus.io/blocks/content -->
<template>
    <!-- <div class="py-16"> -->
    <div class="xl:container m-auto text-gray-600">
        <div
            class="lg:bg-gray-50 dark:lg:bg-darker px-4 lg:px-0 py-8 lg:py-16 rounded-[4rem] space-y-6 md:flex flex-row-reverse md:gap-6 justify-center md:space-y-0 lg:items-end"
        >
            <div class="hidden md:block md:w-1/2">
                <img
                    src="/images/ci2.png"
                    alt="ESG"
                    loading="lazy"
                    class="h-96 mx-auto"
                />
            </div>
            <div class="md:w-1/2">
                <h2
                    class="text-xl font-medium font-NanumSquareNeo text-gray-700 md:text-xl dark:text-white md:leading-normal mb-8"
                >
                    <span class="font-semibold">으쓱버스</span>에서 페트병
                    자원순환 업사이클링 체험을 통해 기후 위기에 공감하고
                    탄소중립을 실천할 수 있습니다.
                </h2>
                <!-- <p class="my-8 text-gray-600 dark:text-gray-300">
                        Nobis minus voluptatibus pariatur dignissimos libero
                        quaerat iure expedita at? Asperiores nemo possimus
                        nesciunt dicta veniam aspernatur quam mollitia.
                    </p> -->

                <!-- https://pqina.nl/blog/fix-html-video-autoplay-not-working/ -->
                <!-- <video
                    class="w-full rounded-lg shadow-lg"
                    controls
                    autoplay
                    muted
                    playsinline
                >
                    <source
                        src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                        type="video/mp4"
                    />
                    Your browser does not support the video tag.
                </video> -->
                <!-- <iframe
                    src="https://www.youtube.com/embed/ZNmfgKXvjxY?controls=2&autoplay=0&mute=1"
                    title="투명 페트병에 대하여 얼마나 알고 있니?"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    class="w-full rounded-3xl shadow-xl drop-shadow-xl h-96"
                ></iframe> -->
                <div id="youtube-video">
                    <YoutubeVue3
                        ref="youtube"
                        :videoid="videoId"
                        :loop="0"
                        :width="600"
                        :height="400"
                        @ended="onEnded"
                        @paused="onPaused"
                        @played="onPlayed"
                    />
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</template>

<style>
#youtube-video > iframe {
    width: 100%;
    aspect-ratio: 16 / 9;
}
</style>
