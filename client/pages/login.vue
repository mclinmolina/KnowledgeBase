<script setup lang="ts">
import { ref } from 'vue'

const auth = useAuth()
const email = ref('')
const password = ref('')
const error = ref('')

async function submit() {
  try {
    await auth.login({ email: email.value, password: password.value })
    navigateTo('/dashboard')
  } catch (e: any) {
    error.value = e.data?.message || 'Login failed'
  }
}
</script>

<template>
  <div class="max-w-sm mx-auto mt-20 space-y-4">
    <h2 class="text-2xl font-bold">Login</h2>
    <UInput v-model="email" type="email" placeholder="Email" />
    <UInput v-model="password" type="password" placeholder="Password" />
    <UButton label="Login" color="primary" block @click="submit" />
    <p v-if="error" class="text-red-500">{{ error }}</p>
  </div>
</template>
