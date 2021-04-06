<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">libellé domaine</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="item in domaine" :key="item">
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.libelleDomaine }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="text-sm text-gray-900">
                            <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="modifDomaine(item.id)">Modifier</button>
                        </div>
                        <div class="text-sm text-gray-900">
                            <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteDomaine(item.id)">Supprimer</button>
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
        name: "DomaineTable",
        data () {
            return {
                domaine: []
            }
        },
        mounted() {
            this.getDomaine()
        },
        methods: {
            getDomaine: function () {
                axios
                    .get(BaseUrl + 'domaines')
                    .then(res => (this.domaine = res.data['hydra:member']))
            },
            deleteDomaine: function (id) {
                axios
                    .delete(BaseUrl + 'domaines/' + id)
                    .then(() => { this.getDomaine() })
            },
            modifDomaine: function () {

            }
        }
    }
</script>

<style scoped>

</style>