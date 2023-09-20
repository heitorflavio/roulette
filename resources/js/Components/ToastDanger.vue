<template>
    <div
      :class="{
        'bg-red-500': type === 'error',
        'bg-green-500': type === 'success',
        'text-white': true,
        'py-2': true,
        'px-4': true,
        'rounded-md': true,
        'shadow-md': true,
        'fixed': true,
        'top-4': true,
        'right-4': true,
        'transition-opacity': true,
        'duration-300': true,
        'opacity-0': !visible,
        'opacity-100': visible,
      }"
    >
      {{ message }}
    </div>
  </template>
  
  <script>
  export default {
    props: {
      message: String,
      type: String, // 'error' ou 'success'
      visible: Boolean,
    },
  };
  </script>
  
  <style scoped>
  /* Adicione estilos personalizados para o toast aqui, se necessário. */
  </style>
  