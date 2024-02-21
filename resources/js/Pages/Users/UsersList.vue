<script setup>

import TostonetLogo from '@/Components/TostonetLogo.vue';
import PlayersFormUpdate from '@/Components/PlayersFormUpdate.vue';

defineProps({
    users: Object,
})


</script>

<template>
    <div>
        <div class=" grid place-items-center p-6 lg:p-8 bg_white border-b border-gray-200">
            <TostonetLogo class="block h-48 w-auto" />

            <h1 class="mt-8 text-3xl font-medium text-gray-900 border-b-4 mb-4">
                Listado de Usuarios Registrados
            </h1>

            <ul role="list" class="divide-y divide-gray-200">
                <li v-for="user in users" :key="user.id" class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-6 mt-4">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Nombre: {{ user.name }}</p>
                        <p class="text-sm font-semibols leading-6 text-gray-900">Apellidos: {{ user.surname }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-500">Nick NAF: {{ user.nickname }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">Email: {{ user.email }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">Teléfono: {{ user.email }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">Rol: {{ user.roles }}</p>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Modal de edición de Usuarios -->
        <PlayersFormUpdate :player="selectedPlayer" v-if="selectedPlayer" @close="selectedPlayer = null" />
    </div>
</template>
