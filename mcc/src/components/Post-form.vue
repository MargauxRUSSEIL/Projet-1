<template>
    <div>
        <h1>Ajouter</h1>

        <form @submit="postData" method="post">
            <label for="mon_id">Formation:</label>
            <input type="text" name="type_formation" v-model="posts.type_formation"> <br> <br>
            <label for="mon_id">Lieux:</label>
            <input type="text" name="lieux" v-model="posts.lieux"> <br> <br>
            <label for="mon_id">Departement:</label>
            <input type="number" name="departement" v-model="posts.departement"><br> <br>
            <label for="mon_id">Crée le:</label>
            <input type="datetime-local" name="update_at" v-model="posts.created_at"> <br> <br>
            <label for="mon_id">Niveau formation:</label>
            <input type="text" name="niveau_formation" v-model="posts.niveau_formation"> <br> <br>
            <label for="mon_id">Durée:</label>
            <input type="number" name="durée_formation" v-model="posts.durée_formation"> <br> <br>
            <label for="mon_id">Mise à jour :</label>
            <input type="datetime-local" name="update_at" v-model="posts.update_at"><br> <br>
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
                type_formation:null,
                lieux:null,
                departement:null,
                created_at:null,
                niveau_formation:null,
                durée_formation:null,
                update_at:null,
                
            }
        }
    },
    methods:{
        postData(){
            this.axios.post("http://localhost:8000/api/formations",this.posts)
            .then((result)=>{
                console.log(result)
            })
            // console.log(this.posts);
            // e.preventDefault();
        }
    }
}


</script>