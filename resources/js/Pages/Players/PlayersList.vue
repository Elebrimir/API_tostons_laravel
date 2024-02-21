<script setup>

import TostonetLogo from '@/Components/TostonetLogo.vue';
import PlayersFormUpdate from '@/Components/PlayersFormUpdate.vue';

defineProps({
    players: Object,
    users: Object,
})

const openModal = (player) => {
    selectedPlayer.value = player;
};

</script>

<template>
    <div>
        <div class=" grid place-items-center p-6 lg:p-8 bg_white border-b border-gray-200">
            <TostonetLogo class="block h-48 w-auto" />

            <h1 class="mt-8 text-3xl font-medium text-gray-900 border-b-4 mb-4">
                Listado de Jugadores Participantes en la Edición de la Tostons
            </h1>

            <ul role="list" class="divide-y divide-gray-200">
                <li v-for="player in players" :key="player.id" class="flex justify-between gap-x-6 py-5" style="cursor: pointer;" @click="openModal(player)">
                    <div class="flex min-w-0 gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" :src="'https://api.dicebear.com/7.x/adventurer/svg?seed=' + users[player.user_id].nickname" alt="Avatar" />
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ player.nickname }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">NAF: {{ player.naf_number }}</p>
                        </div>
                    </div>
                    <div class="flex min-w-0 gap-x-6 mt-4">
                        <p class="text-sm font-semibold leading-6 text-gray-900">🥇 / {{ player.win }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">❌ / {{ player.draw }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">👎 / {{ player.lose }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">🏈 / {{ player.touchdowns }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">🤕 / {{ player.casualties }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">💀💀💀 / {{ player.triple_skull }}</p>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end mt-4">
                        <p class="text-sm leading-6 text-gray-900">{{ player.race }}</p>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Modal de edición de jugadores -->
        <PlayersFormUpdate :player="selectedPlayer" v-if="selectedPlayer" @close="selectedPlayer = null" />



    </div>
</template>
