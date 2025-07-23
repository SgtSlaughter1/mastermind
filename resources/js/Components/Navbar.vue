<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    authUser: Object,
});
</script>

<template>
    <nav class="flex justify-between items-center px-8 py-4 bg-white dark:bg-zinc-900 shadow">
        <div class="text-2xl font-bold text-[#FF2D20]">Mastermind Gadgets</div>
        <div class="space-x-4">
            <Link :href="route('products.index')" class="text-black dark:text-white hover:underline">Shop</Link>
            <Link v-if="canLogin && !authUser" :href="route('login')" class="text-black dark:text-white hover:underline">Login</Link>
            <Link v-if="canRegister && !authUser" :href="route('register')" class="text-black dark:text-white hover:underline">Register</Link>
            <Link v-if="authUser" :href="route('dashboard')" class="text-black dark:text-white hover:underline">Dashboard</Link>
        </div>
    </nav>
</template>
