import { ref } from 'vue'

interface User {
  id: number;
  name: string;
  email: string;
}

const user = ref<User | null>(null)
const token = ref<string | null>(null)

export function useAuth() {
  async function login(credentials: { email: string; password: string }) {
    const response = await $fetch('/login', {
      baseURL: 'http://localhost:8000/api',
      method: 'POST',
      body: credentials
    }) as { token: string; user: User }; // Type assertion for response

    console.log('Login response:', response); // Log the response

    token.value = response.token
    user.value = response.user

    console.log('User state after login:', user.value); // Log user state

    // store in localStorage if token is not null
    if (token.value) {
      localStorage.setItem('token', token.value)
    }
    localStorage.setItem('user', JSON.stringify(user.value))
  }

  function logout() {
    token.value = null
    user.value = null
    localStorage.removeItem('token')
    localStorage.removeItem('user')
  }

  return { user, token, login, logout }
}
