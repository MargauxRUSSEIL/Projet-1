<template>
    <div class="px-10">
        <div class="ajout justify-between mt-12">
            <div class="items-center">
                <div>
                    <h1 class="montserrat font-bold text-2xl text-theme-bleu-marine">
                        CARACTERISTIQUES
                    </h1>
                    <div v-if="errored">
                        <div class="flex flex-wrap ">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3">
                                    <button v-on:click="newCaracteristiques()" class="add-composante-role pr-10 inter font-bold text-xl text-white space-x-10" type="button">Ajouter</button>
                                    <button class="add-composante-role exporter pr-10 inter font-bold text-xl text-white space-x-10" type="button" v-on:click="download">Exporter</button>
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
                                <div class="col-start-1 col-end-3">
                                    <button v-on:click="newCaracteristiques()" class="add-composante-role pr-10 inter font-bold text-xl text-white space-x-10" type="button">Ajouter</button>
                                    <button class="add-composante-role exporter pr-10 inter font-bold text-xl text-white space-x-10" type="button" v-on:click="download">Exporter</button>
                                </div>
                                <div class="col-end-7 col-span-2">
                                    <div class="w-full px-3 mb-6">
                                        <input class="input-recherche shadow-box md:p-2 sm:p-2 xl:p-32 lg:p-32 ml-28" type="search" placeholder="Recherche" v-model="searchCaracteristiques">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="mt-6 mb-5 space-x-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="complement_col" v-on:click="hide_show_table('complement_col')">
                                    <span class="ml-2">Complement</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="statut_col" v-on:change="hide_show_table('statut_col')">
                                    <span class="ml-2">Statut</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="typeDiplome_col" v-on:change="hide_show_table('typeDiplome_col')">
                                    <span class="ml-2">Type de diplome</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <table class="shadow-box w-full rounded-lg">
                                <thead>
                                <tr class="inter font-semibold text-xl border-b my-3 text-theme-bleu-marine">
                                    <th id="complement_col_head" scope="col">Complement</th>
                                    <th id="statut_col_head" scope="col">Statut</th>
                                    <th id="typeDiplome_col_head" scope="col">Type de diplome</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in filtered" :key="item">
                                    <td class="complement_col">{{ item.complement }}</td>
                                    <td class="statut_col">{{ item.statut }}</td>
                                    <td class="typeDiplome_col">{{ textTypeDiplome(item.typeDiplome) }}</td>
                                    <td>
                                        <div class="px-6 py-4 flex justify-center items-stretch text-gray-900">
                                            <router-link :to="{ name: 'updateCaracteristique', params: { id: item.id }}">
                                                <svg role="img" aria-label="Modifier" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse cx="12.9405" cy="12.7347" rx="12.379" ry="12.3522"  fill="#362A66" />
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M21.4932 23.9457H4.61279V20.5769H21.4932V23.9457ZM13.9477 8.10395L17.1127 11.2622L9.46591 18.8925H6.30083V15.7343L13.9477 8.10395ZM18.0158 10.361L14.8508 7.2028L16.3953 5.66158C16.4734 5.58351 16.5661 5.52157 16.6682 5.4793C16.7704 5.43704 16.8798 5.41529 16.9903 5.41529C17.1009 5.41529 17.2103 5.43704 17.3124 5.4793C17.4145 5.52157 17.5073 5.58351 17.5854 5.66158L19.5604 7.63232C19.8896 7.96078 19.8896 8.49136 19.5604 8.81982L18.0158 10.361Z"
                                                              fill="white" />
                                                    </g>
                                                    <defs><clipPath id="clip0"><rect width="20.2565" height="20.2127"  fill="white" transform="translate(2.92432 0.328369)" /></clipPath> </defs>
                                                </svg>
                                            </router-link>
                                            </div>
                                        </td>
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
    import XLSX from "xlsx";
    export default {
        name: "CaracteristiquesTable",
        data() {
            return {
                searchCaracteristiques: '',
                type_diplome: '',
                stat: '',
                errored: false,
                caracteristique: []
            }
        },
        mounted() {
            this.getCaracteristiques()
            this.getTypeDiplome()
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
             download: function() {
                const data = XLSX.utils.json_to_sheet(this.caracteristique);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, data, "data");
                XLSX.writeFile(wb, "caracteristique.xlsx");
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
            getTypeDiplome: function() {
                http
                    .get('type_diplomes')
                    .then(response => {
                        this.type_diplome = response.data["hydra:member"]
                    })
            },
            textTypeDiplome: function(value) {
                for (let i = 0; i < this.type_diplome.length; i++) {
                    if (value === this.type_diplome[i]['@id']) return this.type_diplome[i].libelle
                }
            },
            hide_show_table: function (col_name) {
                let i
                let all_col
                const checkbox_val = document.getElementById(col_name).value

                if (checkbox_val === "hide")
                {
                    all_col = document.getElementsByClassName(col_name)
                    for(i = 0; i<all_col.length; i++)
                    {
                        all_col[i].style.display="none"
                    }
                    document.getElementById(col_name+"_head").style.display="none"
                    document.getElementById(col_name).value="show"
                }
                else if (checkbox_val === "show")
                {
                    all_col = document.getElementsByClassName(col_name)

                    for(i = 0; i<all_col.length; i++)
                    {
                        all_col[i].style.display="table-cell"
                    }
                    document.getElementById(col_name+"_head").style.display="table-cell"
                    document.getElementById(col_name).value="hide"
                }
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
    .exporter {
        background-color: maroon
    }
</style>