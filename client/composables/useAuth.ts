import { ref } from 'vue'

const user = ref(null)
const token = ref<string | null>(null)

export function useAuth() {
  async function login(credentials: { email: string; password: string }) {
    const { data } = await $fetch('/login', {
      baseURL: 'http://localhost:8000/api',
      method: 'POST',
      body: credentials
    })

    token.value = data.token
    user.value = data.user

    // store in localStorage
    localStorage.setItem('token', token.value)
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
