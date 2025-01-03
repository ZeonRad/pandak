<template>
  <div>
    <h1 class="text-3xl font-bold mb-4">{{ panda.name }}</h1>
    <table class="table-auto w-full border-collapse border border-gray-400">
      <thead>
        <tr>
          <th class="border border-gray-300 px-4 py-2">Key</th>
          <th class="border border-gray-300 px-4 py-2">Value</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(value, key) in panda" :key="key">
          <td class="border border-gray-300 px-4 py-2">{{ key }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ value }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from '@/plugins/axios';

export default {
  data() {
    return {
      panda: {},
    };
  },
  methods: {
    fetchPanda() {
      const { id } = this.$route.params;
      axios.get(`/pandas/${id}`).then((response) => {
        this.panda = response.data;
      });
    },
  },
  created() {
    this.fetchPanda();
  },
};
</script>
