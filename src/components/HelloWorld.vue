<template>
  <div id="app" >
    <h1>Formations</h1>
    <table>
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Date</th>
        <th scope="col">Lieux</th>
        <th scope="col">Département</th>
        <th scope="col">Niveau</th>
        <th scope="col">Durée</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(currency, index) in filteredFormation" :key="index">
        <td>{{ currency.id }}</td>
        <td>{{ currency.typeFormation}}</td>
        <td>{{ currency.Date}}</td>
        <td>{{ currency.Lieux }}</td>
        <td>{{ currency.Departement }}</td>
        <td>{{ currency.niveauFormation}}</td>
        <td>{{ currency.duréeFormation}}</td>
      </tr>
      </tbody>
    </table>
    <input type="text"
           class="SearchBar"
           placeholder="Filter by Formations"
           v-model="nameFormationSearchString"
    />
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'HelloWorld',
    el: '#app',
    data () {
      return {
        nameFormationSearchString:'',
        sortKey: '',
        info: null
      }
    },
    mounted () {
      axios
              .get('http://localhost:8000/api/formations')
              .then(response => (this.info = response.data['hydra:member']))
    },
    computed: {
      filteredFormation: function() {

        var formation = this.info;
        var nameFormationSearchString = this.nameFormationSearchString;

        if(!nameFormationSearchString){
            return formation;
        }

        formation = formation.filter(function (item) {
          if(item.typeFormation.toLowerCase().indexOf(nameFormationSearchString) !== -1){
            return item;
          }
        })
        return formation;
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1 {
    margin-bottom: 50px;
  }
  table {
    width: 100%;
  }
  .SearchBar {
    margin-top: 50px;
    width: 20%;
    padding: 10px;
  }
</style>
