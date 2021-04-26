<template>
    <div class="">
        <div class="container mx-auto mt-20">
            <div class="flex justify-between">
                <label for="">
                    <input class="searchBar mt-4 ml-16" type="text">
                </label>
                <div class="buttonContainer">
                    <button class="bCreerFormation">Crée ma formation</button>
                    <button class="bexporterFormation ml-10" v-on:click="download">Exporter ma formation</button>
                </div>
            </div>
            <div class="RectangleFormation">
                <p class="formationsTitle pt-6">Mes formations</p>
            </div>
            <div class=" mt-6 mx-auto">
                <vue-collapsible-panel-group class="accordeon1 mx-auto">
                    <vue-collapsible-panel class="first">
                        <template #title style="font-size:18px">
                            Licence profesionnelle developpeur web
                        </template>
                        <template #content>
                            <div style="margin:auto;">
                                <table id="firstTable">
                                    <thead>
                                        <tr>
                                            <th>Formation</th>
                                            <th>Code Diplome</th>
                                            <th>Structure haute</th>
                                            <th>Localisation</th>
                                            <th>Contact</th>
                                            <th>Commentaire</th>
                                            <th>Créer le</th>
                                            <th>Composante</th>
                                            <th>VDI</th>
                                            <th> Niveau </th>
                                            <th>Parcours</th>
                                            <th>mention</th>
                                             <th>Modifier</th>
                                            <th>Supprimé</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="formation in info" :key="formation">
                                            <td>{{formation.libelle}}</td>
                                            <td>{{formation.codeDiplome}}</td>
                                            <td> {{formation.structureHaute}}</td>
                                            <td> {{formation.localisation.adresse}} <br/> <span style="font-weight: bold"> Ville : </span> <br/> {{formation.localisation.ville}}</td>
                                            <td>{{formation.contact}}</td>
                                            <td>{{formation.commentaire}}</td>
                                            <td>{{formation.createdAt}}</td>
                                            <td>{{formation.composante.libelle}}</td>
                                            <td>{{formation.VDI}}</td>
                                            <td>{{formation.niveau.libelle}}</td>
                                            <td>{{formation.parcours.structureProlongee}}</td>
                                            <td>{{formation.mention.libelle}}</td>
                                            <td>
                                                <router-link :to="{name: 'formationUpdate', params:{ id:formation.id}}">
                                                    <button id="myButton" class="foo bar">Modifier</button>
                                                </router-link>
                                            </td>
                                             <td><button class="btn btn-danger"
                                                    @click="deleteData(formation.id)">Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </template>
                    </vue-collapsible-panel>
                    <vue-collapsible-panel class="second mt-4 accordeon1">
                        <template #title>
                            Licence profesionnelle developpeur web
                        </template>
                        <template #content class="bg-white">
                            <div class="div1">
                                <p> Panel B Content</p>
                                <p> cdfnkv</p>
                                <p>cfnjnfk</p>
                            </div>
                        </template>
                    </vue-collapsible-panel>
                    <!-- <vue-collapsible-panel>
                        <template #title>
                            Panel A Title
                        </template>
                        <template #content>
                            Panel A Content
                        </template>
                    </vue-collapsible-panel> -->
                </vue-collapsible-panel-group>
            </div>
        </div>
    </div>
</template>

<style lang="css" scoped>
    .div1 {
        color: black;
    }

    .first {
        margin-left: 20px;
        color: white;
        border-radius: 15px;
    }

    .text1 {
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid red;
    }

    .second {
        border-radius: 15px;
        padding-left: 20px;
        background-color: white;
        color: white;
    }

    .accordeon1 {
        background-color: #00296B;
        height: 51px;
        width: 1288px;
        border: 1px solid #FFFFFF;
        box-sizing: border-box;
        border-radius: 15px;
    }

    .container {
        max-width: 1396px;
        height: 800px;
        box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        font-family: Inter;
    }

    .searchBar {
        background: #FFFFFF;
        box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        height: 48px;
        width: 335px;
    }

    .bCreerFormation {
        width: 200px;
        height: 30px;
        background-color: #362A66;
        color: white;
        box-shadow: -2px 2px 2px rgba(0, 41, 107, 0.25), 2px -2px 2px rgba(255, 255, 255, 0.4), 2px 2px 2px rgba(0, 41, 107, 0.4), -2px -2px 2px rgba(255, 255, 255, 0.4), inset 1px 1px 2px rgba(0, 0, 0, 0.25);
        border-radius: 3px;
    }

    .formationsTitle {
        font-size: 24px;
        color: black;
        text-align: center;
    }

    .bexporterFormation {
        width: 200px;
        height: 30px;
        background-color: #362A66;
        color: white;
        box-shadow: -2px 2px 2px rgba(0, 41, 107, 0.25), 2px -2px 2px rgba(255, 255, 255, 0.4), 2px 2px 2px rgba(0, 41, 107, 0.4), -2px -2px 2px rgba(255, 255, 255, 0.4), inset 1px 1px 2px rgba(0, 0, 0, 0.25);
        border-radius: 3px;
        background: #DD0E27;
    }

    .RectangleFormation {
        background-color: #FDC500;
        width: 1364px;
        height: 79px;
        margin-left: 20px;
        margin-top: 50px;
    }

    .buttonContainer {
        margin-left: 100px;
        margin-top: 20px;
        margin-right: 100px;
    }

    table {
        font-family: 'Open Sans', sans-serif;
        width: 1200px;
        border-collapse: collapse;
        border: 3px solid #44475C;
        margin: auto;
    }

    table th {
        text-transform: uppercase;
        text-align: left;
        background: #670FD7;
        color: #FFF;
        padding: 8px;
        min-width: 30px;
    }

    table td {
        text-align: left;
        padding: 8px;
        border-right: 2px solid #7D82A8;
        color: black;
    }

    table td:last-child {
        border-right: none;
    }

    table tbody tr:nth-child(2n) td {
        background: #D4D8F9;
        color: black;
    }
</style>

<script>
    // import API from "@/services/api.js";
    import axios from 'axios';
    import XLSX from "xlsx";
    //import PostForm from '@/components/Post-form';
    export default {
        components: {
            //PostForm
        },
        data() {
            return {
                info: null,

            }
        },
        mounted() {

            var self = this;
            //Lire données Api
            axios
                .get('http://localhost:8000/api/formations.json')
                .then(function (response) {
                    self.info = response.data
                    self.info.forEach(formation => {
                        axios.get(`http://localhost:8000${formation.parcours}`).then(
                            function (response) {
                                formation.parcours = response.data
                                //console.log(response.data)
                            })
                    });
                    self.info.forEach(formation => {
                        axios.get(`http://localhost:8000${formation.mention}`).then(
                            function (response) {
                                formation.mention = response.data
                                //console.log(response.data)
                            })
                    });
                     self.info.forEach(formation => {
                        axios.get(`http://localhost:8000${formation.localisation}`).then(
                            function (response) {
                                formation.localisation = response.data
                                //console.log(response.data)
                            })
                    });
                    self.info.forEach(formation => {
                        axios.get(`http://localhost:8000${formation.composante}`).then(
                            function (response) {
                                formation.composante = response.data
                                //console.log(response.data)
                            })
                    });
                    self.info.forEach(formation => {
                        axios.get(`http://localhost:8000${formation.niveau}`).then(
                            function (response) {
                                formation.niveau = response.data
                                //console.log(response.data)
                            })
                    });
                    // console.log(response.data)
                })


        },
        methods: {
            download: function () {
                const data = XLSX.utils.json_to_sheet(this.info);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, data, "data");
                XLSX.writeFile(wb, "formation.xlsx");
            },
            //supprimé données Api
            // deleteData(id) {
            //     axios
            //         .delete("http://localhost:8000/api/formations/" + id)
            //         .then(response => {
            //             this.result.splice(id, 1);
            //             console.log(this.formation);
            //         });
            // },
        }
    }
</script>