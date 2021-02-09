<template>
  <div id="app" >
    <h1>Formations</h1>
    <table>
      <thead>
      <tr>
        <th v-on:click="sort('id')" scope="col">ID</th>
        <th v-on:click="sort('typeFormation')" scope="col">Nom</th>
        <th v-on:click="sort('Date')" scope="col">Date</th>
        <th v-on:click="sort('Lieux')" scope="col">Lieux</th>
        <th v-on:click="sort('Departement')" scope="col">Département</th>
        <th v-on:click="sort('niveauFormation')" scope="col">Niveau</th>
        <th v-on:click="sort('duréeFormation')" scope="col">Durée</th>
        <th scope="col">Actions</th>
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
        <td><button v-on:click="deleteFormation(currency.id)">Supprimer</button></td>
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
        info: [],
        currentSort:'id',
        currentSortDir:'asc'
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
      sort:function(s) {
        //if s == current sort, reverse
        if(s === this.currentSort) {
          this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
        }
        this.currentSort = s;
      }
    },
    computed: {
      filteredFormation: function() {
        var formation = this.info;
        var nameFormationSearchString = this.nameFormationSearchString;
        if (formation) {
          // eslint-disable-next-line vue/no-side-effects-in-computed-properties
          return this.info.sort((a,b) => {
            let modifier = 1;
            if(this.currentSortDir === 'desc') modifier = -1;
            if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
            if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
            return 0;
          });
        }
        if(!nameFormationSearchString){
          return formation;
        }
        formation = formation.filter(function (item) {
          if(item.typeFormation.toLowerCase().indexOf(nameFormationSearchString) !== -1 || item.typeFormation.toUpperCase().indexOf(nameFormationSearchString) !== -1 ){
            return item;
          }
        })
        return formation;
      },
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