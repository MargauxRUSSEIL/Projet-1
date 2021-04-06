<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">libellé niveau</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="item in niveau" :key="item">
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.libelleNiveau }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="text-sm text-gray-900">
                            <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="modifNiveau(item.id)">Modifier</button>
                        </div>
                        <div class="text-sm text-gray-900">
                            <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteNiveau(item.id)">Supprimer</button>
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
        name: "NiveauTable",
        data () {
            return {
                niveau: []
            }
        },
        mounted() {
            this.getNiveau()
        },
        methods: {
            getNiveau: function () {
                axios
                    .get(BaseUrl + 'niveaux')
                    .then(res => (this.niveau = res.data['hydra:member']))
            },
            deleteNiveau: function (id) {
                axios
                    .delete(BaseUrl + 'niveaux/' + id)
                    .then(() => { this.getNiveau() })
            },
            modifNiveau: function () {

            }
        }
    }
</script>

<style scoped>

</style>