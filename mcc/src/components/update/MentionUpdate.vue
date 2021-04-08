<template>
    <form class="container w-auto">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libellé Mention
                    </label>
                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                           type="text"
                           v-model="form.libelleMention"
                    >
                </div>
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Domaine
                    </label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-2"
                            v-model="form.domaine"
                    >
                        <option v-for="item in libelleDomaine" v-bind:key="item" v-bind:value="item['@id']">{{ item.libelleDomaine }}</option>
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
        name: "MentionUpdate",
        data() {
            return {
                libelleDomaine: '',
                form: {
                    domaine: '',
                    libelleMention: ''
                }
            }
        },
        mounted() {
            this.getLibelleDomaine()
        },
        methods: {
            submit: function (id) {
                id = this.$route.params.id;

                http
                    .put( 'mentions/' + id, this.form)
                    // eslint-disable-next-line no-unused-vars
                    .then(function( response ){
                        // Handle success
                    }.bind(this));

                this.$router.push({ name: 'Mention' })
            },
            getLibelleDomaine: function () {
                http
                    .get('domaines')
                    .then(res => (this.libelleDomaine = res.data['hydra:member']))
            }
        }
    }
</script>

<style scoped>

</style>