<script setup>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { onMounted } from "vue";

onMounted(() => {
    gsap.registerPlugin(ScrollTrigger);
    scrollAnimation();
});
const scrollAnimation = () => {
    gsap.to("#scroll-content", {
        ease: "none",
        y: "-100%",
        scrollTrigger: {
            trigger: "#pinned-section",
            pin: true,
            start: "top",
            end: "+=300%",
            scrub: true,
            pinSpacing: true,
            scroller: "#scroller",
            onEnter: () => {
                console.log("entering pinned slide"); // fires when scrolling past slide
            },
            onLeave: () => {
                console.log("leaving pinned slide");
            },
        },
    });
};
</script>
<template>
    <div
        class="bg-[url('/images/about-bg-dark.jpg')] bg-cover bg-center h-screen"
    >
        <div id="scroller">
            <section>
                <h1>Section One</h1>
            </section>

            <section>
                <h1>Section Two</h1>
            </section>

            <section id="pinned-section">
                <div id="scroll-content-wrapper">
                    <div id="scroll-content">
                        <img
                            src="https://sontungpts.com/wp-content/uploads/2022/05/Portrait-vs-Landscape-2.jpg"
                        />
                    </div>
                </div>
            </section>

            <section>
                <h1>Section Four</h1>
            </section>

            <section>
                <h1>Section Five</h1>
            </section>
        </div>
    </div>
    <div class="bg-gray-50 py-96"></div>
    <!--  #scroller -->
</template>

<style scoped>
html,
body {
    margin: 0;
}

section {
    color: white;
    height: 100vh;
    scroll-snap-align: start;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

#scroller {
    scroll-snap-type: y mandatory;
    max-height: 100vh;
    overflow-y: scroll;
}

#scroll-content-wrapper {
    width: 600px;
    height: 300px;
    overflow: hidden;
    position: relative;
    background: #ccc;
}

#scroll-content {
    width: 100%;
}
</style>
