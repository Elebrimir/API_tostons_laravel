<script setup>
import { defineProps, defineEmits } from 'vue';
import axios from 'axios';


const props = defineProps({
    player: {
        type: Object,
        required: true,
    },
    users: { type: Object, required: true }

});

const emit = defineEmits(['close', 'submit']);

const closeModal = () => {
    emit('close');
};

// Copia los datos del jugador al formulario
const formData = {
    naf_number: props.player.naf_number,
    race: props.player.race,
    win: props.player.win,
    draw: props.player.draw,
    lose: props.player.lose,
    touchdowns: props.player.touchdowns,
    casualties: props.player.casualties,
    skulls: props.player.triple_skull,
};

const submitForm = () => {
    // Convertir los campos necesarios a enteros antes de enviar el formulario
    convertToInteger('naf_number');
    convertToInteger('win');
    convertToInteger('draw');
    convertToInteger('lose');
    convertToInteger('touchdowns');
    convertToInteger('casualties');
    convertToInteger('skulls');

    // Realizar una solicitud PUT para enviar los datos del formulario al servidor
    console.log(formData, 'datos a enviar');
    axios.put(`/api/v1/players/${props.player.id}`, {
        ...props.player, // Incluir los datos actuales del jugador
        ...formData // Incluir los datos del formulario, incluso si no han cambiado
    })
        .then(response => {
            // Manejar la respuesta del servidor
            console.log('Respuesta del servidor:', response.data);
            // Cerrar el modal o realizar cualquier otra acción necesaria después de guardar los datos
            closeModal();
            // Recargar la página para reflejar los cambios
            window.location.reload();
        })
        .catch(error => {
            // Manejar errores en caso de que la solicitud falle
            console.error('Error al enviar los datos del formulario:', error);
            // Puedes mostrar un mensaje de error al usuario si es necesario
        });
};

const convertToInteger = (fieldName) => {
    formData[fieldName] = parseInt(formData[fieldName]);
};
</script>


<template>
    <transition name="modal">
        <div class="fixed inset-0 overflow-y-auto flex items-center justify-center">
            <div class="modal-overlay fixed inset-0 bg-black opacity-50"></div>
            <div class="modal-container bg-white rounded-lg shadow-lg max-w-md mx-auto">
                <div class="modal-content p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Player: {{ users[player.user_id].nickname }}</h3>
                    </div>
                    <div class="modal-body">
                        <form id="my-form" @submit.prevent="submitForm">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <div class="mb-4">
                                        <label for="naf_number" class="block text-sm font-medium text-gray-700">Numero NAF</label>
                                        <input type="text" id="naf_number" v-model="formData.naf_number" readonly class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="race" class="block text-sm font-medium text-gray-700">Raza</label>
                                        <input type="text" id="race" v-model="formData.race" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="win" class="block text-sm font-medium text-gray-700">Victorias 👍</label>
                                        <input type="text" id="win" v-model="formData.win" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="draw" class="block text-sm font-medium text-gray-700">Empates ❌</label>
                                        <input type="text" id="draw" v-model="formData.draw" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="lose" class="block text-sm font-medium text-gray-700">Derrotas 👎</label>
                                        <input type="text" id="lose" v-model="formData.lose" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-4">
                                        <label for="touchdowns" class="block text-sm font-medium text-gray-700">Touchdowns 🏈</label>
                                        <input type="text" id="touchdowns" v-model="formData.touchdowns" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="casualties" class="block text-sm font-medium text-gray-700">Bajas 🤕</label>
                                        <input type="text" id="casualties" v-model="formData.casualties" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="mb-4">
                                        <label for="triple_skull" class="block text-sm font-medium text-gray-700">Triple Calvo 💀💀💀</label>
                                        <input type="text" id="triple_skull" v-model="formData.skulls" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-4 flex justify-end">
                                <button type="button" @click="closeModal" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-400 transition">
                                    Cancelar
                                </button>
                                <button type="submit" class="ml-3 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition">
                                    Guardar cambios
                                </button>
                            </div>
                        </form>
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
