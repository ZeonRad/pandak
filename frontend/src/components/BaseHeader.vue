<template>
  <header class="bg-[#e2dbac] p-4">
      <nav>
          <ul class="flex space-x-4">
              <li><router-link to="/" class="text-green-500">Főoldal</router-link></li>
          </ul>
      </nav>
  </header>
</template>

<script setup>
import { ref } from 'vue'

const menuOpen = ref(false)

function toggleMenu() {
  menuOpen.value = !menuOpen.value
}
</script>

<style scoped>

</style>
