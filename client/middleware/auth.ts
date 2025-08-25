import { defineNuxtRouteMiddleware, navigateTo } from '#app';
import { useAuth } from '~/composables/useAuth';

export default defineNuxtRouteMiddleware((to: { path: string }) => {
  const auth = useAuth();
  if (!auth.user && to.path !== "/login") {
    return navigateTo("/login");
  }
});
