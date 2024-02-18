<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EncountersList from './EncountersList.vue';
defineProps({
    encounters: Object,
    players: Object,
    users: Object,
})
</script>

<template>
    <AppLayout title="Encounters">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Partidos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <EncountersList :encounters="encounters" :players="players" :users="users" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
