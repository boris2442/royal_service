<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
    ShieldCheck,
    Database,
    Eye,
    Lock,
    Cookie,
    Share2,
    UserCheck,
    Clock,
    ShieldAlert,
    FileEdit,
    Mail,
    Phone,
    MapPin,
    Settings,
    ArrowLeft,
    ArrowRight,
} from '@lucide/vue';
import PublicLayout from '@/layouts/PublicLayout.vue';
// 2. Déclarer le Persistent Layout
defineOptions({
    layout: PublicLayout,
});
interface Section {
    id: number;
    title: string;
    icon: any;
    intro?: string;
    content?: string;
    bullets?: string[];
}

const sections: Section[] = [
    {
        id: 1,
        title: '1. Collecte des informations',
        icon: Database,
        intro: 'Nous collectons des informations lorsque vous vous inscrivez sur notre site, lorsque vous vous connectez à votre compte, faites une demande de devis, ou participez à nos événements.',
        bullets: [
            'Nom et prénom',
            'Adresse email',
            'Numéro de téléphone',
            'Adresse postale',
            'Informations de paiement (traitées de manière sécurisée)',
            'Préférences événementielles',
        ],
    },
    {
        id: 2,
        title: '2. Utilisation des informations',
        icon: Eye,
        intro: 'Les informations que nous collectons auprès de vous peuvent être utilisées pour :',
        bullets: [
            'Personnaliser votre expérience et répondre à vos besoins individuels',
            'Fournir un contenu et des publicités personnalisés',
            'Améliorer notre site web et nos services',
            'Améliorer le service client et vos besoins de prise en charge',
            'Vous contacter par email ou téléphone',
            'Administrer un concours, une promotion, ou une enquête',
            'Traiter vos demandes de devis et réservations',
        ],
    },
    {
        id: 3,
        title: '3. Protection des informations',
        icon: Lock,
        content:
            'Nous mettons en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations personnelles. Nous utilisons un cryptage à la pointe de la technologie pour protéger les informations sensibles transmises en ligne.',
    },
    {
        id: 4,
        title: '4. Cookies',
        icon: Cookie,
        intro: "Nous utilisons des cookies pour améliorer votre expérience sur notre site. Les cookies sont de petits fichiers qu'un site ou son prestataire de services transfère sur le disque dur de votre ordinateur par l'intermédiaire de votre navigateur Web.",
        bullets: [
            'Cookies essentiels : nécessaires au fonctionnement du site',
            'Cookies analytiques : pour comprendre comment les visiteurs utilisent le site',
            'Cookies de préférence : pour mémoriser vos choix et personnaliser votre expérience',
            'Cookies marketing : pour afficher des publicités pertinentes',
        ],
    },
    {
        id: 5,
        title: '5. Divulgation à des tiers',
        icon: Share2,
        content:
            "Nous ne vendons, n'échangeons et ne transférons pas vos informations personnelles identifiables à des tiers. Cela ne comprend pas les tierce parties de confiance qui nous aident à exploiter notre site Web ou à mener nos affaires.",
    },
    {
        id: 6,
        title: '6. Vos droits',
        icon: UserCheck,
        intro: 'Conformément au RGPD et à la législation camerounaise, vous disposez des droits suivants :',
        bullets: [
            "Droit d'accès à vos données personnelles",
            'Droit de rectification des données inexactes',
            "Droit à l'effacement (droit à l'oubli)",
            'Droit à la limitation du traitement',
            'Droit à la portabilité des données',
            "Droit d'opposition au traitement",
            'Droit de retirer votre consentement à tout moment',
        ],
    },
    {
        id: 7,
        title: '7. Conservation des données',
        icon: Clock,
        content:
            'Nous conservons vos données personnelles uniquement pendant la durée nécessaire aux finalités pour lesquelles elles ont été collectées, conformément aux exigences légales et réglementaires.',
    },
    {
        id: 8,
        title: '8. Mineurs',
        icon: ShieldAlert,
        content:
            "Notre site n'est pas destiné aux personnes de moins de 18 ans. Nous ne collectons pas sciemment d'informations personnelles auprès de mineurs sans le consentement parental.",
    },
    {
        id: 9,
        title: '9. Modifications de la politique',
        icon: FileEdit,
        content:
            'Nous nous réservons le droit de modifier cette politique de confidentialité à tout moment. Les modifications prendront effet immédiatement après leur publication sur le site.',
    },
];
</script>

<template>
    <div
        class="min-h-screen bg-[var(--background)] px-4 py-12 text-[var(--foreground)] transition-colors duration-200 sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-4xl space-y-8">
            <!-- EN-TÊTE PAGE -->
            <div
                class="space-y-3 rounded-[var(--radius)] bg-gradient-to-r from-[var(--primary)] to-[var(--royal-bordeaux-dark)] p-8 text-center text-[var(--primary-foreground)] shadow-md"
            >
                <div
                    class="mb-1 inline-flex items-center justify-center rounded-full bg-white/10 p-3 backdrop-blur-xs"
                >
                    <ShieldCheck class="h-8 w-8 text-[var(--royal-gold)]" />
                </div>
                <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">
                    Politique de Confidentialité
                </h1>
                <p
                    class="text-xs text-[var(--primary-foreground)]/80 sm:text-sm"
                >
                    Dernière mise à jour : 1er Janvier 2024
                </p>
            </div>

            <!-- BANNIÈRE INTRODUCTIVE -->
            <div
                class="rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 text-sm leading-relaxed text-[var(--muted-foreground)] shadow-xs"
            >
                Chez Royal
                <span class="serviceFont font-bold text-[var(--primary)] italic"
                    >Service</span
                >
                , nous accordons une importance primordiale à la protection de
                vos données personnelles. Cette politique de confidentialité
                explique comment nous collectons, utilisons et protégeons vos
                informations.
            </div>

            <!-- ARTICLES 1 À 9 -->
            <div class="space-y-6">
                <div
                    v-for="sec in sections"
                    :key="sec.id"
                    class="space-y-4 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs"
                >
                    <div
                        class="flex items-center gap-3 border-b border-[var(--border)] pb-3 text-lg font-bold text-[var(--primary)]"
                    >
                        <component
                            :is="sec.icon"
                            class="h-5 w-5 shrink-0 text-[var(--royal-gold)]"
                        />
                        <h2>{{ sec.title }}</h2>
                    </div>

                    <p
                        v-if="sec.intro"
                        class="text-sm leading-relaxed text-[var(--muted-foreground)]"
                    >
                        {{ sec.intro }}
                    </p>

                    <p
                        v-if="sec.content"
                        class="text-sm leading-relaxed text-[var(--muted-foreground)]"
                    >
                        {{ sec.content }}
                    </p>

                    <ul v-if="sec.bullets" class="space-y-2 pt-1">
                        <li
                            v-for="(bullet, bIndex) in sec.bullets"
                            :key="bIndex"
                            class="flex items-start gap-2 text-sm text-[var(--muted-foreground)]"
                        >
                            <span
                                class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[var(--primary)]"
                            ></span>
                            <span>{{ bullet }}</span>
                        </li>
                    </ul>
                </div>

                <!-- ARTICLE 10 : CONTACT DPO -->
                <div
                    class="space-y-4 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs"
                >
                    <div
                        class="flex items-center gap-3 border-b border-[var(--border)] pb-3 text-lg font-bold text-[var(--primary)]"
                    >
                        <Mail
                            class="h-5 w-5 shrink-0 text-[var(--royal-gold)]"
                        />
                        <h2>10. Contact</h2>
                    </div>

                    <p class="text-sm text-[var(--muted-foreground)]">
                        Pour toute question concernant cette politique de
                        confidentialité ou pour exercer vos droits, contactez
                        notre Délégué à la Protection des Données :
                    </p>

                    <div
                        class="space-y-2 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--background)] p-5 text-sm"
                    >
                        <p class="font-bold text-[var(--foreground)]">
                            Aubin Boris Simo
                        </p>
                        <p
                            class="text-xs font-medium text-[var(--muted-foreground)]"
                        >
                            Délégué à la Protection des Données
                        </p>

                        <div
                            class="space-y-1.5 pt-2 text-xs text-[var(--muted-foreground)]"
                        >
                            <div class="flex items-center gap-2">
                                <Mail
                                    class="h-3.5 w-3.5 text-[var(--primary)]"
                                />
                                <a
                                    href="mailto:aubinborissimotsebo@gmail.com"
                                    class="transition-colors hover:text-[var(--primary)]"
                                    >aubinborissimotsebo@gmail.com</a
                                >
                            </div>
                            <div class="flex items-center gap-2">
                                <Phone
                                    class="h-3.5 w-3.5 text-[var(--primary)]"
                                />
                                <span>+237 679 13 51 77</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <MapPin
                                    class="h-3.5 w-3.5 text-[var(--primary)]"
                                />
                                <span
                                    >Royal
                                    <span
                                        class="serviceFont font-bold text-[var(--primary)] italic"
                                    >
                                        Service
                                    </span>
                                    , Banganté, Cameroun</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ENCADRÉ GESTION DES PRÉFÉRENCES -->
            <div
                class="relative space-y-4 overflow-hidden rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-8 shadow-xs"
            >
                <div
                    class="absolute top-0 left-0 h-full w-1.5 bg-[var(--royal-gold)]"
                ></div>

                <div>
                    <h3 class="text-lg font-bold text-[var(--foreground)]">
                        Gestion de vos préférences
                    </h3>
                    <p class="mt-1 text-sm text-[var(--muted-foreground)]">
                        Vous pouvez à tout moment modifier vos préférences
                        concernant l'utilisation de vos données personnelles en
                        nous contactant.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-full bg-[var(--primary)] px-5 py-2.5 text-xs font-semibold text-[var(--primary-foreground)] shadow-xs transition-colors hover:bg-[var(--primary-hover)]"
                    >
                        <Settings class="h-4 w-4" />
                        Gérer mes préférences
                    </button>

                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-full border border-[var(--primary)] px-5 py-2.5 text-xs font-semibold text-[var(--primary)] transition-colors hover:bg-[var(--primary)] hover:text-[var(--primary-foreground)]"
                    >
                        Exercer mes droits RGPD
                    </button>
                </div>
            </div>

            <!-- NAVIGATION PIED DE PAGE -->
            <div
                class="flex items-center justify-between pt-4 text-xs font-medium text-[var(--primary)]"
            >
                <Link
                    href="/cgu"
                    class="inline-flex items-center gap-1 hover:underline"
                >
                    <ArrowLeft class="h-3.5 w-3.5" />
                    Conditions générales
                </Link>
                <Link
                    href="/mentions-legales"
                    class="inline-flex items-center gap-1 hover:underline"
                >
                    Mentions légales
                    <ArrowRight class="h-3.5 w-3.5" />
                </Link>
            </div>
        </div>
    </div>
</template>
