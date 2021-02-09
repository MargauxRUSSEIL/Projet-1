<template>
    <div id="table">
        <v-app>
            <template>
                <v-card>
                    <v-card-title>
                        Formation
                        <v-spacer></v-spacer>
                        <v-text-field
                                v-model="search"
                                append-icon="mdi-magnify"
                                label="Search"
                                single-line
                                hide-details
                        ></v-text-field>
                    </v-card-title>
                    <v-data-table
                            :headers="headers"
                            :items="info"
                            :search="search"
                    >
                        <template v-slot:item.actions="{ item }">
                            <v-icon
                                    small
                                    v-on:click="deleteFormation(item.id)"
                            >
                                mdi-delete
                            </v-icon>
                        </template>
                    </v-data-table>
                </v-card>
            </template>
        </v-app>
    </div>
</template>

<script>
    import axios from 'axios'
    import Vue from 'vue'
    import Vuetify from 'vuetify'
    import 'vuetify/dist/vuetify.min.css'

    Vue.use(Vuetify)

    export default {
        name: "Table",
        el: '#table',
        data () {
            return {
                search: '',
                info: [],
                headers: [
                    { text: 'ID', value: 'id' },
                    { text: 'Nom', value: 'typeFormation' },
                    { text: 'Date', value: 'Date' },
                    { text: 'Lieux', value: 'Lieux' },
                    { text: 'Departement', value: 'Departement' },
                    { text: 'Niveau', value: 'niveauFormation' },
                    { text: 'Durée', value: 'duréeFormation' },
                    { text: 'Actions', value: 'actions', sortable: false }
                ],
            }
        },
        mounted () {
            this.getFormation()
        },
        methods: {
            getFormation: function () {
                axios
                    .get('http://localhost:8000/api/formations')
                    .then(response => (this.info = response.data['hydra:member']))
            },
            deleteFormation: function (id) {
                axios
                    .delete('http://localhost:8000/api/formations/' + id)
                    .then(() => {
                        this.getFormation();
                    })
            },
        }
    }
</script>

<style scoped>

</style>