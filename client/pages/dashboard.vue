<script setup lang="ts">
// Dashboard data can be fetched from API or composables
const stats = [
  { title: 'Total Articles', value: '125', icon: 'i-heroicons-document-text', color: 'blue' },
  { title: 'Categories', value: '8', icon: 'i-heroicons-folder', color: 'green' },
  { title: 'Tags', value: '32', icon: 'i-heroicons-tag', color: 'purple' },
  { title: 'Users', value: '45', icon: 'i-heroicons-users', color: 'orange' }
]

const recentArticles = [
  { title: 'Getting Started with Nuxt 3', category: 'Development', date: '2 hours ago' },
  { title: 'API Integration Best Practices', category: 'Backend', date: '1 day ago' },
  { title: 'Responsive Design Patterns', category: 'Design', date: '3 days ago' }
]
</script>
<template>
  <div class="space-y-6">
    <!-- Dashboard Header -->
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-3xl font-bold text-gray-900">Knowledge Base Dashboard</h1>
        <p class="text-gray-600 mt-2">Welcome to your knowledge management system</p>
      </div>
      <UButton icon="i-heroicons-plus" label="New Article" color="primary" />
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <UCard v-for="stat in stats" :key="stat.title" class="hover:shadow-lg transition-shadow">
        <template #header>
          <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-gray-500">{{ stat.title }}</h3>
            <UIcon :name="stat.icon" class="w-5 h-5" :class="`text-${stat.color}-500`" />
          </div>
        </template>
        <div class="text-2xl font-bold text-gray-900">{{ stat.value }}</div>
        <template #footer>
          <UButton :color="stat.color" variant="ghost" size="xs" label="View Details" />
        </template>
      </UCard>
    </div>

    <!-- Recent Articles Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Recent Articles Card -->
      <UCard>
        <template #header>
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Recent Articles</h3>
            <UButton variant="ghost" icon="i-heroicons-arrow-right" size="sm" />
          </div>
        </template>
        <div class="space-y-4">
          <div v-for="(article, index) in recentArticles" :key="index" class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
            <div class="flex-1 min-w-0">
              <h4 class="text-sm font-medium text-gray-900 truncate">{{ article.title }}</h4>
              <p class="text-xs text-gray-500">{{ article.category }} • {{ article.date }}</p>
            </div>
            <UButton icon="i-heroicons-eye" size="sm" variant="ghost" />
          </div>
        </div>
        <template #footer>
          <UButton variant="soft" color="gray" label="View All Articles" to="/articles" />
        </template>
      </UCard>

      <!-- Quick Actions Card -->
      <UCard>
        <template #header>
          <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
        </template>
        <div class="space-y-3">
          <UButton block variant="soft" icon="i-heroicons-document-plus" label="Create New Article" />
          <UButton block variant="soft" icon="i-heroicons-folder-plus" label="Add Category" />
          <UButton block variant="soft" icon="i-heroicons-tag" label="Manage Tags" />
          <UButton block variant="soft" icon="i-heroicons-cog" label="Settings" />
        </div>
      </UCard>
    </div>

    <!-- Activity Feed Section -->
    <UCard>
      <template #header>
        <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
      </template>
      <div class="space-y-4">
        <div class="flex items-center space-x-3">
          <UIcon name="i-heroicons-document-plus" class="w-5 h-5 text-green-500" />
          <div>
            <p class="text-sm font-medium">New article created</p>
            <p class="text-xs text-gray-500">"API Integration Guide" was created 30 minutes ago</p>
          </div>
        </div>
        <div class="flex items-center space-x-3">
          <UIcon name="i-heroicons-pencil" class="w-5 h-5 text-blue-500" />
          <div>
            <p class="text-sm font-medium">Article updated</p>
            <p class="text-xs text-gray-500">"Getting Started" was updated 2 hours ago</p>
          </div>
        </div>
        <div class="flex items-center space-x-3">
          <UIcon name="i-heroicons-user-plus" class="w-5 h-5 text-purple-500" />
          <div>
            <p class="text-sm font-medium">New user registered</p>
            <p class="text-xs text-gray-500">John Doe joined the knowledge base yesterday</p>
          </div>
        </div>
      </div>
    </UCard>
  </div>
</template>

<style scoped>
/* Custom responsive adjustments */
@media (max-width: 768px) {
  .grid-cols-1 {
    grid-template-columns: 1fr;
  }
  
  .grid-cols-2 {
    grid-template-columns: 1fr;
  }
}
</style>
