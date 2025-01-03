<template>
  <div>
    <!-- Rendezési gombok -->
    <div class="bg-green-500/25 p-4 rounded-md mb-6">
      <SortButtons @sort="sortPandas" />
    </div>

    <!-- Panda kártyák -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div
        v-for="panda in sortedPandas"
        :key="panda.id"
        class="border rounded-md shadow-md p-4 bg-white"
      >
        <h2 class="text-xl font-semibold">{{ panda.name }}</h2>
        <p class="text-gray-600">Age: {{ panda.age }}</p>
        <button
          @click="goToDetails(panda.id)"
          class="mt-4 bg-green-500 text-white py-2 px-4 rounded-md"
        >
          Details
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '@/plugins/axios';
import SortButtons from '@/components/SortButtons.vue';

export default {
  components: { SortButtons },
  data() {
    return {
      pandas: [],
      sortedPandas: [],
    };
  },
  methods: {
    fetchPandas() {
      axios.get('/pandas').then((response) => {
        this.pandas = response.data;
        this.sortedPandas = [...this.pandas];
      });
    },
    sortPandas(criteria) {
      this.sortedPandas.sort((a, b) =>
        criteria === 'name'
          ? a.name.localeCompare(b.name)
          : a.age - b.age
      );
    },
    goToDetails(id) {
      this.$router.push(`/pandas/${id}`);
    },
  },
  created() {
    this.fetchPandas();
  },
};
</script>
