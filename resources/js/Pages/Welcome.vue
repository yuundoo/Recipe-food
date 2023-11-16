<script setup>
import { ref } from 'vue';
import { usePage, Link, Head } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import Modal from '@/Components/Modal.vue';

const page = usePage();
const recipes = ref(page.props.recipes);
const isModalOpen = ref(false);
const canLogin = ref(false); // 사용자 로그인 상태 여부



// 사용자 로그인 상태 확인
if (page.props.auth.user) {
  canLogin.value = true;
}
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
              <Link href=# class="text-2xl font-semibold text-indigo-600">Recipe Sharing</Link>
                <nav>
                    <ul class="flex space-x-6">
              <template v-if="canLogin">
                <h4 class="mt-2 font-semibold text-indigo-600 ">Hello! {{ $page.props.auth.user.name }}</h4>
              <Link :href="route('logout')" method="post" class="mt-2 text-gray-600 hover:text-indigo-600">Logout</Link>
              <Link :href="route('profile.edit')" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Profile</Link>
            </template>
            <!-- 사용자가 로그인하지 않은 경우 로그인 및 가입 페이지로 연결 -->
            <template v-else>
              <Link :href="route('login')" class="mt-2 text-gray-600 hover:text-indigo-600">Login</Link>
              <Link :href="route('register')" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Sign Up</Link>
            </template>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-16 text-white bg-indigo-600" :style="{ backgroundImage: 'url(/images/MainCover.jpg)' }">
        <div class="container mx-auto text-center">
            <h1 class="mb-4 text-4xl font-bold">Discover Amazing Recipes</h1>
            <p class="mb-8 text-lg">Share your favorite recipes and explore new ones.</p>
            <template v-if="canLogin">
                <button @click="isModalOpen = true" :isopen="true" class="px-6 py-2 text-lg font-semibold text-indigo-600 transition duration-300 bg-white rounded-full hover:bg-indigo-700">Get Started</button>
            </template>
            <template v-else>
                <Link :href="route('login')" class="px-6 py-2 text-lg font-semibold text-indigo-600 transition duration-300 bg-white rounded-full hover:bg-indigo-700">Get Started</Link>
            </template>
           
        </div>
    </section>

    <!-- Featured Recipes -->
    <!-- Featured Recipes -->
  <section class="py-12">
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-8">
      <h2 class="text-2xl font-semibold">Featured Recipes</h2>
      <template v-if="canLogin">
        <button  @click="isModalOpen = true" :isOpen="true" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Create</button>
      </template>
     
        </div>
      
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
    <!-- Featured Recipe Cards Go Here -->
    <div v-for="(recipe, index) in recipes.data" :key="index" class="overflow-hidden bg-white rounded-lg shadow-md">
      <img :src="recipe.image_path" :alt="recipe.name" class="object-cover w-full h-40">
      <div class="p-4">
        <h3 class="mb-2 text-xl font-semibold">{{ recipe.name }}</h3>
        <Link :href="route('recipes.show', { id: recipe.id })">View Recipe</Link>
        <!-- 추가적인 레시피 정보를 표시할 수도 있습니다. -->
      </div>
        </div>
      </div>
      <!-- 페이지네이션 컨트롤 -->
      <div class="mt-8">
        <Pagination :links="recipes.links"></Pagination>
      </div>
    </div>
    </section>

    <Modal :isOpen="isModalOpen" @close="isModalOpen = false" />

    <!-- Footer -->
    <footer class="py-6 text-white bg-gray-900">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Recipe Sharing. All rights reserved.</p>
        </div>

        
    </footer>
</body>
</html>

</template>

