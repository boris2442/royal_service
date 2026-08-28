<!-- <template>
    <GallerySection />
</template> -->
<template>
    <Head title="Realisations">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <AppLoader />
    <div class="pt-20 pb-20 lg:pt-24 lg:pb-12">
        <Header />
        <!-- <HeroSection /> -->
        <!-- <AboutSection /> -->
        <GallerySection />
        <FooterSection />
    </div>
</template>

<script setup lang="ts">
import GallerySection from '@/components/myComponentProject/GallerySection.vue';
import Header from '@/components/myComponentProject/Header.vue';
import FooterSection from '@/components/myComponentProject/FooterSection.vue';
</script>
