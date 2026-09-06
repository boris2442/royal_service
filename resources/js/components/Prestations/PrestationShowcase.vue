<template>
    <section
        class="min-h-screen w-full bg-background px-4 py-12 text-foreground sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-6xl space-y-8">
            <!-- ========================================= -->
            <!-- TITRE -->
            <!-- ========================================= -->

            <h1
                class="text-2xl font-bold tracking-tight text-foreground sm:text-3xl lg:text-4xl"
            >
                {{ title }}
            </h1>

            <!-- ========================================= -->
            <!-- GALERIE -->
            <!-- ========================================= -->

            <div
                v-if="images.length > 0"
                class="grid grid-cols-1 gap-4 lg:grid-cols-3"
            >
                <!-- ===================================== -->
                <!-- IMAGE PRINCIPALE -->
                <!-- ===================================== -->

                <div
                    class="group relative aspect-[4/3] overflow-hidden rounded-2xl border border-border bg-card shadow-sm lg:col-span-2"
                >
                    <Transition name="gallery" mode="out-in">
                        <img
                            :key="selectedImage"
                            :src="selectedImage"
                            :alt="`${title} - photo ${activeIndex + 1}`"
                            class="absolute inset-0 h-full w-full object-cover"
                        />
                    </Transition>

                    <!-- Overlay -->
                    <div
                        class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/10 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                    ></div>

                    <!-- ================================= -->
                    <!-- FLECHE GAUCHE -->
                    <!-- ================================= -->

                    <button
                        v-if="images.length > 1"
                        type="button"
                        aria-label="Photo précédente"
                        @click="previousImage"
                        class="absolute top-1/2 left-3 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-white/20 bg-black/50 text-white opacity-100 shadow-lg backdrop-blur-md transition-all duration-300 hover:scale-110 hover:bg-black/70 focus:ring-2 focus:ring-white/70 focus:outline-none sm:left-5 sm:h-12 sm:w-12"
                    >
                        <ChevronLeft
                            class="h-5 w-5 sm:h-6 sm:w-6"
                            :stroke-width="2"
                        />
                    </button>

                    <!-- ================================= -->
                    <!-- FLECHE DROITE -->
                    <!-- ================================= -->

                    <button
                        v-if="images.length > 1"
                        type="button"
                        aria-label="Photo suivante"
                        @click="nextImage"
                        class="absolute top-1/2 right-3 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-white/20 bg-black/50 text-white opacity-100 shadow-lg backdrop-blur-md transition-all duration-300 hover:scale-110 hover:bg-black/70 focus:ring-2 focus:ring-white/70 focus:outline-none sm:right-5 sm:h-12 sm:w-12"
                    >
                        <ChevronRight
                            class="h-5 w-5 sm:h-6 sm:w-6"
                            :stroke-width="2"
                        />
                    </button>

                    <!-- ================================= -->
                    <!-- COMPTEUR -->
                    <!-- ================================= -->

                    <span
                        v-if="images.length > 1"
                        class="absolute bottom-4 left-4 z-10 rounded-full bg-black/60 px-3 py-1.5 text-xs font-semibold text-white shadow-md backdrop-blur-md"
                    >
                        {{ activeIndex + 1 }} / {{ images.length }}
                    </span>

                    <!-- ================================= -->
                    <!-- INDICATEURS -->
                    <!-- ================================= -->

                    <div
                        v-if="images.length > 1 && images.length <= 10"
                        class="absolute right-4 bottom-4 z-10 flex items-center gap-1.5"
                    >
                        <button
                            v-for="(_, index) in images"
                            :key="`dot-${index}`"
                            type="button"
                            :aria-label="`Afficher la photo ${index + 1}`"
                            @click="selectImage(index)"
                            class="h-1.5 rounded-full transition-all duration-300"
                            :class="
                                activeIndex === index
                                    ? 'w-5 bg-white'
                                    : 'w-1.5 bg-white/50 hover:bg-white/80'
                            "
                        ></button>
                    </div>
                </div>

                <!-- ===================================== -->
                <!-- MINIATURES -->
                <!-- ===================================== -->

                <div class="grid grid-cols-2 content-start gap-3">
                    <button
                        v-for="thumbnail in visibleThumbnails"
                        :key="thumbnail.index"
                        type="button"
                        @click="selectImage(thumbnail.index)"
                        :aria-label="`Afficher la photo ${thumbnail.index + 1}`"
                        :class="[
                            'group relative aspect-[4/3] overflow-hidden rounded-xl border-2 transition-all duration-300',
                            activeIndex === thumbnail.index
                                ? 'border-primary ring-2 ring-primary/30'
                                : 'border-transparent opacity-80 hover:opacity-100',
                        ]"
                    >
                        <img
                            :src="thumbnail.src"
                            :alt="`${title} - miniature ${thumbnail.index + 1}`"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />

                        <!-- Overlay miniature active -->
                        <div
                            v-if="activeIndex === thumbnail.index"
                            class="absolute inset-0 bg-primary/10"
                        ></div>
                    </button>

                    <!-- ================================= -->
                    <!-- + AUTRES PHOTOS -->
                    <!-- ================================= -->

                    <button
                        v-if="remainingCount > 0"
                        type="button"
                        @click="showMoreImages"
                        class="group relative aspect-[4/3] overflow-hidden rounded-xl border border-border bg-muted"
                    >
                        <img
                            :src="images[moreImagesPreviewIndex]"
                            :alt="`${title} - autres photos`"
                            class="h-full w-full object-cover opacity-40 transition-transform duration-500 group-hover:scale-105"
                        />

                        <div
                            class="absolute inset-0 flex items-center justify-center bg-primary/30 px-3 text-center backdrop-blur-[2px] transition-colors duration-300 group-hover:bg-primary/40"
                        >
                            <span
                                class="text-xs font-bold text-primary-foreground sm:text-sm"
                            >
                                +{{ remainingCount }} autres photos
                            </span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- AUCUNE IMAGE -->
            <!-- ========================================= -->

            <div
                v-else
                class="rounded-xl border border-dashed border-border p-8 text-center text-muted-foreground"
            >
                Aucune image disponible pour cette prestation.
            </div>

            <!-- ========================================= -->
            <!-- DESCRIPTION + INCLUSIONS -->
            <!-- ========================================= -->

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- ===================================== -->
                <!-- DESCRIPTION -->
                <!-- ===================================== -->

                <div
                    class="flex flex-col justify-between rounded-2xl border border-border bg-card p-6 shadow-xs"
                >
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span
                                class="h-1 w-6 rounded-full bg-primary"
                            ></span>

                            <h2 class="text-xl font-bold text-card-foreground">
                                Description
                            </h2>
                        </div>

                        <p
                            class="text-sm leading-relaxed text-muted-foreground sm:text-base"
                        >
                            {{ description }}
                        </p>
                    </div>

                    <div
                        v-if="highlight"
                        class="mt-6 rounded-xl border-l-4 border-primary bg-primary/10 p-4 text-xs font-medium text-foreground sm:text-sm"
                    >
                        {{ highlight }}
                    </div>
                </div>

                <!-- ===================================== -->
                <!-- INCLUSIONS -->
                <!-- ===================================== -->

                <div
                    class="rounded-2xl border border-border bg-card p-6 shadow-xs"
                >
                    <div class="mb-4 flex items-center gap-2">
                        <span class="h-1 w-6 rounded-full bg-secondary"></span>

                        <h2 class="text-xl font-bold text-card-foreground">
                            Ce qui est inclus
                        </h2>
                    </div>

                    <ul class="space-y-3">
                        <li
                            v-for="(item, index) in inclusions"
                            :key="index"
                            class="flex items-start gap-3 text-xs text-foreground sm:text-sm"
                        >
                            <CheckCircle2
                                class="mt-0.5 h-4 w-4 shrink-0 text-primary"
                            />

                            <span>{{ item }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- CTA -->
            <!-- ========================================= -->
            <div class=" ">
                <div class="flex justify-end pt-4">
                    <a
                        :href="whatsappUrl"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 rounded-xl bg-primary px-6 py-3.5 text-sm font-bold text-primary-foreground shadow-md transition-all hover:bg-primary-hover hover:shadow-lg focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 focus:outline-none"
                    >
                        <MessageSquare class="h-4 w-4 text-secondary" />

                        <span>
                            {{ ctaText }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from 'vue';

import {
    CheckCircle2,
    MessageSquare,
    ChevronLeft,
    ChevronRight,
} from '@lucide/vue';

import PublicLayout from '@/layouts/PublicLayout.vue';

/*
|--------------------------------------------------------------------------
| Layout
|--------------------------------------------------------------------------
*/

defineOptions({
    layout: PublicLayout,
});

/*
|--------------------------------------------------------------------------
| Props
|--------------------------------------------------------------------------
*/

const props = defineProps({
    title: {
        type: String,
        required: true,
    },

    imageFolder: {
        type: String,
        required: true,
    },

    description: {
        type: String,
        required: true,
    },

    highlight: {
        type: String,
        default: '',
    },

    inclusions: {
        type: Array,
        default: () => [],
    },

    whatsapp: {
        type: String,
        default: '237696943361',
    },

    ctaText: {
        type: String,
        default: 'Réserver ou Demander un Devis',
    },
});

/*
|--------------------------------------------------------------------------
| Chargement automatique des images
|--------------------------------------------------------------------------
|
| Toutes les prestations utilisent :
|
| public/prestation-assets/
|
| Exemple :
|
| public/prestation-assets/locationBachesandChaires/
| public/prestation-assets/decoration/
| public/prestation-assets/traiteur/
|
*/

const globImages = import.meta.glob(
    '/public/prestation-assets/**/*.{png,jpg,jpeg,webp,PNG,JPG,JPEG,WEBP}',
    {
        eager: true,
        query: '?url',
        import: 'default',
    },
);

/*
|--------------------------------------------------------------------------
| Filtrage des images correspondant à la prestation
|--------------------------------------------------------------------------
*/

const images = ref(
    Object.entries(globImages)
        .filter(([path]) =>
            path.includes(`/prestation-assets/${props.imageFolder}/`),
        )
        .map(([, url]) => url),
);

/*
|--------------------------------------------------------------------------
| Index de l'image active
|--------------------------------------------------------------------------
*/

const activeIndex = ref(0);

/*
|--------------------------------------------------------------------------
| Image actuellement affichée
|--------------------------------------------------------------------------
*/

const selectedImage = computed(() => {
    return images.value[activeIndex.value] || '';
});

/*
|--------------------------------------------------------------------------
| Miniatures
|--------------------------------------------------------------------------
|
| On affiche maximum 3 miniatures + le bouton "autres photos".
|
*/

const visibleThumbnails = computed(() => {
    const total = images.value.length;

    if (total === 0) {
        return [];
    }

    if (total <= 4) {
        return images.value.map((src, index) => ({
            src,
            index,
        }));
    }

    const thumbnails = [];

    /*
     * On affiche l'image active puis les suivantes.
     */

    for (let i = 0; i < 3; i++) {
        const index = (activeIndex.value + i) % total;

        thumbnails.push({
            src: images.value[index],
            index,
        });
    }

    return thumbnails;
});

/*
|--------------------------------------------------------------------------
| Nombre de photos supplémentaires
|--------------------------------------------------------------------------
*/

const remainingCount = computed(() => {
    return Math.max(0, images.value.length - 4);
});

/*
|--------------------------------------------------------------------------
| Aperçu du bouton "+ autres photos"
|--------------------------------------------------------------------------
*/

const moreImagesPreviewIndex = computed(() => {
    if (images.value.length === 0) {
        return 0;
    }

    return (activeIndex.value + 3) % images.value.length;
});

/*
|--------------------------------------------------------------------------
| URL WhatsApp
|--------------------------------------------------------------------------
*/

const whatsappUrl = computed(() => {
    return `https://wa.me/${props.whatsapp}`;
});

/*
|--------------------------------------------------------------------------
| Sélection d'une image
|--------------------------------------------------------------------------
*/

const selectImage = (index) => {
    if (index < 0 || index >= images.value.length) {
        return;
    }

    activeIndex.value = index;
};

/*
|--------------------------------------------------------------------------
| Image précédente
|--------------------------------------------------------------------------
*/

const previousImage = () => {
    if (images.value.length <= 1) {
        return;
    }

    activeIndex.value =
        (activeIndex.value - 1 + images.value.length) % images.value.length;
};

/*
|--------------------------------------------------------------------------
| Image suivante
|--------------------------------------------------------------------------
*/

const nextImage = () => {
    if (images.value.length <= 1) {
        return;
    }

    activeIndex.value = (activeIndex.value + 1) % images.value.length;
};

/*
|--------------------------------------------------------------------------
| Afficher les photos suivantes
|--------------------------------------------------------------------------
*/

const showMoreImages = () => {
    if (images.value.length <= 1) {
        return;
    }

    activeIndex.value = (activeIndex.value + 3) % images.value.length;
};
</script>

<style scoped>
/*
|--------------------------------------------------------------------------
| Animation de changement d'image
|--------------------------------------------------------------------------
*/

.gallery-enter-active,
.gallery-leave-active {
    transition:
        opacity 300ms ease,
        transform 300ms ease;
}

.gallery-enter-from {
    opacity: 0;
    transform: scale(1.02);
}

.gallery-leave-to {
    opacity: 0;
    transform: scale(0.98);
}
</style>
