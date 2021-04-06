<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé certificat</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre année</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="item in fnonDiplomante" :key="item">
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.libelleCertificat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ item.nbAnneeFormation }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="text-sm text-gray-900">
                            <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="modifFormationNonDiplomante(item.id)">Modifier</button>
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
</template>

<script>
    import axios from "axios";

    const BaseUrl = 'http://localhost:8000/api/';

    export default {
        name: "FormationNonDiplomanteTable",
        data () {
            return {
                fnonDiplomante: []
            }
        },
        mounted() {
            this.getFormationNonDiplomante()
        },
        methods: {
            getFormationNonDiplomante: function () {
                axios
                    .get(BaseUrl + 'formation_non_diplomantes')
                    .then(res => (this.fnonDiplomante = res.data['hydra:member']))
            },
            deleteFormationNonDiplomante: function (id) {
                axios
                    .delete(BaseUrl + 'formation_non_diplomantes/' + id)
                    .then(() => { this.getFormationNonDiplomante() })
            },
            modifFormationNonDiplomante: function () {

            }
        }
    }
</script>

<style scoped>

</style>