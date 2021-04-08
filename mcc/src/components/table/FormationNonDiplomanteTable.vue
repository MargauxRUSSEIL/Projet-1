<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3">
                            <router-link :to="{ name: 'newFormation'}">
                                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Nouveau</button>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-end-7 col-span-2 ...">
                        <div class="w-full px-3 mb-6">
                            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                   type="search"
                                   placeholder="Rechercher"
                                   v-model="searchfnonDiplomante"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé certificat</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre année</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100" v-for="item in filtered" :key="item">
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.libelleCertificat }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.nbAnneeFormation }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="text-sm text-gray-900">
                                <router-link :to="{ name: 'updateFormation', params: { id: item.id }}">
                                    <button class="text-indigo-600 hover:text-indigo-900 font-semibold">Modifier</button>
                                </router-link>
                            </div>
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteFormationNonDiplomante(item.id)">Supprimer</button>
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
        name: "FormationNonDiplomanteTable",
        data () {
            return {
                searchfnonDiplomante: '',
                fnonDiplomante: []
            }
        },
        mounted() {
            this.getFormationNonDiplomante()
        },
        methods: {
            getFormationNonDiplomante: function () {
                http
                    .get('formation_non_diplomantes')
                    .then(res => (this.fnonDiplomante = res.data['hydra:member']))
            },
            deleteFormationNonDiplomante: function (id) {
                http
                    .delete('formation_non_diplomantes/' + id)
                    .then(() => { this.getFormationNonDiplomante() })
            }
        },
        computed: {
            filtered: function () {
                let search = this.fnonDiplomante;
                const searchfnonDiplomante = this.searchfnonDiplomante;

                if (!searchfnonDiplomante) {
                    return search;
                }
                search = search.filter(function (item) {
                    if (item.libelleCertificat.toLowerCase().indexOf(searchfnonDiplomante) !== -1 || item.libelleCertificat.toUpperCase().indexOf(searchfnonDiplomante) !== -1) {
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