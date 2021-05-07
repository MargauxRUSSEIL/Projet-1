<template>
    <div class="px-10">
        <div class="ajout justify-between mt-12">
            <div class="items-center">
                <div>
                    <h1 class="montserrat font-bold text-2xl text-theme-bleu-marine">
                        FORMATION
                    </h1>
                    <div v-if="errored">
                        <div class="flex flex-wrap ">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3">
                                    <div class="pr-10 inter font-bold text-m text-white space-x-10">
                                        <router-link :to="{name: 'newFormation'}">
                                          <span class="add-composante-role font-bold pr-10 inter text-xl text-white space-x-10" type="button">Nouveau</span>
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
                                        <router-link :to="{name: 'newFormation'}">
                                            <span class="add-composante-role pr-10 inter font-bold text-xl text-white space-x-10" type="button">Ajouter</span>
                                        </router-link>
                                        <button class="add-composante-role exporter pr-10 inter font-bold text-xl text-white space-x-10" type="button" v-on:click="download">Exporter</button>
                                    </div>
                                </div>
                                <div class="col-end-7 col-span-2 ">
                                    <div class="w-full px-3 mb-6">
                                        <input class="input-recherche shadow-box md:p-2 sm:p-2 xl:p-32 lg:p-32 ml-28" type="search" placeholder="Recherche" v-model="searchFormation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="mt-6 mb-5 space-x-2">
                                <label class="inline-flex items-center ml-2">
                                    <input type="checkbox" value="hide" id="libelle_col" v-on:click="hide_show_table('libelle_col')">
                                    <span class="ml-2">Libelle</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="statut_col" v-on:change="hide_show_table('statut_col')">
                                    <span class="ml-2">Statut</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="composante_col" v-on:change="hide_show_table('composante_col')">
                                    <span class="ml-2">Composante</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="localisation_col" v-on:change="hide_show_table('localisation_col')">
                                    <span class="ml-2">Localisation</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="typeDiplome_col" v-on:change="hide_show_table('typeDiplome_col')">
                                    <span class="ml-2">Type de diplome</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="domaine_col" v-on:change="hide_show_table('domaine_col')">
                                    <span class="ml-2">Domaine</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="mention_col" v-on:change="hide_show_table('mention_col')">
                                    <span class="ml-2">Mention</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="niveau_col" v-on:change="hide_show_table('niveau_col')">
                                    <span class="ml-2">Niveau</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="user_col" v-on:change="hide_show_table('user_col')">
                                    <span class="ml-2">Utilisateur</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="structureHaute_col" v-on:change="hide_show_table('structureHaute_col')">
                                    <span class="ml-2">Structure Haute</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="codeDiplome_col" v-on:change="hide_show_table('codeDiplome_col')">
                                    <span class="ml-2">Code Diplome</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="ecoleDoctorale_col" v-on:change="hide_show_table('ecoleDoctorale_col')">
                                    <span class="ml-2">Ecole doctorale</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="contact_col" v-on:change="hide_show_table('contact_col')">
                                    <span class="ml-2">Contact</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="commentaire_col" v-on:change="hide_show_table('commentaire_col')">
                                    <span class="ml-2">Commentaire</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="VDI_col" v-on:change="hide_show_table('VDI_col')">
                                    <span class="ml-2">VDI</span>
                                </label>
                            </div>
                        </div>
                        <div class="shadow-box w-full rounded-lg overflow-x-auto">
                            <table class="shadow-box w-full rounded-lg">
                                <thead>
                                <tr class="inter font-semibold text-xl border-b my-3 text-theme-bleu-marine">
                                    <th id="libelle_col_head" scope="col">Libelle</th>
                                    <th id="statut_col_head" scope="col">Statut</th>
                                    <th id="composante_col_head" scope="col">Composante</th>
                                    <th id="localisation_col_head" scope="col">Localisation</th>
                                    <th id="typeDiplome_col_head" scope="col">Type de diplome</th>
                                    <th id="domaine_col_head" scope="col">Domaine</th>
                                    <th id="mention_col_head" scope="col">Mention</th>
                                    <th id="niveau_col_head" scope="col">Niveau</th>
                                    <th id="user_col_head" scope="col">Utilisateur</th>
                                    <th id="structureHaute_col_head" scope="col">Structure Haute</th>
                                    <th id="codeDiplome_col_head" scope="col">Code Diplome</th>
                                    <th id="ecoleDoctorale_col_head" scope="col">Ecole doctorale</th>
                                    <th id="contact_col_head" scope="col">Contact</th>
                                    <th id="commentaire_col_head" scope="col">Commentaire</th>
                                    <th id="VDI_col_head" scope="col">VDI</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in formations" :key="item">
                                    <td class="libelle_col">{{ item.libelle }}</td>
                                    <td class="statut_col">{{ item.statut }}</td>
                                    <td class="composante_col">{{ textComposante(item.composante) }}</td>
                                    <td class="localisation_col">{{ textLocalisation(item.localisation) }}</td>
                                    <td class="typeDiplome_col">{{ textTypeDiplome(item.typeDiplome) }}</td>
                                    <td class="domaine_col">{{ textDomaine(item.domaine) }}</td>
                                    <td class="mention_col">{{ textMentions(item.mention) }}</td>
                                    <td class="niveau_col">{{ textNiveau(item.niveau) }}</td>
                                    <td class="user_col">{{ textUser(item.user) }}</td>
                                    <td class="structureHaute_col">{{ item.structureHaute }}</td>
                                    <td class="codeDiplome_col">{{ item.codeDiplome }}</td>
                                    <td class="ecoleDoctorale_col">{{ item.ecoleDoctorale }}</td>
                                    <td class="contact_col">{{ item.contact }}</td>
                                    <td class="commentaire_col">{{ item.commentaire }}</td>
                                    <td class="VDI_col">{{ item.VDI }}</td>
                                    <td>
                                        <div class="px-6 py-4 flex justify-center items-stretch text-gray-900">
                                            <router-link :to="{ name: 'updateFormation', params: { id: item.id }}">
                                                <svg role="img" aria-label="Modifier" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse cx="12.9405" cy="12.7347" rx="12.379" ry="12.3522"  fill="#362A66" />
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M21.4932 23.9457H4.61279V20.5769H21.4932V23.9457ZM13.9477 8.10395L17.1127 11.2622L9.46591 18.8925H6.30083V15.7343L13.9477 8.10395ZM18.0158 10.361L14.8508 7.2028L16.3953 5.66158C16.4734 5.58351 16.5661 5.52157 16.6682 5.4793C16.7704 5.43704 16.8798 5.41529 16.9903 5.41529C17.1009 5.41529 17.2103 5.43704 17.3124 5.4793C17.4145 5.52157 17.5073 5.58351 17.5854 5.66158L19.5604 7.63232C19.8896 7.96078 19.8896 8.49136 19.5604 8.81982L18.0158 10.361Z"
                                                              fill="white" />
                                                    </g>
                                                    <defs><clipPath id="clip0"><rect width="20.2565" height="20.2127"  fill="white" transform="translate(2.92432 0.328369)" /></clipPath> </defs>
                                                </svg>
                                            </router-link>
                                            <span role="button" v-on:click="deleteFormations(item.id)">
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
    import http from '../../http-common'
    import XLSX from "xlsx";
    export default {
        name: "FormationTable",
        data() {
            return {
                errored: false,
                stat: '',
                composantes: '',
                domaines: '',
                users: '',
                localisations: '',
                type_diplome: '',
                niveaux: '',
                mentions: '',
                formations: [],
                searchFormation: [],
            }
        },
        mounted() {
            this.getFormations()
            this.getComposante()
            this.getLocalisation()
            this.getNiveau()
            this.getTypeDiplome()
            this.getMentions()
            this.getDomaine()
            this.getUser()
        },
        methods: {
            getFormations: function() {
                http
                    .get('formations')
                    .then(res => {
                        this.formations = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            deleteFormations: function(id) {
                http
                    .delete('formations/' + id)
                    .then(function(response) {
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getFormations()
                            this.$toast.success(`Formation supprimée avec succès`, {
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
            download: function() {
                const data = XLSX.utils.json_to_sheet(this.formations);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, data, "data");
                XLSX.writeFile(wb, "formations.xlsx");
            },
            getComposante: function() {
                http
                    .get('composantes')
                    .then(response => {
                        this.composantes = response.data["hydra:member"]
                    })
            },
            getLocalisation: function() {
                http
                    .get('localisations')
                    .then(response => {
                        this.localisations = response.data["hydra:member"]
                    })
            },
            getNiveau: function() {
                http
                    .get('niveaux')
                    .then(response => {
                        this.niveaux = response.data["hydra:member"]
                    })
            },
            getMentions: function() {
                http
                    .get('mentions')
                    .then(response => {
                        this.mentions = response.data["hydra:member"]
                    })
            },
            getTypeDiplome: function() {
                http
                    .get('type_diplomes')
                    .then(response => {
                        this.type_diplome = response.data["hydra:member"]
                    })
            },
            getDomaine: function() {
                http
                    .get('domaines')
                    .then(response => {
                        this.domaines = response.data["hydra:member"]
                    })
            },
            getUser: function() {
                http
                    .get('users')
                    .then(response => {
                        this.users = response.data["hydra:member"]
                    })
            },
            textNiveau: function(value) {
                for (let i = 0; i < this.niveaux.length; i++) {
                    if (value === this.niveaux[i]['@id']) return this.niveaux[i].libelle
                }
            },
            textMentions: function(value) {
                for (let i = 0; i < this.mentions.length; i++) {
                    if (value === this.mentions[i]['@id']) return this.mentions[i].libelle
                }
            },
            textComposante: function(value) {
                for (let i = 0; i < this.composantes.length; i++) {
                    if (value === this.composantes[i]['@id']) return this.composantes[i].libelle
                }
            },
            textLocalisation: function(value) {
                for (let i = 0; i < this.localisations.length; i++) {
                    if (value === this.localisations[i]['@id']) return this.localisations[i].adresse + ' - ' + this.localisations[i].ville + this.localisations[i].codePostal
                }
            },
            textTypeDiplome: function(value) {
                for (let i = 0; i < this.type_diplome.length; i++) {
                    if (value === this.type_diplome[i]['@id']) return this.type_diplome[i].libelle
                }
            },
            textDomaine: function(value) {
                for (let i = 0; i < this.domaines.length; i++) {
                    if (value === this.domaines[i]['@id']) return this.domaines[i].libelle
                }
            },
            textUser: function(value) {
                for (let i = 0; i < this.users.length; i++) {
                    if (value === this.users[i]['@id']) return this.users[i].nom + ' ' + this.users[i].prenom + ' ' + this.users[i].mail
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
                let search = this.formations
                const searchFormation = this.searchFormation
                if (!searchFormation) {
                    return search
                }
                search = search.filter(function(item) {
                    if (item.libelle.toLowerCase().indexOf(searchFormation) !== -1 || item.libelle.toUpperCase().indexOf(searchFormation) !== -1) {
                        return item
                    }
                })
                return search
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