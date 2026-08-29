<script setup lang="ts">
import {
    FileText,
    MessageSquare,
    Mail,
    ArrowLeft,
    ArrowRight,
} from '@lucide/vue';
import { Link } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';
// 2. Déclarer le Persistent Layout
defineOptions({
    layout: PublicLayout,
});
interface Article {
    id: number;
    title: string;
    content: string;
}

const articles: Article[] = [
    {
        id: 1,
        title: 'Article 1 : Objet',
        content:
            "Les présentes conditions générales d'utilisation (CGU) ont pour objet de définir les modalités et conditions d'utilisation du site et de définir les droits et obligations des parties dans ce cadre.",
    },
    {
        id: 2,
        title: 'Article 2 : Mentions légales',
        content:
            'Le présent site est édité par Service SARL, société à responsabilité limitée à un capital, immatriculée au Registre du Commerce et du Crédit Mobilier de Banganté.',
    },
    {
        id: 3,
        title: 'Article 3 : Accès au site',
        content:
            "Le site est accessible gratuitement à tout utilisateur disposant d'un accès à internet. Tous les frais supportés par l'utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.",
    },
    {
        id: 4,
        title: 'Article 4 : Collecte des données',
        content:
            "Le site assure à l'utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément aux lois et réglementations en vigueur.",
    },
    {
        id: 5,
        title: 'Article 5 : Propriété intellectuelle',
        content:
            "Les marques, logos, signes ainsi que tous les contenus du site (textes, images, son...) sont protégés par le Code de la Propriété Intellectuelle et plus particulièrement par le droit d'auteur. L'utilisateur doit solliciter l'autorisation préalable du site pour toute reproduction, publication, copie des différents contenus.",
    },
    {
        id: 6,
        title: 'Article 6 : Responsabilité',
        content:
            "Les sources des informations diffusées sur le site sont réputées fiables mais le site ne garantit pas qu'il soit exempt de défauts, d'erreurs ou d'omissions. Les informations communiquées sont présentées à titre indicatif et général sans valeur contractuelle.",
    },
    {
        id: 7,
        title: 'Article 7 : Liens hypertextes',
        content:
            "Le site peut contenir des liens hypertextes vers d'autres sites présents sur le réseau Internet. Les liens vers ces autres ressources vous font quitter le site. Il est possible de créer un lien vers notre site sous réserve de nous en informer par email.",
    },
    {
        id: 8,
        title: 'Article 8 : Cookies',
        content:
            'Le site peut collecter automatiquement des informations standard. Toutes les informations collectées indirectement ne seront utilisées que pour suivre le volume, le type et la configuration du trafic utilisant ce site.',
    },
    {
        id: 9,
        title: 'Article 9 : Services proposés',
        content:
            "Le site propose des services d'organisation d'événements incluant : animation, décoration, location de matériel, coordination d'événements, service traiteur et autres prestations événementielles.",
    },
    {
        id: 10,
        title: 'Article 10 : Limitation contractuelles',
        content:
            'Les informations contenues sur ce site sont aussi précises que possible et le site est périodiquement remis à jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes.',
    },
    {
        id: 11,
        title: 'Article 11 : Droit applicable',
        content:
            "Tout litige en relation avec l'utilisation du site est soumis au droit camerounais. Les tribunaux camerounais sont seuls compétents pour régler le contentieux.",
    },
    {
        id: 12,
        title: 'Article 12 : Contact',
        content:
            'Pour toute question relative aux présentes CGU, vous pouvez nous contacter par email à contact@royal-service.cm ou par courrier à notre siège social à Bafoussam, Cameroun.',
    },
];
</script>

<template>
    <div
        class="min-h-screen bg-[var(--background)] px-4 py-12 text-[var(--foreground)] transition-colors duration-200 sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-4xl space-y-6">
            <!-- BANNIÈRE D'INTRODUCTION -->
            <div
                class="rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 text-sm text-[var(--muted-foreground)] shadow-xs"
            >
                Bienvenue sur notre site. En accédant et en utilisant ce site,
                vous acceptez sans réserve les présentes conditions générales
                d'utilisation.
            </div>

            <!-- LISTE DES ARTICLES -->
            <div class="space-y-4">
                <div
                    v-for="article in articles"
                    :key="article.id"
                    class="space-y-3 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs transition-colors"
                >
                    <div
                        class="flex items-center gap-2 text-lg font-bold text-[var(--primary)]"
                    >
                        <FileText class="h-5 w-5 shrink-0" />
                        <h2>{{ article.title }}</h2>
                    </div>
                    <p
                        class="text-sm leading-relaxed text-[var(--muted-foreground)]"
                    >
                        {{ article.content }}
                    </p>
                </div>
            </div>

            <!-- ENCADRÉ BESOIN D'AIDE -->
            <div
                class="relative space-y-4 overflow-hidden rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-8 shadow-xs"
            >
                <div
                    class="absolute top-0 left-0 h-full w-1.5 bg-[var(--royal-gold)]"
                ></div>

                <div>
                    <h3 class="text-lg font-bold text-[var(--foreground)]">
                        Besoin d'aide ?
                    </h3>
                    <p class="mt-1 text-sm text-[var(--muted-foreground)]">
                        Si vous avez des questions concernant ces conditions
                        générales, n'hésitez pas à nous contacter.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <Link
                        href="/contact"
                        class="inline-flex items-center gap-2 rounded-full bg-[var(--primary)] px-5 py-2.5 text-xs font-semibold text-[var(--primary-foreground)] shadow-xs transition-colors hover:bg-[var(--primary-hover)]"
                    >
                        <MessageSquare class="h-4 w-4" />
                        Nous contacter
                    </Link>

                    <a
                        href="mailto:contact@royal-service.cm"
                        class="inline-flex items-center gap-2 rounded-full border border-[var(--primary)] px-5 py-2.5 text-xs font-semibold text-[var(--primary)] transition-colors hover:bg-[var(--primary)] hover:text-[var(--primary-foreground)]"
                    >
                        <Mail class="h-4 w-4" />
                        contact@royal-service.cm
                    </a>
                </div>
            </div>

            <!-- PIED DE PAGE : NAVIGATION -->
            <div
                class="flex items-center justify-between pt-4 text-xs font-medium text-[var(--primary)]"
            >
                <Link
                    href="/mentions-legales"
                    class="inline-flex items-center gap-1 hover:underline"
                >
                    <ArrowLeft class="h-3.5 w-3.5" />
                    Mentions légales
                </Link>
                <Link
                    href="/politique-confidentialite"
                    class="inline-flex items-center gap-1 hover:underline"
                >
                    Politique de confidentialité
                    <ArrowRight class="h-3.5 w-3.5" />
                </Link>
            </div>
        </div>
    </div>
</template>
