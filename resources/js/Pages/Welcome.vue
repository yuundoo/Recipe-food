<script setup>
import { Head, Link } from '@inertiajs/vue3';

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
});
</script>

<template>
    <Head title="Welcome" />

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container py-4 mx-auto">
            <div class="flex items-center justify-between">
                <a href="#" class="text-2xl font-semibold text-indigo-600">Recipe Sharing</a>
                <nav>
                    <ul class="flex space-x-6">
                        <Link :href="route('login')" class="mt-2 text-gray-600 hover:text-indigo-600">Home</Link>
                        <Link :href="route('login')" class="mt-2 text-gray-600 hover:text-indigo-600">Recipes</Link>
                        <Link :href="route('login')" class="mt-2 text-gray-600 hover:text-indigo-600">Categories</Link>
                        <Link :href="route('login')" class="mt-2 text-gray-600 hover:text-indigo-600">Login</Link>
                        <Link :href="route('register')" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Sign Up</Link>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 text-white bg-indigo-600">
        <div class="container mx-auto text-center">
            <h1 class="mb-4 text-4xl font-bold">Discover Amazing Recipes</h1>
            <p class="mb-8 text-lg">Share your favorite recipes and explore new ones.</p>
            <a href="#" class="px-6 py-2 text-lg font-semibold text-indigo-600 transition duration-300 bg-white rounded-full hover:bg-indigo-700">Get Started</a>
        </div>
    </section>

    <!-- Featured Recipes -->
    <section class="py-12">
        <div class="container mx-auto">
            <h2 class="mb-8 text-2xl font-semibold">Featured Recipes</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
                <!-- Featured Recipe Cards Go Here -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 text-white bg-gray-900">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Recipe Sharing. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

</template>

