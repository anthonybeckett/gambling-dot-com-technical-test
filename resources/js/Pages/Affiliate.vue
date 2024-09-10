<script setup>
const props = defineProps({
    'affiliates': Object
});
</script>

<template>
    <section>
        <h1>Affiliates within 100Km of Gambling HQ</h1>

        <div v-for="affiliate in props.affiliates">
            <v-card :text="`${affiliate.affiliateId} - ${affiliate.name} - ${affiliate.distance.toFixed(2)} Km`"></v-card>
        </div>
    </section>
</template>

<style scoped>

</style>
