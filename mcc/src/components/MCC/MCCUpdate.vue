<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Département
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.departement"
                    >
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Mention
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.mention"
                    >
                        <option v-for="item in mentions" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Année
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="date"
                           v-model="form.annee"
                    >
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Niveau
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.niveau"
                    >
                        <option v-for="item in niveaux" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Statut
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.statut"
                    >
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        UE
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.UE[0]"
                    >
                        <option v-for="item in ues" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Parcours
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.parcours"
                    >
                        <option v-for="item in parcoursform" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Formation
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.formation"
                    >
                        <option v-for="item in formations" v-bind:key="item" v-bind:value="item['@id']">{{ item['@id'] }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mt-12">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button" v-on:click="submit()">ENVOYER</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import http from "../../http-common"

    export default {
        name: "MCCUpdate",
        data() {
            return {
                formations: '',
                mentions: '',
                parcoursform: '',
                niveaux: '',
                ues: '',
                stat: '',
                form: {
                    departement: '',
                    statut: '',
                    annee: '',
                    formation: '',
                    UE: [],
                    parcours: '',
                    niveau: '',
                    mention: ''
                }
            }
        },
        mounted() {
            this.getMCC()
            this.getMentions()
            this.getParcours()
            this.getNiveaux()
            this.getFormation()
            this.getUE()
        },
        methods: {
            submit: function (id) {
                id = this.$route.params.id;

                http
                    .put('m_c_cs/' + id, this.form)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 200) {
                            this.$toast.success(`MCC mis à jour avec succès`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                            this.$router.push({ name: 'MCC' })
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
            getMCC: function (id) {
                const self = this;
                id = this.$route.params.id;

                http
                    .get('m_c_cs/' + id)
                    .then(function (response) {
                        self.form = response.data
                    })
            },
            getMentions: function () {
                http
                    .get('mentions')
                    .then(res => (this.mentions = res.data['hydra:member']))
            },
            getParcours: function () {
                http
                    .get('parcours')
                    .then(res => (this.parcoursform = res.data['hydra:member']))
            },
            getNiveaux: function () {
                http
                    .get('niveaux')
                    .then(res => (this.niveaux = res.data['hydra:member']))
            },
            getUE: function () {
                http
                    .get('u_es')
                    .then(res => (this.ues = res.data['hydra:member']))
            },
            getFormation: function () {
                http
                    .get('creationformations')
                    .then(res => (this.formations = res.data['hydra:member']))
            }
        }
    }
</script>

<style scoped>

</style>