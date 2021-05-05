<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <h1>Ajouter Formation</h1>
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libelle Formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.libelle"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Statut
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.statut"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Composante
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.composante"
                    >
                        <option v-for="item in composantes" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Localisation
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.localisation"
                    >
                        <option v-for="item in localisations" v-bind:key="item" v-bind:value="item['@id']">{{ item.adresse }} - {{ item.ville }} {{ item.codePostal }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Type de diplome
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.typeDiplome"
                    >
                        <option v-for="item in typeDiplomes" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Domaine
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.domaine"
                    >
                        <option v-for="item in domaines" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Mention
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.mention"
                    >
                        <option v-for="item in mentions" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Niveau
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.niveau"
                    >
                        <option v-for="item in niveaux" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Utilisateur
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.user"
                    >
                        <option v-for="item in users" v-bind:key="item" v-bind:value="item['@id']">{{ item.nom }} {{ item.prenom }} - {{ item.mail }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Structure Haute
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="number"
                           v-model.number="form.structureHaute"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Code Diplome
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.codeDiplome"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Ecole Doctorale
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.ecoleDoctorale"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Contact
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.contact"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Commentaire
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.commentaire"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        VDI
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.vDI"
                    >
                </div>
                <div class="w-full px-3 mt-12">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button" v-on:click="submit()">AJOUTER</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import http from "../../http-common";

    export default {
        name: "FormationUpdate",
        data() {
            return {
                domaines: '',
                users: '',
                niveaux: '',
                mentions: '',
                typeDiplomes: '',
                localisations: '',
                composantes: '',
                form: {
                    structureHaute: 0,
                    codeDiplome: '',
                    ecoleDoctorale: '',
                    contact: '',
                    commentaire: '',
                    VDI: '',
                    composante: '',
                    localisation: '',
                    libelle: '',
                    typeDiplome: '',
                    domaine: '',
                    mention: '',
                    niveau: '',
                    user: '',
                    statut: '',
                    vDI: ''
                }
            }
        },
        mounted() {
            this.getLibelleComposante()
            this.getLocalisation()
            this.getTypeDiplome()
            this.getMention()
            this.getDomaine()
            this.getNiveau()
            this.getUser()
            this.getFormation()
        },
        methods: {
            submit: function (id) {
                id = this.$route.params.id;

                http
                    .put('formations/' + id, this.form)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 200) {
                            this.$toast.success(`Formation mis à jour avec succès`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                            this.$router.push({ name: 'Formation' })
                        }
                    }.bind(this))
                    .catch(function (error) {
                        this.err = error.response.status
                        if (this.err === 400) {
                            this.$toast.error(`Champ invalide`, {
                                position: "top-right"
                            })
                        }
                        else if (this.err === 404) {
                            this.$toast.error(`Ressource introuvable`, {
                                position: "top-right"
                            })
                        }
                        else if (this.err === 422) {
                            this.$toast.error(`Entité impossible à traiter`, {
                                position: "top-right"
                            })
                        }
                    }.bind(this))
            },
            getFormation: function (id) {
                let self = this;
                id = this.$route.params.id;

                http
                    .get('formations/' + id)
                    .then(function (response) {
                        self.form = response.data
                    })
            },
            getLibelleComposante: function () {
                http
                    .get('composantes')
                    .then(res => (this.composantes = res.data['hydra:member']))
            },
            getLocalisation: function () {
                http
                    .get('localisations')
                    .then(res => (this.localisations = res.data['hydra:member']))
            },
            getTypeDiplome: function () {
                http
                    .get('type_diplomes')
                    .then(res => (this.typeDiplomes = res.data['hydra:member']))
            },
            getMention: function () {
                http
                    .get('mentions')
                    .then(res => (this.mentions = res.data['hydra:member']))
            },
            getDomaine: function () {
                http
                    .get('domaines')
                    .then(res => (this.domaines = res.data['hydra:member']))
            },
            getNiveau: function () {
                http
                    .get('niveaux')
                    .then(res => (this.niveaux = res.data['hydra:member']))
            },
            getUser: function () {
                http
                    .get('users')
                    .then(res => (this.users = res.data['hydra:member']))
            }
        }
    }
</script>

<style scoped>

</style>