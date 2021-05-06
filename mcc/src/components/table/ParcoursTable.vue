<template>
    <div class="px-10">
        <div class="ajout justify-between mt-12">
            <div class="items-center">
                <div>
                    <h1 class="montserrat font-bold text-2xl text-theme-bleu-marine">
                        PARCOURS
                    </h1>
                    <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-5" v-if="errored">
                        <div class="flex flex-wrap ">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3">
                                    <div class="w-full px-3 mb-6">
                                        <router-link :to="{ name: 'newParcours' }">
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
                        <div class="flex flex-wrap ">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3">
                                    <div class="pr-10 inter font-bold text-m text-white space-x-10">
                                        <router-link :to="{ name: 'newParcours' }">
                                            <span class="add-composante-role" type="button">Ajouter</span>
                                        </router-link>
                                    </div>
                                </div>
                                <div class="col-end-7 col-span-2">
                                    <div class="w-full px-3 mb-6">
                                        <input class="input-recherche shadow-box md:p-2 sm:p-2 xl:p-32 lg:p-32 ml-28" type="search" placeholder="Recherche" v-model="searchParcours">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="mt-6 mb-5 space-x-2">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="formation_col" v-on:change="hide_show_table('formation_col')">
                                    <span class="ml-2">Formation</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="structureProlongee_col" v-on:change="hide_show_table('structureProlongee_col')">
                                    <span class="ml-2">Structure prolonge</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="structureBasse_col" v-on:change="hide_show_table('structureBasse_col')">
                                    <span class="ml-2">Structure basse</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="commentaire_col" v-on:change="hide_show_table('commentaire_col')">
                                    <span class="ml-2">Commentaire</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="libelle_col" v-on:change="hide_show_table('libelle_col')">
                                    <span class="ml-2">Intitulé</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="libelleParcoursApogee_col" v-on:change="hide_show_table('libelleParcoursApogee_col')">
                                    <span class="ml-2">Libellé parcours</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="secondVET_col" v-on:change="hide_show_table('secondVET_col')">
                                    <span class="ml-2">Second vet</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="annuel_col" v-on:change="hide_show_table('annuel_col')">
                                    <span class="ml-2">Annuel</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="semestre_col" v-on:change="hide_show_table('semestre_col')">
                                    <span class="ml-2">Semestre</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="user_col" v-on:change="hide_show_table('user_col')">
                                    <span class="ml-2">Utilisateur</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <table class="shadow-box w-full rounded-lg">
                                <thead>
                                <tr class="inter font-semibold text-xl border-b my-3 text-theme-bleu-marine">
                                    <th id="formation_col_head" scope="col">Formation</th>
                                    <th id="structureProlongee_col_head" scope="col">Structure prolonge</th>
                                    <th id="structureBasse_col_head" scope="col">Structure basse</th>
                                    <th id="commentaire_col_head" scope="col">Commentaire</th>
                                    <th id="libelle_col_head" scope="col">Intitulé</th>
                                    <th id="libelleParcoursApogee_col_head" scope="col">Libellé parcours</th>
                                    <th id="secondVET_col_head" scope="col">Second vet</th>
                                    <th id="annuel_col_head" scope="col">Annuel</th>
                                    <th id="semestre_col_head" scope="col">Semestre</th>
                                    <th id="user_col_head" scope="col">Utilisateur</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in filtered" :key="item">
                                    <td class="formation_col">{{ textFormation(item.formation) }}</td>
                                    <td class="structureProlongee_col">{{ item.structureProlongee }}</td>
                                    <td class="structureBasse_col">{{ item.structureBasse }}</td>
                                    <td class="commentaire_col">{{ item.commentaire }}</td>
                                    <td class="libelle_col">{{ item.libelle }}</td>
                                    <td class="libelleParcoursApogee_col">{{ item.libelleParcoursApogee }}</td>
                                    <td class="secondVET_col">{{ item.secondVET }}</td>
                                    <td class="annuel_col">{{ textAnnuel(item.annuel) }}</td>
                                    <td class="semestre_col">{{ textSemestre(item.semestre) }}</td>
                                    <td class="user_col">{{ textUser(item.user) }}</td>
                                    <td>
                                        <div class="px-6 py-4 flex justify-center items-stretch text-gray-900">
                                            <router-link :to="{ name: 'updateParcours', params: { id: item.id }}">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse cx="12.9405" cy="12.7347" rx="12.379" ry="12.3522"  fill="#362A66" />
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M21.4932 23.9457H4.61279V20.5769H21.4932V23.9457ZM13.9477 8.10395L17.1127 11.2622L9.46591 18.8925H6.30083V15.7343L13.9477 8.10395ZM18.0158 10.361L14.8508 7.2028L16.3953 5.66158C16.4734 5.58351 16.5661 5.52157 16.6682 5.4793C16.7704 5.43704 16.8798 5.41529 16.9903 5.41529C17.1009 5.41529 17.2103 5.43704 17.3124 5.4793C17.4145 5.52157 17.5073 5.58351 17.5854 5.66158L19.5604 7.63232C19.8896 7.96078 19.8896 8.49136 19.5604 8.81982L18.0158 10.361Z"
                                                              fill="white" />
                                                    </g>
                                                    <defs><clipPath id="clip0"><rect width="20.2565" height="20.2127"  fill="white" transform="translate(2.92432 0.328369)" /></clipPath> </defs>
                                                </svg>
                                            </router-link>
                                            <span v-on:click="deleteParcours(item.id)">
                                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">   
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
    export default {
        name: "ParcoursTable",
        data() {
            return {
                searchParcours: '',
                stat: '',
                formations: '',
                semestres: '',
                users: '',
                errored: false,
                parcours: []
            }
        },
        mounted() {
            this.getParcours()
            this.getUser()
            this.getFormation()
            this.getSemestres()
        },
        methods: {
            getParcours: function () {
                http
                    .get('parcours')
                    .then(res => {
                        this.parcours = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            deleteParcours: function (id) {
                http
                    .delete('parcours/' + id)
                    .then(function (response) {
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getParcours()
                            this.$toast.success(`Parcours resource deleted`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                        } else if (this.stat === 404) {
                            this.$toast.error(`Resource not found`, {
                                position: "top-right"
                            })
                        }
                    }.bind(this))
            },
            getUser: function () {
                http
                    .get('users')
                    .then(response => {
                        this.users = response.data["hydra:member"]
                    })
            },
            getFormation: function () {
                http
                    .get('formations')
                    .then(response => {
                        this.formations = response.data["hydra:member"]
                    })
            },
            getSemestres: function () {
                http
                    .get('semestres')
                    .then(response => {
                        this.semestres = response.data["hydra:member"]
                    })
            },
            textUser: function (value) {
                for (let i = 0; i < this.users.length; i++) {
                    if (value === this.users[i]['@id']) return this.users[i].nom + ' ' + this.users[i].prenom + ' ' + this.users[i].mail
                }
            },
            textFormation: function (value) {
                for (let i = 0; i < this.formations.length; i++) {
                    if (value === this.formations[i]['@id']) return this.formations[i].libelle
                }
            },
            textAnnuel: function (value) {
                if (value === true) return 'oui'
                else if (value === false) return 'non'
            },
            textSemestre: function (value) {
                for (let i = 0; i < value.length; i++) {
                    for (let i = 0; i < this.semestres.length; i++) {
                        if (value[i] === this.semestres[i]['@id']) return this.semestres[i].libelle
                    }
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
                let search = this.parcours;
                const searchParcours = this.searchParcours;
                if (!searchParcours) {
                    return search;
                }
                search = search.filter(function(item) {
                    if (item.libelleParcours.toLowerCase().indexOf(searchParcours) !== -1 || item.libelleParcours.toUpperCase().indexOf(searchParcours) !== -1) {
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