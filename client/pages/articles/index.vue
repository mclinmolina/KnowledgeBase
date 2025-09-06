<script setup lang="ts">
const auth = useAuth()

const { data: articles, pending, error } = useFetch('/articles', {
  baseURL: 'http://localhost:8000/api',
  headers: {
    Authorization: `Bearer ${auth.token}`
  }
})
</script>

<template>
  <div>
    <h2 class="text-2xl font-bold mb-4">Articles</h2>
    <div v-if="pending">Loading...</div>
    <div v-else-if="error">Failed to load</div>
    <ul>
      <li v-for="article in articles" :key="article.id" class="border p-3 mb-2 rounded">
        {{ article.title }}
      </li>
    </ul>
  </div>
</template>
