<template>
  <div id="nav">
    <router-link to="/">Competence</router-link> |
    <router-link to="/diplome">Diplome</router-link> |
    <router-link to="/domaine">Domaine</router-link> |
    <router-link to="/formation">Formation non diplomante</router-link> |
    <router-link to="/mention">Mention</router-link> |
    <router-link to="/niveau">Niveau</router-link> |
    <router-link to="/semestre">Semestre</router-link>
  </div>
  <router-view/>
</template>

<style>

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
