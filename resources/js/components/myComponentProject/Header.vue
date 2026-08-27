<template>
    <!-- =========================================================
         HEADER SUPERIEUR FIXE (Desktop & Mobile)
    ========================================================== -->

    <header
        class="fixed inset-x-0 top-0 z-50 transition-all duration-500"
        :class="[
            isScrolled
                ? 'border-b border-border/50 bg-background/95 py-2.5 shadow-md backdrop-blur-xl'
                : 'bg-primary-dark py-3.5',
        ]"
    >
        <div
            class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8"
        >
            <!-- LOGO -->
            <!-- LOGO -->
            <Link
                href="/"
                class="group relative z-10 flex items-center gap-2.5"
            >
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full border transition-all duration-300 sm:h-11 sm:w-11"
                    :class="[
                        isScrolled
                            ? 'border-secondary/40 bg-primary text-primary-foreground'
                            : 'border-secondary/40 bg-primary-dark text-secondary',
                    ]"
                >
                    <Crown
                        class="h-5 w-5 transition-transform duration-300 group-hover:scale-110"
                    />
                </div>

                <div class="relative flex flex-col justify-center leading-none">
                    <span
                        class="block text-base font-black tracking-wider uppercase sm:text-lg"
                        :class="isScrolled ? 'text-primary' : 'text-secondary'"
                    >
                        ETS ROYAL
                    </span>

                    <span
                        class="serviceFont -mt-2.5 block text-lg font-normal tracking-normal capitalize italic sm:text-xl"
                        :class="isScrolled ? 'text-foreground' : 'text-white'"
                    >
                        Service
                    </span>
                </div>
            </Link>

            <!-- NAVIGATION DESKTOP & TABLETTE (Visibilité dès 768px - md) -->
            <nav class="hidden md:block" aria-label="Navigation principale">
                <div
                    class="flex items-center gap-0.5 rounded-full border px-1.5 py-1 backdrop-blur-xl transition-all duration-500 lg:gap-1 lg:px-2 lg:py-1.5"
                    :class="[
                        isScrolled
                            ? 'border-border bg-card/95 text-foreground shadow-lg'
                            : 'border-white/15 bg-black/20 text-white shadow-inner',
                    ]"
                >
                    <Link
                        v-for="item in desktopNavigation"
                        :key="item.href"
                        :href="item.href"
                        class="group relative flex items-center gap-1.5 rounded-full px-2.5 py-1.5 text-[11px] font-medium transition-all duration-300 lg:px-3.5 lg:py-2 lg:text-xs xl:px-4"
                        :class="getDesktopLinkClasses(item.href)"
                    >
                        <component
                            :is="item.icon"
                            class="h-3.5 w-3.5 shrink-0 transition-all duration-300 group-hover:-translate-y-0.5 lg:h-4 lg:w-4"
                            :class="isActive(item.href) ? 'text-secondary' : ''"
                        />

                        <span class="whitespace-nowrap">{{ item.label }}</span>

                        <!-- Indicateur actif -->
                        <span
                            v-if="isActive(item.href)"
                            class="absolute bottom-0.5 left-1/2 h-0.5 w-3.5 -translate-x-1/2 rounded-full bg-secondary"
                        />
                    </Link>
                </div>
            </nav>

            <!-- NAVIGATION HAUT MOBILE (< 768px - md) -->
            <div class="flex items-center gap-3 md:hidden">
                <Link
                    v-for="item in mobileTopNavigation"
                    :key="item.href"
                    :href="item.href"
                    class="text-xs font-medium tracking-wide transition-colors"
                    :class="[
                        isActive(item.href)
                            ? 'font-semibold text-secondary'
                            : isScrolled
                              ? 'text-foreground/80 hover:text-secondary'
                              : 'text-white/80 hover:text-white',
                    ]"
                >
                    {{ item.label }}
                </Link>
            </div>
        </div>
    </header>

    <!-- =========================================================
         BARRE DE NAVIGATION INFERIEURE FLOTTANTE (Mobile < 768px)
    ========================================================== -->
    <div class="fixed inset-x-3 bottom-3 z-50 flex justify-center md:hidden">
        <nav
            class="flex h-14 w-full max-w-md items-center justify-around rounded-full border border-border/80 bg-background/90 px-3 shadow-[0_8px_24px_rgba(0,0,0,0.12)] backdrop-blur-xl"
            aria-label="Navigation mobile inférieure"
        >
            <Link
                v-for="item in mobileBottomNavigation"
                :key="item.href"
                :href="item.href"
                class="group relative flex flex-1 flex-col items-center justify-center py-1 transition-all duration-300"
                :class="[
                    isActive(item.href)
                        ? 'font-medium text-secondary'
                        : 'text-muted-foreground hover:text-foreground',
                ]"
            >
                <!-- Indicateur doré haut -->
                <span
                    v-if="isActive(item.href)"
                    class="absolute -top-2.5 h-1 w-6 rounded-full bg-secondary shadow-[0_0_8px_rgba(212,167,44,0.7)]"
                />

                <!-- Icône -->
                <component
                    :is="item.icon"
                    class="h-4.5 w-4.5 transition-transform duration-300 group-active:scale-90"
                    :class="
                        isActive(item.href) ? 'scale-110 text-secondary' : ''
                    "
                />

                <!-- Nom court -->
                <span class="mt-0.5 text-[9px] font-medium tracking-wider">
                    {{ item.shortLabel }}
                </span>
            </Link>
        </nav>
    </div>
    <FloatingActions />
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';




import {
    Sparkles,
    Building2,
    GalleryHorizontal,
    Images,
    Utensils,
    Mail,
    Crown,
} from '@lucide/vue';
import FloatingActions from './FloatingActions.vue';

const page = usePage();

const desktopNavigation = [
    { label: 'Prestations', href: '/prestations', icon: Sparkles },
    { label: "L'Agence", href: '/agence', icon: Building2 },
    { label: 'Réalisations', href: '/realisations', icon: GalleryHorizontal },
    { label: 'Galerie', href: '/galerie', icon: Images },
    { label: 'Restaurant', href: '/restaurant', icon: Utensils },
    { label: 'Contact', href: '/contact', icon: Mail },
];

const mobileTopNavigation = [
    { label: "L'Agence", href: '/agence' },
    { label: 'Contact', href: '/contact' },
];

const mobileBottomNavigation = [
    {
        label: 'Prestations',
        shortLabel: 'Prestat.',
        href: '/prestations',
        icon: Sparkles,
    },
    {
        label: 'Réalisations',
        shortLabel: 'Réalis.',
        href: '/realisations',
        icon: GalleryHorizontal,
    },
    {
        label: 'Restaurant',
        shortLabel: 'Resto',
        href: '/restaurant',
        icon: Utensils,
    },
    {
        label: 'Galerie',
        shortLabel: 'Galerie',
        href: '/galerie',
        icon: Images,
    },
];

const isScrolled = ref(false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 30;
};

const isActive = (href) => {
    if (href === '/') {
        return page.url === '/';
    }
    return page.url.startsWith(href);
};

const getDesktopLinkClasses = (href) => {
    if (isActive(href)) {
        return isScrolled.value
            ? 'text-primary font-semibold'
            : 'text-secondary font-semibold';
    }
    return isScrolled.value
        ? 'text-muted-foreground hover:text-foreground'
        : 'text-white/80 hover:text-white';
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    handleScroll();
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>
