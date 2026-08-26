<template>
    <section
        class="relative w-full overflow-hidden bg-background py-16 "
    >
        <!-- Arrière-plan avec overlay sombre et halos lumineux -->
        <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-b from-background via-card/50 to-background"
        />
        <div
            class="pointer-events-none absolute top-1/2 left-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-primary/10 blur-[150px]"
        />

        <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <!-- Reseaux Sociaux -->
            <div
                class="mb-8 flex items-center justify-center gap-6 text-foreground/70"
            >
                <a
                    href="#"
                    class="transition-colors hover:text-secondary"
                    aria-label="Facebook"
                >
                    <Icon icon="mdi:facebook" class="h-5 w-5" />
                </a>
                <a
                    href="#"
                    class="transition-colors hover:text-secondary"
                    aria-label="LinkedIn"
                >
                    <Icon icon="mdi:linkedin" class="h-5 w-5" />
                </a>
                <a
                    href="#"
                    class="transition-colors hover:text-secondary"
                    aria-label="WhatsApp"
                >
                    <Icon icon="mdi:whatsapp" class="h-5 w-5" />
                </a>
                <a
                    href="#"
                    class="transition-colors hover:text-secondary"
                    aria-label="Instagram"
                >
                    <Icon icon="mdi:instagram" class="h-5 w-5" />
                </a>
                <a
                    href="#"
                    class="transition-colors hover:text-secondary"
                    aria-label="YouTube"
                >
                    <Icon icon="mdi:youtube" class="h-5 w-5" />
                </a>
            </div>

            <!-- En-tête de Section -->
            <div class="mb-10 space-y-3 text-center">
                <div
                    class="inline-flex items-center justify-center gap-2.5 text-secondary"
                >
                    <Bookmark class="h-6 w-6" />
                    <h2
                        class="text-2xl font-extrabold tracking-wide uppercase sm:text-4xl"
                    >
                        ETS ROYAL SERVICE
                    </h2>
                </div>
                <p class="text-sm font-medium text-foreground/80 sm:text-base">
                    Votre partenaire événementiel & traiteur d'excellence
                </p>
            </div>

            <!-- Carte Centrale Présentation -->
            <div
                class="mx-auto mb-8 max-w-5xl space-y-6 rounded-3xl border border-border bg-card/90 p-6 text-center shadow-2xl backdrop-blur-md sm:p-10"
            >
                <p
                    class="text-base leading-relaxed font-semibold text-foreground sm:text-lg"
                >
                    Entreprise événementielle basée à Baganté, spécialisée dans
                    l'organisation globale de cérémonies, le service traiteur
                    gastronomique et la logistique de réception.
                </p>

                <p
                    class="text-sm leading-relaxed font-light text-foreground/80 sm:text-base"
                >
                    Forte de
                    <span class="font-bold text-primary dark:text-secondary"
                        >10 années d'expérience</span
                    >
                    dans le secteur, ETS ROYAL a orchestré plus de
                    <span class="font-bold text-primary dark:text-secondary"
                        >1000 événements</span
                    >
                    et bénéficie d'un taux de
                    <span class="font-bold text-primary dark:text-secondary"
                        >98% de clients satisfaits</span
                    >. Notre réseau compte
                    <span class="font-bold text-primary dark:text-secondary"
                        >50 partenaires stratégiques</span
                    >
                    garantissant qualité, prestige et diversité de nos
                    prestations.
                </p>
            </div>

            <!-- Grille des 4 Statistiques -->
            <div
                class="mx-auto grid max-w-5xl grid-cols-2 gap-4 md:grid-cols-4"
            >
                <div
                    v-for="(stat, index) in statsList"
                    :key="index"
                    class="flex items-center gap-4 rounded-2xl border border-border bg-card p-4 shadow-sm transition-transform duration-300 hover:-translate-y-1 sm:p-5"
                >
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl text-primary dark:bg-secondary/15 dark:text-secondary"
                    >
                        <component :is="stat.icon" class="h-6 w-6" />
                    </div>
                    <div class="space-y-0.5 text-left">
                        <p
                            class="text-lg font-bold text-foreground sm:text-2xl"
                        >
                            {{ stat.value }}
                        </p>
                        <p
                            class="text-xs leading-tight font-medium text-foreground/70"
                        >
                            {{ stat.label }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import {
    Bookmark,
    Calendar,
    TrendingUp,
    Heart,
    Users,
    // Facebook,
    // Linkedin,
    // MessageCircle,
    // Instagram,
    // Youtube,
} from '@lucide/vue';
import { Icon } from '@iconify/vue';
const statsList = [
    {
        icon: Calendar,
        value: '500+',
        label: 'Événements organisés',
    },
    {
        icon: TrendingUp,
        value: '10+',
        label: "Années d'expérience",
    },
    {
        icon: Heart,
        value: '98%',
        label: 'Clients satisfaits',
    },
    {
        icon: Users,
        value: '50+',
        label: 'Partenaires',
    },
];
</script>
