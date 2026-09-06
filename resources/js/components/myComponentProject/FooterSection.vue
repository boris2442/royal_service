<template>
    <footer
        class="w-full border-t border-border bg-card text-card-foreground transition-colors duration-300"
    >
        <div class="mx-auto max-w-7xl px-4 pt-12 pb-6 sm:px-6 lg:px-8">
            <!-- Grille Principale (4 Colonnes) -->
            <div
                class="mb-12 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4"
            >
                <!-- Colonne 1: Identité & Badges -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-primary shadow-sm"
                        >
                            <img
                                src="/logo.jpeg"
                                alt="Royal Services"
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div>
                            <h3
                                class="text-lg leading-tight font-bold text-foreground"
                            >
                                ETS ROYAL
                                <span class="serviceFont">Service</span>
                            </h3>
                            <p class="text-xs font-medium text-secondary">
                                Événementiel & Traiteur
                            </p>
                        </div>
                    </div>

                    <p
                        class="text-xs leading-relaxed text-card-foreground/80 sm:text-sm"
                    >
                        Votre partenaire événementiel de confiance à Bangangté.
                        Nous transformons vos rêves en réalité avec créativité,
                        professionnelisme et une touche d'excellence
                        camerounaise.
                    </p>

                    <!-- Badges -->
                    <div class="flex flex-wrap items-center gap-2 pt-2">
                        <span
                            class="inline-flex items-center gap-1.5 rounded-full border border-border bg-background px-3 py-1 text-xs font-semibold text-card-foreground"
                        >
                            <Star
                                class="h-3.5 w-3.5 fill-secondary text-secondary"
                            />
                            4.9/5
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 rounded-full border border-border bg-background px-3 py-1 text-xs font-semibold text-card-foreground"
                        >
                            <Calendar class="h-3.5 w-3.5 text-secondary" />
                            500+ Events
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 rounded-full border border-border bg-background px-3 py-1 text-xs font-semibold text-card-foreground"
                        >
                            <Users class="h-3.5 w-3.5 text-secondary" />
                            10+ Ans
                        </span>
                    </div>
                </div>

                <!-- Colonne 2: Navigation -->
                <div class="space-y-4">
                    <h4 class="text-base font-bold text-secondary">
                        Navigation
                    </h4>
                    <ul class="space-y-2.5 text-sm">
                        <li v-for="(item, index) in navLinks" :key="index">
                            <Link
                                :href="item.href"
                                class="inline-flex items-center gap-2 text-card-foreground/80 transition-colors hover:text-secondary"
                            >
                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-secondary"
                                ></span>
                                {{ item.label }}
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Colonne 3: Services Populaires -->
                <div class="space-y-4">
                    <h4 class="text-base font-bold text-secondary">
                        Services Populaires
                    </h4>
                    <ul class="space-y-2.5 text-sm">
                        <li
                            v-for="(service, index) in popularServices"
                            :key="index"
                        >
                            <a
                                :href="service.href"
                                class="inline-flex items-center gap-2 text-card-foreground/80 transition-colors hover:text-secondary"
                            >
                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-secondary"
                                ></span>
                                {{ service.label }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Colonne 4: Contact -->
                <div class="space-y-4">
                    <h4 class="text-base font-bold text-secondary">Contact</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-border bg-background"
                            >
                                <Phone class="h-4 w-4 text-secondary" />
                            </div>
                            <div>
                                <p class="text-xs text-card-foreground/60">
                                    Appelez-nous
                                </p>
                                <a
                                    href="tel:+237696943361"
                                    class="font-semibold text-card-foreground transition-colors hover:text-secondary"
                                >
                                    +237 6 96 94 33 61
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-border bg-background"
                            >
                                <Mail class="h-4 w-4 text-secondary" />
                            </div>
                            <div>
                                <p class="text-xs text-card-foreground/60">
                                    Email
                                </p>
                                <a
                                    href="mailto:contact@etsroyalservice.com"
                                    class="font-semibold text-card-foreground transition-colors hover:text-secondary"
                                >
                                    contact@etsroyalservice.com
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-border bg-background"
                            >
                                <MapPin class="h-4 w-4 text-secondary" />
                            </div>
                            <div>
                                <p class="text-xs text-card-foreground/60">
                                    Adresse
                                </p>
                                <p class="font-semibold text-card-foreground">
                                    Bangangté, Cameroun
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ligne de séparation -->
            <div class="border-t border-border pt-6" />

            <!-- Barre Inférieure -->
            <div
                class="flex flex-col items-center justify-between gap-4 text-xs text-card-foreground/70 md:flex-row"
            >
                <!-- Copyright & Localisation -->
                <div class="space-y-1 text-center md:text-left">
                    <p>
                        ©2026
                        <span class="font-semibold text-secondary"
                            >ETS ROYAL
                            <span class="serviceFont">Service</span>
                        </span>
                        . Tous droits réservés.
                    </p>
                    <p
                        class="inline-flex items-center justify-center gap-1 md:justify-start"
                    >
                        Fait avec
                        <Heart class="h-3.5 w-3.5 fill-primary text-primary" />
                        par
                        <a
                            href="https://borisaubin.vercel.app/"
                            target="_blank"
                            class="font-semibold text-secondary transition-colors hover:text-primary"
                            >Aubin Boris
                        </a>
                        à Bangangté, Cameroun
                    </p>
                </div>

                <!-- Dark Mode Toggle -->
                <div class="flex items-center justify-center">
                    <ThemeToggle />
                </div>

                <!-- Liens Légaux -->
                <div class="flex flex-wrap items-center justify-center gap-2">
                    <Link
                        href="/cgu"
                        class="transition-colors hover:text-secondary"
                        >Conditions Générales</Link
                    >
                    <span>|</span>
                    <Link
                        href="/politique-confidentialite"
                        class="transition-colors hover:text-secondary"
                        >Politique de Confidentialité</Link
                    >
                    <span>|</span>
                    <Link
                        href="/mentions-legales"
                        class="transition-colors hover:text-secondary"
                        >Mentions Légales</Link
                    >
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { Star, Calendar, Users, Phone, Mail, MapPin, Heart } from '@lucide/vue';
import ThemeToggle from './ThemeToggle.vue';
import { Link } from '@inertiajs/vue3';
const navLinks = [
    { label: 'Prestations', href: '/prestations' },
    { label: 'Agence', href: '/agence' },
    { label: 'Galerie', href: '/galerie' },
    { label: 'Realisations', href: '/realisations' },
];

const popularServices = [
    { label: 'Animation Événementielle', href: '#services' },
    { label: 'Décoration', href: '#services' },
    { label: 'Location de Salles', href: '#services' },
    { label: 'Service Traiteur', href: '#services' },
    { label: 'Maître de Cérémonie', href: '#services' },
];
</script>
