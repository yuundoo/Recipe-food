<script setup>
import { ref } from 'vue';
import { usePage, Link, Head } from '@inertiajs/vue3';
import CommentModal from '@/Components/CommentModal.vue';

const page = usePage();
const recipe = ref(page.props.recipes);
defineProps({recipe : Object})
const comment = ref(page.props.comments);
const openModal = () => {
  isModalOpen.value = true;
};

const closeModal = () => {
  isModalOpen.value = false;
};

const isModalOpen = ref(false);
const canLogin = ref(false); // 사용자 로그인 상태 여부
// 사용자 로그인 상태 확인
if (page.props.auth.user) {
  canLogin.value = true;
}
</script>

<template>
  <!-- Header -->
  <Head title="Detail" />

  <header class="bg-white shadow">
    <div class="container flex items-center justify-between py-4 mx-auto">
      <Link href="#" class="text-2xl font-semibold text-indigo-600">Recipe Sharing</Link>
      <nav>
        <ul class="flex space-x-6">
          <template v-if="canLogin">
            <li class="font-semibold text-indigo-600 ">Hello! {{ $page.props.auth.user.name }}</li>
            <li>
              <button :href="route('logout')" method="post" class="text-gray-600 hover:text-indigo-600">Logout</button>
            </li>
            <li>
              <Link :href="route('profile.edit')" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Profile</Link>
            </li>
          </template>
          <!-- 사용자가 로그인하지 않은 경우 로그인 및 가입 페이지로 연결 -->
          <template v-else>
            <li>
              <Link :href="route('login')" class="mt-2 text-gray-600 hover:text-indigo-600">Login</Link>
            </li>
            <li>
              <Link :href="route('register')" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Sign Up</Link>
            </li>
          </template>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="py-16 text-white bg-indigo-600" :style="{ backgroundImage: 'url(/images/DetailCover.jpg)' }">
    <div class="container mx-auto text-center">
      <h1 class="mb-4 text-4xl font-bold">Recipe Details</h1>
      <p class="mb-8 text-lg">You can check recipe details</p>
    </div>
  </section>

  <!-- 레시피 정보 -->
  <div class="container px-4 py-8 mx-auto">
    <h1 class="mb-4 text-3xl font-semibold">{{ recipe.name }}</h1>
    <p class="text-gray-600">{{ recipe.description }}</p>
  </div>

  <!-- 이미지 표시 -->
  <div class="container w-full max-w-screen-lg mx-auto">
    <img
      :src="recipe.image_path"
      :alt="recipe.name"
      class="w-full h-auto mt-4 rounded-lg"
    >
  </div>

  <!-- 댓글 버튼 -->
  <div class="container p-5 mx-auto mt-8 text-center">
    <button @click="openModal"  class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
      Comments 
    </button>
  </div>

  <CommentModal :isOpen="isModalOpen" @closeModal="closeModal" />

  <template>
  

    <!-- 댓글 목록 -->
   
      <div class="mb-4">
        <h2 class="mb-2 text-xl font-semibold">댓글</h2>
        <div v-for="commentItem in comment" :key="commentItem.id" class="mb-2">
          <!-- 사용자 이름 -->
          <div class="text-lg font-semibold">{{ commentItem.name }}</div>
          <!-- 댓글 내용 -->
          <div class="text-gray-700">{{ commentItem.CommentStory }}</div>
        </div>
      </div>
   

    
  
</template>


  <!-- Footer -->
  <footer class="py-6 text-white bg-gray-900">
    <div class="container mx-auto text-center">
      <p>&copy; 2023 Recipe Sharing. All rights reserved.</p>
    </div>
  </footer>
</template>
