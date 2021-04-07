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
                        Site
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.site"
                    >
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Mention
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.mention"
                    >
                        <option v-for="item in mentions" v-bind:key="item">{{ item }}</option>
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
                        <option v-for="item in niveaux" v-bind:key="item">{{ item.libelleNiveau }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Contact
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.contact"
                    >
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        UE
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.UE"
                    >
                        <option v-for="item in ues" v-bind:key="item">{{ item.libelleUE }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Type de dîplome
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.typeDiplome"
                    >
                        <option value="licence">Licence</option>
                        <option value="master">Master</option>
                        <option value="licencepro">Licence Pro</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Parcours
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.parcours"
                    >
                        <option v-for="item in parcoursform" v-bind:key="item">{{ item }}</option>
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
    import axios from 'axios'

    const BaseUrl = 'http://localhost:8000/api/';

    export default {
        name: 'MCCForm',
        data() {
            return {
                mentions: '',
                parcoursform: '',
                niveaux: '',
                ues: '',
                form: {
                    departement: '',
                    site: '',
                    annee: '',
                    contact: '',
                    UE: '',
                    typeDiplome: '',
                    parcours: '',
                    niveau: '',
                    mention: '',
                }
            }
        },
        mounted() {
            this.getMentions()
            this.getParcours()
            this.getNiveaux()
            this.getUE()
        },
        methods: {
            submit: function () {
                axios.post( BaseUrl+ 'm_c_cs', this.form)
                    // eslint-disable-next-line no-unused-vars
                    .then(function( response ){
                        // Handle success
                    }.bind(this))

                this.$router.push({ name: 'MCC'})
            },
            getMentions: function () {
                axios
                    .get(BaseUrl + 'mentions')
                    .then(res => (this.mentions = res.data['hydra:member']))
            },
            getParcours: function () {
                axios
                    .get(BaseUrl + 'parcours')
                    .then(res => (this.parcoursform = res.data['hydra:member']))
            },
            getNiveaux: function () {
                axios
                    .get(BaseUrl + 'niveaux')
                    .then(res => (this.niveaux = res.data['hydra:member']))
            },
            getUE: function () {
                axios
                    .get(BaseUrl + 'u_es')
                    .then(res => (this.ues = res.data['hydra:member']))
            }
        }
    }
</script>

<style scoped>

</style>
