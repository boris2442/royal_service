<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Header from '@/components/myComponentProject/Header.vue';
import { dashboard, login } from '@/routes';
import { register } from '@/routes';
import HeroSection from '@/components/myComponentProject/HeroSection.vue';
import AboutSection from '@/components/myComponentProject/AboutSection.vue';
import GallerySection from '@/components/myComponentProject/GallerySection.vue';

import FooterSection from '@/components/myComponentProject/FooterSection.vue';
import AppLoader from '@/components/myComponentProject/AppLoader.vue';

const page = usePage();
const dashboardUrl = computed(() =>
    page.props.currentTeam ? dashboard(page.props.currentTeam.slug).url : '/',
);
</script>

<template>
   
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <AppLoader/>
    <div class="pt-20 pb-20 lg:pt-24 lg:pb-12">
        <Header />
        <HeroSection />
        <AboutSection />
        <GallerySection />
        <FooterSection />
    </div>
</template>
