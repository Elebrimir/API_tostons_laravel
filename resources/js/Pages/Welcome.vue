<script setup>
import TostonetLogo2 from '@/Components/TostonetLogo2.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Bienvenidos" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">


        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <TostonetLogo2 class="block h-56 w-auto"/>
            </div>
            <div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white sm:text-6xl md:text-8xl py-7 text-center" style="text-shadow: 0 12px 14px rgba(0, 0, 0, 0.5);">
                    TOSTONS WEB
                </h1>
            </div>

            <div v-if="canLogin" class="flex justify-center p-6 text-end z-10">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-2xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-600">Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')" class="font-semibold text-2xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-600">Log in</Link>

                    <Link v-if="canRegister" :href="route('register')" class="ms-4 font-semibold text-2xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-600">Register</Link>
                </template>
            </div>

            <footer class="fixed bottom-0 left-0 w-full bg-white dark:bg-gray-800 py-4">
                <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-start">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/Elebrimir/API_tostons_laravel" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px me-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor me with a cup of coffee
                            </a>
                        </div>
                    </div>

                    <div class="ms-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-end sm:ms-0">
                        <p class="flex p-2 ">
                            <a class="mx-2" href="https://img.shields.io/github/license/Elebrimir/API_tostons_laravel?style=plastic&labelColor=%23333333">
                                <img src="https://img.shields.io/github/license/Elebrimir/API_tostons_laravel?style=plastic&labelColor=%23333333" alt="License">
                            </a>
                            <a class="mx-2" href="https://img.shields.io/github/languages/top/Elebrimir/API_tostons_laravel?style=plastic">
                                <img src="https://img.shields.io/github/languages/top/Elebrimir/API_tostons_laravel?style=plastic" alt="commits">
                            </a>
                            <a class="mx-2" href="https://img.shields.io/github/commit-activity/t/Elebrimir/API_tostons_laravel?style=plastic&logo=git&logoColor=orange&labelColor=%23333333&color=orange">
                                <img src="https://img.shields.io/github/commit-activity/t/Elebrimir/API_tostons_laravel?style=plastic&logo=git&logoColor=orange&labelColor=%23333333&color=orange" alt="commits">
                            </a>
                            <a class="mx-2" href="https://img.shields.io/github/last-commit/Elebrimir/API_tostons_laravel/main?display_timestamp=committer&style=plastic&logo=github&labelColor=%23333333">
                                <img src="https://img.shields.io/github/last-commit/Elebrimir/API_tostons_laravel/main?display_timestamp=committer&style=plastic&logo=github&labelColor=%23333333&color=yellow" alt="commits">
                            </a>
                        </p>
                    </div>

                    <div class="ms-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-end sm:ms-0">
                        Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-color: rgb(255 255 55 / var(--tw-bg-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-color: rgb(31 41 55 / 90%);
    }
}
</style>
