<template>
    <div class="fixed right-3 bottom-8 z-50 flex flex-col items-center gap-3">
        <!-- Bouton Retour en Haut -->
        <Transition
            enter-active-class="transition-all duration-300 ease-out"
            enter-from-class="opacity-0 translate-y-4 scale-95"
            enter-to-class="opacity-100 translate-y-0 scale-100"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100 translate-y-0 scale-100"
            leave-to-class="opacity-0 translate-y-4 scale-95"
        >
            <button
                v-show="showScrollTop"
                @click="scrollToTop"
                aria-label="Retourner en haut"
                class="flex h-11 w-11 items-center justify-center rounded-full border border-border bg-card/90 text-card-foreground shadow-lg backdrop-blur-md transition-all duration-300 hover:scale-110 hover:border-secondary hover:bg-secondary/15 hover:text-secondary active:scale-95"
            >
                <ArrowUp class="h-5 w-5" />
            </button>
        </Transition>

        <!-- Bouton WhatsApp Flottant -->
        <a
            :href="whatsappUrl"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Contacter ETS ROYAL Service sur WhatsApp"
            class="group relative flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-xl transition-all duration-300 hover:scale-110 active:scale-95"
        >
            <!-- Effet d'onde en arrière-plan -->
            <span
                class="pointer-events-none absolute -inset-1 animate-ping rounded-full bg-[#25D366] opacity-40 blur-md"
            />

            <!-- Badge Notification aux couleurs Bordeaux du projet (Primary) -->
            <span
                class="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full border-2 border-background bg-primary text-[10px] font-bold text-primary-foreground shadow-md"
            >
                1
            </span>

            <!-- Icône WhatsApp -->
            <svg
                class="relative z-10 h-7 w-7 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
            >
                <path
                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.705 1.754zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"
                />
            </svg>

            <!-- Info-bulle au survol (Basée sur les variables bg-card et border-border) -->
            <span
                class="pointer-events-none absolute top-1/2 right-16 -translate-y-1/2 rounded-lg border border-border bg-card px-3 py-1.5 text-xs font-medium whitespace-nowrap text-card-foreground opacity-0 shadow-lg transition-all duration-300 group-hover:-translate-x-1 group-hover:opacity-100"
            >
                Discuter avec ETS ROYAL <span class="serviceFont">Service</span>
            </span>
        </a>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { ArrowUp } from '@lucide/vue';

const showScrollTop = ref(false);

const phoneNumber = '237696943361';
const defaultMessage =
    'Bonjour ETS ROYAL Service, je souhaite obtenir des informations concernant vos prestations et vos services.';

const whatsappUrl = computed(() => {
    return `https://wa.me/${phoneNumber}?text=${encodeURIComponent(defaultMessage)}`;
});

const handleScroll = () => {
    showScrollTop.value = window.scrollY > 300;
};

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>
