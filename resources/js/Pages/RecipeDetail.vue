<script setup>
import { ref } from 'vue';
import { usePage, Link, Head } from '@inertiajs/vue3';

const page = usePage();
const recipe = ref(page.props.recipe);



console.log(recipe.value.name);
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
                <a href="#" class="text-2xl font-semibold text-indigo-600">Recipe Sharing</a>
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
    <section class="py-16 text-white bg-indigo-600" :style="{ backgroundImage: 'url(/images/DetailCover.jpg)' }">
        <div class="container mx-auto text-center">
            <h1 class="mb-4 text-4xl font-bold">Recipe Details</h1>
            <p class="mb-8 text-lg">You can check recipe details</p>
        </div>
    </section>

    <template>
  <!-- 레시피 정보 -->
  <div>
    <h1 class="mb-2 text-3xl font-semibold">{{ recipe.name }}</h1>
    <p class="text-gray-600">{{ recipe.description }}</p>
  </div>

  <!-- 이미지 표시 -->
  <img :src="recipe.image_path" :alt="recipe.name" class="w-full h-auto mt-4 rounded-lg">
</template>

   

    <!-- Footer -->
    <footer class="py-6 text-white bg-gray-900">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Recipe Sharing. All rights reserved.</p>
        </div>

        
    </footer>
</body>
</html>

</template>

