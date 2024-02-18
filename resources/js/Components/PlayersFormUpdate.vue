<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    player: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(['close', 'submit']);

const closeModal = () => {
    emit('close');
};

const submitForm = async () => {

    console.log(formData);

    const formData = {
        nafNumber: props.player.naf_number,
        race: props.player.race,
        wins: props.player.win,
        draws: props.player.draw,
        loses: props.player.lose,
        touchdowns: props.player.touchdowns,
        casualties: props.player.casualties,
        skulls: props.player.triple_skull,
    };

    try {
        const response = await fetch(`/v1/players/${props.player.id}`, {
            method: 'PUT', // Use PUT method for updating the player
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        });

        if (!response.ok) {
            throw new Error('Failed to update player');
        }

        closeModal();
        emit('submit');

    } catch (error) {
        console.error('Error updating player:', error);
    }
};

// Copia los datos del jugador al formulario
const formData = {
    nafNumber: props.player.naf_number,
    race: props.player.race,
    wins: props.player.win,
    draws: props.player.draw,
    loses: props.player.lose,
    touchdowns: props.player.touchdowns,
    casualties: props.player.casualties,
    skulls: props.player.triple_skull,
};

</script>

<template>
    <transition name="modal">
        <div class="fixed inset-0 overflow-y-auto flex items-center justify-center">
            <div class="modal-overlay fixed inset-0 bg-black opacity-50"></div>
            <div class="modal-container bg-white rounded-lg shadow-lg max-w-md mx-auto">
                <div class="modal-content p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Player: {{ player.nickname }}</h3>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitForm">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Numero NAF</label>
                                        <input type="text" id="naf_number" v-model="formData.nafNumber" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Raza</label>
                                        <input type="text" id="race" v-model="formData.race" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Victorias</label>
                                        <input type="text" id="win" v-model="formData.wins" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Empates</label>
                                        <input type="text" id="draw" v-model="formData.draws" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Derrotas</label>
                                        <input type="text" id="lose" v-model="formData.loses" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Touchdowns</label>
                                        <input type="text" id="touchdowns" v-model="formData.touchdowns" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Bajas</label>
                                        <input type="text" id="casualties" v-model="formData.casualties" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nafNumber" class="block text-sm font-medium text-gray-700">Triple Calvo</label>
                                        <input type="text" id="triple_skull" v-model="formData.skulls" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer mt-4 flex justify-end">
                        <button type="button" @click="closeModal" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-400 transition">
                            Cancelar
                        </button>
                        <button type="submit" form="my-form" class="ml-3 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition">
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>


<style scoped>
.modal-overlay {
    z-index: 9999;
}

.modal-container {
    z-index: 10000;
}
</style>
