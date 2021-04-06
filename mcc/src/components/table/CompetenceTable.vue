<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bloc</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seuil Bloc</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ECTS</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coefficient</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seuil</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="item in competence" :key="item">
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
                            <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="modifCompetence(item.id)">Modifier</button>
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
</template>

<script>
    import axios from "axios";

    const BaseUrl = 'http://localhost:8000/api/';

    export default {
        name: "CompetenceTable",
        data () {
            return {
                competence: []
            }
        },
        mounted() {
            this.getCompetence()
        },
        methods: {
            getCompetence: function () {
                axios
                    .get(BaseUrl + 'competences')
                    .then(res => (this.competence = res.data['hydra:member']))
            },
            deleteCompetence: function (id) {
                axios
                    .delete(BaseUrl + 'competences/' + id)
                    .then(() => { this.getCompetence() })
            },
            modifCompetence: function () {

            }
        }
    }
</script>

<style scoped>

</style>