<template>
    <div
        class="w-full bg-background font-sans text-foreground selection:bg-secondary selection:text-secondary-foreground"
    >
        <!-- 1. HERO SECTION & STATISTIQUES -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-primary via-primary/95 to-primary-dark px-4 pt-20 pb-28 text-primary-foreground sm:px-6 lg:px-8"
        >
            <!-- Cercles décoratifs d'arrière-plan -->
            <div
                class="pointer-events-none absolute -top-24 -right-24 h-96 w-96 rounded-full bg-secondary/10 blur-3xl"
            ></div>
            <div
                class="pointer-events-none absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-primary-dark/40 blur-3xl"
            ></div>

            <div class="relative z-10 mx-auto max-w-5xl space-y-6 text-center">
                <h1
                    class="text-4xl font-black tracking-wider text-secondary sm:text-6xl lg:text-7xl"
                >
                    ETS ROYAL
                    <span class="serviceFont text-white">Service</span>
                </h1>

                <p
                    class="text-2xl leading-tight font-extrabold tracking-tight text-primary-foreground sm:text-4xl"
                >
                    Votre partenaire événementiel d'exception
                </p>

                <p
                    class="mx-auto max-w-2xl text-base leading-relaxed font-light text-primary-foreground/80 sm:text-lg"
                >
                    Une entreprise événementielle spécialisée en organisation
                    d’événements corporatifs, cérémonies privées, manifestations
                    culturelles et services logistiques de prestige.
                </p>

                <div
                    class="flex flex-wrap items-center justify-center gap-4 pt-4"
                >
                    <Link
                        href="/prestations"
                        class="rounded-full bg-secondary px-7 py-3.5 text-sm font-bold text-secondary-foreground shadow-lg transition-all duration-300 hover:scale-105 hover:bg-secondary-hover"
                    >
                        Découvrir nos services
                    </Link>
                    <a
                        href="https://wa.me/237696943361"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 bg-primary-foreground/10 px-7 py-3.5 text-sm font-semibold text-primary-foreground backdrop-blur-sm transition-all duration-300 hover:bg-primary-foreground/20"
                    >
                        <MessageSquare class="h-4 w-4 text-secondary" />
                        <span>Nous contacter</span>
                    </a>
                </div>
            </div>

            <!-- Grille de Statistiques en Chevauchement -->
            <div class="relative z-20 mx-auto mt-16 -mb-40 max-w-6xl">
                <div class="grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
                    <div
                        v-for="(stat, idx) in stats"
                        :key="idx"
                        class="flex flex-col items-center justify-center rounded-2xl border border-border bg-card p-6 text-center text-card-foreground shadow-xl transition-transform hover:-translate-y-1"
                    >
                        <component
                            :is="stat.icon"
                            class="mb-2 h-8 w-8 text-secondary"
                        />
                        <span
                            class="text-3xl font-extrabold tracking-tight text-foreground sm:text-4xl"
                        >
                            {{ stat.value }}
                        </span>
                        <span
                            class="mt-1 text-xs font-medium text-muted-foreground sm:text-sm"
                        >
                            {{ stat.label }}
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Espaceur pour le chevauchement des stats -->
        <div class="h-28 sm:h-24"></div>

        <!-- 2. QUI SOMMES-NOUS ? -->
        <section class="border-b border-border/50 px-4 py-16 sm:px-6 lg:px-8">
            <div
                class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 lg:grid-cols-12"
            >
                <!-- Texte -->
                <div class="space-y-6 lg:col-span-6">
                    <div class="space-y-2">
                        <span
                            class="text-xs font-bold tracking-wider text-secondary uppercase"
                            >À propos de nous</span
                        >
                        <h2
                            class="text-2xl font-extrabold tracking-tight text-foreground sm:text-4xl"
                        >
                            Qui sommes-nous ?
                        </h2>
                    </div>

                    <p
                        class="text-sm leading-relaxed text-muted-foreground sm:text-base"
                    >
                        <strong class="text-foreground"
                            >ETS ROYAL Service</strong
                        >
                        est une entreprise événementielle basée à Bangangté et
                        intervenant dans toute la région. Nous offrons des
                        services professionnels, originaux et créatifs pour
                        garantir le succès retentissant de toutes vos
                        célébrations.
                    </p>

                    <div
                        class="space-y-2 rounded-xl border-l-4 border-secondary bg-card p-5 text-card-foreground shadow-sm"
                    >
                        <p
                            class="text-sm leading-relaxed font-medium text-foreground/90 italic"
                        >
                            « Chez ETS ROYAL Service, nous nous distinguons par
                            notre compréhension des besoins uniques de chaque
                            client. Notre organisation saura surpasser vos
                            moindres attentes. Faire affaire avec nous, c'est
                            l'assurance du prestige et du sur-mesure. »
                        </p>
                    </div>
                </div>

                <!-- Collage Photos -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4 lg:col-span-6">
                    <div class="space-y-3 sm:space-y-4">
                        <div
                            class="h-44 overflow-hidden rounded-xl bg-muted shadow-md sm:h-56"
                        >
                            <img
                                src="/images/agency/about1.jpg"
                                alt="Décoration Royal Service"
                                class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                            />
                        </div>
                        <div
                            class="h-32 overflow-hidden rounded-xl bg-muted shadow-md sm:h-40"
                        >
                            <img
                                src="/images/agency/about2.jpg"
                                alt="Service Traiteur"
                                class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                            />
                        </div>
                    </div>
                    <div class="space-y-3 pt-6 sm:space-y-4">
                        <div
                            class="h-32 overflow-hidden rounded-xl bg-muted shadow-md sm:h-40"
                        >
                            <img
                                src="/images/agency/about3.jpg"
                                alt="Animation DJ & Lumières"
                                class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                            />
                        </div>
                        <div
                            class="h-44 overflow-hidden rounded-xl bg-muted shadow-md sm:h-56"
                        >
                            <img
                                src="/images/agency/about4.jpg"
                                alt="Buffet Réception"
                                class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. POURQUOI FAIRE AFFAIRE AVEC NOUS ? -->
        <section class="bg-muted/30 px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl space-y-12">
                <div class="mx-auto max-w-2xl space-y-3 text-center">
                    <h2
                        class="text-2xl font-extrabold tracking-tight text-foreground sm:text-4xl"
                    >
                        Pourquoi faire affaire avec nous ?
                    </h2>
                    <p class="text-sm text-muted-foreground">
                        L'excellence et la rigueur au service de vos moments
                        d'exception.
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4"
                >
                    <div
                        v-for="(why, i) in whyUs"
                        :key="i"
                        class="space-y-3 rounded-xl border border-border bg-card p-6 text-card-foreground shadow-sm transition-all hover:border-secondary/50 hover:shadow-md"
                    >
                        <div
                            class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-secondary/10 text-secondary"
                        >
                            <component :is="why.icon" class="h-6 w-6" />
                        </div>
                        <h3 class="text-base font-bold text-foreground">
                            {{ why.title }}
                        </h3>
                        <p
                            class="text-xs leading-relaxed text-muted-foreground"
                        >
                            {{ why.desc }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. SERVICES OFFERTS (TABS) -->
        <section id="services" class="px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-6xl space-y-10">
                <div class="space-y-3 text-center">
                    <h2
                        class="text-2xl font-extrabold text-foreground sm:text-4xl"
                    >
                        Services offerts
                    </h2>
                    <p class="mx-auto max-w-xl text-sm text-muted-foreground">
                        Nous conceptualisons, réalisons et coordonnons des
                        événements d'exception adaptés à tous les secteurs.
                    </p>
                </div>

                <!-- Onglets de catégories -->
                <div
                    class="flex flex-wrap justify-center gap-2 border-b border-border pb-4"
                >
                    <button
                        v-for="(cat, key) in serviceCategories"
                        :key="key"
                        @click="activeCategory = key"
                        :class="[
                            'inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-xs font-semibold transition-all duration-200 sm:text-sm',
                            activeCategory === key
                                ? 'bg-primary text-primary-foreground shadow-md'
                                : 'border border-border bg-card text-card-foreground hover:bg-muted',
                        ]"
                    >
                        <component
                            :is="cat.icon"
                            class="h-4 w-4"
                            :class="
                                activeCategory === key
                                    ? 'text-secondary'
                                    : 'text-muted-foreground'
                            "
                        />
                        <span>{{ cat.label }}</span>
                    </button>
                </div>

                <!-- Grille d'éléments du service sélectionné -->
                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"
                >
                    <div
                        v-for="(item, idx) in serviceCategories[activeCategory]
                            .items"
                        :key="idx"
                        class="flex items-center gap-3 rounded-xl border border-border bg-card p-4 text-card-foreground shadow-xs transition-colors hover:border-secondary/40"
                    >
                        <CheckCircle2 class="h-5 w-5 shrink-0 text-secondary" />
                        <span class="text-sm font-medium text-foreground">{{
                            item
                        }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. NOS VALEURS -->
        <section class="bg-muted/30 px-4 py-8 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl space-y-12">
                <div class="space-y-2 text-center">
                    <h2
                        class="text-2xl font-extrabold text-foreground sm:text-4xl"
                    >
                        Nos valeurs
                    </h2>
                    <p class="text-sm text-muted-foreground">
                        Les principes qui guident chacune de nos réalisations.
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4"
                >
                    <div
                        v-for="(val, index) in values"
                        :key="index"
                        class="relative space-y-3 overflow-hidden rounded-xl border border-border bg-card p-6 text-card-foreground shadow-sm"
                    >
                        <div
                            class="absolute -top-4 -right-4 h-20 w-20 rounded-full bg-secondary/10 blur-xl"
                        ></div>
                        <h3 class="text-lg font-bold text-foreground">
                            {{ val.title }}
                        </h3>
                        <p
                            class="text-xs leading-relaxed text-muted-foreground"
                        >
                            {{ val.desc }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. NOTRE ÉQUIPE -->
        <section class="px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl space-y-12">
                <div class="space-y-2 text-center">
                    <h2
                        class="text-2xl font-extrabold text-foreground sm:text-4xl"
                    >
                        Notre équipe
                    </h2>
                    <p class="text-sm text-muted-foreground">
                        Des professionnels passionnés au service de vos
                        événements.
                    </p>
                </div>

                <div
                    class="grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-6 lg:grid-cols-5"
                >
                    <div
                        v-for="(member, i) in team"
                        :key="i"
                        class="group flex flex-col items-center rounded-2xl border border-border bg-card p-5 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-secondary/40 hover:shadow-md"
                    >
                        <!-- Photo de profil -->
                        <div
                            class="relative h-24 w-24 overflow-hidden rounded-full border-2 border-secondary p-1 shadow-xs transition-transform duration-300 group-hover:scale-105 sm:h-28 sm:w-28"
                        >
                            <img
                                :src="member.photo"
                                :alt="member.name"
                                class="h-full w-full rounded-full object-cover"
                            />
                        </div>

                        <!-- Informations -->
                        <div class="mt-4 space-y-1">
                            <h3
                                class="text-sm leading-snug font-bold text-foreground"
                            >
                                {{ member.name }}
                            </h3>
                            <p class="text-xs font-semibold text-primary">
                                {{ member.role }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. NOS RÉALISATIONS -->
        <!-- <section class="bg-muted/30 px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl space-y-10">
                <div class="space-y-2 text-center">
                    <h2
                        class="text-2xl font-extrabold text-foreground sm:text-4xl"
                    >
                        Nos Réalisations
                    </h2>
                    <p class="text-sm text-muted-foreground">
                        Un aperçu visuel de nos récentes prestations
                        d'exception.
                    </p>
                </div>

                
                <div
                    class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4"
                >
                    <div
                        v-for="(img, idx) in gallery"
                        :key="idx"
                        class="group relative aspect-square overflow-hidden rounded-xl bg-muted shadow-xs"
                    >
                        <img
                            :src="img"
                            alt="Réalisation Royal Service"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                        />
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            <span
                                class="rounded-full bg-secondary/80 px-3 py-1.5 text-xs font-bold tracking-wider backdrop-blur-xs"
                            >
                                ETS ROYAL
                                <span class="serviceFont text-white">
                                    Service</span
                                >
                            </span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 text-center">
                    <a
                        href="https://wa.me/237696943361"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3 text-xs font-bold text-primary-foreground shadow-md transition-transform hover:scale-105 hover:bg-primary-hover"
                    >
                        <span>Voir toute la galerie sur WhatsApp</span>
                        <ArrowRight class="h-4 w-4 text-secondary" />
                    </a>
                </div>
            </div>
        </section> -->

        <GallerySection />

        <!-- 8. BANNER CALL TO ACTION (FOOTER DE PAGE) -->
        <section
            class="w-full bg-gradient-to-r from-primary via-primary/95 to-secondary px-4 py-14 text-primary-foreground sm:px-6 lg:px-8"
        >
            <div class="mx-auto max-w-4xl space-y-6 text-center">
                <h2 class="text-2xl font-extrabold sm:text-4xl">
                    Prêt à créer votre événement de rêve ?
                </h2>
                <p
                    class="mx-auto max-w-xl text-sm font-light opacity-90 sm:text-base"
                >
                    Contactez-nous dès maintenant pour discuter de votre projet
                    et obtenir une proposition sur-mesure adaptée à votre
                    budget.
                </p>

                <div
                    class="flex flex-wrap items-center justify-center gap-4 pt-2"
                >
                    <a
                        href="mailto:contact@etsroyalservice.com"
                        class="inline-flex items-center gap-2 rounded-full bg-background px-6 py-3 text-xs font-bold text-foreground shadow-lg transition-transform hover:scale-105 sm:text-sm"
                    >
                        <Mail class="h-4 w-4 text-primary" />
                        <span>contact@etsroyalservice.com</span>
                    </a>
                    <a
                        href="tel:+237696943361"
                        class="inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 bg-primary-foreground/10 px-6 py-3 text-xs font-bold text-primary-foreground backdrop-blur-sm transition-transform hover:scale-105 sm:text-sm"
                    >
                        <Phone class="h-4 w-4 text-secondary" />
                        <span>+237 696 94 33 61</span>
                    </a>
                </div>

                <div
                    class="mx-auto flex max-w-md flex-wrap items-center justify-center gap-6 border-t border-primary-foreground/20 pt-4 text-xs text-primary-foreground/80"
                >
                    <span class="flex items-center gap-1.5"
                        ><MapPin class="h-3.5 w-3.5 text-secondary" />
                        Bangangté, Cameroun</span
                    >
                    <span class="flex items-center gap-1.5"
                        ><Globe class="h-3.5 w-3.5 text-secondary" />
                        etsroyalservice.com</span
                    >
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import PublicLayout from '@/layouts/PublicLayout.vue';
import GallerySection from '@/components/myComponentProject/GallerySection.vue';
import { Link } from '@inertiajs/vue3';
// import RealisationSection from '@/components/myComponentProject/'
// 2. Déclarer le Persistent Layout
defineOptions({
    layout: PublicLayout,
});
import {
    Calendar,
    Users,
    Smile,
    Handshake,
    MessageSquare,
    Coins,
    Award,
    ShieldCheck,
    Clock,
    Building2,
    Sparkles,
    PartyPopper,
    CheckCircle2,
    Mail,
    Phone,
    MapPin,
    Globe,
    ArrowRight,
} from '@lucide/vue';

// Statistiques
const stats = ref([
    { icon: PartyPopper, value: '500+', label: 'Événements organisés' },
    { icon: Calendar, value: '10+', label: 'Années d’expérience' },
    { icon: Smile, value: '98%', label: 'Clients satisfaits' },
    { icon: Handshake, value: '50+', label: 'Partenaires' },
]);

// Pourquoi nous choisir
const whyUs = ref([
    {
        icon: Coins,
        title: 'Tarifs compétitifs',
        desc: 'Des prix justes et transparents adaptés à votre budget sans compromis sur la qualité d’exécution.',
    },
    {
        icon: Users,
        title: 'Personnel d’expérience',
        desc: 'Une équipe courtoise, réactive et expérimentée pour coordonner chaque détail de votre fête.',
    },
    {
        icon: ShieldCheck,
        title: 'Service après-vente excellent',
        desc: 'Un suivi personnalisé avant, pendant et après votre événement pour assurer une entière satisfaction.',
    },
    {
        icon: Clock,
        title: 'Paix d’esprit garantie',
        desc: 'Nous prenons en charge la logistique complète pour que vous puissiez profiter pleinement de votre moment.',
    },
]);

// Catégories de services
const activeCategory = ref('corporate');
const serviceCategories = ref({
    corporate: {
        label: 'Événements Corporatifs',
        icon: Building2,
        items: [
            'Séminaires & Conférences',
            'Lancements de produits',
            'Gala & Soirées d’entreprise',
            'Cocktails d’affaires',
            'Team Building',
            'Pauses café & Restauration pro',
        ],
    },
    cultural: {
        label: 'Culturels & Familiaux',
        icon: Sparkles,
        items: [
            'Mariages & Cérémonies traditionnelles',
            'Anniversaires & Fêtes privées',
            'Festivals & Spectacles',
            'Vernissages & Expositions',
            'Réceptions de prestige',
            'Événements communautaires',
        ],
    },
    services: {
        label: 'Logistique & Matériel',
        icon: PartyPopper,
        items: [
            'Décoration & Scénographie de salle',
            'Service Traiteur & Cuisiniers',
            'Location de bâches, tentes & chaises VIP',
            'Sonorisation, DJ & Éclairage pro',
            'Hôtesses d’accueil & Serveurs',
            'Service Hôtellerie & Espaces verts',
        ],
    },
});

// Valeurs
const values = ref([
    {
        title: 'Excellence',
        desc: 'Nous visons le haut de gamme et la perfection dans chaque détail de nos prestations.',
    },
    {
        title: 'Créativité',
        desc: 'Des concepts originaux et sur-mesure pour rendre vos cérémonies uniques.',
    },
    {
        title: 'Intégrité',
        desc: 'Transparence tarifaire, ponctualité et honnêteté dans toutes nos interactions.',
    },
    {
        title: 'Passion',
        desc: 'Notre amour du travail bien fait se reflète dans l’enthousiasme de notre équipe.',
    },
]);

// Équipe
const team = ref([
    {
        name: 'Derick Feuleu',
        role: 'Fondateur & CEO',
        photo: '/images/team/derick.jpg',
    },
    {
        name: 'Tchoumkeu Rikiatou',
        role: 'Directrice Générale',
        photo: '/images/team/rikia.jpg',
    },
    {
        name: 'Chava Idriss',
        role: 'Directeur des Ressources ',
        photo: '/images/team/idriss.jpg',
    },
    // {
    //     name: 'Ndoukeu Tchouteng',
    //     role: 'Assistant Comptable',
    //     photo: '/images/team/derick.jpg',
    // },
    // {
    //     name: 'Mouafo Farel',
    //     role: 'Infographe & Designer',
    //     photo: '/images/team/derick.jpg',
    // },
]);

// Galerie
const gallery = ref([
    '/images/agency/about1.jpg',
    '/images/agency/about2.jpg',
    '/images/agency/about3.jpg',
    '/images/agency/about4.jpg',
    '/images/agency/about1.jpg',
    '/images/agency/about2.jpg',
    '/images/agency/about3.jpg',
    '/images/agency/about4.jpg',
]);
</script>
