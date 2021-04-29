<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-5" v-if="errored">
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3 mb-6">
                            <router-link :to="{ name: 'newParcours' }">
                                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Nouveau</button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <section class="my-32 mx-auto text-center">
                <p class="text-lg mt-6">Aucun enregistrement</p>
            </section>
        </div>
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-20 lg:mx-20" v-else>
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3">
                            <router-link :to="{ name: 'newParcours' }">
                                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Nouveau</button>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-end-7 col-span-2 ...">
                        <div class="w-full px-3 mb-6">
                            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                   type="search"
                                   placeholder="Rechercher"
                                   v-model="searchParcours"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Formation</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Structure prolonge</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Structure basse</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commentaire</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Intitulé</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé parcours</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Second vet</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Annuel</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semestre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100" v-for="item in filtered" :key="item">
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.formation }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.structureProlongee }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.structureBasse }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.commentaire }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.libelle }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.libelleParcoursApogee }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.secondVET }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.annuel }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.semestre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.user }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="text-sm text-gray-900">
                                <router-link :to="{ name: 'updateParcours', params: { id: item.id }}">
                                    <button class="text-indigo-600 hover:text-indigo-900 font-semibold">Modifier</button>
                                </router-link>
                            </div>
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteParcours(item.id)">Supprimer</button>
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
 import http from "../../http-common"

    export default {
        name: "ParcoursTable",
        data () {
            return {
                searchParcours: '',
                stat: '',
                errored: false,
                parcours: []
            }
        },
        mounted() {
            this.getParcours()
        },
        methods: {
            getParcours: function () {
                http
                    .get('parcours')
                    .then(res => {
                        this.parcours = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            deleteParcours: function (id) {
                http
                    .delete( 'parcours/' + id)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getParcours()
                            this.$toast.success(`Parcours resource deleted`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                        }
                        else if (this.stat === 404) {
                            this.$toast.error(`Resource not found`, {
                                position: "top-right"
                            })
                        }
                    }.bind(this))
            }
        },
        computed: {
            filtered: function () {
                let search = this.parcours;
                const searchParcours = this.searchParcours;

                if (!searchParcours) {
                    return search;
                }
                search = search.filter(function (item) {
                    if (item.libelleParcours.toLowerCase().indexOf(searchParcours) !== -1 || item.libelleParcours.toUpperCase().indexOf(searchParcours) !== -1) {
                        return item;
                    }
                })
                return search;
            }
        }
    }
</script>

<style scoped>

</style>