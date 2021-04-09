<template>
    <div class="container w-auto">
        <h1>Liste des composantes</h1>
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3">
                            <router-link to="/newComposante">
                                <span class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Ajouter</span>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-end-7 col-span-2 ...">
                        <div class="w-full px-3 mb-6">
                            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                   type="search"
                                   placeholder="Rechercher"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Institut</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="item in composante" :key="item">
                        <th scope="row" class="px-6 py-4 whitespace-nowrap">{{ item.libelleInstitut }}</th>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="modifComposante(item.id)">Modifier</button>
                            </div>
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteComposante(item.id)">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    const BaseUrl = 'http://localhost:8000/api/';

    export default {
        name: "ComposanteTable",
        data () {
            return {
                composante: [],
            }
        },
        mounted() {
            this.getComposante()
        },
        methods: {
            getComposante: function () {
                axios
                    .get(BaseUrl + 'composantes')
                    .then(res => (this.composante = res.data['hydra:member']))
            },
            deleteComposante: function (id) {
                axios
                    .delete(BaseUrl + 'composantes/' + id)
                    .then(() => { this.getComposante() })
            },
            modifComposante: function (id) {
                axios
                    .put(BaseUrl + 'composantes/' + id)
                    .then(this.$router.push({ name: 'updateComposante', params: { id: id } }))
            }
        }
    }
</script>

<style scoped>

</style>