<template>
    <div class="bg-slate-900">
        <Navbar :saldo="balances"></Navbar>
        <div class="container mx-auto p-4 mt-8">
            <h1 class="text-2xl text-white font-semibold mb-4">Caixas</h1>
            <div class="flex flex-wrap flex-column">
                <a :href="'/case/' + box.link" v-for="(box, index) in cases" :key="index">
                    <div class="box">
                        <img :src="box.image_path" alt="Caixa 1">
                        <h2 class="text-lg font-semibold mt-2" id="box-name">{{ box.name }}</h2>
                        <p> <b>{{ maskMoney(box.price) }}</b></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from '../Components/Navbar.vue';
export default {
    name: "Home",
    data() {
        return {
            //
        }
    },
    components: {
        Navbar
    },
    props: {
        cases: {
            type: Array,
        },
        balances: {
            type: Number,
        }

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


#box-name{
display: flex;
flex-wrap: nowrap;

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