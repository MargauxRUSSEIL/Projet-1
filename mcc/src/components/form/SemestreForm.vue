<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libellé semestre
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.libelle"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Code semestre
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.codeSemestre"
                    >
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
        name: "SemestreForm",
        data() {
            return {
                libelleDomaine: '',
                stat: '',
                form: {
                    libelle: '',
                    codeSemestre: '',
                }
            }
        },
        methods: {
            submit: function () {
                http
                    .post( 'semestres', this.form)
                    .then(function( response ){
                        this.stat = response.status
                        if (this.stat === 201) {
                            this.$toast.success(`Semestre resource created`, {
                                position: "top-right"
                            })
                            setTimeout(this.$toast.clear, 3500)
                            this.$router.push({ name: 'Semestre' })
                        }
                        else if (this.stat === 400) {
                            this.$toast.error(`Invalid input`, {
                                position: "top-right"
                            })
                        }
                        else if (this.stat === 422) {
                            this.$toast.error(`Unprocessable entity`, {
                                position: "top-right"
                            })
                        }
                    }.bind(this))
            }
        }
    }
</script>

<style scoped>

</style>