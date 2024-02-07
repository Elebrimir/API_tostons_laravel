<script setup>

import { useForm } from '@inertiajs/vue3';

const form = useForm({
    naf_number: '',
    race: '',
    win: 0,
    draw: 0,
    lose: 0,
    touchdowns: 0,
    casualties: 0,
    triple_skull: 0,
});

defineProps({
    player: Array,
});

</script>

<template>
    <h1> Crear un Jugador </h1>

    <form @submit.prevent="form.post('/v1/players')">
        <div>
            <label for="naf_number">Numero NAF</label>
            <input type="text" v-model="form.naf_number" placeholder="naf" id="naf_number" />
        </div>

        <div>
            <label for="race">Raza</label>
            <input type="text" v-model="form.race" placeholder="Raza" id="race" />
        </div>

        <div>
            <label for="win">Victorias</label>
            <input type="number" v-model="form.win" placeholder="Victorias" id="win" />
        </div>

        <div>
            <label for="draw">Empates</label>
            <input type="number" v-model="form.draw" placeholder="Empates" id="draw" />
        </div>

        <div>
            <label for="lose">Derrotas</label>
            <input type="number" v-model="form.lose" placeholder="Derrotas" id="lose" />
        </div>

        <div>
            <label for="touchdowns">Touchdowns</label>
            <input type="number" v-model="form.precio" placeholder="Touchdowns" id="touchdowns" />
        </div>

        <div>
            <label for="casualties">Bajas</label>
            <input type="number" v-model="form.precio" placeholder="Bajas" id="casualties" />
        </div>

        <div>
            <label for="triple_skull">Triples Calvo</label>
            <input type="number" v-model="form.precio" placeholder="Triples Calvo" id="triple_skull" />
        </div>

        <button type="submit" :disabled="form.processing">Crear Jugador</button>
    </form>
</template>
