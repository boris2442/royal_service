<template>
    <!-- Contenu de la page principal, flouté en arrière-plan -->
    <div :class="{ 'pointer-events-none blur-sm select-none': isShowingModal }">
        <h1>Restaurant</h1>
    </div>

    <!-- Modal professionnel "En cours de développement" -->
    <div
        v-if="isShowingModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-[var(--color-foreground)]/80 p-4 backdrop-blur-xs"
        @click.self="closeAndRedirectHome"
    >
        <div
            class="relative w-full max-w-md overflow-hidden rounded-[var(--radius-lg)] border border-[var(--border)] bg-[var(--color-card)] p-8 shadow-xl transition-all duration-300"
            @click.stop
        >
            <!-- Bouton de fermeture 'X' -->
            <button
                type="button"
                class="absolute top-4 right-4 text-[var(--color-muted-foreground)] transition-colors hover:text-[var(--color-destructive)]"
                @click="closeAndRedirectHome"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-x"
                >
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>

            <!-- Icône professionnelle (Sablier et outils en Royal Gold) -->
            <div class="mb-6 flex justify-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 64 64"
                    width="64"
                    height="64"
                    fill="none"
                >
                    <g
                        stroke="var(--royal-gold)"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path
                            d="M48 4H16c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h32c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2Z"
                        />
                        <path
                            d="M16 60h32c1.1 0 2-.9 2-2V48c0-1.1-.9-2-2-2H16c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2Z"
                        />
                        <path
                            d="M32 18s16 6 16 14-16 14-16 14-16-6-16-14 16-14 16-14Z"
                            fill="var(--royal-gold-light)"
                        />
                        <path
                            d="M32 46s16-6 16-14-16-14-16-14S16 24 16 32s16 14 16 14Z"
                        />
                        <path d="M26 12h12M24 52h16" />
                        <path
                            d="M50 20s-2.5 0-2.5 2.5V30l-5 5 5 5V42c0 2.5 2.5 2.5 2.5 2.5"
                        />
                        <path
                            d="M14 20s2.5 0 2.5 2.5V30l5 5-5 5v10c0 2.5-2.5 2.5-2.5 2.5"
                        />
                        <path d="M42.5 35H32M21.5 35H32" />
                    </g>
                </svg>
            </div>

            <!-- Titre en Royal Bordeaux -->
            <h2
                class="mb-4 text-center text-2xl font-bold text-[var(--primary)]"
            >
                En cours de développement
            </h2>

            <!-- Message d'information -->
            <p
                class="mb-8 text-center text-sm leading-relaxed text-[var(--color-muted-foreground)]"
            >
                Cette section fait l'objet de finitions méticuleuses pour vous
                offrir une expérience d'exception très prochainement.
            </p>

            <!-- Bouton d'action principal -->
            <button
                type="button"
                class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-[var(--radius-md)] bg-[var(--primary)] px-6 py-3 font-semibold text-[var(--primary-foreground)] shadow-sm transition-colors hover:bg-[var(--primary-hover)]"
                @click="closeAndRedirectHome"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-home"
                >
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
                Aller à l'accueil
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({
    layout: PublicLayout,
});

const isShowingModal = ref(true);

const closeAndRedirectHome = () => {
    isShowingModal.value = false;
    setTimeout(() => {
        router.visit('/');
    }, 300);
};

onMounted(() => {
    isShowingModal.value = true;
});
</script>
