<script >
 import { router } from '@inertiajs/vue3';
export default {
  props: {
    isOpen : Boolean
  },
  data() {
    return {
      rating: 0,
    commentStory: '',
    };
    
  },
  computed : {
    isFormValid() {
      return (
        this.rating >= 0.5 && // 0.5 이상의 별점이 선택되어야 합니다.
        this.commentStory.trim() !== ''
      );
    },
  },
  methods:{
    closeModal() {
      this.$emit('closeModal');
      this.rating = 0;
      this.commentStory = '';
    },
    saveReview () {
  if(!this.isFormValid){
    return;
  }

  const formData = new FormData();
  formData.append('rating', this.rating);
  formData.append('commentStory', this.commentStory);


  router.post('/comments/store', formData)
 this.rating = 0
 this.commentStory = ''

  this.closeModal();
},
  },
  
};


</script>



<!-- ReviewModal.vue -->
<template>
  <div v-if="isOpen" class="fixed inset-0 z-50 flex items-center justify-center">
    <form @submit.prevent="saveReview">
    <div class="p-4 bg-white rounded-lg shadow-lg">
      <!-- 별점 입력 폼 -->
      <div class="mb-4">
        <label for="rating" class="block text-sm font-medium text-gray-700">별점</label>
      
        <input v-model="rating" type="number" step="0.5" min="0" max="5" id="rating" name="rating" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      
      <!-- 댓글 입력 폼 -->
      <div class="mb-4">
        <label for="comment" class="block text-sm font-medium text-gray-700">댓글</label>
        <textarea v-model="commentStory" id="commentStory" name="comment" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
      </div>

      <!-- 저장 버튼 -->
      <div class="flex justify-between">
        <button @click="saveReview()" :disabled="!isFormValid" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">저장</button>
        <button type="button"  @click="closeModal()" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">취소</button>
      </div>
    </div>
  </form>
  </div>
</template>

