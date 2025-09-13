<template>
  <div>
    <NavBar />
    <main class="p-6">
      <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Knowledge Base</h1>
        <p class="text-xl text-gray-600 mb-8">Your comprehensive resource for articles, guides, and insights</p>
        
        <div v-if="user">
          <Dashboard />
        </div>
        
        <div v-else>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h2 class="text-xl font-semibold mb-3">📚 Articles</h2>
              <p class="text-gray-600">Explore our extensive collection of articles on various topics</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h2 class="text-xl font-semibold mb-3">🏷️ Categories</h2>
              <p class="text-gray-600">Browse content organized by categories for easy navigation</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h2 class="text-xl font-semibold mb-3">🔖 Tags</h2>
              <p class="text-gray-600">Discover content through our comprehensive tagging system</p>
            </div>
          </div>

          <UButton 
            to="/articles" 
            color="primary" 
            size="xl"
            class="text-lg"
          >
            Explore Articles
          </UButton>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup lang="ts">
import { useAuth } from '~/composables/useAuth';
import Dashboard from './dashboard.vue';

const { user } = useAuth();
</script>
