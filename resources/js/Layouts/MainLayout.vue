<script setup>
import Navbar from '../Components/Navbar.vue';
import { usePage } from '@inertiajs/vue3';
const page = usePage();
</script>

<template>
    <div class="min-h-screen flex flex-col bg-gray-50 dark:bg-black text-black dark:text-white">
        <Navbar :can-login="page.props.canLogin" :can-register="page.props.canRegister" :auth-user="page.props.auth?.user" />
        <main class="flex-1">
            <slot />
        </main>
        <footer class="py-8 text-center text-sm text-black dark:text-white/70 mt-10 w-full">
            &copy; {{ new Date().getFullYear() }} Mastermind Gadgets. All rights reserved.
        </footer>
    </div>
</template>
