<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        complement
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.complement"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        statut
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.statut"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Niveaux
                    </label>
                    <div  v-for="(item, index) in niveaux" v-bind:key="index">
                        <label :id="item.id" class="inline-flex items-center">
                            <input type="checkbox" :for="item.id" :value="item['@id']" v-model="form.niveau">
                            <span class="ml-2 mr-3">{{ item.libelle }}</span>
                        </label>
                    </div>
                </div>
                <div class="w-full px-3 mt-12">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button" v-on:click="submit()">ENVOYER</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import http from "../../http-common";

    export default {
        name: "CaracteristiquesForm",
        data() {
            return {
                niveaux: [],
                stat: '',
                form: {
                    complement: '',
                    statut: '',
                    niveau: []
                }
            }
        },
        mounted() {
            this.getLibelleNiveau()
        },
        methods: {
            submit: function () {
                http
                    .post('caracteristiques', this.form)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 201) {
                            this.$toast.success(`Caracteristique créée avec succès`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                            this.$router.push({ name: 'Caracteristique' })
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
            getLibelleNiveau: function () {
                http
                    .get('niveaux')
                    .then(res => (this.niveaux = res.data['hydra:member']))
            }
        }
    }
</script>

<style scoped>

</style>