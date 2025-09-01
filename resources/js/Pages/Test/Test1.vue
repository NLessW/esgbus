import { onMounted } from 'vue';
<script setup>
import { onMounted } from "vue";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
const scrollAnimation = () => {
    gsap.timeline({
        scrollTrigger: {
            trigger: ".box",
            start: "center center",
            end: "bottom top",
            markers: true,
            scrub: true,
            pin: true,
        },
    })
        .from(".text1", { x: innerWidth * 1, opacity: 0 })
        .from(".text2", { x: innerWidth * 1, opacity: 0 });

    gsap.timeline({
        scrollTrigger: {
            trigger: ".box2",
            start: "center center",
            end: "bottom top",
            markers: true,
            scrub: true,
            pin: true,
        },
    })
        .from(".text4", { x: innerWidth * 1, opacity: 0 })
        .from(".text5", { x: innerWidth * 1, opacity: 0 });
};

onMounted(() => {
    gsap.registerPlugin(ScrollTrigger);
    scrollAnimation();
});
</script>
<template>
    <div id="app">
        <div class="box">
            <h2 class="text1">Scroll trigger</h2>
            <h2 class="text2">This is my first one</h2>
            <h2 class="text3">How is it?</h2>
        </div>
        <div class="box2">
            <h2 class="text4">Let get out</h2>
            <h2 class="text5">of this town</h2>
            <h2 class="text6">Drive out the city</h2>
        </div>
    </div>
</template>

<style scoped>
h2 {
    margin-top: 200px;
    margin-bottom: 200px;
}
</style>
