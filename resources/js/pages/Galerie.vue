<script setup>
import { ref, watch, onMounted, onUnmounted } from 'vue';
import axios from 'axios';
import { X, Maximize2, Loader2 } from '@lucide/vue';
import PublicLayout from '@/layouts/PublicLayout.vue'; // 🟢 Casse corrigée ("Layouts")

defineOptions({
    layout: PublicLayout,
});

const props = defineProps({
    photos: Array,
    categories: Array,
    hasMore: Boolean,
    currentPage: Number,
    total: Number,
    currentCategory: String,
    seed: [Number, String],
});

// const items = ref([...props.photos]);
const items = ref([...props.photos]);

// Synchroniser les items si les props changent au rechargement de page
watch(
    () => props.photos,
    (newPhotos) => {
        items.value = [...newPhotos];
    },
);
const selectedCategory = ref(props.currentCategory || 'all');
const hasMoreState = ref(props.hasMore);
const page = ref(props.currentPage || 1);
const isLoadingMore = ref(false);
const activeModalImage = ref(null);

const sentinel = ref(null);
let observer = null;

// --- CHARGEMENT PAGE SUIVANTE ---
const loadNextPage = async () => {
    if (isLoadingMore.value || !hasMoreState.value) return;

    isLoadingMore.value = true;
    const nextPage = page.value + 1;

    try {
        const response = await axios.get('/api/galerie-data', {
            params: {
                page: nextPage,
                category: selectedCategory.value,
                seed: props.seed,
            },
        });

        if (response.data && Array.isArray(response.data.photos)) {
            items.value.push(...response.data.photos);
            hasMoreState.value = response.data.hasMore;
            page.value = nextPage;
        }
    } catch (error) {
        console.error('Erreur lors du chargement des images :', error);
    } finally {
        isLoadingMore.value = false;
    }
};

// --- FILTRE PAR CATÉGORIE ---
const selectCategory = async (cat) => {
    if (selectedCategory.value === cat || isLoadingMore.value) return;

    selectedCategory.value = cat;
    page.value = 1;
    isLoadingMore.value = true;

    try {
        const response = await axios.get('/api/galerie-data', {
            params: {
                page: 1,
                category: cat,
                seed: props.seed,
            },
        });

        if (response.data && Array.isArray(response.data.photos)) {
            items.value = response.data.photos;
            hasMoreState.value = response.data.hasMore;
        }
    } catch (error) {
        console.error('Erreur lors du filtre :', error);
    } finally {
        isLoadingMore.value = false;
    }
};

const setupObserver = () => {
    if (observer) observer.disconnect();

    observer = new IntersectionObserver(
        ([entry]) => {
            if (
                entry.isIntersecting &&
                hasMoreState.value &&
                !isLoadingMore.value
            ) {
                loadNextPage();
            }
        },
        { rootMargin: '200px' },
    );

    if (sentinel.value) {
        observer.observe(sentinel.value);
    }
};

onMounted(() => {
    setupObserver();
});

onUnmounted(() => {
    if (observer) observer.disconnect();
});

const openLightbox = (photo) => {
    activeModalImage.value = photo;
};
const closeLightbox = () => {
    activeModalImage.value = null;
};
</script>

<template>
    <div
        class="min-h-screen bg-background px-4 py-10 text-foreground sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-7xl space-y-8">
            <div class="space-y-3 text-center">
                <h1
                    class="text-4xl font-black tracking-wider text-secondary uppercase sm:text-6xl"
                >
                    Galerie & Réalisations
                </h1>
                <p
                    class="mx-auto max-w-xl text-sm text-muted-foreground sm:text-base"
                >
                    Explorez nos moments forts, décors d'exception et
                    prestations événementielles.
                </p>
            </div>

            <div
                class="flex scrollbar-none items-center justify-start gap-2 overflow-x-auto pb-2 sm:justify-center"
            >
                <button
                    @click="selectCategory('all')"
                    :class="[
                        'rounded-full px-5 py-2.5 text-xs font-semibold whitespace-nowrap transition-all duration-300 sm:text-sm',
                        selectedCategory === 'all'
                            ? 'scale-105 bg-secondary text-secondary-foreground shadow-md'
                            : 'border border-border bg-card text-foreground hover:border-secondary/40',
                    ]"
                >
                    Tous les événements
                </button>

                <button
                    v-for="cat in categories"
                    :key="cat"
                    @click="selectCategory(cat)"
                    :class="[
                        'rounded-full px-5 py-2.5 text-xs font-semibold whitespace-nowrap capitalize transition-all duration-300 sm:text-sm',
                        selectedCategory === cat
                            ? 'scale-105 bg-secondary text-secondary-foreground shadow-md'
                            : 'border border-border bg-card text-foreground hover:border-secondary/40',
                    ]"
                >
                    #{{ cat.replace(/[-_]/g, ' ') }}
                </button>
            </div>

            <div
                class="columns-2 gap-3 space-y-3 sm:columns-2 sm:gap-4 sm:space-y-4 md:columns-3 lg:columns-4 xl:columns-5"
            >
                <div
                    v-for="photo in items"
                    :key="photo.id"
                    class="group relative cursor-pointer break-inside-avoid overflow-hidden rounded-2xl border border-border bg-card shadow-sm transition-all duration-300 hover:shadow-xl"
                    @click="openLightbox(photo)"
                >
                    <img
                        :src="photo.src"
                        :alt="photo.categoryLabel"
                        loading="lazy"
                        class="h-auto w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    />

                    <div
                        class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 via-black/20 to-transparent p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                    >
                        <span
                            class="text-xs font-bold tracking-wider text-secondary uppercase"
                        >
                            {{ photo.categoryLabel }}
                        </span>
                        <div
                            class="mt-1 flex items-center justify-between text-white"
                        >
                            <span class="text-xs font-medium">Agrandir</span>
                            <Maximize2 class="h-4 w-4 text-secondary" />
                        </div>
                    </div>
                </div>
            </div>

            <div
                ref="sentinel"
                class="flex flex-col items-center justify-center py-8"
            >
                <div
                    v-if="isLoadingMore"
                    class="flex items-center gap-2 text-sm font-semibold text-secondary"
                >
                    <Loader2 class="h-5 w-5 animate-spin" />
                    <span>Chargement de la suite...</span>
                </div>
                <p
                    v-else-if="!hasMoreState && items.length > 0"
                    class="text-xs text-muted-foreground"
                >
                    Vous avez atteint la fin de la galerie.
                </p>
            </div>

            <div
                v-if="items.length === 0 && !isLoadingMore"
                class="py-16 text-center text-muted-foreground"
            >
                Aucune photo disponible dans cette catégorie.
            </div>
        </div>

        <Transition name="fade">
            <div
                v-if="activeModalImage"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4 backdrop-blur-md"
                @click.self="closeLightbox"
            >
                <button
                    @click="closeLightbox"
                    class="absolute top-6 right-6 rounded-full bg-white/10 p-2 text-white transition hover:bg-white/20"
                >
                    <X class="h-6 w-6" />
                </button>

                <div class="max-h-[90vh] max-w-4xl space-y-3 text-center">
                    <img
                        :src="activeModalImage.src"
                        :alt="activeModalImage.categoryLabel"
                        class="mx-auto max-h-[80vh] w-auto rounded-xl border border-white/10 object-contain shadow-2xl"
                    />
                    <p
                        class="text-sm font-bold tracking-widest text-secondary uppercase"
                    >
                        {{ activeModalImage.categoryLabel }}
                    </p>
                </div>
            </div>
        </Transition>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
.scrollbar-none::-webkit-scrollbar {
    display: none;
}
.scrollbar-none {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
