<template>
    <div>
        <h1>Ajouter</h1>

        <form @submit.prevent="postData" method="post">
            <!-- <form v-on:submit.prevent="postData"> -->
            <label for="mon_id">Formation:</label>
            <input type="text" name="type_formation" v-model="posts.typeFormation"> <br> <br>
            <label for="mon_id">Lieux:</label>
            <input type="text" name="lieux" v-model="posts.Lieux"> <br> <br>
            <label for="mon_id">Departement:</label>
            <input name="departement" v-model.number="posts.Departement"><br> <br>
            <label for="mon_id">Crée le:</label>
            <input type="datetime-local" name="update_at" v-model="posts.createdAt"> <br> <br>
            <label for="mon_id">Niveau formation:</label>
            <input type="text" name="niveau_formation" v-model="posts.niveauFormation"> <br> <br>
            <label for="mon_id">Durée:</label>
            <input name="durée_formation" v-model.number="posts.dureeFormation"> <br> <br>
            <label for="mon_id">Date:</label>
            <input type="date" name="Date" v-model="posts.Date"> <br> <br>
            <label for="mon_id">Mise à jour :</label>
            <input type="datetime-local" name="update_at" v-model="posts.updateAt"><br> <br>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios';
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)
export default {
    data(){
        return{
            posts:{
                typeFormation:null,
                Lieux:null,
                Date:null,
                Departement:null,
                createdAt:null,
                niveauFormation:null,
                dureeFormation:null,
                updateAt:null,
            },
            
        }
    },
    methods:{
       postData(){
            axios.post('http://127.0.0.1:8000/api/formations', this.posts)
                 .then((res) => {
                     //Perform Success Action
                 })
                 .catch((error) => {
                     // error.response.status Check status code
                 }).finally(() => {
                     //Perform action in always
                 });
                
        },
    }
}


</script>