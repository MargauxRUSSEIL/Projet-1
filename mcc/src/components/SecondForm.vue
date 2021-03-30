    <template>
    <div class="ml-4 font-bold">
    <div class="mt-4">
      <label for="dep">Departement : </label>
      <input type="text" id="dep" name="dep" placeholder="Departement" />
</div>
<div class="mt-4">
      <label for="site">Site : </label>
      <input type="text" id="site" name="site" placeholder="site" />
</div>
<div class="mt-4">
      <label for="mention">Mention : </label>
      <input type="text" id="mention" name="mention" placeholder="Mention" />
      </div>
<div class="mt-4">
      <label for="annee">Année : </label>
      <input type="date" id="date" name="date" placeholder="date" /><br />
      <label for="niveau">Niveau : </label>
      <input type="text" id="niveau" name="niveau" placeholder="Niveau" />
</div>
<div class="mt-4">
      <label for="contact">Email : </label>
      <input type="text" id="email" name="email" placeholder="Email" />
</div>
<div class="mt-4">
      <label for="ue">UE : </label>
      <select id="ue" name="ue">
        <option value="ue1">UE1</option>
        <option value="ue2">UE2</option>
        <option value="ue3">UE3</option>
      </select>
</div>
<div class="mt-4">
      <label for="diplome">TypeDiplome</label>
      <select id="diplome" name="diplome">
        <option value="licence">Licence</option>
        <option value="master">Master</option>
        <option value="licencepro">Licence Pro</option>
      </select>
</div>
<div class="mt-4">
      <label for="parcourt">parcourt</label>
      <select id="parcourt" name="parcourt">
        <option value="informatique">Informatique</option>
        <option value="web">Developpement Web</option>
        <option value="managment">Managment</option>
      </select>
</div>
<div class="mt-4" >
      <input type="submit" value="valider" class="button" />
     </div>
      </div>
</template>

<style>

input{
     border: 1px solid #ccc;
     width: 200px;
}
select{
     border: 1px solid #ccc;
}
</style>
