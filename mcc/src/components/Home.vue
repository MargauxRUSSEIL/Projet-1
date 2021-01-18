<template>
    <div>
        <h1>Formation</h1>
    <!-- <p v-for="formation in info" :key="formation">
        {{formation.Lieux}}
        {{formation.Departement}}
    </p> -->
<div style="margin:auto">
    <table id="firstTable">
  <thead>
    <tr>
      <th>Formation</th>
      <th>Lieux</th>
      <th>Département</th>
      <th>créer le </th>
      <th>Niveau de Formation</th>
      <th>Durée</th>
      <th>Mis à jour le</th>
      <th>Date</th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="formation in info" :key="formation" >
      <td>{{formation.typeFormation}}</td>
      <td> {{formation.Lieux}}</td>
       <td> {{formation.Departement}}</td>
      <td>{{formation.createdAt}}</td>
       <td>{{formation.niveauFormation}}</td>
      <td>{{formation.dureeFormation}}</td>
       <td>{{formation.updateAt}}</td>
       <td>{{formation.Date}}</td>
    </tr>
  </tbody>
</table>
 <button type="button" class="download-btn" v-on:click="download">
      Export
    </button>
</div>
<Post-form></Post-form>
 </div>   
 
</template>

<style scoped>
table {
  font-family: 'Open Sans', sans-serif;
  width: 750px;
  border-collapse: collapse;
  border: 3px solid #44475C;
  margin: auto;
}

table th {
  text-transform: uppercase;
  text-align: left;
  background: #44475C;
  color: #FFF;
  padding: 8px;
  min-width: 30px;
}

table td {
  text-align: left;
  padding: 8px;
  border-right: 2px solid #7D82A8;
}
table td:last-child {
  border-right: none;
}
table tbody tr:nth-child(2n) td {
  background: #D4D8F9;
}
</style>
<script>
// import API from "@/services/api.js";
import axios from 'axios';
import XLSX from "xlsx";
import PostForm from '@/components/Post-form';
export default {
  components: {
      PostForm
  },
  data() {
    return {
       info: null,
       
    }
  },
   mounted () {
       var self = this;
    axios
      .get('http://localhost:8000/api/formations.json')
      .then(function (response){
          self.info = response.data
        //  console.log(response.data)
  
      })  
  },
  methods: {
    download: function () {
      const data = XLSX.utils.json_to_sheet(this.info);
      const wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, data, "data");
      XLSX.writeFile(wb, "formation.xlsx");
    },
  },
   
}
</script>