<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
    'Planification complète de l’événement, y compris la gestion du budget, la sélection du lieu et la coordination des prestataires',
    'Coordination et supervision de tous les aspects de l’événement pour assurer un déroulement fluide et sans stress',
    'Gestion des invitations, de la logistique et de la communication avec les invités',
    'Création d’un programme détaillé et d’un calendrier pour garantir le respect des délais et des horaires',
];
</script>

<template>
    <PrestationShowcase
        title="Organisation d’Événements"
        image-folder="Organisation"
        description="Nous vous proposons des services complets d'organisation d'événements pour garantir le succès de vos célébrations. Notre équipe expérimentée prend en charge la planification, la coordination et la gestion de tous les aspects de votre événement, en veillant à ce que chaque détail soit parfaitement exécuté. Que ce soit pour un mariage, un anniversaire, une conférence ou tout autre événement spécial, nous assurons une expérience mémorable et sans stress."
        highlight="Des services complets d'organisation d'événements pour garantir le succès de vos célébrations."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
