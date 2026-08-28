<script setup lang="ts">
import Header from '@/components/myComponentProject/Header.vue';
import FooterSection from '@/components/myComponentProject/FooterSection.vue';
</script>

<template>
    <!-- Racine unique obligatoire pour le persistent layout Inertia -->
    <div class="flex min-h-screen flex-col bg-background text-foreground">
        <Header />

        <!-- main prend tout l'espace restant -->
        <main class="w-full flex-1 pt-18 sm:pt-20">
            <slot />
        </main>

        <FooterSection />
    </div>
</template>
