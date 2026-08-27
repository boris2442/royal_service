<template>
    <button
        @click="toggleTheme"
        type="button"
        :aria-label="isDark ? 'Passer au mode clair' : 'Passer au mode sombre'"
        class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-border bg-card text-card-foreground shadow-sm transition-all duration-300 hover:scale-105 hover:border-secondary hover:text-secondary focus:outline-none focus-visible:ring-2 focus-visible:ring-ring active:scale-95"
    >
        <Transition
            mode="out-in"
            enter-active-class="transition-all duration-200 ease-out"
            enter-from-class="opacity-0 rotate-90 scale-75"
            enter-to-class="opacity-100 rotate-0 scale-100"
            leave-active-class="transition-all duration-150 ease-in"
            leave-from-class="opacity-100 rotate-0 scale-100"
            leave-to-class="opacity-0 -rotate-90 scale-75"
        >
            <Sun v-if="isDark" class="h-5 w-5 text-secondary" />
            <Moon v-else class="h-5 w-5 text-card-foreground" />
        </Transition>
    </button>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Sun, Moon } from '@lucide/vue';

const isDark = ref(false);

const applyTheme = (dark) => {
    isDark.value = dark;
    const root = document.documentElement;

    if (dark) {
        root.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    } else {
        root.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    }
};

const toggleTheme = () => {
    applyTheme(!isDark.value);
};

onMounted(() => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        applyTheme(savedTheme === 'dark');
    } else {
        const systemPrefersDark = window.matchMedia(
            '(prefers-color-scheme: dark)',
        ).matches;
        applyTheme(systemPrefersDark);
    }
});
</script>
