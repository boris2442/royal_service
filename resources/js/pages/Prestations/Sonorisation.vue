<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
    'Système de sonorisation professionnel pour une qualité audio optimale',
    'Éclairage d’ambiance et scénographie lumineuse pour sublimer vos événements',
    'Installation et configuration du matériel audio et lumineux selon vos besoins',
    'Techniciens qualifiés pour assurer le bon fonctionnement du système pendant l’événement',
];
</script>

<template>
    <PrestationShowcase
        title="Sonorisation & Éclairage"
        image-folder="Sonorisation"
        description="Nous vous proposons des services de sonorisation et d'éclairage pour vos événements. Notre équipe expérimentée s'assure d'une qualité sonore et lumineuse optimale, créant l'atmosphère parfaite pour votre célébration."
        highlight="Une sonorisation de qualité et un éclairage adapté pour un effet maximal."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
