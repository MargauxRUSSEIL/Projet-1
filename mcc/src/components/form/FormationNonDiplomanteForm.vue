<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
        <h1>Ajoutter une formation non diplômante</h1>
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libellé certificat
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.libelleCertificat" required
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Nombre année de la formation
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="number"
                           v-model="form.nbAnneeFormation" required
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
    import axios from "axios";

    const BaseUrl = 'http://localhost:8000/api/';

    export default {
        name: "FormationNonDiplomanteForm",
        data() {
            return {
                libelleDomaine: '',
                form: {
                    libelleCertificat: '',
                    nbAnneeFormation: '',
                }
            }
        },
        methods: {
            submit: function () {
                axios.post( BaseUrl + 'formation_non_diplomantes', this.form)
                    // eslint-disable-next-line no-unused-vars
                    .then(function( response ){
                        // Handle success
                    }.bind(this));

                this.$router.push({ name: 'Formation' })
            }
        }
    }
</script>

<style scoped>

</style>