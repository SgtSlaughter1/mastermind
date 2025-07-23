<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Navbar from '../../Components/Navbar.vue';
import MainLayout from '../../Layouts/MainLayout.vue';

defineProps({
    product: Object,
});

const currentImage = ref(0);
</script>

<template>
    <MainLayout>
        <Head :title="product.name" />
        <div class="min-h-screen bg-gray-50 dark:bg-black text-black dark:text-white py-10 px-4 flex flex-col items-center">
            <div class="w-full max-w-4xl bg-white dark:bg-zinc-900 rounded-lg shadow p-6 flex flex-col md:flex-row gap-8">
                <div class="flex-1 flex flex-col items-center">
                    <img :src="product.images[currentImage]" alt="Product Image" class="w-full max-w-xs h-64 object-cover rounded mb-4" />
                    <div class="flex gap-2 mt-2">
                        <img v-for="(img, idx) in product.images" :key="idx" :src="img" @click="currentImage = idx" :class="['w-14 h-14 object-cover rounded cursor-pointer border-2', currentImage === idx ? 'border-[#FF2D20]' : 'border-transparent']" />
                    </div>
                </div>
                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-bold mb-2">{{ product.name }}</h1>
                        <p class="text-md text-gray-600 dark:text-gray-300 mb-2">Category: {{ product.category?.name }}</p>
                        <p class="text-md text-gray-600 dark:text-gray-300 mb-2">Brand: {{ product.brand }}</p>
                        <p class="text-2xl font-bold text-[#FF2D20] mb-4">${{ product.price }}</p>
                        <span v-if="product.availability === 'available'" class="inline-block px-2 py-1 text-xs bg-green-100 text-green-800 rounded mb-2">Available</span>
                        <span v-else-if="product.availability === 'unavailable'" class="inline-block px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded mb-2">Unavailable</span>
                        <span v-else class="inline-block px-2 py-1 text-xs bg-red-100 text-red-800 rounded mb-2">Discontinued</span>
                        <p class="mt-4 text-gray-700 dark:text-gray-200">{{ product.description }}</p>
                    </div>
                    <div class="mt-8">
                        <Link :href="route('products.index')" class="px-6 py-2 bg-[#FF2D20] text-white rounded hover:bg-[#e62a1c] transition">Back to Products</Link>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
