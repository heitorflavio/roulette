<template>
  <!-- <div class="bg-gray-100" v-for="(box,index) in cases" :key="index">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4">Sistema de Abertura de Caixa com Prêmios: {{ box.name }}</h1>
        <a :href="'/case/'+box.link" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Abrir Caixa
        </a>


       
    </div>
</div> -->
<div>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Caixas de CS:GO</h1>

        <div class="flex flex-wrap flex-column" >
            <a :href="'/case/'+box.link"  v-for="(box,index) in cases" :key="index">
                <div class="box">
                    <img :src="box.image_path" alt="Caixa 1">
                    <h2 class="text-lg font-semibold mt-2">{{ box.name }}</h2>
                    <p> <b>{{ maskMoney(box.price) }}</b></p>
                </div>
            </a>

            <!-- <div class="box">
                <img src="csgo_box2.jpg" alt="Caixa 2">
                <h2 class="text-lg font-semibold mt-2">Caixa de Adesivos</h2>
                <p>Contém adesivos para armas.</p>
            </div> -->

            <!-- Adicione mais caixas aqui -->
        </div>
    </div>
</div>
</template>

<script>

export default {
    name: "Home",
    data() {
        return {
            //
        }
    },
    props: {
        cases: {
            type: Array,
            required: true
        },
       
    },
    methods: {
        maskMoney: function (value) {
            return parseFloat(value).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });

        }  
    },
    mounted() {
        console.log(this.cases)
    },
}
</script>

<style scoped>
 /* Estilos personalizados */
 .container {
            background-color: #1a1a1a;
            color: #fff;
            padding: 16px;
        }

        .box {
            background-color: #2d2d2d;
            border: 1px solid #333;
            border-radius: 8px;
            padding: 16px;
            margin: 16px;
            display: inline-block;
            width: 200px;
        }

        .box img {
            max-width: 100%;
            height: auto;
        }
</style>