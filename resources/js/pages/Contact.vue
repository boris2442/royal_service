<script setup lang="ts">
import { ref } from 'vue';
import { Icon } from '@iconify/vue';
import {
    MessageSquare,
    Mail,
    Phone,
    MapPin,
    Clock,
    Copy,
    Check,
    Calendar,
    ArrowUpRight,
    // Linkedin,
    // Github,
    ChevronDown,
} from '@lucide/vue';

// --- Copie Email ---
const copied = ref(false);
const emailAddress = 'contact@royalservices.cm';

const copyEmail = () => {
    navigator.clipboard.writeText(emailAddress);
    copied.value = true;
    setTimeout(() => {
        copied.value = false;
    }, 2000);
};

// --- FAQ ---
const activeFaq = ref<number | null>(null);
const toggleFaq = (index: number) => {
    activeFaq.value = activeFaq.value === index ? null : index;
};

const faqs = [
    {
        q: 'Quel est le canal le plus rapide pour vous joindre ?',
        a: "WhatsApp est idéal pour une réponse immédiate. Pour des demandes formelles ou des dossiers techniques, privilégiez l'email.",
    },
    {
        q: 'Proposez-vous des rendez-vous en présentiel ?',
        a: 'Oui, sur rendez-vous dans nos locaux à Bafoussam ou Douala, ou directement via visioconférence.',
    },
    {
        q: 'Sous quel délai obtenons-nous une réponse ?',
        a: 'Nous répondons en moins de 2 heures pendant les heures ouvrées (8h00 - 18h00).',
    },
];
</script>

<template>
    <div
        class="min-h-screen bg-[var(--background)] px-4 py-16 text-[var(--foreground)] transition-colors duration-200 sm:px-6 lg:px-8"
    >
        <div class="mx-auto max-w-6xl space-y-16">
            <!-- HERO -->
            <div class="mx-auto max-w-3xl space-y-3 text-center">
                <h1 class="text-4xl font-bold tracking-tight sm:text-5xl">
                    Contactez-<span class="text-[var(--royal-gold)]">nous</span>
                </h1>
                <p class="text-base text-[var(--muted-foreground)] sm:text-lg">
                    Choisissez le canal qui vous convient le mieux pour échanger
                    sur votre projet.
                </p>
            </div>

            <!-- GRILLE DES CANAUX DIRECTS (3 CARTES PRINCIPALES) -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <!-- CARTE 1 : WHATSAPP -->
                <a
                    href="https://wa.me/237000000000?text=Bonjour,%20j'aimerais%20discuter%20d'un%20projet."
                    target="_blank"
                    class="group relative flex flex-col justify-between space-y-6 overflow-hidden rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-8 transition-all duration-300 hover:border-emerald-500/50"
                >
                    <div class="space-y-4">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-500/10 text-emerald-500"
                        >
                            <MessageSquare class="h-6 w-6" />
                        </div>
                        <div>
                            <h3
                                class="text-xl font-bold transition-colors group-hover:text-emerald-500"
                            >
                                WhatsApp Direct
                            </h3>
                            <p
                                class="mt-1 text-xs text-[var(--muted-foreground)]"
                            >
                                Réponse quasi instantanée pour échanger
                                rapidement sur votre idée.
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-between border-t border-[var(--border)] pt-4 text-sm font-semibold text-emerald-600 dark:text-emerald-400"
                    >
                        <span>Lancer la discussion</span>
                        <ArrowUpRight
                            class="h-4 w-4 transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"
                        />
                    </div>
                </a>

                <!-- CARTE 2 : EMAIL DIRECT & COPIE -->
                <div
                    class="group flex flex-col justify-between space-y-6 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-8 transition-all duration-300 hover:border-[var(--primary)]"
                >
                    <div class="space-y-4">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-[var(--primary)]/10 text-[var(--primary)]"
                        >
                            <Mail class="h-6 w-6" />
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">
                                Courrier Électronique
                            </h3>
                            <p
                                class="mt-1 text-xs text-[var(--muted-foreground)]"
                            >
                                Pour les cahiers des charges, demandes d'offres
                                et documents.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-3 border-t border-[var(--border)] pt-4">
                        <div
                            class="flex items-center justify-between rounded-md border border-[var(--border)] bg-[var(--background)] p-2.5"
                        >
                            <span
                                class="truncate font-mono text-xs font-medium"
                                >{{ emailAddress }}</span
                            >
                            <button
                                @click="copyEmail"
                                type="button"
                                class="rounded-full p-1.5 text-[var(--muted-foreground)] transition-colors hover:bg-[var(--card)] hover:text-[var(--foreground)]"
                                :title="copied ? 'Copié !' : 'Copier'"
                            >
                                <Check
                                    v-if="copied"
                                    class="h-4 w-4 text-emerald-500"
                                />
                                <Copy v-else class="h-4 w-4" />
                            </button>
                        </div>
                        <a
                            :href="`mailto:${emailAddress}`"
                            class="flex items-center justify-between text-sm font-semibold text-[var(--primary)] hover:underline"
                        >
                            <span>Ouvrir votre application mail</span>
                            <ArrowUpRight class="h-4 w-4" />
                        </a>
                    </div>
                </div>

                <!-- CARTE 3 : APPEL / RENDEZ-VOUS -->
                <a
                    href="tel:+237000000000"
                    class="group flex flex-col justify-between space-y-6 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-8 transition-all duration-300 hover:border-[var(--royal-gold)]"
                >
                    <div class="space-y-4">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-[var(--royal-gold)]/10 text-[var(--royal-gold)]"
                        >
                            <Phone class="h-6 w-6" />
                        </div>
                        <div>
                            <h3
                                class="text-xl font-bold transition-colors group-hover:text-[var(--royal-gold)]"
                            >
                                Appel Direct
                            </h3>
                            <p
                                class="mt-1 text-xs text-[var(--muted-foreground)]"
                            >
                                Disponible du Lundi au Vendredi de 08h00 à
                                18h00.
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-between border-t border-[var(--border)] pt-4 text-sm font-semibold text-[var(--royal-gold)]"
                    >
                        <span>+237 600 00 00 00</span>
                        <ArrowUpRight
                            class="h-4 w-4 transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"
                        />
                    </div>
                </a>
            </div>

            <!-- SECTION BANDEROLE INFORMATIONS (INFOS PRATIQUES & RÉSEAUX) -->
            <div
                class="grid grid-cols-1 gap-8 rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)] p-8 text-sm md:grid-cols-3"
            >
                <div class="flex items-start gap-4">
                    <div
                        class="rounded-full border border-[var(--border)] bg-[var(--background)] p-3 text-[var(--primary)]"
                    >
                        <MapPin class="h-5 w-5" />
                    </div>
                    <div>
                        <h4 class="font-semibold">Localisation</h4>
                        <p class="mt-1 text-xs text-[var(--muted-foreground)]">
                            Bafoussam & Douala, Cameroun
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div
                        class="rounded-full border border-[var(--border)] bg-[var(--background)] p-3 text-[var(--royal-gold)]"
                    >
                        <Clock class="h-5 w-5" />
                    </div>
                    <div>
                        <h4 class="font-semibold">Horaires d'ouverture</h4>
                        <p class="mt-1 text-xs text-[var(--muted-foreground)]">
                            Lun - Ven : 08h00 - 18h00
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div
                        class="rounded-full border border-[var(--border)] bg-[var(--background)] p-3 text-[var(--foreground)]"
                    >
                        <Calendar class="h-5 w-5" />
                    </div>
                    <div>
                        <h4 class="font-semibold">Suivez-nous</h4>
                        <div class="mt-2 flex items-center gap-3">
                            <a
                                href="#"
                                class="text-[var(--muted-foreground)] transition-colors hover:text-[var(--primary)]"
                            >
                                <Icon icon="mdi:linkedin" class="h-4 w-4" />
                            </a>
                            <a
                                href="#"
                                class="text-[var(--muted-foreground)] transition-colors hover:text-[var(--primary)]"
                            >
                                <Icon icon="mdi:github" class="h-4 w-4" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ MINIMALISTE -->
            <div class="mx-auto max-w-2xl space-y-4 pt-4">
                <h3 class="text-center text-lg font-bold">
                    Questions fréquentes
                </h3>

                <div class="space-y-2">
                    <div
                        v-for="(faq, index) in faqs"
                        :key="index"
                        class="overflow-hidden rounded-[var(--radius)] border border-[var(--border)] bg-[var(--card)]"
                    >
                        <button
                            @click="toggleFaq(index)"
                            type="button"
                            class="flex w-full items-center justify-between gap-4 p-4 text-left text-xs font-medium sm:text-sm"
                        >
                            <span>{{ faq.q }}</span>
                            <ChevronDown
                                class="h-4 w-4 shrink-0 text-[var(--muted-foreground)] transition-transform duration-200"
                                :class="{ 'rotate-180': activeFaq === index }"
                            />
                        </button>
                        <div
                            v-show="activeFaq === index"
                            class="border-t border-[var(--border)]/50 px-4 pt-3 pb-4 text-xs leading-relaxed text-[var(--muted-foreground)]"
                        >
                            {{ faq.a }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
