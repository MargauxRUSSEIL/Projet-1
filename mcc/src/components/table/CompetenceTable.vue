<template>
    <div class="px-10">
        <div class="ajout justify-between mt-12">
            <div class="items-center">
                <div>
                    <h1 class="montserrat font-bold text-2xl text-theme-bleu-marine">
                        COMPETENCE
                    </h1>
                    <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-5" v-if="errored">
                        <div class="flex flex-wrap ">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3 ...">
                                    <div class="w-full px-3 mb-6">
                                        <router-link :to="{ name: 'newCompetence' }">
                                            <button class="add-composante-role font-bold pr-10 inter text-xl text-white space-x-10" type="button">Nouveau</button>
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
                                <div class="col-start-1 col-end-3">
                                    <div class="pr-10 inter font-bold text-m text-white space-x-10">
                                        <router-link :to="{ name: 'newCompetence' }">
                                            <span class="add-composante-role pr-10 inter font-bold text-xl text-white space-x-10" type="button">Ajouter</span>
                                        </router-link>
                                        <button class="add-composante-role exporter pr-10 inter font-bold text-xl text-white space-x-10" type="button" v-on:click="download">Exporter</button>
                                    </div>
                                </div>
                                <div class="col-end-7 col-span-2">
                                    <div class="w-full px-3 mb-6">
                                        <input class="input-recherche shadow-box md:p-2 sm:p-2 xl:p-32 lg:p-32 ml-28" type="search" placeholder="Recherche" v-model="searchCompetence">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="mt-6 mb-5 space-x-2">
                                <label class="inline-flex items-center">
                                        <input type="checkbox" value="hide" id="blocs_col" v-on:click="hide_show_table('blocs_col')">
                                        <span class="ml-2">Bloc</span>
                                    </label>
                                <label class="inline-flex items-center">
                                        <input type="checkbox" value="hide" id="seuilBlocs_col" v-on:change="hide_show_table('seuilBlocs_col')">
                                        <span class="ml-2">Seuil Bloc</span>
                                    </label>
                                <label class="inline-flex items-center">
                                        <input type="checkbox" value="hide" id="ECT_col" v-on:change="hide_show_table('ECT_col')">
                                        <span class="ml-2">ECTS</span>
                                    </label>
                                <label class="inline-flex items-center">
                                        <input type="checkbox" value="hide" id="COEFF_col" v-on:change="hide_show_table('COEFF_col')">
                                        <span class="ml-2">Coefficient</span>
                                    </label>
                                <label class="inline-flex items-center">
                                        <input type="checkbox" value="hide" id="seuil_col" v-on:change="hide_show_table('seuil_col')">
                                        <span class="ml-2">Seuil</span>
                                    </label>
                            </div>
                        </div>
                        <div>
                            <table class="shadow-box w-full rounded-lg">
                                <thead>
                                    <tr class="inter font-semibold text-xl border-b my-3 text-theme-bleu-marine">
                                        <th id="blocs_col_head" scope="col">Bloc</th>
                                        <th id="seuilBlocs_col_head" scope="col">Seuil Bloc</th>
                                        <th id="ECT_col_head" scope="col">ECTS</th>
                                        <th id="COEFF_col_head" scope="col">Coefficient</th>
                                        <th id="seuil_col_head" scope="col">Seuil</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in filtered" :key="item">
                                        <td class="blocs_col">{{ item.blocs }}</td>
                                        <td class="seuilBlocs_col">{{ item.seuilBlocs }}</td>
                                        <td class="ECT_col">{{ item.ECT }}</td>
                                        <td class="COEFF_col">{{ item.COEFF }}</td>
                                        <td class="seuil_col">{{ item.seuil}}</td>
                                        <td>
                                            <div class="px-6 py-4 flex justify-center items-stretch text-gray-900">
                                                <router-link :to="{ name: 'updateCompetence', params: { id: item.id }}">
                                                    <svg role="img" aria-label="Modifier" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <ellipse cx="12.9405" cy="12.7347" rx="12.379" ry="12.3522"  fill="#362A66" />
                                                        <g clip-path="url(#clip0)">
                                                            <path d="M21.4932 23.9457H4.61279V20.5769H21.4932V23.9457ZM13.9477 8.10395L17.1127 11.2622L9.46591 18.8925H6.30083V15.7343L13.9477 8.10395ZM18.0158 10.361L14.8508 7.2028L16.3953 5.66158C16.4734 5.58351 16.5661 5.52157 16.6682 5.4793C16.7704 5.43704 16.8798 5.41529 16.9903 5.41529C17.1009 5.41529 17.2103 5.43704 17.3124 5.4793C17.4145 5.52157 17.5073 5.58351 17.5854 5.66158L19.5604 7.63232C19.8896 7.96078 19.8896 8.49136 19.5604 8.81982L18.0158 10.361Z"
                                                                  fill="white" />
                                                        </g>
                                                        <defs><clipPath id="clip0"><rect width="20.2565" height="20.2127"  fill="white" transform="translate(2.92432 0.328369)" /></clipPath> </defs>
                                                    </svg>
                                                </router-link>
                                                <span role="button" v-on:click="deleteCompetence(item.id)">
                                                    <svg role="img" aria-label="Supprimer" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">   
                                                        <path d="M19.2609 17.5335L19.6145 17.1799L19.2609 16.8264L15.6068 13.1722L19.2609 9.51807L19.6145 9.16451L19.2609 8.81096L17.0791 6.62916L16.7256 6.27561L16.372 6.62916L12.7179 10.2833L9.06372 6.62916L8.71017 6.27561L8.35661 6.62916L6.17481 8.81096L5.82126 9.16451L6.17481 9.51807L9.82896 13.1722L6.17481 16.8264L5.82126 17.1799L6.17481 17.5335L8.35661 19.7153L8.71017 20.0688L9.06372 19.7153L12.7179 16.0611L16.372 19.7153L16.7256 20.0688L17.0791 19.7153L19.2609 17.5335ZM0.838867 13.1722C0.838867 6.62443 6.17009 1.29321 12.7179 1.29321C19.2656 1.29321 24.5969 6.62443 24.5969 13.1722C24.5969 19.72 19.2656 25.0512 12.7179 25.0512C6.17009 25.0512 0.838867 19.72 0.838867 13.1722Z" fill="#DD0E27"/>
                                                        <path d="M19.2609 17.5335L19.6145 17.1799L19.2609 16.8264L15.6068 13.1722L19.2609 9.51807L19.6145 9.16451L19.2609 8.81096L17.0791 6.62916L16.7256 6.27561L16.372 6.62916L12.7179 10.2833L9.06372 6.62916L8.71017 6.27561L8.35661 6.62916L6.17481 8.81096L5.82126 9.16451L6.17481 9.51807L9.82896 13.1722L6.17481 16.8264L5.82126 17.1799L6.17481 17.5335L8.35661 19.7153L8.71017 20.0688L9.06372 19.7153L12.7179 16.0611L16.372 19.7153L16.7256 20.0688L17.0791 19.7153L19.2609 17.5335ZM0.838867 13.1722C0.838867 6.62443 6.17009 1.29321 12.7179 1.29321C19.2656 1.29321 24.5969 6.62443 24.5969 13.1722C24.5969 19.72 19.2656 25.0512 12.7179 25.0512C6.17009 25.0512 0.838867 19.72 0.838867 13.1722Z" stroke="black"/>
                                                        <path d="M19.2609 17.5335L19.6145 17.1799L19.2609 16.8264L15.6068 13.1722L19.2609 9.51807L19.6145 9.16451L19.2609 8.81096L17.0791 6.62916L16.7256 6.27561L16.372 6.62916L12.7179 10.2833L9.06372 6.62916L8.71017 6.27561L8.35661 6.62916L6.17481 8.81096L5.82126 9.16451L6.17481 9.51807L9.82896 13.1722L6.17481 16.8264L5.82126 17.1799L6.17481 17.5335L8.35661 19.7153L8.71017 20.0688L9.06372 19.7153L12.7179 16.0611L16.372 19.7153L16.7256 20.0688L17.0791 19.7153L19.2609 17.5335ZM0.838867 13.1722C0.838867 6.62443 6.17009 1.29321 12.7179 1.29321C19.2656 1.29321 24.5969 6.62443 24.5969 13.1722C24.5969 19.72 19.2656 25.0512 12.7179 25.0512C6.17009 25.0512 0.838867 19.72 0.838867 13.1722Z" stroke="url(#paint0_linear)"/>
                                                        <path d="M19.2609 17.5335L19.6145 17.1799L19.2609 16.8264L15.6068 13.1722L19.2609 9.51807L19.6145 9.16451L19.2609 8.81096L17.0791 6.62916L16.7256 6.27561L16.372 6.62916L12.7179 10.2833L9.06372 6.62916L8.71017 6.27561L8.35661 6.62916L6.17481 8.81096L5.82126 9.16451L6.17481 9.51807L9.82896 13.1722L6.17481 16.8264L5.82126 17.1799L6.17481 17.5335L8.35661 19.7153L8.71017 20.0688L9.06372 19.7153L12.7179 16.0611L16.372 19.7153L16.7256 20.0688L17.0791 19.7153L19.2609 17.5335ZM0.838867 13.1722C0.838867 6.62443 6.17009 1.29321 12.7179 1.29321C19.2656 1.29321 24.5969 6.62443 24.5969 13.1722C24.5969 19.72 19.2656 25.0512 12.7179 25.0512C6.17009 25.0512 0.838867 19.72 0.838867 13.1722Z" stroke="url(#paint1_linear)"/>
                                                    </svg>
                                                    </span>
                                            </div>
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
    import http from "../../http-common"
    import XLSX from "xlsx";
    export default {
        name: "CompetenceTable",
        data() {
            return {
                searchCompetence: '',
                stat: '',
                errored: false,
                competence: []
            }
        },
        mounted() {
            this.getCompetence()
        },
        methods: {
            getCompetence: function() {
                http
                    .get('competences')
                    .then(res => {
                        this.competence = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            download: function() {
                const data = XLSX.utils.json_to_sheet(this.competence);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, data, "data");
                XLSX.writeFile(wb, "competence.xlsx");
            },
            deleteCompetence: function(id) {
                http
                    .delete('competences/' + id)
                    .then(function(response) {
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getCompetence()
                            this.$toast.success(`Competence supprimée avec succès`, {
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
            hide_show_table: function(col_name) {
                let i
                let all_col
                const checkbox_val = document.getElementById(col_name).value
                if (checkbox_val === "hide") {
                    all_col = document.getElementsByClassName(col_name)
                    for (i = 0; i < all_col.length; i++) {
                        all_col[i].style.display = "none"
                    }
                    document.getElementById(col_name + "_head").style.display = "none"
                    document.getElementById(col_name).value = "show"
                } else if (checkbox_val === "show") {
                    all_col = document.getElementsByClassName(col_name)
                    for (i = 0; i < all_col.length; i++) {
                        all_col[i].style.display = "table-cell"
                    }
                    document.getElementById(col_name + "_head").style.display = "table-cell"
                    document.getElementById(col_name).value = "hide"
                }
            }
        },
        computed: {
            filtered: function() {
                let search = this.competence;
                const searchCompetence = this.searchCompetence;
                if (!searchCompetence) {
                    return search;
                }
                search = search.filter(function(item) {
                    if (item.blocs.toLowerCase().indexOf(searchCompetence) !== -1 || item.blocs.toUpperCase().indexOf(searchCompetence) !== -1) {
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