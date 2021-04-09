<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 mt-6 md:mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libellé de la formation
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.formation"
                    >
                        <option v-for="item in formations" v-bind:key="item" v-bind:value="item['@id']">{{ item.typeFormation }}</option>
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
                           v-model="form.libelleParcours"
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
                        <input type="radio" class="form-radio" name="radio" value="semestre" v-model="form.annuOuSemest">
                        <span class="ml-2 mr-3">Semestre</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="radio" value="annuelle" v-model="form.annuOuSemest">
                        <span class="ml-2 mr-3">Annuelle</span>
                    </label>
                </div>
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Semestre
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.semestre[0]"
                    >
                        <option v-for="item in semestreForm" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelle }}</option>
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
        name: "ParcoursUpdate",
        data() {
            return {
                formations: '',
                semestreForm: '',
                form: {
                    structureProlongee: '',
                    structureBasse: '',
                    contact: '',
                    commentaire: '',
                    libelleParcours: '',
                    libelleParcoursApogee: '',
                    secondVET: '',
                    annuOuSemest: '',
                    //formation: '',
                    semestre: []
                }
            }
        },
        mounted() {
            this.getFormations()
            this.getSemestre()
        },
        methods: {
            submit: function (id) {
                http
                    .put( 'parcours/' + id , this.form)
                    // eslint-disable-next-line no-unused-vars
                    .then(function( response ){
                        // Handle success
                    }.bind(this));

                this.$router.push({ name: 'Parcours'})
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

            }
        }
    }
</script>

<style scoped>

</style>