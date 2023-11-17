<script setup>
import { ref, computed } from 'vue';
import { usePage, Link, Head, router } from '@inertiajs/vue3';

const page = usePage();
const recipe = ref(page.props.recipes);
defineProps({recipe : Object})
const comments = ref(page.props.comments);
const showCommentForm = ref(false);
const textarea = ref(null);
const commentStory = ref('')
const textareaInput = (e) => {
      // textarea 높이 조정
      e.target.style.height = 'auto';
      e.target.style.height = `${e.target.scrollHeight}px`;
    };
const canLogin = ref(false); // 사용자 로그인 상태 여부
// 사용자 로그인 상태 확인
if (page.props.auth.user) {
  canLogin.value = true;
}

const closeMessageBox = () => {
  showCommentForm.value = false
  commentStory.value = ''
}

const submitComment = () => {
  if (!commentStory.value) return

  const formData = new FormData()

  formData.append('commentStory', commentStory.value)
  router.post('/comments/store', formData);
  
  showCommentForm.value = false; // 댓글 제출 후 폼 숨기기
  commentStory.value = ''; // 댓글 제출 후 댓글 입력란 비우기
 
};

</script>



<template>
  <!-- Header -->
  <Head title="Detail" />
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  </head>
  <header class="bg-white shadow">
    <div class="container flex items-center justify-between py-4 mx-auto">
      <Link href="/" class="text-2xl font-semibold text-indigo-600">Recipe Sharing</Link>
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
<div class="container p-3 mx-auto mt-8 text-center">
    <div class="flex justify-center space-x-4">
      <!-- Like button -->
      <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none">
        <i class="fas fa-thumbs-up"></i> Like
      </button>
      <!-- Comment button -->
      <button @click="showCommentForm = !showCommentForm" class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none">
        <i class="fas fa-comment"></i> Comments
      </button>
      <!-- Share button -->
      <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none">
        <i class="fas fa-share"></i> Share
      </button>
    </div>
  </div>
  
  <!-- Comment Form -->
  <div v-if="showCommentForm" class="container mx-auto mt-4">
    <form @submit.prevent="submitComment" class="max-w-xl mx-auto">
      <textarea v-model="commentStory" :onInput="textareaInput" placeholder="Write a comment..." class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="4"></textarea>
      
      <button type="submit" :disabled="!commentStory" class="px-4 py-2 mt-3 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Post Comment
      </button>
    </form>
  </div>

  <div class="max-w-2xl mx-auto">
    <div v-for="comment in comments"  :key="comment.id" class="p-4 mb-4 bg-white rounded shadow">
      <div class="mb-2">
        <span class="text-sm font-semibold text-gray-900">{{ comment.name }}</span>
        <span class="text-xs text-gray-500">{{ comment.timestamp }}</span>
      </div>
      <p class="mb-4 text-gray-700">
        {{ comment.commentStory }}
      </p>
      <div class="flex items-center space-x-2">
        <button class="flex items-center px-2 py-1 text-gray-700 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
          <i class="mr-1 fas fa-heart"></i>
          <span>{{ comment.likes }}</span>
        </button>
        <button class="flex items-center px-2 py-1 text-gray-700 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
          <i class="mr-1 fas fa-comment"></i>
          <span>{{ comment.comments }}</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="py-6 text-white bg-gray-900">
    <div class="container mx-auto text-center">
      <p>&copy; 2023 Recipe Sharing. All rights reserved.</p>
    </div>
  </footer>
</template>
