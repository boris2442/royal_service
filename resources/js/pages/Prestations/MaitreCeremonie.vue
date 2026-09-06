<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
    'Maîtres de cérémonie expérimentés pour orchestrer vos événements avec professionnalisme et charisme',
    'Coordination et gestion du déroulement de l’événement pour une expérience fluide et mémorable',
    'Animation et prise de parole pour captiver vos invités et créer une ambiance conviviale',
    'Gestion des imprévus et adaptation aux besoins de l’événement pour assurer son succès',
];
</script>

<template>
    <PrestationShowcase
        title="Maitre de Cérémonie"
        image-folder="MaitreCeremonie"
        description="Nous mettons à votre disposition des maîtres de cérémonie expérimentés pour orchestrer vos événements avec professionnalisme et charisme. Nos maîtres de cérémonie assurent la coordination, l’animation et la gestion du déroulement de votre événement, garantissant une expérience mémorable pour vous et vos invités."
        highlight="Orchestration et animation professionnelle pour vos événements."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
