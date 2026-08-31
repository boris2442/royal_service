<template>
    <section
        class="w-full bg-background px-4 py-10 text-foreground transition-colors duration-300 sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-6xl space-y-8">
            <!-- En-tête de section -->
            <div class="space-y-2 text-center">
                <h2
                    class="text-2xl font-extrabold tracking-tight text-foreground sm:text-3xl"
                >
                    Nos Réalisations en Images
                </h2>
                <div class="mx-auto h-1 w-16 rounded-full bg-secondary" />
            </div>

            <!-- Grille compacte (2 cols mobile, 3 cols tablette, 4 cols desktop) -->
            <div
                class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4"
            >
                <div
                    v-for="(item, index) in galleryItems"
                    :key="index"
                    class="group relative aspect-[4/3] overflow-hidden rounded-xl border border-border bg-card shadow-sm transition-all duration-300 hover:border-secondary hover:shadow-lg"
                >
                    <img
                        :src="item.image"
                        :alt="item.alt"
                        class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                        loading="lazy"
                    />

                    <!-- Superposition d'information au survol -->
                    <div
                        class="absolute inset-0 flex items-end bg-gradient-to-t from-black/80 via-black/20 to-transparent p-3 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                    >
                        <span
                            class="line-clamp-2 text-xs font-medium tracking-wide text-white"
                        >
                            {{ item.alt }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <Link
                    href="/prestations"
                    class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-2.5 text-xs font-semibold text-primary-foreground shadow-md transition-all duration-300 hover:scale-105 hover:bg-primary-hover active:scale-95 sm:text-sm"
                >
                    Nos prestations
                </Link>

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

<script setup>
import { Images } from '@lucide/vue';
import { Link } from '@inertiajs/vue3';
const galleryItems = [
    {
        image: '/images/gallery/image.jpg',
        alt: 'Composition florale et bouquet de roses',
    },
    {
        image: '/images/gallery/image1.jpg',
        alt: 'Véhicule de prestige pour cortège',
    },
    {
        image: '/images/gallery/image2.jpg',
        alt: 'Service traiteur et rafraîchissements',
    },
    {
        image: '/images/gallery/image3.jpg',
        alt: 'Dressage de table de réception',
    },
    {
        image: '/images/gallery/image4.jpg',
        alt: 'Location de chaises de cérémonie',
    },
    {
        image: '/images/gallery/image5.jpg',
        alt: 'Service d accueil et protocole',
    },
    {
        image: '/images/gallery/image6.jpg',
        alt: 'Aménagement extérieur et chaises bois',
    },
    {
        image: '/images/gallery/image7.jpg',
        alt: 'Animation musicale et régie son',
    },
    {
        image: '/images/gallery/image8.jpg',
        alt: 'Équipe d animation et musique',
    },
    {
        image: '/images/gallery/image9.jpg',
        alt: 'Mise en place événement en plein air',
    },
    { image: '/images/gallery/image10.jpg', alt: 'Véhicule VIP pour événement' },
    {
        image: '/images/gallery/image11.jpg',
        alt: 'Spectacle et animation cracheur de feu',
    },
];
</script>
