<template>
    <form class="container w-auto">
        <div class="mb-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">

                <!--Création d'une formation-->
                <p class="text-lg mt-16 mb-10 ml-1">A – Création d'une formation</p>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Formation
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.formation"
                    >
                        <option v-for="item in formations" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Modalité de la formation (cocher les mentions inutiles - si plusieurs années préciser les modalités pour chaque année de formation)
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.modaliteFormation"
                    >
                        <option v-for="item in modalformation" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Niveau requis pour intégrer la formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.niveauRequis"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Date d’ouverture envisagée
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="date"
                           v-model="form.dateOuverture"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Nombre d’étudiants attendus à l’ouverture de la formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="number"
                           v-model="form.nbEtudiants"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Modalités de recrutement des étudiants
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.modaliteRecrutement"
                    >
                        <option v-for="item in modalrecrutement" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Organisation de la formation : (schéma général, portails, mutualisation des parcours types, articulation M1/M2 pour les masters, part du socle commun)
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.organisation"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Quelles compétences la formation permet-elle d’acquérir
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.competences"
                    ></textarea>
                </div>


                <!--Justification du projet-->
                <p class="text-lg mb-10 mt-16 ml-1">B – Justification du projet</p>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Motivation du projet : (présenter brièvement le projet et les raisons pour lesquelles l’ouverture de la formation est justifiée)
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.motivation"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Points forts ou spécifiques
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.pointsSpe"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Public visé
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.public"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Insertion professionnelle (préciser les principaux débouchés et métiers auxquels peut mener la formation)
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.insertionPro"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Partenaires éventuels : (administrations, associations, CFA, entreprises, établissements français ou étrangers, fondations)
                    </label>
                    <div  v-for="item in partenaire" v-bind:key="item">
                        <label class="inline-flex items-center">
                            <input type="checkbox" :id="item.libelle" :value="item['@id']" v-model="form.partenaire">
                            <span class="ml-2 mr-3">{{ item.libelle }}</span>
                        </label>
                    </div>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Historique des liens avec le ou les partenaires
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.partenairesHistorique"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Étude de la concurrence et positionnement au regard de l’offre de formation de CY
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.concurrence"
                    ></textarea>
                </div>


                <!--Diversification pédagogique-->
                <p class="text-lg mt-16 mb-10 ml-1">C – Diversification pédagogique</p>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Souhaitez vous mettre en place de la diversification pédagogique (mode projet, classe inversée …) Si oui, décrivez brièvement votre projet
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.diversificationPeda"
                    ></textarea>
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Souhaitez-vous être accompagné par le service diversification pédagogique ?
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" :value="true" v-model="form.serviceDiversification">
                        <span class="ml-2 mr-3">Oui</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" :value="false" v-model="form.serviceDiversification">
                        <span class="ml-2 mr-3">Non</span>
                    </label>
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Quelles sont les modalités choisies ?
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.modalitePedagogique"
                    >
                        <option v-for="item in modalpedagogique" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Taux de mutualisation des enseignements avec des enseignements existants : préciser la
                        proportion du nombre d’heures correspondant à des mutualisations avec des enseignements existants
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.mutualisation"
                    >
                </div>


                <!--Rayonnement de la formation-->
                <p class="text-lg mt-16 mb-10 ml-1">D - Rayonnement de la formation</p>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Liens avec la recherche : pour les masters, préciser le nom de ou des unité(s) de recherche à laquelle (auxquelles) la formation est adossée
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.recherche"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        La formation utilise-t-elle des équipements d’un laboratoire, d’une plateforme ?
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.equipements"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Pour une formation internationale (double diplôme ou formation délocalisée),
                        en quoi le projet s’inscrit-il dans la stratégie internationale de CY ? dans la stratégie d’internationalisation de la composante ?
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.strategie"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Actions de communication envisagées pour promouvoir la formation ?
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                              v-model="form.actions"
                    ></textarea>
                </div>
                <div class="w-full px-3 mt-6">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button" v-on:click="submit()">ENVOYER</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import http from "../../http-common"

    export default {
        name: 'FormationForm',
        data() {
            return {
                formations: '',
                modalrecrutement: '',
                modalpedagogique: '',
                modalformation: '',
                modalpartenaire: false,
                competences: '',
                partenaire: '',
                form: {
                    organisation: '',
                    competences: [],
                    motivation: '',
                    public: '',
                    concurrence: '',
                    mutualisation: '',
                    recherche: '',
                    equipements: '',
                    strategie: '',
                    actions: '',
                    partenaire: [],
                    formation: '',
                    modaliteFormation: '',
                    modalitePedagogique: '',
                    modaliteRecrutement: '',
                    niveauRequis: '',
                    nbEtudiants: '',
                    dateOuverture: '',
                    pointsSpe: '',
                    insertionPro: '',
                    partenairesHistorique: '',
                    diversificationPeda: '',
                    serviceDiversification: true
                }
            }
        },
        mounted() {
            this.getCompetence()
            this.getPartenaire()
            this.getModaliteFormation()
            this.getModaliteRecrutement()
            this.getModalitePedagogique()
            this.getFormation()
        },
        methods: {
            submit: function () {
                http
                    .post('creationformations', this.form)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 201) {
                            this.$toast.success(`Formation créée avec succès`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                            this.$router.push({ name: 'CreationFormation' })
                        }
                    }.bind(this))
                    .catch(function (error) {
                        this.err = error.response.status
                        if (this.err === 400) {
                            this.$toast.error(`Champ invalide`, {
                                position: "top-right"
                            })
                        }
                        else if (this.err === 422) {
                            this.$toast.error(`Entité impossible à traiter`, {
                                position: "top-right"
                            })
                        }
                        else if (this.err === 500) {
                            this.$toast.error(`La Formation existe déjà`, {
                                position: "top-right"
                            })
                        }
                    }.bind(this))
            },
            getCompetence: function () {
                http
                    .get('competences')
                    .then(res => (this.competences = res.data['hydra:member']))
            },
            getPartenaire: function () {
                http
                    .get('partenaires')
                    .then(res => (this.partenaire = res.data['hydra:member']))
            },
            getModaliteFormation: function () {
                http
                    .get('modalite_formations')
                    .then(res => (this.modalformation = res.data['hydra:member']))
            },
            getModaliteRecrutement: function () {
                http
                    .get('modalite_recrutements')
                    .then(res => (this.modalrecrutement = res.data['hydra:member']))
            },
            getModalitePedagogique: function () {
                http
                    .get('modalite_pedagogiques')
                    .then(res => (this.modalpedagogique = res.data['hydra:member']))
            },
            getFormation: function () {
                http
                    .get('formations')
                    .then(res => (this.formations = res.data['hydra:member']))
            }
        }
    }
</script>

<style scoped>

</style>