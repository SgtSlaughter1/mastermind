<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '../Components/Navbar.vue';
import { ref, onMounted } from 'vue';
import ProductCard from '../Components/ProductCard.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    products: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Array,
        default: () => [],
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

const banners = ref([
    {
        id: 1,
        title: 'Summer Sale!',
        subtitle: 'Up to 30% off on select gadgets',
        bg: 'from-[#FF2D20]/80 to-[#FFB020]/80',
    },
    {
        id: 2,
        title: 'New Arrivals',
        subtitle: 'Check out the latest accessories',
        bg: 'from-[#1E90FF]/80 to-[#00C9A7]/80',
    },
    {
        id: 3,
        title: 'Top Brands',
        subtitle: 'Shop trusted brands at great prices',
        bg: 'from-[#6D28D9]/80 to-[#FF2D20]/80',
    },
]);
const currentBanner = ref(0);
let interval = null;

onMounted(() => {
    interval = setInterval(() => {
        currentBanner.value = (currentBanner.value + 1) % banners.value.length;
    }, 4000);
});
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen">
        <Navbar :can-login="canLogin" :can-register="canRegister" :auth-user="$page.props.auth?.user" />
        <section class="flex flex-col items-center justify-center py-16 bg-gradient-to-r from-[#FF2D20]/10 to-[#FF2D20]/5">
            <h1 class="text-4xl font-extrabold mb-4 text-black dark:text-white">Welcome to Mastermind Gadgets</h1>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">Your one-stop shop for the latest gadgets and accessories</p>
            <Link :href="route('products.index')" class="px-6 py-3 bg-[#FF2D20] text-white rounded shadow hover:bg-[#e62a1c] transition">Shop Now</Link>
        </section>
        <section class="w-full flex justify-center items-center py-4">
            <div
                class="w-full max-w-4xl rounded-lg shadow-lg text-white px-8 py-6 transition-all duration-700 bg-gradient-to-r"
                :class="banners[currentBanner].bg"
            >
                <h2 class="text-2xl font-bold mb-1">{{ banners[currentBanner].title }}</h2>
                <p class="text-lg">{{ banners[currentBanner].subtitle }}</p>
                    </div>
        </section>
        <section class="max-w-7xl mx-auto px-4 mb-12">
            <h2 class="text-2xl font-bold mb-4 text-black dark:text-white">Shop by Category</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <Link v-for="category in categories" :key="category.id" :href="`/products?category=${category.slug}`" class="block bg-white dark:bg-zinc-900 rounded-lg shadow p-4 text-center hover:ring-2 hover:ring-[#FF2D20] transition">
                    <span class="text-lg font-semibold text-black dark:text-white">{{ category.name }}</span>
                            </Link>
                            </div>
        </section>
        <main class="mt-6 max-w-7xl mx-auto px-4">
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-black dark:text-white">Featured Products</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <ProductCard v-for="product in products" :key="product.id" :product="product" />
                        </div>
                    </div>
                </main>
        <section class="max-w-7xl mx-auto px-4 mb-12">
            <h2 class="text-2xl font-bold mb-4 text-black dark:text-white">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-zinc-900 rounded-lg shadow p-6 flex flex-col items-center">
                    <span class="text-4xl mb-2">⭐️⭐️⭐️⭐️⭐️</span>
                    <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">"Great selection and fast delivery! Highly recommend Mastermind Gadgets."</p>
                    <span class="font-semibold text-black dark:text-white">- Alex J.</span>
                </div>
                <div class="bg-white dark:bg-zinc-900 rounded-lg shadow p-6 flex flex-col items-center">
                    <span class="text-4xl mb-2">⭐️⭐️⭐️⭐️⭐️</span>
                    <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">"Customer service was top-notch. Will shop again!"</p>
                    <span class="font-semibold text-black dark:text-white">- Priya S.</span>
                </div>
                <div class="bg-white dark:bg-zinc-900 rounded-lg shadow p-6 flex flex-col items-center">
                    <span class="text-4xl mb-2">⭐️⭐️⭐️⭐️⭐️</span>
                    <p class="text-gray-700 dark:text-gray-300 mb-2 text-center">"Best prices on the latest gadgets. Trustworthy and reliable."</p>
                    <span class="font-semibold text-black dark:text-white">- Michael T.</span>
                </div>
            </div>
            <div class="flex justify-center gap-8 mt-8">
                <img src="/img/trust-badge-1.png" alt="Secure Checkout" class="h-10" />
                <img src="/img/trust-badge-2.png" alt="Fast Shipping" class="h-10" />
                <img src="/img/trust-badge-3.png" alt="Money Back Guarantee" class="h-10" />
        </div>
        </section>
        <section class="max-w-2xl mx-auto px-4 mb-12">
            <h2 class="text-2xl font-bold mb-4 text-black dark:text-white text-center">Subscribe to Our Newsletter</h2>
            <form class="flex flex-col sm:flex-row gap-4 items-center justify-center">
                <input type="email" placeholder="Enter your email" class="w-full sm:w-auto px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-[#FF2D20]" required />
                <button type="submit" class="px-6 py-2 bg-[#FF2D20] text-white rounded hover:bg-[#e62a1c] transition">Subscribe</button>
            </form>
        </section>
        <footer class="py-8 text-center text-sm text-black dark:text-white/70 mt-10">
            &copy; {{ new Date().getFullYear() }} Mastermind Gadgets. All rights reserved.
        </footer>
    </div>
</template>
