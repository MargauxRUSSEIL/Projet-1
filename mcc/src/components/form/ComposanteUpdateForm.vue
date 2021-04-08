<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libellé Institut
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.libelleInstitut"
                           :placeholder="composante.libelleInstitut"
                    >
                </div>
                <div class="w-full px-3 mt-12">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button" v-on:click="submit()">MODIFIER</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from "axios";

    const BaseUrl = 'http://localhost:8000/api/';

    export default {
        name: "ComposanteUpdateForm",
        data() {
            return {
                form: {
                    libelleInstitut: '',
                },
                composante: []
            }
        },
        mounted() {
            this.getComposante();
        },
        methods: {
            getComposante: function () {
                axios
                    .get(BaseUrl + 'composantes/' + this.$route.params.id)
                    .then(res => (this.composante = res.data))
            },
            submit: function () {
                axios.put( BaseUrl+ 'composantes/' + this.$route.params.id, this.form)
                    .then(function(){
                        this.$router.push('Composante');
                    }.bind(this));
            }
        }
    }
</script>

<style scoped>

</style>