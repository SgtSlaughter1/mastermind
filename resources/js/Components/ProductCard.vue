<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    product: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="bg-white dark:bg-zinc-900 rounded-lg shadow p-4 flex flex-col">
        <img v-if="product.images && product.images.length" :src="product.images[0]" alt="Product Image" class="h-40 w-full object-cover rounded mb-2" />
        <div class="flex-1 flex flex-col justify-between">
            <div>
                <h3 class="text-lg font-semibold text-black dark:text-white">{{ product.name }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">{{ product.category?.name }}</p>
                <p class="text-md font-bold text-[#FF2D20] mb-2">${{ product.price }}</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">{{ product.brand }}</p>
                <div class="flex items-center mb-2">
                    <span class="text-yellow-400 mr-1">★ ★ ★ ★ ☆</span>
                    <span class="text-xs text-gray-400">(123)</span>
                </div>
                <span v-if="product.availability === 'available'" class="inline-block px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Available</span>
                <span v-else-if="product.availability === 'unavailable'" class="inline-block px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Unavailable</span>
                <span v-else class="inline-block px-2 py-1 text-xs bg-red-100 text-red-800 rounded">Discontinued</span>
            </div>
            <Link :href="`/products/${product.id}`" class="mt-4 px-4 py-2 bg-[#FF2D20] text-white rounded hover:bg-[#e62a1c] transition text-center">View Details</Link>
        </div>
    </div>
</template>
