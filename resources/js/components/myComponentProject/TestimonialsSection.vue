<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { Images } from '@lucide/vue';
interface Testimonial {
    id: number;
    name: string;
    role: string;
    company?: string;
    avatar?: string;
    rating: number;
    highlight: string;
    content: string;
}

const testimonials = ref<Testimonial[]>([
    {
        id: 1,
        name: 'Claire de Saint-Hubert',
        role: "Directrice d'Événements",
        company: 'Grand Palais VIP',
        rating: 5,
        highlight: "Une prestation d'exception",
        content:
            'Royal Service a surpassé toutes nos attentes. La rigueur, la discrétion et le souci du détail apportés lors de notre gala annuel ont marqué tous nos convives de prestige.',
        avatar: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=250',
    },
    {
        id: 2,
        name: 'Alexandre Mercier',
        role: 'Entrepreneur & Investisseur',
        company: 'Mercier Holdings',
        rating: 5,
        highlight: 'Un professionnalisme exemplary',
        content:
            "L'attention portée aux exigences particulières et la qualité irréprochable du service sont incomparables. Pouvoir compter sur une équipe aussi réactive est un vrai privilège.",
        avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=250',
    },
    {
        id: 3,
        name: 'Éléonore Moreau',
        role: 'Propriétaire Résidentielle',
        company: 'Résidence Privée',
        rating: 5,
        highlight: 'Le sens du détail parfait',
        content:
            "Chaque intervention est exécutée avec une précision chirurgicale. Le niveau d'exigence de Royal Service correspond exactement aux standards très élevés que nous recherchons.",
        avatar: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=250',
    },
]);

const stats = [
    { value: '4.9 / 5', label: 'Satisfaction globale' },
    { value: '+98%', label: 'Fidélité client' },
    { value: '+1 500', label: 'Prestations accomplies' },
    { value: '10+', label: "Années d'expérience" },
];
</script>

<template>
    <section
        class="bg-background px-4  text-foreground transition-colors duration-300 sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-7xl">
            <!-- En-tête de section -->
            <div class="mx-auto max-w-3xl text-center">
                <!-- Badge Royal Gold -->

                <h2
                    class="mb-4 font-sans text-3xl font-bold tracking-tight text-foreground sm:text-4xl"
                >
                    Ce que disent nos clients d'exception
                </h2>

                <p
                    class="text-base leading-relaxed text-muted-foreground sm:text-lg"
                >
                    Découvrez l'expérience Royal Service à travers les retours
                    de ceux qui nous font confiance au quotidien.
                </p>
            </div>

            <!-- Grille de témoignages -->
            <div
                class="mx-auto mt-12 grid max-w-6xl grid-cols-1 justify-center gap-8 sm:grid-cols-2 lg:grid-cols-3"
            >
                <div
                    v-for="item in testimonials"
                    :key="item.id"
                    class="group relative flex flex-col justify-between rounded-lg border border-border bg-card p-8 shadow-xs transition-all duration-300 hover:border-[#d4a72c]/60 hover:shadow-lg"
                >
                    <!-- Guillemet décoratif -->
                    <div
                        class="pointer-events-none absolute top-6 right-6 text-[#d4a72c]/15 transition-colors select-none group-hover:text-[#d4a72c]/30"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="44"
                            height="44"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"
                            />
                        </svg>
                    </div>

                    <div>
                        <!-- Étoiles de notation -->
                        <div
                            class="mb-4 flex items-center gap-1 text-[#d4a72c]"
                        >
                            <svg
                                v-for="i in item.rating"
                                :key="i"
                                xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                            >
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                                />
                            </svg>
                        </div>

                        <!-- Titre du témoignage -->
                        <h3 class="mb-2 text-lg font-bold text-card-foreground">
                            "{{ item.highlight }}"
                        </h3>

                        <!-- Corps du témoignage -->
                        <p
                            class="mb-6 text-sm leading-relaxed text-muted-foreground"
                        >
                            {{ item.content }}
                        </p>
                    </div>

                    <!-- Profil de l'auteur -->
                    <div
                        class="mt-auto flex items-center gap-4 border-t border-border pt-4"
                    >
                        <img
                            :src="item.avatar"
                            :alt="item.name"
                            class="aspect-square h-10 w-10 shrink-0 rounded-full border-2 border-[#d4a72c]/70 object-cover shadow-xs"
                        />
                        <div class="min-w-0 flex-1">
                            <h4
                                class="truncate text-sm font-bold text-card-foreground"
                            >
                                {{ item.name }}
                            </h4>
                            <p class="truncate text-xs text-muted-foreground">
                                {{ item.role }}
                                <span v-if="item.company" class="text-[#d4a72c]"
                                    >• {{ item.company }}</span
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bandeau de statistiques -->
            <div
                class="mt-16 grid grid-cols-2 gap-8 rounded-lg border-t border-border bg-card/80 p-6 pt-12 text-center shadow-sm backdrop-blur-md sm:grid-cols-4 sm:p-8"
            >
                <div
                    v-for="(stat, index) in stats"
                    :key="index"
                    class="space-y-1 rounded-lg bg-card/90 p-4 shadow-sm backdrop-blur-md transition-transform duration-300 hover:scale-105 sm:p-6"
                >
                    <p
                        class="font-sans text-3xl font-extrabold text-[#d4a72c] sm:text-4xl"
                    >
                        {{ stat.value }}
                    </p>
                    <p class="text-sm font-medium text-muted-foreground">
                        {{ stat.label }}
                    </p>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="flex flex-wrap items-center justify-center gap-4 py-4">
                <a
                    href="https://wa.me/237696943361?text=Hey%20Royal%20Service,%20je%20souhaite%20discuter%20de%20mon%20projet."
                    class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-2.5 text-xs font-semibold text-primary-foreground shadow-md transition-all duration-300 hover:scale-105 hover:bg-primary-hover active:scale-95 sm:text-sm"
                >
                    Discuter de votre projet
                </a>

                <Link
                    href="/galerie"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-5 py-2.5 text-xs font-semibold text-primary-foreground shadow-md transition-all duration-300 hover:scale-105 hover:bg-primary-hover active:scale-95 sm:text-sm"
                >
                    <Images class="h-4 w-4" />
                    Voir toute la galerie
                </Link>
            </div>
        </div>
    </section>
</template>
