<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
    'Conception et réalisation d’espaces verts sur mesure',
    'Plantation d’arbres, arbustes et fleurs pour créer des ambiances naturelles',
    'Aménagement de jardins, terrasses et espaces extérieurs pour vos événements',
    'Entretien et gestion des espaces verts pour assurer leur beauté et leur durabilité',
    'Création de chemins, allées et zones de détente pour vos invités',
    'Installation de systèmes d’irrigation et d’éclairage pour vos espaces verts',
];
</script>

<template>
    <PrestationShowcase
        title="Aménagement d’Espaces Verts"
        image-folder="GreenSpace"
        description="Nous vous proposons des services d’aménagement d’espaces verts pour vos événements. Nos experts créent des environnements naturels et attrayants, adaptés à vos besoins et à votre budget. Que ce soit pour un mariage, un anniversaire ou un événement d'entreprise, nous assurons une expérience paysagère exceptionnelle."
        highlight="Des espaces verts bien conçus pour embellir vos événements."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
