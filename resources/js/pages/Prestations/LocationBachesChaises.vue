<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
    'Chaises pliantes, Chiavari, Napoléon et modèles banquet',
    'Bâches étanches et tentes de réception ajustables',
    'Housses de chaises et nœuds décoratifs assortis',
    'Tables rondes, rectangulaires et mange-debout',
    'Nappes et chemins de table élégants',
    'Livraison, montage et démonstration sur site',
    'Tarifs dégressifs selon la quantité commandée',
];
</script>

<template>
    <PrestationShowcase
        title="Location de Chaises & Bâches"
        image-folder="locationBachesandChaires"
        description="Louez des chaises confortables et élégantes ainsi que des bâches étanches pour vos cérémonies et réceptions. Du mobilier classique au design moderne, nous proposons différents styles pour s'adapter à votre thématique. Livraison, installation et récupération incluses."
        highlight="Large choix de chaises, bâches et mobilier pour équiper vos événements avec style."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
