<template>
<form class="container w-auto" @submit.prevent="postData" method="post">
        <div class="my-12 md:mx-6 sm:mx-6 xl:mx-56 lg:mx-56">
            <div class="flex flex-wrap">
                <div class="w-full px-3 mb-6 md:mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Libellé 
                    </label>
                    <input class="shadow appearance-none border w-full rounded py-2 px-3 text-grey-darker" v-model="posts.libelle">
                </div>
                <div class="w-full px-3 mt-12">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded font-semibold text-sm" type="button" v-on:click="submit()">ENVOYER</button>
                </div>
            </div>
        </div>
    </form>
  
</template>


<script>
import axios from 'axios';
export default {
    data(){
        return{
            posts:{
                libelle:null
            },
            
        }
    },
    methods:{
       submit(){
           
            axios.post('http://localhost:8000/api/type_diplomes', this.posts)
            
                .then(res=>console.log(res))
     .then(() => {
                     //Perform Success Action
                 })
                 .catch(() => {
                     // error.response.status Check status code
                 }).finally(() => {
                     //Perform action in always
                 });
                 
       }
    }
}


</script>
<style scoped>

</style>

