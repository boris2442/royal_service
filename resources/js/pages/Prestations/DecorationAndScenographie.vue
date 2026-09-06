<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
   'Conception et réalisation de décors sur mesure',
   'Mise en place de scénographies pour événements',
   'Décoration florale et arrangements personnalisés',
   'Design d’éclairage et d’ambiance pour sublimer vos espaces',

];
</script>

<template>
    <PrestationShowcase
        title="Décoration & Scénographie"
        image-folder="DécorationAndScenographie"
        description="Nous vous proposons des services de décoration et de scénographie pour transformer vos espaces en lieux uniques et mémorables. Que ce soit pour des mariages, des événements d'entreprise ou des fêtes privées, notre équipe créative travaille avec vous pour concevoir des ambiances sur mesure qui reflètent votre style et vos besoins."
        highlight="Création d'ambiances uniques et personnalisées pour vos événements."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
