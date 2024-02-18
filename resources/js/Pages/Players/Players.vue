<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PlayersList from './PlayersList.vue';
</script>

<template>
    <AppLayout title="Players">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Players
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <PlayersList />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
