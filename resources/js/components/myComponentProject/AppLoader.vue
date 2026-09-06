<template>
    <Transition
        leave-active-class="transition-opacity duration-700 ease-in-out"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="show"
            class="fixed inset-0 z-10000 flex flex-col items-center justify-center bg-background text-foreground backdrop-blur-md"
        >
            <!-- Conteneur central avec animation d'échelle -->
            <div class="relative flex flex-col items-center gap-6">
                <!-- Halo et Badge central -->
                <div class="relative flex items-center justify-center">
                    <!-- Anneau d'onde pulsante en arrière-plan -->
                    <div
                        class="absolute h-24 w-24 animate-ping rounded-full bg-secondary/20 opacity-75"
                    ></div>

                    <!-- Anneau rotatif décoratif -->
                    <div
                        class="h-20 w-20 animate-spin rounded-full border-2 border-transparent border-t-secondary border-r-secondary/40"
                    ></div>

                    <!-- Badge central RS / Crown -->
                    <div
                        class="absolute flex h-14 w-14 items-center justify-center overflow-hidden rounded-full bg-primary shadow-xl transition-transform duration-500 hover:scale-105"
                    >
                        <img
                            src="/logo.jpeg"
                            alt="Royal Services"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-105 rounded-full"
                        />
                    </div>
                </div>

                <!-- Identité de marque avec fondu -->
                <div class="space-y-1 text-center">
                    <h2
                        class="text-xl font-bold tracking-wider text-foreground"
                    >
                        ETS ROYAL
                        <span class="serviceFont text-secondary">Service</span>
                    </h2>
                    <p
                        class="text-xs font-medium tracking-widest text-muted-foreground sm:text-sm"
                    >
                        Événementiel & Traiteur
                    </p>
                </div>

                <!-- Barre de progression minimaliste -->
                <div class="w-48 space-y-2">
                    <div
                        class="h-1 w-full overflow-hidden rounded-full bg-secondary/20"
                    >
                        <div
                            class="h-full rounded-full bg-secondary transition-all duration-300 ease-out"
                            :style="{ width: `${progress}%` }"
                        ></div>
                    </div>

                    <div
                        class="flex justify-between text-[10px] font-semibold text-muted-foreground"
                    >
                        <span>Chargement</span>
                        <span>{{ progress }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Crown } from '@lucide/vue';

const props = defineProps({
    // Permet de contrôler manuellement l'état si piloté par un store ou router
    isLoading: {
        type: Boolean,
        default: true,
    },
});

const show = ref(true);
const progress = ref(0);

onMounted(() => {
    // Simulation d'une progression fluide si non liée à un store actif
    const interval = setInterval(() => {
        if (progress.value < 100) {
            progress.value += Math.floor(Math.random() * 15) + 5;
            if (progress.value > 100) progress.value = 100;
        } else {
            clearInterval(interval);
            setTimeout(() => {
                show.value = false;
            }, 400); // court délai avant la disparition pour apprécier le 100%
        }
    }, 150);
});
</script>
