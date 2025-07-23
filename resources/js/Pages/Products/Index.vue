<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ProductCard from '../../Components/ProductCard.vue';
import Navbar from '../../Components/Navbar.vue';
import MainLayout from '../../Layouts/MainLayout.vue';
defineProps({
    products: Object,
});
</script>

<template>
    <MainLayout>
        <Head title="All Products" />
        <div class="min-h-screen bg-gray-50 dark:bg-black text-black dark:text-white py-10 px-4 flex flex-col items-center">
            <h1 class="text-3xl font-bold mb-8">All Products</h1>
            <div class="w-full max-w-7xl grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <ProductCard v-for="product in products.data" :key="product.id" :product="product" />
            </div>
            <div class="flex gap-2 mt-4">
                <Link v-for="link in products.links" :key="link.label" :href="link.url || '#'" :class="['px-3 py-1 rounded', link.active ? 'bg-[#FF2D20] text-white' : 'bg-white dark:bg-zinc-900 text-black dark:text-white border']" :disabled="!link.url">
                    <span v-html="link.label" />
                </Link>
            </div>
        </div>
    </MainLayout>
</template>
