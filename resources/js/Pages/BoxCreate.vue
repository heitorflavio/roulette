<template>
    <div
        class="m-0 font-sans antialiased font-normal text-left leading-default text-base dark:bg-slate-950 bg-gray-50 text-slate-500 dark:text-white/80">
        <!-- sidenav -->
        <Sidebar />
        <main class="ease-soft-in-out xl:ml-68 relative h-full min-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            <Navbar />
            <div class="w-full p-6 mx-auto mt-4">
                <form action="/box/create" method="post">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <div active="" form="info"
                                class="top-0 left-0 flex flex-col visible w-full h-auto min-w-0 p-4 break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                                <h5 class="mb-0 font-bold">Informações da Caixa</h5>
                                <div>
                                    <div class="flex flex-wrap mt-4 -mx-3">
                                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                                            <label
                                                class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                for="name">Name</label>
                                            <input type="text" name="name" required placeholder="ex: Camisetas"
                                                class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                        </div>
                                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                                            <label
                                                class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                for="image_path">Image Path</label>
                                            <input type="text" name="image_path" required
                                                placeholder="ex: /images/camiseta.jpg"
                                                class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap mt-4 -mx-3">
                                        <div class="w-full max-w-full px-3 flex-0">
                                            <label
                                                class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                for="description">Description</label>
                                            <textarea name="description" required placeholder="Enter description here"
                                                class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"></textarea>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap mt-4 -mx-3">
                                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                                            <label
                                                class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                for="price">Price</label>
                                            <input type="text" name="price" required placeholder="0.00"
                                                class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap mt-4 -mx-3">
                                        <div class="w-full max-w-full px-3 flex-0">
                                            <label
                                                class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80"
                                                for="link">Link</label>
                                            <input type="text" name="link" required placeholder="ex: https://example.com"
                                                class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mt-6">
                                    <button type="submit" aria-controls="media" next-form-btn="" href="javascript:;"
                                        class="inline-block px-6 py-3 mb-0 ml-auto font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
        categories: {
            type: Array,
        }
    },
    methods: {
        maskMoney(value) {
            return value.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
        }
    },


}
</script>

<style>
@import '../../css/soft.min.css';
</style>