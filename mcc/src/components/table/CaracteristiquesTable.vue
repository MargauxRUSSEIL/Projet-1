<template>
    <div class="px-10">
        <div class="ajout justify-between mt-12">
            <div class="items-center">
                <div>
                    <h1 class="montserrat font-bold text-2xl text-theme-bleu-marine">
                        CARACTERISTIQUES
                    </h1>
                    <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-5" v-if="errored">
                        <div class="flex flex-wrap ">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3 ...">
                                    <div class="w-full px-3 mb-6">
                                        <router-link :to="{ name: 'newCaracteristique' }">
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
                    <div v-else>
                   <div class="flex flex-wrap">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3 ...">
                                    <div class="pr-10 inter font-bold text-xl text-white space-x-10">
                                        <router-link :to="{ name: 'newCaracteristique' }">
                                            <span class="add-composante-role" type="button">Ajouter</span>
                                        </router-link>
                                    </div>
                                </div>
                                <div class="col-end-7 col-span-2 ...">
                                    <div class="w-full px-3 mb-6">
                                        <input class="input-recherche shadow-box" type="search" placeholder="Recherche" v-model="searchCaracteristiques">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        <table class="shadow-box w-full rounded-lg">
                            <thead>
                                <tr class="inter font-semibold text-xl border-b my-3 text-theme-bleu-marine">
                                    <th scope="col">Complement</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Type de diplome</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in filtered" :key="item">
                                    <td>{{ item.complement }}</td>
                                    <td>{{ item.statut }}</td>
                                    <td>{{ item.typeDiplome }}</td>
                                    <td>
      
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import http from "../../http-common";
    export default {
        name: "CaracteristiquesTable",
        data() {
            return {
                searchCaracteristiques: '',
                stat: '',
                errored: false,
                caracteristique: []
            }
        },
        mounted() {
            this.getCaracteristiques()
        },
        methods: {
            getCaracteristiques: function() {
                http
                    .get('caracteristiques')
                    .then(res => {
                        this.caracteristique = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            deleteCaracteristiques: function(id) {
                http
                    .delete('caracteristique/' + id)
                    .then(function(response) {
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getCaracteristiques()
                            this.$toast.success(`Caracteristiques supprimée avec succès`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                        }
                    }.bind(this))
                    .catch(function(error) {
                        if (error) {
                            this.$toast.error(`Ressource introuvable`, {
                                position: "top-right"
                            })
                        }
                    }.bind(this))
            },
            newCaracteristiques: function() {
                this.$router.push({
                    name: 'newCaracteristique'
                })
            },
            modifCaracteristiques: function(id) {
                this.$router.push({
                    name: 'updateCaracteristique',
                    params: {
                        id: id
                    }
                })
            }
        },
        computed: {
            filtered: function() {
                let search = this.caracteristique;
                const searchCaracteristiques = this.searchCaracteristiques;
                if (!searchCaracteristiques) {
                    return search;
                }
                search = search.filter(function(item) {
                    if (item.statut.toLowerCase().indexOf(searchCaracteristiques) !== -1 || item.statut.toUpperCase().indexOf(searchCaracteristiques) !== -1) {
                        return item;
                    }
                })
                return search;
            }
        }
    }
</script>

<style scoped lang="postcss">
    .add-composante-role {
        @apply bg-theme-bleu-marine py-3 px-6 rounded-md;
        box-shadow: -2px 2px 2px rgba(0, 41, 107, 0.25), 2px -2px 2px rgba(255, 255, 255, 0.4), 2px 2px 2px rgba(0, 41, 107, 0.4), -2px -2px 2px rgba(255, 255, 255, 0.4), inset 1px 1px 2px rgba(0, 0, 0, 0.25);
    }
    .input-recherche {
        @apply rounded-full pl-6 py-1;
    }
    .shadow-box {
        box-shadow: -1.46429px 1.46429px 1.46429px rgba(0, 41, 107, 0.25), 1.46429px -1.46429px 1.46429px rgba(255, 255, 255, 0.4), 1.46429px 1.46429px 1.46429px rgba(0, 41, 107, 0.4), -1.46429px -1.46429px 1.46429px rgba(255, 255, 255, 0.4), inset 0.732143px 0.732143px 1.46429px rgba(0, 0, 0, 0.25);
    }
    .select-composante-role {
        @apply py-1 px-3 rounded-md font-semibold;
    }
    table tr:not(:last-child) {
        @apply border-b;
    }
    tbody tr:hover {
        background: #d6d6d6;
    }
    thead tr th {
        @apply py-1;
    }
    tbody tr td {
        @apply py-2 font-medium text-center;
    }
    caption {
        @apply opacity-0;
    }
</style>