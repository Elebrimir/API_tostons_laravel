<script setup>

import TostonetLogo from '@/Components/TostonetLogo.vue';

defineProps({
    encounters: Object,
    players: Object,
    users: Object,
})

</script>

<template>
    <div>
        <div class=" grid place-items-center p-6 lg:p-8 bg_white border-b border-gray-200">
            <TostonetLogo class="block h-48 w-auto" />

            <h1 class="mt-8 text-3xl font-medium text-gray-900 border-b-4 mb-4">
                Listado de Partidas por Ronda de la Tostons Bowl
            </h1>

            <ul role="list" class="divide-y divide-gray-200">
                <li v-for="encounter in encounters" :key="encounter.id" class="flex justify-between gap-x-6 py-5">
                    <div class="p-5 border border-spacing-1 rounded-2xl shadow-md">
                        <div v-if="players[encounter.player1_id]" class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" :src="'https://api.dicebear.com/7.x/adventurer/svg?seed=' + users[players[encounter.player1_id].user_id].nickname" alt="Avatar" />
                            <div v-if="players[encounter.player1_id]" class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ users[players[encounter.player1_id].user_id].nickname }}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">NAF: {{ players[encounter.player1_id].naf_number }}</p>
                            </div>
                        </div>
                        <div v-if="players[encounter.player1_id]" class="flex min-w-0 gap-x-6 mt-4">
                            <p class="text-sm font-semibold leading-6 text-gray-900">🥇 / {{ players[encounter.player1_id].win }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">❌ / {{ players[encounter.player1_id].draw }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">👎 / {{ players[encounter.player1_id].lose }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">🏈 / {{ players[encounter.player1_id].touchdowns }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">🤕 / {{ players[encounter.player1_id].casualties }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">💀💀💀 / {{ players[encounter.player1_id].triple_skull }}</p>
                        </div>
                        <div v-if="players[encounter.player1_id]" class="hidden shrink-0 sm:flex sm:flex-col sm:items-end mt-4">
                            <p class="text-sm leading-6 text-gray-900">{{ players[encounter.player1_id].race }}</p>
                        </div>
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="text-2xl font-bold">
                            <p class="text-lg font-bold text-center">VERSUS</p>
                            <p class="text-sm font-semibold text-center">Mesa {{ encounter.table }}</p>
                            <p class="text-sm font-semibold text-center">Ronda {{ encounter.round_id }}</p>
                            <button class="middle none center my-4 rounded-lg bg-red-500 py-3 px-5 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true" @click="$inertia.delete(`/partidos/${encounter.id}`)">
                                Borrar
                            </button>
                        </div>
                    </div>

                    <div class="p-5 border border-spacing-1 rounded-2xl shadow-md">
                        <div v-if="players[encounter.player2_id]" class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" :src="'https://api.dicebear.com/7.x/adventurer/svg?seed=' + users[players[encounter.player2_id].user_id].nickname" alt="Avatar" />
                            <div v-if="players[encounter.player2_id]" class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ users[players[encounter.player2_id].user_id].nickname }}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">NAF: {{ players[encounter.player2_id].naf_number }}</p>
                            </div>
                        </div>
                        <div v-if="players[encounter.player2_id]" class="flex min-w-0 gap-x-6 mt-4">
                            <p class="text-sm font-semibold leading-6 text-gray-900">🥇 / {{ players[encounter.player2_id].win }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">❌ / {{ players[encounter.player2_id].draw }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">👎 / {{ players[encounter.player2_id].lose }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">🏈 / {{ players[encounter.player2_id].touchdowns }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">🤕 / {{ players[encounter.player2_id].casualties }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900">💀💀💀 / {{ players[encounter.player2_id].triple_skull }}</p>
                        </div>
                        <div v-if="players[encounter.player2_id]" class="hidden shrink-0 sm:flex sm:flex-col sm:items-end mt-4">
                            <p class="text-sm leading-6 text-gray-900">{{ players[encounter.player2_id].race }}</p>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</template>


