<script setup>
// import FixedSidebar from "@/Sections/FixedSidebar.vue";
import Footer from "@/Sections/Footer.vue";
// import Header from "@/Sections/Header.vue";
import GnbHeader from "@/Sections/GnbHeader.vue";
import AOS from "aos";
import { initFlowbite } from "flowbite";
import { onMounted } from "vue";

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
    AOS.init(); // Initialize AOS
});
</script>

<template>
    <!-- <Header /> -->
    <GnbHeader />
    <slot />
    <Footer />
    <!-- <FixedSidebar /> -->
</template>
