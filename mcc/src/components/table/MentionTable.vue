<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <h1>Liste des mentions</h1>
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3">
                            <router-link :to="{ name: 'newMention' }">
                                <span class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Ajouter</span>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-end-7 col-span-2 ...">
                        <div class="w-full px-3 mb-6">
                            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                   type="search"
                                   placeholder="Rechercher"
                                   v-model="searchMention"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">mention</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">domaines associés</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100" v-for="item in filtered" :key="item">
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.libelleMention }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.domaine }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="text-sm text-gray-900">
                                <router-link :to="{ name: 'updateMention', params: { id: item.id }}">
                                    <span class="text-indigo-600 hover:text-indigo-900 font-semibold">Modifier</span>
                                </router-link>
                            </div>
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteMention(item.id)">Supprimer</button>
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
        name: "MentionTable",
        data () {
            return {
                searchMention: '',
                mention: []
            }
        },
        mounted() {
            this.getMention()
        },
        methods: {
            getMention: function () {
                http
                    .get('mentions')
                    .then(res => (this.mention = res.data['hydra:member']))
            },
            deleteMention: function (id) {
                http
                    .delete( 'mentions/' + id)
                    .then(() => { this.getMention() })
            }
        },
        computed: {
            filtered: function () {
                let search = this.mention;
                const searchMention = this.searchMention;

                if (!searchMention) {
                    return search;
                }
                search = search.filter(function (item) {
                    if (item.libelleMention.toLowerCase().indexOf(searchMention) !== -1 || item.libelleMention.toUpperCase().indexOf(searchMention) !== -1) {
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