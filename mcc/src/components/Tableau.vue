<template>
    <div class="">
        <div class="container mx-auto mt-20">
           <div class="flex justify-between">
               <label for="">
               <input class="searchBar mt-4 ml-16" type="text">
               </label>
               <div class="buttonContainer">
               <button class="bCreerFormation">Crée ma formation</button>
                <button class="bexporterFormation ml-10">Exporter ma formation</button>
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
           <div style="margin:auto">
    <table id="firstTable">
  <thead>
    <tr>
      <th>Composante</th>
      <th>Localisation</th>
      <th>Type de diplome</th>
      <th> Niveau </th>
      <th>Domaines</th>
      <th>Mention</th>
      <th>Intitulé <br>Formation</th>
      <th>Responsable</th>
      <th>Statue</th>
      <th>Option</th>
    </tr>
  </thead>
  <tbody>
      <tr>
          <td>hello</td>
          <td>hkdb</td>
          <td>hello</td>
          <td>hkdb</td>
          <td>hello</td>
          <td>hkdb</td>
          <td>hello</td>
          <td>hkdb</td>
          <td>hello</td>
          <td>hkdb</td>
          
      </tr>
  </tbody>
    </table>
  </div>
        </template>
    </vue-collapsible-panel>
     <vue-collapsible-panel class="second mt-4">
        <template #title>
            Licence profesionnelle developpeur web
        </template>
        <template #content>
            Panel B Content
        </template>
    </vue-collapsible-panel>
     <vue-collapsible-panel class="second mt-4">
        <template #title>
            Licence profesionnelle developpeur web
        </template>
        <template #content>
            Panel B Content
        </template>
    </vue-collapsible-panel>
</vue-collapsible-panel-group>
           </div>
        </div>
    </div>
</template>

<style lang="css" scoped>
.first {
margin-left: 20px;
color:white;
border-radius: 15px;
}
.second{
    background-color:#00296B;
    border-radius: 15px;
    color:white;
    padding-left: 20px;
}
.accordeon1{
    background-color:#00296B;
    height: 51px;
    width: 1288px;
    border: 1px solid #FFFFFF;
    box-sizing: border-box;
    border-radius: 15px;
}
.container{
    max-width: 1396px;
    height: 800px;
    box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 25px;
    font-family: Inter;
}
.searchBar{
    background: #FFFFFF;
box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 25px;
height: 48px;
width: 335px;
}
.bCreerFormation{
    width: 200px;
    height:30px;
    background-color: #362A66;
    color: white;
    box-shadow: -2px 2px 2px rgba(0, 41, 107, 0.25), 2px -2px 2px rgba(255, 255, 255, 0.4), 2px 2px 2px rgba(0, 41, 107, 0.4), -2px -2px 2px rgba(255, 255, 255, 0.4), inset 1px 1px 2px rgba(0, 0, 0, 0.25);
border-radius: 3px;
}
.formationsTitle{
    font-size: 24px;
    color: black;
    text-align: center;
}
.bexporterFormation{
    width: 200px;
    height:30px;
    background-color: #362A66;
    color: white;
    box-shadow: -2px 2px 2px rgba(0, 41, 107, 0.25), 2px -2px 2px rgba(255, 255, 255, 0.4), 2px 2px 2px rgba(0, 41, 107, 0.4), -2px -2px 2px rgba(255, 255, 255, 0.4), inset 1px 1px 2px rgba(0, 0, 0, 0.25);
border-radius: 3px;
background: #DD0E27;
}
.RectangleFormation{
    background-color: #FDC500;
    width: 1364px;
    height: 79px;
    margin-left: 20px;
    margin-top: 50px;
}

.buttonContainer{
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