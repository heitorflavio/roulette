<template>
    <!--
=========================================================
* Soft UI Dashboard Pro Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-pro-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

    <div
        class="m-0 font-sans text-base antialiased font-normal text-left leading-default dark:bg-slate-950 bg-gray-50 text-slate-500 dark:text-white">
        <!-- sidenav -->

        <Sidebar />

        <main class="relative transition-all duration-200 ease-soft-in-out xl:ml-68 rounded-xl">
            <!-- Navbar -->
            <Navbar />

            <div class="w-full p-6 mx-auto">

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 flex-0">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                                <div class="lg:flex">
                                    <div>
                                        <h5 class="mb-0 dark:text-white">Todos os Produtos</h5>
                                        <!-- <p class="mb-0 leading-normal text-sm"> A lightweight, extendable, dependency-free
                                            javascript HTML table plugin. </p> -->
                                    </div>
                                    <div class="my-auto mt-6 ml-auto lg:mt-0">
                                        <div class="my-auto ml-auto">
                                            <a href="/box/create"
                                                class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">+&nbsp;
                                                Nova Caixa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-auto p-6 px-0 pb-0">
                                <div class="overflow-x-auto table-responsive">
                                    <table class="table" datatable id="products-list">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Nome</th>
                                                <th>Valor</th>
                                                <th>Acões</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="cas in cases" :key="cas.id">
                                                <td>
                                                    <div class="flex">
                                                        <img class="ml-4 w-1/10"
                                                            :src="cas.image_path"
                                                            alt="hoodie">                                                   
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="my-auto ml-4 ">{{ cas.name }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="my-auto ml-4 ">{{ maskMoney(cas.price) }}</h6>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary my-auto ml-12" :href="'/box/'+cas.id">Ver</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Image</th>
                                                <th>Nome</th>
                                                <th>Valor</th>
                                                <th>Acões</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
// import '../js/soft.min.js'
import Sidebar from '@/Components/PanelSidebar.vue'
import Navbar from '@/Components/PanelNavbar.vue'
export default {
    name: "Dashboard",
    components: {
        Sidebar,
        Navbar
    },
    props: {
        cases: {
            type: Array,
        }
    },
    methods: {
        maskMoney(value) {
            let v = parseFloat(value)
            return v.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
        }
    },


}
</script>

<style>
@import '../../css/soft.min.css';
</style>