<template>
<div>
  <div>
    <nav class="navbar flex">
<div id="title" class="flex mt-2">
  <img class="mx-4 mt-2 mr-1 flex logo" src="@/assets/logo.svg"/><img class="pt-2 pb-3 mr-2" src="@/assets/line.svg"/> <p class="">Portail d’Offres <br> de Formations</p>
    </div>
<div id="b">
       <div class="flex map">
      <button class="boutonDec mt-3 mr-2">Deconnexion</button>
      <div class="flex pt-5">
      <router-link to="/second" class="flex pr-10"> <img class="flex menuLogo" src="@/assets/param.svg"/><p class="pl-2"> PARAMETRES</p></router-link>
</div>
 <div class="flex pt-5">
      <router-link to="/" class="flex pr-10"> <img class="flex menuLogo" src="@/assets/formation.svg"/><p class="pl-2"> Formations</p></router-link>
 
</div>
<div class="flex pt-5">
      <router-link to="/formulaire" class="flex pr-10"> <img class="flex menuLogo" src="@/assets/outils.svg"/><p class="pl-2"> Outils</p></router-link>
</div>
</div>
    </div>
       </nav>
   </div>
   <router-view/>
</div>

</template>



<style lang="postcss">

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
.navbar{
    background-color: red;
    height: 76px;
    background: linear-gradient(88.97deg, #DD0E40 11.56%, rgba(0, 41, 107, 0.96) 122.29%);
    font-family: Montserrat;
    color: white;
}  
#title {
    width: 20%;
    margin-right: auto;  
    font-size: 20px; 
}
.logo{
  height: 49px;
  width: 43,51px;
}

.navbar ul {
 list-style-type: none;
  margin: 0;
  padding: 0;
}
.navbar li {
  display: flex;
 
}
.map{
   display: flex;
  flex-direction: row-reverse;
 font-size: 24px;
}
.boutonDec{
  background: #DD0E27;
  border-radius: 50px;
  height: 50px;
  width: 185,79px;
  padding: 8px 10px 10px 10px;

  
}

.navbar li a {
  text-decoration: none;
  padding: 5px 15px;
  display: flex;
  
}
.menuLogo{
  height: 36px;
  width: 35,93px;
}
</style>

