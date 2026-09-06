<script setup>
import PrestationShowcase from '@/components/Prestations/PrestationShowcase.vue';

const inclusions = [
    'Barmans professionnels et expérimentés pour un service de qualité',
    'Création de cocktails uniques et personnalisés selon vos préférences',
    'Large sélection d’ingrédients frais et de qualité pour des saveurs exceptionnelles',
    'Service de bar mobile pour s’adapter à tous les types d’événements',
    'Options de présentation élégantes et créatives pour vos cocktails',
    'Gestion complète du bar, y compris la préparation, le service et le nettoyage',
];
</script>

<template>
    <PrestationShowcase
        title="Bar à Cocktails"
        image-folder="barACocktails"
        description="Nous vous proposons un service de bar à cocktails pour vos événements, avec des barmans professionnels et expérimentés. Nos experts en mixologie créent des cocktails uniques et personnalisés pour ravir vos invités et ajouter une touche d'élégance à votre célébration. Que ce soit pour un mariage, un anniversaire ou un événement d'entreprise, notre équipe assure un service de qualité et une expérience mémorable."
        :inclusions="inclusions"
        whatsapp="237696943361"
    />
</template>
