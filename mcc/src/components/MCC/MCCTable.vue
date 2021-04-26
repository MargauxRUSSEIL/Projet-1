<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-5" v-if="errored">
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3 mb-6">
                            <router-link :to="{ name: 'newMCC' }">
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
                            <router-link :to="{ name: 'newMCC' }">
                                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Nouveau</button>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-end-7 col-span-2 ...">
                        <div class="w-full px-3 mb-6">
                            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                   type="search"
                                   placeholder="Rechercher"
                                   v-model="searchMCC"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Site & Département</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé parcours</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé niveau</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé mention</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type diplome</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Année</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100" v-for="item in filtered" :key="item">
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.departement }} - {{ item.site }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.parcours }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.niveau }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.mention }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.typeDiplome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ formatDate(item.annee) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.contact }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="text-sm text-gray-900">
                                <router-link :to="{ name: 'updateMCC', params: { id: item.id }}">
                                    <button class="text-indigo-600 hover:text-indigo-900 font-semibold">Modifier</button>
                                </router-link>
                            </div>
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteMCC(item.id)">Supprimer</button>
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
    import moment from 'moment'
    import 'moment/locale/fr'

    export default {
        name: "MCCTable",
        data () {
            return {
                searchMCC: '',
                errored: false,
                stat: '',
                mcc: []
            }
        },
        mounted() {
            this.getMCC()
        },
        methods: {
            getMCC: function () {
                http
                    .get('m_c_cs')
                    .then(res => {
                        this.mcc = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            deleteMCC: function (id) {
                http
                    .delete('m_c_cs/' + id)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getMCC()
                            this.$toast.success(`MCC supprimée avec succès`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                        }
                    }.bind(this))
                    .catch(function (error) {
                        if (error) {
                            this.$toast.error(`Ressource introuvable`, {
                                position: "top-right"
                            })
                        }
                    }.bind(this))
            },
            formatDate(value) {
                return moment(value).format("LL")
            },
        },
        computed: {
            filtered: function () {
                let search = this.mcc;
                const searchMCC = this.searchMCC;

                if (!searchMCC) {
                    return search;
                }
                search = search.filter(function (item) {
                    if (item.departement.toLowerCase().indexOf(searchMCC) !== -1 || item.departement.toUpperCase().indexOf(searchMCC) !== -1) {
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