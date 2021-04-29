<template>
    <div class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-5" v-if="errored">
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3 mb-6">
                            <button v-on:click="newUser()" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Nouveau</button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="my-32 mx-auto text-center">
                <p class="text-lg mt-6">Aucun enregistrement</p>
            </section>
        </div>
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56" v-else>
            <div class="flex flex-wrap ">
                <div class="grid grid-cols-6 w-full gap-2">
                    <div class="col-start-1 col-end-3 ...">
                        <div class="w-full px-3">
                            <button v-on:click="newUser()" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button">Nouveau</button>
                        </div>
                    </div>
                    <div class="col-end-7 col-span-2 ...">
                        <div class="w-full px-3 mb-6">
                            <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                                   type="search"
                                   placeholder="Rechercher"
                                   v-model="searchUser"
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adjoint</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actif</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adjoint 2</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adjoint 3</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100" v-for="item in filtered" :key="item">
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.nom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.prenom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.mail }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.adjoint }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.actif }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.adjoint2 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ item.adjoint3 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="text-sm text-gray-900">
                                <button v-on:click="modifUser(item.id)" class="text-indigo-600 hover:text-indigo-900 font-semibold">Modifier</button>
                            </div>
                            <div class="text-sm text-gray-900">
                                <button class="text-indigo-600 hover:text-indigo-900 font-semibold" v-on:click="deleteUser(item.id)">Supprimer</button>
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
    import http from "../../http-common";

    export default {
        name: "UserTable",
        data () {
            return {
                searchUser: '',
                errored: false,
                user: []
            }
        },
        mounted() {
            this.getUser()
        },
        methods: {
            getUser: function () {
                http
                    .get('users')
                    .then(res => {
                        this.user = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            deleteUser: function (id) {
                http
                    .delete('users/' + id)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getUE()
                            this.$toast.success(`Utilisateur supprimée avec succès`, {
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
            newUser: function () {
                this.$router.push({name: 'newUser'})
            },
            modifUser: function (id) {
                this.$router.push({name: 'updateUser', params: {id: id}})
            }
        },
        computed: {
            filtered: function () {
                let search = this.user;
                const searchUser = this.searchUser;

                if (!searchUser) {
                    return search;
                }
                search = search.filter(function (item) {
                    if (item.nom.toLowerCase().indexOf(searchUser) !== -1 || item.nom.toUpperCase().indexOf(searchUser) !== -1) {
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