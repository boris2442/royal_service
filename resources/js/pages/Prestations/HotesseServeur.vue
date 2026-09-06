<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
    'Hôtesses et serveurs professionnels pour accueillir vos invités avec élégance',
    'Service de bar et de restauration pour vos événements',

    'Gestion de l’accueil, de l’orientation et de l’assistance aux invités',
    'Service de table, dressage et débarrassage pour une expérience sans souci',
    'Coordination avec les organisateurs pour assurer un déroulement fluide de l’événement',
    'Tenue vestimentaire adaptée à votre thématique et à votre événement',
];
</script>

<template>
    <PrestationShowcase
        title="Hôtesses & Serveurs"
        image-folder="HotesseServeur"
        description="Nous mettons à votre disposition des hôtesses et serveurs professionnels pour accompagner vos événements avec élégance et efficacité. Notre équipe assure un accueil chaleureux, un service de qualité et une parfaite prise en charge de vos invités. Que ce soit pour un mariage, une cérémonie, un événement d’entreprise ou une réception privée, nous garantissons une expérience conviviale et raffinée."
        highlight="Accueil et service haut de gamme pour vos événements."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
