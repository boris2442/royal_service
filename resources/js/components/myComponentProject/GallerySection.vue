<template>
 <section class="w-full bg-background py-10  px-4 sm:px-6 lg:px-8 text-foreground transition-colors duration-300">
        <div class="mx-auto max-w-6xl space-y-8">
            
            <!-- En-tête de section -->
            <div class="text-center space-y-2">
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-foreground">
                    Nos Réalisations en Images
                </h2>
                <div class="mx-auto h-1 w-16 rounded-full bg-secondary" />
            </div>

            <!-- Grille compacte (2 cols mobile, 3 cols tablette, 4 cols desktop) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                <div 
                    v-for="(item, index) in galleryItems" 
                    :key="index"
                    class="group relative aspect-[4/3] overflow-hidden rounded-xl border border-border bg-card shadow-sm transition-all duration-300 hover:shadow-lg hover:border-secondary"
                >
                    <img 
                        :src="item.image" 
                        :alt="item.alt" 
                        class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                        loading="lazy"
                    />

                    <!-- Superposition d'information au survol -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex items-end p-3">
                        <span class="text-xs font-medium text-white tracking-wide line-clamp-2">
                            {{ item.alt }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <a
                    href="#prestations"
                    class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-2.5 text-xs sm:text-sm font-semibold text-primary-foreground shadow-md transition-all duration-300 hover:bg-primary-hover hover:scale-105 active:scale-95"
                >
                    Nos prestations
                </a>
                
                <a
                    href="#galerie"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-5 py-2.5 text-xs sm:text-sm font-semibold text-primary-foreground shadow-md transition-all duration-300 hover:bg-primary-hover hover:scale-105 active:scale-95"
                >
                    <Images class="h-4 w-4" />
                    Voir toute la galerie
                </a>
            </div>

        </div>
    </section>
</template>

<script setup>
import { Images } from '@lucide/vue';

const galleryItems = [
    { image: '/images/gallery/image.png', alt: 'Composition florale et bouquet de roses' },
    { image: '/images/gallery/image.png', alt: 'Véhicule de prestige pour cortège' },
    { image: '/images/gallery/image.png', alt: 'Service traiteur et rafraîchissements' },
    { image: '/images/gallery/image.png', alt: 'Dressage de table de réception' },
    { image: '/images/gallery/image.png', alt: 'Location de chaises de cérémonie' },
    { image: '/images/gallery/image.png', alt: 'Service d accueil et protocole' },
    { image: '/images/gallery/image.png', alt: 'Aménagement extérieur et chaises bois' },
    { image: '/images/gallery/image.png', alt: 'Animation musicale et régie son' },
    { image: '/images/gallery/image.png', alt: 'Équipe d animation et musique' },
    { image: '/images/gallery/image.png', alt: 'Mise en place événement en plein air' },
    { image: '/images/gallery/image.png', alt: 'Véhicule VIP pour événement' },
    { image: '/images/gallery/image.png', alt: 'Spectacle et animation cracheur de feu' }
]
</script>
