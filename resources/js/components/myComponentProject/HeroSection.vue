<template>
    <section
        class="relative flex min-h-[80vh] w-full items-center justify-center overflow-hidden bg-background pt-10 pb-16 text-foreground transition-colors duration-500 sm:pt-24 sm:pb-20"
    >
        <!-- =========================================================
             ARRIÈRE-PLAN : HALOS & OMBRES DE LUXE
        ========================================================== -->
        <div
            class="pointer-events-none absolute -top-20 -right-20 h-[450px] w-[450px] rounded-full bg-secondary/20 blur-[130px]"
        />
        <div
            class="pointer-events-none absolute bottom-0 -left-20 h-[350px] w-[350px] rounded-full bg-primary/20 blur-[130px]"
        />

        <!-- COURBES HARMONIEUSES VISIBLES EN FOND -->
        <svg
            class="pointer-events-none absolute inset-0 h-full w-full opacity-60 dark:opacity-50"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 1440 800"
            preserveAspectRatio="xMidYMid slice"
        >
            <defs>
                <linearGradient
                    id="royal-grad-1"
                    x1="0%"
                    y1="0%"
                    x2="100%"
                    y2="100%"
                >
                    <stop
                        offset="0%"
                        stop-color="var(--secondary)"
                        stop-opacity="0.3"
                    />
                    <stop
                        offset="60%"
                        stop-color="var(--primary)"
                        stop-opacity="0.15"
                    />
                    <stop
                        offset="100%"
                        stop-color="var(--background)"
                        stop-opacity="0"
                    />
                </linearGradient>
                <linearGradient
                    id="royal-grad-2"
                    x1="0%"
                    y1="100%"
                    x2="100%"
                    y2="0%"
                >
                    <stop
                        offset="0%"
                        stop-color="var(--secondary)"
                        stop-opacity="0.8"
                    />
                    <stop
                        offset="100%"
                        stop-color="var(--primary)"
                        stop-opacity="0.5"
                    />
                </linearGradient>
            </defs>
            <path
                d="M-100,220 C350,550 850,120 1550,380 L1550,900 L-100,900 Z"
                fill="url(#royal-grad-1)"
            />
            <path
                d="M-100,280 C400,50 900,500 1600,200"
                stroke="url(#royal-grad-2)"
                stroke-width="2"
                fill="none"
            />
            <path
                d="M-100,320 C400,90 900,540 1600,240"
                stroke="url(#royal-grad-2)"
                stroke-width="1"
                stroke-dasharray="6 6"
                fill="none"
            />
        </svg>

        <!-- =========================================================
             CONTENU PRINCIPAL HERO
        ========================================================== -->
        <div
            class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8"
        >
            <div
                class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12 lg:gap-12"
            >
                <!-- Colonne Texte -->
                <div
                    class="transform space-y-5 transition-all duration-1000 lg:col-span-8"
                    :class="[
                        isLoaded
                            ? 'translate-y-0 opacity-100'
                            : 'translate-y-6 opacity-0',
                    ]"
                >
                    <!-- Titre Typographique -->
                    <h1
                        class="text-3xl leading-tight font-extrabold tracking-tight sm:text-5xl lg:text-6xl"
                    >
                        <span
                            class="block text-primary uppercase dark:text-secondary"
                            >ETS ROYAL</span
                        >
                        <span
                            class="royal-script -mt-2 block text-4xl font-normal text-foreground sm:-mt-3 sm:text-6xl lg:text-7xl"
                        >
                            Service
                        </span>
                    </h1>

                    <!-- Description Concise -->
                    <p
                        class="max-w-2xl text-sm leading-relaxed font-light text-foreground/80 sm:text-base md:text-lg"
                    >
                        Du service traiteur gastronomique à la scénographie
                        complète de vos réceptions. Nous orchestrons vos grands
                        moments avec la rigueur et l'élégance qu'ils méritent.
                        Chaque détail est pensé avec soin pour créer une
                        expérience unique, raffinée et inoubliable. De la
                        conception à la réalisation, nous donnons vie à vos
                        envies pour faire de chaque événement un moment
                        d'exception.
                    </p>

                    <!-- Boutons d'Action (CTAs) -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <Link
                            href="/prestations"
                            class="group relative inline-flex items-center gap-2.5 overflow-hidden rounded-full bg-primary px-6 py-3.5 text-xs font-semibold text-primary-foreground shadow-lg shadow-primary/20 transition-all duration-300 hover:scale-[1.02] hover:bg-primary-hover active:scale-95 sm:text-sm"
                        >
                            <span>Découvrir nos offres</span>
                            <ArrowRight
                                class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
                            />
                        </Link>

                        <Link
                            href="/contact"
                            class="inline-flex items-center gap-2 rounded-full border border-border bg-card/80 px-6 py-3.5 text-xs font-medium text-foreground backdrop-blur-md transition-all duration-300 hover:border-secondary hover:bg-secondary/10 hover:text-secondary active:scale-95 sm:text-sm"
                        >
                            <PhoneCall class="h-4 w-4 text-secondary" />
                            <span>Obtenir un devis</span>
                        </Link>
                    </div>
                </div>

                <!-- Carte Prestige Droit -->
                <div
                    class="hidden transform justify-center transition-all delay-300 duration-1000 lg:col-span-4 lg:flex"
                    :class="[
                        isLoaded
                            ? 'translate-y-0 opacity-100'
                            : 'translate-y-10 opacity-0',
                    ]"
                >
                    <div class="group relative w-full max-w-sm">
                        <div
                            class="absolute -inset-1 animate-pulse rounded-3xl bg-gradient-to-r from-primary via-secondary to-primary-dark opacity-25 blur-xl transition duration-1000 group-hover:opacity-50"
                        />

                        <div
                            class="relative flex flex-col items-center justify-center space-y-4 rounded-3xl border border-border bg-card/80 p-8 text-center shadow-xl backdrop-blur-xl"
                        >
                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-full border border-secondary/30 bg-secondary/15 text-secondary"
                            >
                                <Award class="h-8 w-8" />
                            </div>
                            <div>
                                <h3
                                    class="font-serif text-lg font-bold text-foreground"
                                >
                                    Savoir-Faire Exclusif
                                </h3>
                                <p class="mt-1 text-xs text-foreground/70">
                                    Une organisation méticuleuse et des saveurs
                                    d'exception pour vos réceptions.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import { Sparkles, ArrowRight, PhoneCall, Award } from '@lucide/vue';

const isLoaded = ref(false);

const stats = [
    { value: '+100', label: 'Réceptions réussies' },
    { value: 'Sur-mesure', label: 'Service clé en main' },
    { value: 'Premium', label: 'Qualité garantie' },
];

onMounted(() => {
    setTimeout(() => {
        isLoaded.value = true;
    }, 100);
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');

.royal-script {
    font-family: 'Great Vibes', 'Alex Brush', cursive, sans-serif;
}
</style>
