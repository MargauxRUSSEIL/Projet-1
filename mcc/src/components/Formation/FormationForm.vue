<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">

                <!--Création d'une formation-->
                <p class="text-lg mt-16 mb-10 ml-1">A – Création d'une formation</p>
                <div class="w-full px-3 mb-12">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Création d’une mention de diplôme national en
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" value="licence" v-model="form.typeFormation">
                        <span class="ml-2 mr-3">Licence Générale</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" value="licencePro" v-model="form.typeFormation">
                        <span class="ml-2 mr-3">Licence Professionelle</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" value="master" v-model="form.typeFormation">
                        <span class="ml-2 mr-3">Master</span>
                    </label>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Type de Diplome
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.typeDiplome"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Intitulé
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Domaine
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Parcours
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.parcours"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        S'il ne s’agit pas d’un diplôme national (DU…) – Indiquer l’intitulé complet
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Modalité de la formation (cocher les mentions inutiles - si plusieurs années préciser les modalités pour chaque année de formation)
                    </label>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" value="licence">
                            <span class="ml-2 mr-3">Formation initiale</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" value="licence">
                            <span class="ml-2 mr-3">Formation continue</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" value="licence">
                            <span class="ml-2 mr-3">Formation en alternance</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" value="licence">
                            <span class="ml-2 mr-3">Contrat d’apprentissage</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" value="licence">
                            <span class="ml-2 mr-3">Contrat de professionnalisation</span>
                        </label>
                    </div>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Composante de rattachement (préciser département pour l’IUT et l’institut ST)
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.composante"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Site de Formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.localisation"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Porteur du Projet :
                    </label>
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Nom
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Prénom
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Téléphone
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-1/4 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Adresse Mail
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Description :
                    </label>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Niveau requis pour intégrer la formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Niveau de sortie de la formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Date d’ouverture envisagée
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="date"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Nombre d’étudiants attendus à l’ouverture de la formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="number"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Calendrier prévisionnel de la formation (donner une brève description et joindre le
                        calendrier)
                    </label>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6">
              <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
              ></textarea>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="file"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Modalités de recrutement des étudiants : (préciser s’il s’agit d’une étude de dossier, d’un entretien de sélection, d’un examen d’entrée)
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Organisation de la formation : (schéma général, portails, mutualisation des parcours types, articulation M1/M2 pour les masters, part du socle commun)
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                    >
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Quelles compétences la formation permet-elle d’acquérir
                    </label>
                    <div v-for="item in competences" v-bind:key="item">
                        <label class="inline-flex items-center">
                            <input type="checkbox" :value="item">
                            <span class="ml-2 mr-3">{{ item }}</span>
                        </label>
                    </div>
                </div>


                <!--Justification du projet-->
                <p class="text-lg mb-10 mt-16 ml-1">B – Justification du projet</p>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Motivation du projet : (présenter brièvement le projet et les raisons pour lesquelles l’ouverture de la formation est justifiée)
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Points forts ou spécifiques
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Public visé
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Insertion professionnelle (préciser les principaux débouchés et métiers auxquels peut mener la formation)
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Liens avec le monde socio-économique
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Partenaires éventuels : (administrations, associations, CFA, entreprises, établissements français ou étrangers, fondations)
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Bref historique des liens avec le ou les partenaires
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Étude de la concurrence et positionnement au regard de l’offre de formation de CY
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
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
                    ></textarea>
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Souhaitez-vous être accompagné par le service diversification pédagogique ?
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" value="licence">
                        <span class="ml-2 mr-3">Oui</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" value="licencePro">
                        <span class="ml-2 mr-3">Non</span>
                    </label>
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Quelles sont les modalités choisies ?
                    </label>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="licence">
                            <span class="ml-2 mr-3">Presentiel</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="licencePro">
                            <span class="ml-2 mr-3">Distanciel</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="licencePro">
                            <span class="ml-2 mr-3">Hybride (alternance de cours en présentiel et distanciel) en %</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="licencePro">
                            <span class="ml-2 mr-3">Comodal (cours suivi simultanément par des étudiants en distanciel et en présentiel avec un enseignant en présentiel)</span>
                        </label>
                    </div>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Taux de mutualisation des enseignements avec des enseignements existants : préciser la
                        proportion du nombre d’heures correspondant à des mutualisations avec des enseignements existants
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
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
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        La formation est-elle incluse dans un projet de recherche financé par un tiers ?
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        La formation utilise-t-elle des équipements d’un laboratoire, d’une plateforme ?
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Internationalisation (cours en langue étrangère, étudiants étrangers entrants…)
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Pour une formation internationale (double diplôme ou formation délocalisée),
                        en quoi le projet s’inscrit-il dans la stratégie internationale de CY ? dans la stratégie d’internationalisation de la composante ?
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
                    ></textarea>
                </div>
                <div class="w-full md:w-2/2 px-3 mb-10">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Actions de communication envisagées pour promouvoir la formation ?
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              type="text"
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
    import axios from 'axios'

    const BaseUrl = 'http://localhost:8000/api/';

    export default {
        name: 'FormationForm',
        data() {
            return {
                competences: '',
                form: {
                    structureHaute: 0,
                    codeDiplome: '',
                    ecoleDoctorale: '',
                    contact: '',
                    commentaire: '',
                    typeFormation: '',
                    VDI: '',
                    localisation: '',
                    composante: '',
                    typeDiplome: '',
                    workflow: '',
                    statuts: '',
                    parcours: '',
                    mention: '',
                    vDI: ''
                }
            }
        },
        mounted() {
            this.getCompetence()
        },
        methods: {
            submit: function () {
                axios.post( BaseUrl+ 'formations', this.form)
                    // eslint-disable-next-line no-unused-vars
                    .then(function( response ){
                        // Handle success
                    }.bind(this));
            },
            getCompetence: function () {
                axios
                    .get(BaseUrl + 'competences')
                    .then(res => (this.competences = res.data['hydra:member']))
            },
        }
    }
</script>

<style scoped>

</style>