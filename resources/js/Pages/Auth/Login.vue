<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
      <Head title="Log in" />
  
      <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
      </div>
  
      <form @submit.prevent="submit" class="max-w-md p-4 mx-auto mt-4 bg-white rounded-lg shadow-md">
        <div class="mb-4">
          <InputLabel for="email" value="Email" />
  
          <TextInput
            id="email"
            type="email"
            class="w-full px-3 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
          />
  
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
  
        <div class="mb-4">
          <InputLabel for="password" value="Password" />
  
          <TextInput
            id="password"
            type="password"
            class="w-full px-3 py-2 mt-1 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
            v-model="form.password"
            required
            autocomplete="current-password"
          />
  
          <InputError class="mt-2" :message="form.errors.password" />
        </div>
  
        <div class="mb-4">
          <label class="flex items-center">
            <Checkbox name="remember" v-model:checked="form.remember" class="mr-2" />
            <span class="text-sm text-gray-600">Remember me</span>
          </label>
        </div>
  
        <div class="flex items-center justify-between mt-4">
          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="text-sm text-gray-600 hover:text-gray-900"
          >
            Forgot your password?
          </Link>
  
          <PrimaryButton class="px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Log in
          </PrimaryButton>
        </div>
      </form>
    </GuestLayout>
  </template>