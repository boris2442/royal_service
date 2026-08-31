<template>
    <section class="w-full bg-background text-foreground">
        <!-- Banner En-tête (Dégradé Thématique) -->
        <div
            class="w-full bg-gradient-to-r from-primary via-primary/90 to-secondary px-4 pt-28 pb-16 text-center text-primary-foreground sm:pt-32 sm:pb-20"
        >
            <div class="mx-auto max-w-4xl space-y-3">
                <h1
                    class="text-3xl font-extrabold tracking-tight sm:text-4xl lg:text-5xl"
                >
                    Nos Prestations
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm font-light opacity-90 sm:text-base lg:text-lg"
                >
                    Découvrez notre gamme complète de services événementiels
                    professionnels pour faire de votre événement un moment
                    inoubliable.
                </p>
            </div>
        </div>

        <!-- Grille de cartes (3 Colonnes) -->
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <!-- Grille Responsive 1 -> 2 -> 3 -> 4 Colonnes -->
            <div
                class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4"
            >
                <article
                    v-for="service in services"
                    :key="service.id"
                    class="group flex flex-col overflow-hidden rounded-xl border border-border/70 bg-card text-card-foreground transition-all duration-300 hover:-translate-y-1 hover:border-secondary/50 hover:shadow-lg"
                >
                    <!-- Image compacte & Badge -->
                    <div
                        class="relative aspect-[16/10] w-full overflow-hidden bg-muted"
                    >
                        <img
                            :src="service.image"
                            :alt="service.title"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-40"
                        ></div>

                        <!-- Badge Minimaliste -->
                        <span
                            v-if="service.badge"
                            class="absolute top-2.5 right-2.5 rounded-full bg-secondary/90 px-2 py-0.5 text-[10px] font-bold text-secondary-foreground shadow-xs backdrop-blur-xs"
                        >
                            {{ service.badge }}
                        </span>
                    </div>

                    <!-- Contenu Compact & Minimaliste -->
                    <div
                        class="flex flex-1 flex-col justify-between space-y-3 p-4"
                    >
                        <div class="space-y-1.5">
                            <h3
                                class="text-base font-bold tracking-tight text-foreground transition-colors group-hover:text-secondary"
                            >
                                {{ service.title }}
                            </h3>
                            <p
                                class="line-clamp-2 text-xs leading-relaxed text-muted-foreground"
                            >
                                {{ service.description }}
                            </p>
                        </div>

                        <div class="border-t border-border/40 pt-2">
                            <Link
                                :href="service.link"
                                class="inline-flex items-center gap-1.5 text-xs font-semibold text-secondary transition-all group-hover:gap-2 hover:text-primary"
                            >
                                <span>Voir les détails</span>
                                <ArrowRight class="h-3.5 w-3.5" />
                            </Link>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- Banner Call To Action (Bas de page) -->
        <div
            class="w-full bg-gradient-to-r from-primary via-primary/90 to-secondary px-4 py-12 text-primary-foreground"
        >
            <div class="mx-auto max-w-4xl space-y-6 text-center">
                <h2 class="text-2xl font-bold sm:text-3xl">
                    Besoin d'un devis personnalisé ?
                </h2>
                <p class="mx-auto max-w-xl text-sm opacity-90 sm:text-base">
                    Contactez-nous pour discuter de votre projet et obtenir une
                    proposition sur-mesure adaptée à votre budget.
                </p>
                <div>
                    <a
                        href="https://wa.me/237696943361"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-full bg-background px-6 py-3 text-sm font-bold text-card-foreground shadow-lg transition-transform hover:scale-105 hover:bg-card"
                    >
                        <MessageSquare class="h-4 w-4 text-secondary" />
                        <span>Demander un devis gratuit</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { ArrowRight, MessageSquare } from '@lucide/vue';
import PublicLayout from '@/layouts/PublicLayout.vue';
// 2. Déclarer le Persistent Layout
defineOptions({
    layout: PublicLayout,
});
const services = ref([
    {
        id: 1,
        title: 'Décoration & Scénographie',
        description:
            'Habillage de salles, trônes des mariés, décoration florale, draperies et jeux de lumière sur-mesure.',
        image: '/images/services/decoration.jpg',
        badge: 'Incontournable',
        link: '#contact',
    },
    {
        id: 2,
        title: 'Service Traiteur & Cuisiniers',
        description:
            'Buffets gastronomiques et plats traditionnels préparés par nos chefs cuisiniers chevronnés.',
        image: '/images/services/cuisinier.jpg',
        link: '#contact',
    },
    {
        id: 3,
        title: 'Location de Chaises, Mobilier & Bâches',
        description:
            'Bâches étanches, tentes, chaises VIP, tables et matériel complet pour équiper vos lieux de réception.',
        image: '/images/services/chaise.jpg',
        link: '#contact',
    },
  
    {
        id: 5,
        title: 'Aménagement d’Espaces Verts',
        description:
            'Paysagisme événementiel et mise en valeur végétale des jardins pour vos réceptions en plein air.',
        image: '/images/services/spacegrenn.jpg',
        badge: 'Nouveau',
        link: '#contact',
    },
    {
        id: 6,
        title: 'Hôtesses & Serveurs',
        description:
            'Personnel de service qualifié et élégant pour l’accueil, le protocole et le service à table.',
        image: '/images/services/hotesse.jpg',
        link: '#contact',
    },
    {
        id: 7,
        title: 'Sonorisation, DJ & Éclairage',
        description:
            'Animation musicale dynamique, sonorisation haute définition et effets spéciaux (fumée lourde, étincelles).',
        image: '/images/services/decoration.jpg',
        link: '#contact',
    },
    {
        id: 8,
        title: 'Maître de Cérémonie (MC)',
        description:
            'Animateurs charismatiques pour orchestrer le déroulement de votre événement avec prestige.',
        image: '/images/services/decoration.jpg',
        link: '#contact',
    },
    {
        id: 9,
        title: 'Bar à Cocktails & Pauses Café',
        description:
            'Service de rafraîchissements, cocktails créatifs avec barmans et pauses café pour vos réceptions.',
        image: '/images/services/decoration.jpg',
        link: '#contact',
    },
    {
        id: 10,
        title: 'Organisation Clé en Main',
        description:
            'Prise en charge globale et coordination de A à Z de vos mariages, anniversaires et cérémonies.',
        image: '/images/services/organisation.jpg',
        badge: 'Populaire',
        link: '#contact',
    },
]);
</script>
