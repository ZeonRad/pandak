<template>
  <div class="flex justify-around">
    <button @click="$emit('sort', 'name')" class="bg-green-500 text-white py-2 px-4 rounded-md">
      Sort by Name (ASC)
    </button>
    <button @click="$emit('sort', 'age')" class="bg-green-500 text-white py-2 px-4 rounded-md">
      Sort by Age (ASC)
    </button>
  </div>
</template>
