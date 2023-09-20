<template>
    <div class="bg-gray-800 p-4">
        <Navbar :saldo="balance"></Navbar>
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-semibold mb-4">Caixas de CS:GO</h1>

            <div class="flex justify-center items-center">
                <button @click="open()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded">
                    Abrir Por <b>{{ maskMoney(box.price) }}</b>
                </button>
            </div>

            <div class="flex flex-wrap flex-column mt-5">
                <a :href="'/case/' + box.link" v-for="(item, index) in items" :key="index">
                    <div class="box">
                        <img :src="item.image_path" alt="Caixa 1">
                        <h2 class="text-lg font-semibold mt-2">{{ item.name }}</h2>
                        <!-- price -->
                        <p> <b>{{ maskMoney(item.price) }}</b></p>
                    </div>
                </a>
            </div>

            <!-- MODAL  -->

            <div id="itemModal"
                class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 flex justify-center items-center"
                v-if="showModal">
                <div class="bg-gray-800 rounded-lg p-8">
                    <div class="text-white text-xl font-semibold mb-2">{{ itemName }}</div>
                    {{ itemProbability }}
                    <div class="text-white text-xl font-semibold mb-2">{{ maskMoney(itemPrice) }}</div>
                    <img :src="itemImage" :alt="itemName" class="mb-4">
                    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded"
                        @click="closeModal">Fechar</button>
                </div>
            </div>

            <Danger :message="toastMessage" :type="toastType" :visible="showToast"></Danger>
        </div>
    </div>
</template>

<script>
import Danger from '../Components/ToastDanger.vue';
import Navbar from '../Components/Navbar.vue';
export default {
    name: "Case",
    components: {
        Danger,
        Navbar
    },
    data() {
        return {
            showModal: false,
            itemName: '',
            itemImage: '',
            itemProbability: '',
            itemPrice: '',
            showToast: false,
            balance: 0,
        }
    },
    props: {
        box: {
            type: Object,
            required: true
        },
        items: {
            type: Array,
            required: true
        },
        balances: {
            type: Number,
            required: true
        }
    },
    methods: {
        open() {
            axios.post('/open/' + this.box.id)
                .then(response => {
                    console.log(response);
                    this.itemName = response.data.item.name;
                    this.itemImage = response.data.item.image_path;
                    this.itemProbability = response.data.item.probability;
                    this.itemPrice = response.data.item.price;
                    this.balance = response.data.balance;
                    console.log(this.itemImage)
                    this.showModal = true;

                })
                .catch(error => {
                    console.log(error);
                    this.toastMessage = 'Erro ao abrir caixa: ' + error.response.data.message;
                    this.toastType = 'error';
                    this.showToast = true;

                    // Defina um temporizador para ocultar o toast após alguns segundos (por exemplo, 3 segundos).
                    setTimeout(() => {
                        this.showToast = false;
                    }, 3000);
                });
        },
        closeModal() {
            // Feche o modal
            this.showModal = false;
        },
        maskMoney: function (value) {
            return parseFloat(value).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });

        }
    },
    mounted() {
    this.balance = this.balances;
    },


}
</script>

<style>
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