<script setup>

import TostonetLogo from '@/Components/TostonetLogo.vue';

defineProps({
    users: Object,
})


</script>

<template>
    <div>
        <div class=" grid place-items-center p-6 lg:p-8 bg_white border-b border-gray-200">
            <TostonetLogo class="block h-48 w-auto" />

            <h1 class="mt-8 text-3xl font-medium text-gray-900 border-b-4 mb-4">
                Lista de Usuarios Registrados
            </h1>
            <ul role="list" class="divide-y divide-gray-300">
                <li v-for="user in users" :key="user.id" class="justify-between gap-x-5 py-5">
                    <div class="flex min-w-0 gap-x-6 mt-4">
                        <div class="flex flex-col">
                            <p class="text-sm font-semibold leading-6 text-gray-900 px-1 py-1">Nombre:</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900 px-1 py-1">Apellidos:</p>
                            <p class="text-sm font-semibold leading-6 text-gray-500 px-1 py-1">Nick NAF:</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900 px-1 py-1">Email:</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900 px-1 py-1">Teléfono:</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900 px-1 py-1">Rol:</p>
                        </div>
                        <div class="flex flex-col">
                            <input v-model="user.name" class="border rounded-md px-1 py-1">
                            <input v-model="user.surname" class="border rounded-md px-1 py-1">
                            <input v-model="user.nickname" class="border rounded-md px-1 py-1">
                            <input v-model="user.email" class="border rounded-md px-1 py-1">
                            <input v-model="user.phoneNumber" class="border rounded-md px-1 py-1">
                            <input v-model="user.roles" class="border rounded-md px-1 py-1">
                        </div>
                    </div>
                    <div class="flex justify-center mt-4">
                        <button @click="guardarCambios(user)" class="flex-row bg-green-600 text-white px-3 py-1 rounded-md w-36 hover:bg-green-400">Guardar</button>
                        <button @click="eliminarUsuario(user)" class="flex-row bg-red-600 text-white px-3 py-1 rounded-md w-36 hover:bg-red-400">Eliminar</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

const userId = 34;

export default {
    methods: {
        async guardarCambios(user) {
            axios.put(`/api/v1/users/${user.id}`, { ...user, user_id: userId })
                .then(response => {
                    console.log('Cambios guardados correctamente');
                    // Puedes actualizar la lista de usuarios o realizar cualquier otra acción necesaria después de guardar los cambios
                })
                .catch(error => {
                    if (error.response) {
                        // El servidor respondió con un código de estado diferente de 2xx
                        console.error('Error al guardar los cambios:', error.response.data);
                        // Puedes mostrar un mensaje de error al usuario
                        alert('Error al guardar los cambios: ' + error.response.data.message);
                    } else if (error.request) {
                        // La solicitud se realizó pero no se recibió respuesta
                        console.error('No se recibió respuesta del servidor');
                        // Puedes mostrar un mensaje de error genérico al usuario
                        alert('No se recibió respuesta del servidor');
                    } else {
                        // Hubo un error al configurar la solicitud
                        console.error('Error al configurar la solicitud:', error.message);
                        // Puedes mostrar un mensaje de error genérico al usuario
                        alert('Error al configurar la solicitud: ' + error.message);
                    }
                });
        },
        async eliminarUsuario(user) {
            try {
                const response = await axios.delete(`/api/v1/users/${user.id}`);
                console.log('Usuario eliminado correctamente:', response.data);
                // Aquí puedes actualizar la lista de usuarios u realizar cualquier otra acción necesaria después de eliminar el usuario
            } catch (error) {
                console.error('Error al eliminar el usuario:', error);
                if (error.response) {
                    // El servidor respondió con un código de estado diferente de 2xx
                    alert('Error al eliminar el usuario: ' + error.response.data.message);
                } else if (error.request) {
                    // La solicitud se realizó pero no se recibió respuesta
                    alert('No se recibió respuesta del servidor al eliminar el usuario');
                } else {
                    // Hubo un error al configurar la solicitud
                    alert('Error al configurar la solicitud para eliminar el usuario: ' + error.message);
                }
            }
        }
    }
};
</script>
