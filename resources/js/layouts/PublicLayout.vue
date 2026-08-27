<script setup lang="ts">
import Header from '@/components/myComponentProject/Header.vue';
import FooterSection from '@/components/myComponentProject/FooterSection.vue';
</script>

<template>
    <Header />
    <!-- Compensation de la hauteur du header (ex: pt-16, pt-20 ou pt-24 selon la hauteur exacte) -->
    <main class="w-full bg-background text-foreground pt-18 sm:pt-20">
        <slot />
    </main>
    <FooterSection />
</template>
