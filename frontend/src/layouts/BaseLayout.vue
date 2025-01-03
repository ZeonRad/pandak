<template>
  <div class="min-h-screen bg-custom-bg">
    <BaseHeader />
    
    <main class="p-6">
      <slot />
    </main>
  </div>
</template>

<script>
import BaseHeader from '@components/layout/BaseHeader.vue';

export default {
  name: 'Layout',
  components: {
    BaseHeader,
  },
};
</script>
