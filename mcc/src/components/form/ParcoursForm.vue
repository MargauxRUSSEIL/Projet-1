<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Formation
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.formation"
                    >
                        <option v-for="item in formations" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Structure prolongée
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.structureProlongee"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Structure basse
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.structureBasse"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Commentaire
                    </label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                              v-model="form.commentaire"
                    ></textarea>
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Intitulé du parcours
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.libelle"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libellé du parcours
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.libelleParcoursApogee"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Second vet
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.secondVET"
                    >
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Semestre ou Annuelle ?
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" :value="true" v-model="form.annuel">
                        <span class="ml-2 mr-3">Annuelle</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" :value="false" v-model="form.annuel">
                        <span class="ml-2 mr-3">Semestre</span>
                    </label>
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Semestre
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.semestre[0]"
                    >
                        <option v-for="item in semestreForm" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
                    </select>
                </div>
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Utilisateur
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.user"
                    >
                        <option v-for="item in utilisateurs" v-bind:key="item" v-bind:value="item['@id']">{{ item.nom }} {{ item.prenom }} - {{ item.mail }}</option>
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
        name: "ParcoursForm",
        data() {
            return {
                formations: '',
                semestreForm: '',
                utilisateurs: '',
                stat: '',
                form: {
                    formation: '',
                    structureProlongee: '',
                    structureBasse: '',
                    commentaire: '',
                    semestre: [],
                    libelle: '',
                    libelleParcoursApogee: '',
                    secondVET: '',
                    annuel: true,
                    user: ''
                }
            }
        },
        mounted() {
            this.getFormations()
            this.getSemestre()
            this.getUser()
        },
        methods: {
            submit: function () {
                http
                    .post('parcours', this.form)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 201) {
                            this.$toast.success(`Parcours créée avec succès`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                            this.$router.push({ name: 'Parcours' })
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
                    }.bind(this))
            },
            getFormations: function () {
                http
                    .get('formations')
                    .then(res => (this.formations = res.data['hydra:member']))

            },
            getSemestre: function () {
                http
                    .get('semestres')
                    .then(res => (this.semestreForm = res.data['hydra:member']))
            },
            getUser: function () {
                http
                    .get('users')
                    .then(res => (this.utilisateurs = res.data['hydra:member']))
            }
        }
    }
</script>

<style scoped>

</style>