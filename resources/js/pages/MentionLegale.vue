<script setup lang="ts">
import {
    FileText,
    Building2,
    UserCheck,
    Phone,
    Server,
    Mail,
    Globe,
    MapPin,
    Shield,
    ArrowRight,
} from '@lucide/vue';

interface Definition {
    term: string;
    description: string;
}
import PublicLayout from '@/layouts/PublicLayout.vue';
// 2. Déclarer le Persistent Layout
defineOptions({
    layout: PublicLayout,
});
const definitions: Definition[] = [
    {
        term: 'Client :',
        description:
            'Toute personne physique ou morale, professionnelle ou non, qui visite le site https://royal-service.cm/',
    },
    {
        term: 'Prestations et Services :',
        description:
            'Ensemble des services et contenus proposés par https://royal-service.cm/ aux Clients.',
    },
    {
        term: 'Contenu :',
        description:
            "Regroupe tous les éléments d'information présents sur le site, tels que les textes, les images et les vidéos.",
    },
    {
        term: 'Informations clients :',
        description:
            'Données personnelles collectées par https://royal-service.cm/ pour la gestion des comptes clients, la relation clientèle, les analyses et les statistiques.',
    },
    {
        term: 'Utilisateur :',
        description:
            'Internaute accédant et utilisant le site https://royal-service.cm/',
    },
    {
        term: 'Informations personnelles :',
        description:
            "Données permettant l'identification directe ou indirecte des personnes physiques, conformément à la loi ",
    },
    {
        term: 'Données à caractère personnel :',
        description:
            'Termes définis par le Règlement Général sur la Protection des Données .',
    },
];
</script>

<template>
    <div
        class="min-h-screen bg-[var(--background)] px-4 py-12 text-[var(--foreground)] transition-colors duration-200 sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-4xl space-y-10">
            <!-- SECTION DÉFINITIONS -->
            <section class="space-y-4">
                <h1
                    class="text-2xl font-bold tracking-tight text-[var(--foreground)]"
                >
                    Définitions
                </h1>

                <div
                    class="space-y-5 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs"
                >
                    <div
                        v-for="(item, index) in definitions"
                        :key="index"
                        class="space-y-1"
                    >
                        <h3 class="text-sm font-semibold text-[var(--primary)]">
                            {{ item.term }}
                        </h3>
                        <p
                            class="text-sm leading-relaxed text-[var(--muted-foreground)]"
                        >
                            {{ item.description }}
                        </p>
                    </div>
                </div>
            </section>

            <!-- SECTION PRÉSENTATION DU SITE INTERNET -->
            <section class="space-y-4">
                <h2
                    class="text-xl font-bold tracking-tight text-[var(--foreground)]"
                >
                    Présentation du site internet
                </h2>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <!-- Carte 1: Informations légales -->
                    <div
                        class="space-y-4 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs"
                    >
                        <div
                            class="flex items-center gap-2 border-b border-[var(--border)] pb-3 text-base font-bold text-[var(--primary)]"
                        >
                            <Building2
                                class="h-5 w-5 shrink-0 text-[var(--royal-gold)]"
                            />
                            <h3>Informations légales</h3>
                        </div>
                        <ul
                            class="space-y-2 text-sm text-[var(--muted-foreground)]"
                        >
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >Propriétaire :</strong
                                >
                                Royal Service SARL
                            </li>
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >Forme juridique :</strong
                                >
                                SARL (Société à Responsabilité Limitée)
                            </li>
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >Capital social :</strong
                                >
                            
                            </li>
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >RCCM :</strong
                                >
            
                            </li>
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >NUI :</strong
                                >
                                <!-- M012345678910P -->
                            </li>
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >Siège social :</strong
                                >
                                Banganté, Cameroun
                            </li>
                        </ul>
                    </div>

                    <!-- Carte 2: Responsables -->
                    <div
                        class="space-y-4 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs"
                    >
                        <div
                            class="flex items-center gap-2 border-b border-[var(--border)] pb-3 text-base font-bold text-[var(--primary)]"
                        >
                            <UserCheck
                                class="h-5 w-5 shrink-0 text-[var(--royal-gold)]"
                            />
                            <h3>Responsables</h3>
                        </div>
                        <div
                            class="space-y-3 text-sm text-[var(--muted-foreground)]"
                        >
                            <div>
                                <p class="font-medium text-[var(--foreground)]">
                                    Responsable publication :
                                </p>
                                <p>
                                    Aubin Boris Simo
                                    <a
                                        href="mailto:aubinborissimotsebo@gmail.com"
                                        class="ml-1 text-[var(--primary)] hover:underline"
                                        >aubinborissimotsebo@gmail.com</a
                                    >
                                </p>
                            </div>
                            <div>
                                <p class="font-medium text-[var(--foreground)]">
                                    Webmaster :
                                </p>
                                <p>
                                    Aubin Boris Simo
                                    <a
                                        href="mailto:aubinborissimotsebo@gmail.com"
                                        class="ml-1 text-[var(--primary)] hover:underline"
                                        >237 679 13 51 77</a
                                    >
                                </p>
                            </div>
                            <div>
                                <p class="font-medium text-[var(--foreground)]">
                                    DPO :
                                </p>
                                <p>
                           Aubin Boris Simo
                                    <a
                                        href="mailto:aubinborissimotsebo@gmail.com"
                                        class="ml-1 text-[var(--primary)] hover:underline"
                                        >aubinborissimotsebo@gmail.com</a
                                    >
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte 3: Contact -->
                    <div
                        class="space-y-4 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs"
                    >
                        <div
                            class="flex items-center gap-2 border-b border-[var(--border)] pb-3 text-base font-bold text-[var(--primary)]"
                        >
                            <Phone
                                class="h-5 w-5 shrink-0 text-[var(--royal-gold)]"
                            />
                            <h3>Contact</h3>
                        </div>
                        <ul
                            class="space-y-2.5 text-sm text-[var(--muted-foreground)]"
                        >
                            <li class="flex items-center gap-2">
                                <Phone class="h-4 w-4 text-[var(--primary)]" />
                                <span>+237 696 94 33 61</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <Mail class="h-4 w-4 text-[var(--primary)]" />
                                <a
                                    href="mailto:contact@royal-service.cm"
                                    class="transition-colors hover:text-[var(--primary)]"
                                    >contact@royal-service.cm</a
                                >
                            </li>
                            <li class="flex items-center gap-2">
                                <Globe class="h-4 w-4 text-[var(--primary)]" />
                                <a
                                    href="https://royal-service.cm"
                                    target="_blank"
                                    class="text-[var(--primary)] hover:underline"
                                    >royal-service.cm</a
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- Carte 4: Hébergement -->
                    <div
                        class="space-y-4 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 shadow-xs"
                    >
                        <div
                            class="flex items-center gap-2 border-b border-[var(--border)] pb-3 text-base font-bold text-[var(--primary)]"
                        >
                            <Server
                                class="h-5 w-5 shrink-0 text-[var(--royal-gold)]"
                            />
                            <h3>Hébergement</h3>
                        </div>
                        <ul
                            class="space-y-2 text-sm text-[var(--muted-foreground)]"
                        >
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >Hébergeur :</strong
                                >
                                Notre plateforme est hébergée sur les serveurs
                                de Hostinger International Ltd, une entreprise
                                enregistrée en Europe.
                            </li>
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >Adresse :</strong
                                >
                                61 Lordou Vironos Street Lumiel Building, 4th
                                floor 6023 Larnaca, Cyprus.
                            </li>
                            <li>
                                <strong
                                    class="font-medium text-[var(--foreground)]"
                                    >Site :</strong
                                >
                                <a
                                    href="https://www.hostinger.com/"
                                    target="_blank"
                                    class="ml-1 text-[var(--primary)] hover:underline"
                                    >https://www.hostinger.com/</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- SECTION CONDITIONS GÉNÉRALES D'UTILISATION -->
            <section class="space-y-4">
                <h2
                    class="text-xl font-bold tracking-tight text-[var(--foreground)]"
                >
                    Conditions générales d'utilisation
                </h2>

                <div
                    class="space-y-3 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-6 text-sm leading-relaxed text-[var(--muted-foreground)] shadow-xs"
                >
                    <p>
                        Le site
                        <a
                            href="https://royalservice/"
                            class="text-[var(--primary)] hover:underline"
                            >https://royalservice/</a
                        >
                        est protégé par les lois sur la propriété
                        intellectuelle. Le Client s'engage à ne pas réutiliser,
                        céder ou exploiter les éléments du site à des fins
                        personnelles.
                    </p>
                    <p>
                        L'utilisation du site implique l'acceptation pleine et
                        entière des conditions générales d'utilisation décrites
                        dans nos
                        <Link
                            href="/cgu"
                            class="font-semibold text-[var(--primary)] hover:underline"
                            >CGU</Link
                        >.
                    </p>
                </div>
            </section>

            <!-- BOUTONS DE NAVIGATION BAS DE PAGE -->
            <div class="grid grid-cols-1 gap-4 pt-2 sm:grid-cols-2">
                <Link
                    href="/cgu"
                    class="group space-y-1 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-5 shadow-xs transition-all hover:border-[var(--primary)]"
                >
                    <div
                        class="flex items-center justify-between text-sm font-bold text-[var(--primary)]"
                    >
                        <span>Conditions Générales d'Utilisation</span>
                        <ArrowRight
                            class="h-4 w-4 transition-transform group-hover:translate-x-1"
                        />
                    </div>
                    <p class="text-xs text-[var(--muted-foreground)]">
                        Consultez nos conditions d'utilisation du site
                    </p>
                </Link>

                <Link
                    href="/politique-confidentialite"
                    class="group space-y-1 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-5 shadow-xs transition-all hover:border-[var(--primary)]"
                >
                    <div
                        class="flex items-center justify-between text-sm font-bold text-[var(--primary)]"
                    >
                        <span>Politique de Confidentialité</span>
                        <ArrowRight
                            class="h-4 w-4 transition-transform group-hover:translate-x-1"
                        />
                    </div>
                    <p class="text-xs text-[var(--muted-foreground)]">
                        Découvrez comment nous protégeons vos données
                    </p>
                </Link>
            </div>
        </div>
    </div>
</template>
