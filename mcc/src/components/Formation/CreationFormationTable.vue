<template>
    <div class="px-10">
        <div class="ajout justify-between mt-12">
            <div class="items-center">
                <div>
                    <h1 class="montserrat font-bold text-2xl text-theme-bleu-marine">
                        CREATION FORMATION
                    </h1>
                    <div v-if="errored">
                        <div class="flex flex-wrap">
                            <div class="grid grid-cols-6 w-full gap-2">
                                <div class="col-start-1 col-end-3">
                                    <button v-on:click="newFormation()" class="add-composante-role font-bold pr-10 inter text-xl text-white space-x-10" type="button">Ajouter</button>
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
                                    <button v-on:click="newFormation()" class="add-composante-role pr-10 inter font-bold text-xl text-white space-x-10" type="button">Ajouter</button>
                                </div>
                                <div class="col-end-7 col-span-2">
                                    <div class="w-full px-3 mb-6">
                                        <input class="input-recherche shadow-box md:p-2 sm:p-2 xl:p-32 lg:p-32 ml-28" type="search" placeholder="Recherche" v-model="searchFormation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="mt-6 mb-5 space-x-2">
                                <label class="inline-flex items-center ml-2">
                                    <input type="checkbox" value="hide" id="formation_col" v-on:change="hide_show_table('formation_col')">
                                    <span class="ml-2">Formation</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="modaliteFormation_col" v-on:change="hide_show_table('modaliteFormation_col')">
                                    <span class="ml-2">Modalité Formation</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="niveauRequis_col" v-on:change="hide_show_table('niveauRequis_col')">
                                    <span class="ml-2">Niveau Requis</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="dateOuverture_col" v-on:change="hide_show_table('dateOuverture_col')">
                                    <span class="ml-2">Date d'ouverture</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="nbEtudiants_col" v-on:change="hide_show_table('nbEtudiants_col')">
                                    <span class="ml-2">Nombre Etudiants</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="modaliteRecrutement_col" v-on:change="hide_show_table('modaliteRecrutement_col')">
                                    <span class="ml-2">Modalité Recrutement</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="organisation_col" v-on:change="hide_show_table('organisation_col')">
                                    <span class="ml-2">Organisation</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="competences_col" v-on:change="hide_show_table('competences_col')">
                                    <span class="ml-2">Compétence</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="motivation_col" v-on:change="hide_show_table('motivation_col')">
                                    <span class="ml-2">Motivation</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="pointsSpe_col" v-on:change="hide_show_table('pointsSpe_col')">
                                    <span class="ml-2">Points spécifique</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="public_col" v-on:change="hide_show_table('public_col')">
                                    <span class="ml-2">Public visé</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="insertionPro_col" v-on:change="hide_show_table('insertionPro_col')">
                                    <span class="ml-2">Insertion professionnelle</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="partenaire_col" v-on:change="hide_show_table('partenaire_col')">
                                    <span class="ml-2">Partenaires</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="partenairesHistorique_col" v-on:change="hide_show_table('partenairesHistorique_col')">
                                    <span class="ml-2">Historique lien partenaire</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="concurrence_col" v-on:change="hide_show_table('concurrence_col')">
                                    <span class="ml-2">Concurrence</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="diversificationPeda_col" v-on:change="hide_show_table('diversificationPeda_col')">
                                    <span class="ml-2">Diversification pédagogique</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="serviceDiversification_col" v-on:change="hide_show_table('serviceDiversification_col')">
                                    <span class="ml-2">Service diversification pédagogique</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="modalitePedagogique_col" v-on:change="hide_show_table('modalitePedagogique_col')">
                                    <span class="ml-2">Modalité Pédagogique</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="mutualisation_col" v-on:change="hide_show_table('mutualisation_col')">
                                    <span class="ml-2">Taux de mutualisation des enseignements</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="recherche_col" v-on:change="hide_show_table('recherche_col')">
                                    <span class="ml-2">Lien avec la recherche</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="equipements_col" v-on:change="hide_show_table('equipements_col')">
                                    <span class="ml-2">Equipements</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="strategie_col" v-on:change="hide_show_table('strategie_col')">
                                    <span class="ml-2">Strategie</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" value="hide" id="actions_col" v-on:change="hide_show_table('actions_col')">
                                    <span class="ml-2">Actions de communication</span>
                                </label>
                            </div>
                        </div>
                        <div class="shadow-box w-full rounded-lg overflow-x-auto">
                            <table class="shadow-box w-full rounded-lg">
                                <thead>
                                <tr class="inter font-semibold text-xl border-b my-3 text-theme-bleu-marine">
                                    <th id="formation_col_head" scope="col">Formation</th>
                                    <th id="modaliteFormation_col_head" scope="col">Modalité Formation</th>
                                    <th id="niveauRequis_col_head" scope="col">Niveau Requis</th>
                                    <th id="dateOuverture_col_head" scope="col">Date d'ouverture</th>
                                    <th id="nbEtudiants_col_head" scope="col">Nombre Etudiants</th>
                                    <th id="modaliteRecrutement_col_head" scope="col">Modalité Recrutement</th>
                                    <th id="organisation_col_head" scope="col">Organisation</th>
                                    <th id="competences_col_head" scope="col">Compétence</th>
                                    <th id="motivation_col_head" scope="col">Motivation</th>
                                    <th id="pointsSpe_col_head" scope="col">Points spécifique</th>
                                    <th id="public_col_head" scope="col">Public visé</th>
                                    <th id="insertionPro_col_head" scope="col">Insertion professionnelle</th>
                                    <th id="partenaire_col_head" scope="col">Partenaires</th>
                                    <th id="partenairesHistorique_col_head" scope="col">Historique lien partenaire</th>
                                    <th id="concurrence_col_head" scope="col">Concurrence</th>
                                    <th id="diversificationPeda_col_head" scope="col">Diversification pédagogique</th>
                                    <th id="serviceDiversification_col_head" scope="col">Service diversification pédagogique</th>
                                    <th id="modalitePedagogique_col_head" scope="col">Modalité Pédagogique</th>
                                    <th id="mutualisation_col_head" scope="col">Taux de mutualisation des enseignements</th>
                                    <th id="recherche_col_head" scope="col">Lien avec la recherche</th>
                                    <th id="equipements_col_head" scope="col">Equipements</th>
                                    <th id="strategie_col_head" scope="col">Strategie</th>
                                    <th id="actions_col_head" scope="col">Actions de communication</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in filtered" :key="item">
                                    <td class="formation_col">{{ textFormations(item.formation) }}</td>
                                    <td class="modaliteFormation_col">{{ textModaliteFormations(item.modaliteFormation) }}</td>
                                    <td class="niveauRequis_col">{{ item.niveauRequis }}</td>
                                    <td class="dateOuverture_col">{{ formatDate(item.dateOuverture) }}</td>
                                    <td class="nbEtudiants_col">{{ item.nbEtudiants }}</td>
                                    <td class="modaliteRecrutement_col">{{ textModaliteRecrutements(item.modaliteRecrutement) }}</td>
                                    <td class="organisation_col">{{ item.organisation }}</td>
                                    <td class="competences_col">{{ item.competences }}</td>
                                    <td class="motivation_col">{{ item.motivation }}</td>
                                    <td class="pointsSpe_col">{{ item.pointsSpe }}</td>
                                    <td class="public_col">{{ item.public }}</td>
                                    <td class="insertionPro_col">{{ item.insertionPro }}</td>
                                    <td class="partenaire_col">{{ textPartenaires(item.partenaire) }}</td>
                                    <td class="partenairesHistorique_col">{{ item.partenairesHistorique }}</td>
                                    <td class="concurrence_col">{{ item.concurrence }}</td>
                                    <td class="diversificationPeda_col">{{ item.diversificationPeda }}</td>
                                    <td class="serviceDiversification_col">{{ item.serviceDiversification }}</td>
                                    <td class="modalitePedagogique_col">{{ textModalitePedagogiques(item.modalitePedagogique) }}</td>
                                    <td class="mutualisation_col">{{ item.mutualisation }}</td>
                                    <td class="recherche_col">{{ item.recherche }}</td>
                                    <td class="equipements_col">{{ item.equipements }}</td>
                                    <td class="strategie_col">{{ item.strategie }}</td>
                                    <td class="actions_col">{{ item.actions }}</td>
                                    <td>
                                        <div class="px-6 py-4 flex justify-center items-stretch text-gray-900">
                                            <router-link :to="{ name: 'updateCreationFormation', params: { id: item.id }}">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse cx="12.9405" cy="12.7347" rx="12.379" ry="12.3522"  fill="#362A66" />
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M21.4932 23.9457H4.61279V20.5769H21.4932V23.9457ZM13.9477 8.10395L17.1127 11.2622L9.46591 18.8925H6.30083V15.7343L13.9477 8.10395ZM18.0158 10.361L14.8508 7.2028L16.3953 5.66158C16.4734 5.58351 16.5661 5.52157 16.6682 5.4793C16.7704 5.43704 16.8798 5.41529 16.9903 5.41529C17.1009 5.41529 17.2103 5.43704 17.3124 5.4793C17.4145 5.52157 17.5073 5.58351 17.5854 5.66158L19.5604 7.63232C19.8896 7.96078 19.8896 8.49136 19.5604 8.81982L18.0158 10.361Z"
                                                              fill="white" />
                                                    </g>
                                                    <defs><clipPath id="clip0"><rect width="20.2565" height="20.2127"  fill="white" transform="translate(2.92432 0.328369)" /></clipPath> </defs>
                                                </svg>
                                            </router-link>
                                            <span v-on:click="deleteFormation(item.id)">
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
    import http from "../../http-common";
    import moment from "moment";

    export default {
        name: "FormationTable",
        data() {
            return {
                formation: '',
                formations: '',
                partenaires: '',
                modalite_formations: '',
                modalite_recrutements: '',
                modalite_pedagogiques: '',
                searchFormation: '',
                stat: '',
                errored: false
            }
        },
        mounted() {
            this.getFormation()
            this.getFormations()
            this.getModaliteFormations()
            this.getModaliteRecrutements()
            this.getModalitePedagogiques()
            this.getPartenaires()
        },
        methods: {
            getFormation: function() {
                http
                    .get('creationformations')
                    .then(res => {
                        this.formation = res.data['hydra:member']
                        const total = res.data['hydra:totalItems']
                        if (total === 0) {
                            this.errored = true
                        }
                    })
            },
            newFormation: function() {
                this.$router.push({
                    name: 'newCreationFormation'
                })
            },
            deleteFormation: function(id) {
                http
                    .delete('creationformations/' + id)
                    .then(function(response) {
                        this.stat = response.status
                        if (this.stat === 204) {
                            this.getFormation()
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
            getFormations: function () {
                http
                    .get('formations')
                    .then(response => { this.formations = response.data["hydra:member"] })
            },
            getModaliteFormations: function () {
                http
                    .get('modalite_formations')
                    .then(response => { this.modalite_formations = response.data["hydra:member"] })
            },
            getModaliteRecrutements: function () {
                http
                    .get('modalite_recrutements')
                    .then(response => { this.modalite_recrutements = response.data["hydra:member"] })
            },
            getModalitePedagogiques: function () {
                http
                    .get('modalite_pedagogiques')
                    .then(response => { this.modalite_pedagogiques = response.data["hydra:member"] })
            },
            getPartenaires: function () {
                http
                    .get('partenaires')
                    .then(response => { this.partenaires = response.data["hydra:member"] })
            },
            formatDate(value) {
                return moment(value).format("LL")
            },
            textFormations: function (value) {
                for (let i = 0; i < this.formations.length; i++) {
                    if (value === this.formations[i]['@id'])  return this.formations[i].libelle
                }
            },
            textModaliteRecrutements: function (value) {
                for (let i = 0; i < this.modalite_recrutements.length; i++) {
                    if (value === this.modalite_recrutements[i]['@id'])  return this.modalite_recrutements[i].libelle
                }
            },
            textModaliteFormations: function (value) {
                for (let i = 0; i < this.modalite_formations.length; i++) {
                    if (value === this.modalite_formations[i]['@id'])  return this.modalite_formations[i].libelle
                }
            },
            textModalitePedagogiques: function (value) {
                for (let i = 0; i < this.modalite_pedagogiques.length; i++) {
                    if (value === this.modalite_pedagogiques[i]['@id'])  return this.modalite_pedagogiques[i].libelle
                }
            },
            textPartenaires: function (value) {
                for (let i = 0; i < this.partenaires.length; i++) {
                    if (value === this.partenaires[i]['@id'])  return this.partenaires[i].libelle
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
                let search = this.formation
                const searchFormation = this.searchFormation

                if (!searchFormation) {
                    return search;
                }
                search = search.filter(function(item) {
                    if (item.formation.toLowerCase().indexOf(searchFormation) !== -1 || item.formation.toUpperCase().indexOf(searchFormation) !== -1) {
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