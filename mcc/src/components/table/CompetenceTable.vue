<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
        <h1>Liste des compétences</h1>
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3">
                            <router-link :to="{ name: 'newCompetence' }">
                                <span class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Ajouter</span>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-end-7 col-span-2 ...">
                        <div class="w-full px-3 mb-6">
                            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                   type="search"
                                   placeholder="Rechercher"
                                   v-model="searchCompetence"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bloc</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seuil Bloc</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ECTS</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coefficient</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seuil</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100" v-for="item in filtered" :key="item">
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.blocs }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.seuilBlocs }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            {{ item.ECT }}
                        </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            {{ item.COEFF }}
                        </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.seuil}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="text-sm text-gray-900">
                                <router-link :to="{ name: 'updateCompetence', params: { id: item.id }}">
                                    <span class="text-indigo-600 hover:text-indigo-900 font-semibold">Modifier</span>
                                </router-link>
                            </div>
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteCompetence(item.id)">Supprimer</button>
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
    import http from "../../http-common.js";

    export default {
        name: "CompetenceTable",
        data() {
            return {
                searchCompetence: '',
                competence: []
            }
        },
        mounted() {
            this.getCompetence()
        },
        methods: {
            getCompetence: function () {
                http
                    .get('competences')
                    .then(res => (this.competence = res.data['hydra:member']))
            },
            deleteCompetence: function (id) {
                http
                    .delete('competences/' + id)
                    .then(() => {
                        this.getCompetence()
                    })
            }
        },
        computed: {
            filtered: function () {
                let search = this.competence;
                const searchCompetence = this.searchCompetence;

                if (!searchCompetence) {
                    return search;
                }
                search = search.filter(function (item) {
                    if (item.blocs.toLowerCase().indexOf(searchCompetence) !== -1 || item.blocs.toUpperCase().indexOf(searchCompetence) !== -1) {
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