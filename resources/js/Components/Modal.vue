<template>
    <div v-if="isOpen" class="fixed top-0 left-0 flex items-center justify-center w-full h-screen bg-black bg-opacity-50">
      <div class="p-8 bg-white rounded-lg">
        <!-- 모달 내용 -->
        <h2 class="mb-4 text-xl font-semibold">Create Recipe</h2>
        <form @submit.prevent="createRecipe">
          <!-- 음식 이름 입력 필드 -->
          <div class="mb-4">
            <label for="recipeName" class="block mb-2 text-sm font-medium">음식 이름</label>
            <input type="text" id="recipeName" v-model="name" class="w-full px-3 py-2 border rounded-lg">
          </div>
  
          <!-- 재료 입력 필드 -->
          <div class="mb-4">
            <label for="ingredients" class="block mb-2 text-sm font-medium">재료</label>
            <textarea ref="textarea" @input="textareaInput" id="ingredients" v-model="ingredients" class="w-full px-3 py-2 border rounded-lg"></textarea>
          </div>
  
          <!-- 설명 입력 필드 -->
          <div class="mb-4">
            <label for="description" class="block mb-2 text-sm font-medium">설명</label>
            <textarea id="description" v-model="description" class="w-full px-3 py-2 border rounded-lg"></textarea>
          </div>
  
          <div class="mb-4">
  <label for="image" class="block mb-2 text-sm font-medium">사진 업로드</label>
  <label for="image" class="relative inline-block w-full h-10 bg-white border border-gray-300 rounded-lg shadow-md cursor-pointer">
    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
      <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M20 19v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2M3 5a3 3 0 013-3h12a3 3 0 013 3M8.66 13H15" />
      </svg>
    </span>
    <span class="inline-block py-2 pl-10 pr-4 text-sm text-gray-700 truncate">{{ selectedFileName }}</span>
    <input
      type="file"
      id="image"
      @change="handleImageUpload"
      class="sr-only"
    >
  </label>
</div>
          <!-- 모달을 닫는 버튼 -->
          <div class="flex justify-between">
            <!-- 만들기 버튼 --><button type="submit" :disabled="!isFormValid"  class="px-4 py-2 mt-4 text-white bg-indigo-600 rounded cursor-pointer hover:bg-indigo-700">만들기</button>
         <button @click="closeModal" class="px-4 py-2 mt-4 text-white bg-indigo-600 rounded hover:bg-indigo-700">Close</button>                 
        </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { router } from '@inertiajs/vue3';
  import { ref } from 'vue';
  
  export default {
    props: {
      isOpen: Boolean,
    },
    data() {
      return {
        name: '',
        ingredients: '',
        description: '',
        image: null,
        selectedFileName: '',
        textarea : ref(null),
      };
    },
    computed: {
  isFormValid() {
    return (
        this.name.trim() !== '' &&
        this.ingredients.trim() !== '' &&
        this.description.trim() !== '' &&
        this.image !== null
    );
  },
},
    methods: {
        textareaInput(e) {
      // textarea 높이 조정
      e.target.style.height = 'auto';
      e.target.style.height = `${e.target.scrollHeight}px`;
    },

      closeModal() {
        // 모달을 닫는 로직
        this.$emit('close');
        this.name = ''
        this.ingredients = ''
        this.description = ''
        this.image = null
      },
      handleImageUpload(event) {
        // 이미지 업로드 처리 로직
        this.image = event.target.files[0];
        this.selectedFileName = event.target.files[0].name;
      },
      createRecipe() {
      if (!this.isFormValid) {
        return; // 폼 유효성 검사 실패 시 아무 작업도 수행하지 않습니다.
      }

      // 폼 데이터를 서버로 전송하고 처리하는 로직
      const formData = new FormData();
      formData.append('name', this.name);
      formData.append('ingredients', this.ingredients);
      formData.append('description', this.description);
      formData.append('image', this.image);

      // 여기서 formData를 서버로 보내는 로직을 추가하면 됩니다.
        router.post('/create', formData)
        this.name = ''
        this.ingredients = ''
        this.description = ''
        this.image = null

        this.closeModal();
    },
  },
};
</script>