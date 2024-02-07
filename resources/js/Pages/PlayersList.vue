<script setup>

import { ref, onMounted } from 'vue';

const players = ref([]);

onMounted(async () => {
    try {
        const response = await fetch('/api/v1/players-with-users');
        if (!response.ok) {
            throw new Error('Failed to fetch players');
        }
        const data = await response.json();
        players.value = data;
    } catch (error) {
        console.error(error);
    }
});

</script>

<template>
    <div class="container mx-auto p-10 bg-slate-500 rounded-md">
        <p class=" text-5xl font-bold text-center m-5">LLISTAT DE JUGADORS</p>
        <table class="table-auto border-2 mx-auto rounded-md w-full">
            <thead>
                <tr class="border-2 text-center">
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Nickname</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Nr. NAF</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Raza</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Victorias</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Empates</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Derrotas</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Puntos</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Touchdowns</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Bajas</th>
                    <th class="text-center p-5 border-2 bg-slate-800 text-cyan-50">Triple Calvo</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="player in players" :key="player.id">
                    <td>{{ player.nickname }}</td>
                    <td>{{ player.naf_number }}</td>
                    <td>{{ player.race }}</td>
                    <td>{{ player.win }}</td>
                    <td>{{ player.draw }}</td>
                    <td>{{ player.lose }}</td>
                    <td>{{ player.points }}</td>
                    <td>{{ player.touchdowns }}</td>
                    <td>{{ player.casualties }}</td>
                    <td>{{ player.triple_skull }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
