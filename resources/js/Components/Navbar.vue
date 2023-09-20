<template>
    <nav class="bg-gray-800 p-4">
      <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-white text-2xl font-semibold">OpenBox</a>
  
        <!-- Menu de Navegação -->
        <!-- <ul class="flex space-x-4">
          <li><a href="#" class="text-white">Página Inicial</a></li>
          <li><a href="#" class="text-white">Produtos</a></li>
          <li><a href="#" class="text-white">Contato</a></li>
        </ul> -->
  
        <!-- Saldo do Usuário -->
        <div class="text-white" v-if="saldo">
          Saldo:  {{   maskMoney(saldo) }} <!-- Formate o saldo como moeda se necessário -->
        </div>
        <a href="/login" class="text-white" v-else>Login</a>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: "Navbar",
    props: {
      saldo: {
        type: Number,
        required: true,
      },
    },
    data() {
      return {
       
      };
    },
    methods: {
        maskMoney: function (value) {
            return parseFloat(value).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });

        }
    }
  };
  </script>
  