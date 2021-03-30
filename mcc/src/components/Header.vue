<template>
   <div>
<nav class="navbar">
    <div class="flex">
    <img class="mx-4 pt-3 mr-2 logo flex" src="@/assets/logo.svg"/><img class="pt-3 mr-2" src="@/assets/line.svg"/> <p class="pt-3">Portail d’Offres <br> de Formations</p>
<div class=" ml-10 flex">
<ul class="flex"> 
  <li class=""><a class="flex" href="#home"> <img class="pt-3" src="@/assets/outils.svg"/> Outils</a></li>
  <li><a href="#news"> <img class="pt-3" src="@/assets/param.svg"/>News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul> 
</div>
    </div>

       </nav>
   </div>
</template>

<style lang="postcss" scoped>
.navbar{
    background-color: red;
    height: 76px;
    background: linear-gradient(88.97deg, #DD0E40 11.56%, rgba(0, 41, 107, 0.96) 122.29%);
    font-family: Montserrat;
    color: white;
}  

.navbar ul {
 list-style-type: none;
  margin: 0;
  padding: 0;
}
.navbar li {
  display: flex;
 
}


.navbar li a {
  text-decoration: none;
  padding: 5px 15px;
  display: flex;
  
}


.menuPage{
    float: left;
}
</style>