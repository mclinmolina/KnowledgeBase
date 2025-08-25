<script setup lang="ts">
const auth = useAuth();
</script>

<template>
  <header class="flex justify-between items-center px-6 py-3 border-b">
    <h1 class="text-xl font-bold">Knowledge Base</h1>
    <div>
      <UButton v-if="!auth.user" to="/login" label="Login" color="primary" />
      <UButton v-else label="Logout" color="red" @click="auth.logout" />
    </div>
  </header>
</template>
