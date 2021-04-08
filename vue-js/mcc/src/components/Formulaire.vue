<template>
   <div class="ml-4">
       <div class="font-bold">
           Création de formulaire:
           <div>
    <p>Création d’une mention de diplôme national en :</p>
  <input type="checkbox" id="licence" name="licence"
         checked>
  <label for="licence"> Licence</label>
</div>
<div>
  <input type="checkbox" id="licencePro" name="licencePro">
  <label for="licencePro"> Licence Professionelle</label>
</div>
<div>
  <input type="checkbox" id="master" name="master">
  <label for="master"> Master</label>
</div>
<div>
<label for="name">Type de Diplome :</label>
<input type="text" id="diplome" name="diplome" required>
</div>
<div class="mt-2">
<label for="name">Intitulé : </label>
<input type="text" id="intitule" name="intitule" required>
</div>

<div class="mt-2">
<label for="name">Domaine : </label>
<input type="text" id="domaine" name="domaine" required>
</div>
<div class="mt-2">
<label for="name">Parcours : </label>
<input type="text" id="parcours" name="parcours" required>
</div>
<div class="mt-2">
<label for="name">Il ne s’agit pas d’un diplôme national (DU…) – Indiquer l’intitulé complet  </label>
<input type="text" id="nodiplomenational" name="nodiplomenational" required>
</div>
 <div>
    <p>Modalité de la formation (cocher les mentions inutiles - si plusieurs années préciser les modalités pour chaque année de formation)  :</p>
  <input type="checkbox" id="formationInitiale" name="formationInitiale"
         checked>
  <label for="formationInitiale"> formation Initiale</label>
</div>
<div>
  <input type="checkbox" id="formationContinue" name="formationContinue">
  <label for="formationContinue"> Formation continue</label>
</div>
<div>
  <input type="checkbox" id="formationAlternance" name="formationAlternance">
  <label for="formationAlternance"> Formation en alternance</label>
</div>
<div>
  <input type="checkbox" id="contratApprentissage" name="contratApprentissage">
  <label for="contratApprentissage"> Contrat d’apprentissage</label>
</div>
<div>
  <input type="checkbox" id="contratProfessionnalisation" name="contratProfessionnalisation">
  <label for="contratProfessionnalisation"> Contrat de professionnalisation</label>
</div>
<div class="mt-2">
<label for="name">Composante de rattachement (préciser département pour l’IUT et l’institut ST) :</label>
<input type="text" id="composanteRattachement" name="composanteRattachement" required>
</div>
<div class="mt-2">
<label for="name"> Site de Formation :</label>
<input type="text" id="siteFormation" name="siteFormation" required>
</div>
<label for=""> Porteur du Projet :</label>
<div class="flex">
<div class="mt-2">
<label for="name"> Nom :</label>
<input type="text" id="nom" name="nom" required>
</div>
<div class="mt-2 ml-2">
<label for="prenom"> Prenom :</label>
<input type="text" id="prenom" name="prenom" required>
</div>
<div class="mt-2 ml-2">
<label for="prenom"> Telephone :</label>
<input type="text" id="tel" name="tel" required>
</div>
<div class="mt-2 ml-2">
<label for="mail"> Adresse Mail :</label>
<input type="mail" id="mail" name="mail" required>
</div>
</div>
<label for="mail"> Description du projet :</label>
<div class="mt-2">
<label for="name"> Niveau requis pour intégrer la formation : </label>
<input type="text" id="niveauRequis" name="niveauRequis" required>
</div>
<div class="mt-2">
<label for="name"> Niveau de sortie de la formation : </label>
<input type="text" id="niveauSortie" name="niveauSortie" required>
</div>
<div class="mt-2">
<label for="name"> Date d’ouverture envisagée : </label>
<input type="text" id="dateOuverture" name="dateOuverture" required>
</div>
<div class="mt-2">
<label for="name"> Calendrier prévisionnel de la formation (donner une brève description et joindre le calendrier) : </label>
<br>
<div class=" flex">
<textarea class="description mt-4 ml-10" id="descriptionCalendrier" name="descriptionCalendrier"></textarea>
<div class="drag mt-4 bg-blue-300 ml-5 ">
    <h1 class=" ">Drag and drop</h1>
</div>
</div>
<div class="mt-2">
<label for="name"> Nombre d’étudiants attendus à l’ouverture de la formation  : </label>
<input type="text" id="nombreEtudiant" name="nombreEtudiant" required>
</div>
<div class="mt-2">
<label for="name"> Modalités de recrutement des étudiants : (préciser s’il s’agit d’une étude de dossier, d’un entretien de sélection, d’un examen d’entrée) : </label>
<input type="text" id="modaliteRecrutement" name="modaliteRecrutement" required>
</div>
<div class="mt-2">
<label for="name"> Organisation de la formation : (schéma général, portails, mutualisation des parcours types, articulation M1/M2 pour les masters, part du socle commun) </label>
<input type="text" id="organisationFormation" name="organisationFormation" required>
</div>
 <div>
    <p> Quelles compétences la formation permet-elle d’acquérir  :</p>
  <input type="checkbox" id="devWeb" name="devWeb"
         checked>
  <label for="devWeb"> Developpement Web</label>
</div>
<div>
  <input type="checkbox" id="Programation" name="Programation">
  <label for="Programation"> Programation</label>
</div>
<div>
  <input type="checkbox" id="experiences" name="experiences">
  <label for="experiences"> Experiences Professionelle</label>
</div>
</div>
<p for="" class="mt-10">● B - Justification du projet :</p>
<div class="mt-2">
<label for="name"> Motivation du projet : (présenter brièvement le projet et les raisons pour lesquelles l’ouverture de la formation est justifiée) :</label>
<br>
<textarea class="description mt-4 ml-10" id="motivationProjet" name="motivationProjet"></textarea>
</div>
<div class="mt-2">
<label for="name"> Points forts ou spécifiques :</label>
<br>
<textarea class="description mt-4 ml-10" id="pointFort" name="pointFort"></textarea>
</div>
<div class="mt-2">
<label for="name"> Public visé : </label>
<br>
<textarea class="description mt-4 ml-10" id="publicVise" name="publicVise"></textarea>
</div>
<div class="mt-2">
<label for="name"> Insertion professionnelle (préciser les principaux débouchés et métiers auxquels peut mener la formation) : </label>
<br>
<textarea class="description mt-4 ml-10" id="InsertionProfessionnelle " name="InsertionProfessionnelle"></textarea>
</div>
<div class="mt-2">
<label for="name"> Liens avec le monde socio-économique : </label>
<br>
<textarea class="description mt-4 ml-10" id="liensocio " name="liensocio"></textarea>
</div>
<div class="mt-2">
<label for="name"> Partenaires éventuels : (administrations, associations, CFA, entreprises, établissements français ou étrangers, fondations) : </label>
<br>
<textarea class="description mt-4 ml-10" id="partenaireE " name="partenaireE"></textarea>
</div>
<div class="mt-2">
<label for="name"> Bref historique des liens avec le ou les partenaires : </label>
<br>
<textarea class="description mt-4 ml-10" id="historiqueP " name="historiqueP"></textarea>
</div>
<div class="mt-2">
<label for="name"> Étude de la concurrence et positionnement au regard de l’offre de formation de CY : </label>
<br>
<textarea class="description mt-4 ml-10" id="etudeConcurrence " name="etudeConcurrence"></textarea>
</div>
<p class="mt-12">● C – diversification pédagogique </p>
<div class="mt-2">
<label for="name"> Souhaitez vous mettre en place de la diversification pédagogique (mode projet, classe inversée …) Si oui, décrivez brièvement votre projet :</label>
<br>
<textarea class="description mt-4 ml-10" id="etudeConcurrence " name="etudeConcurrence"></textarea>
</div>
<div class="mt-2">
<label for="name"> Souhaitez-vous être accompagné par le service diversification pédagogique ?  :</label>
<br>
<input type="radio" id="accompagneOui" name="drone" value="oui">
         <label for="accompagneOui">Oui</label>
         <input type="radio" id="accompagneNon" name="drone" value="accompagneNon"
         checked>
         <label for="accompagneNon">Non</label>
</div>
<div class="mt-4">
    <p> Quelles sont les modalités choisies ? :</p>
  <input type="checkbox" id="devWeb" name="devWeb"
         checked>
  <label for="presentiel"> Presentiel</label>
</div>
<div>
  <input type="checkbox" id="distanciel" name="distanciel">
  <label for="distanciel"> distanciel</label>
</div>
<div>
  <input type="checkbox" id="hybride" name="hybride">
  <label for="hybride"> Hybride (alternance de cours en présentiel et distanciel) </label>
  <label for="">en % </label>
  <input id="hybridePourcentage" name="hybridePourcentage" />
</div>
<div>
  <input type="checkbox" id="comodal" name="comodal">
  <label for="comodal"> Comodal (cours suivi simultanément par des étudiants en distanciel et en présentiel avec un enseignant en présentiel)</label>
</div>
<div class="mt-2">
<label for="name"> Taux de mutualisation des enseignements avec des enseignements existants : préciser la proportion du nombre d’heures correspondant à des mutualisations avec des enseignements existants : </label>
<input type="number" id="niveauSortie" name="niveauSortie" required>
</div>
<p class=" mt-12">D – Rayonnement de la formation </p>
<div class="mt-2">
<label for="name"> Liens avec la recherche : pour les masters, préciser le nom de ou des unité(s) de recherche à laquelle (auxquelles) la formation est adossée : </label>
<br>
<textarea class="description mt-4 ml-10" id="lienRecherche " name="lienRecherche"></textarea>
</div>
<div class="mt-2">
<label for="name"> La formation est-elle incluse dans un projet de recherche financé par un tiers ? : </label>
<br>
<textarea class="description mt-4 ml-10" id="financementTiers " name="financementTiers"></textarea>
</div>
<div class="mt-2">
<label for="name"> La formation utilise-t-elle des équipements d’un laboratoire, d’une plateforme ? </label>
<br>
<textarea class="description mt-4 ml-10" id="equipement " name="equipement"></textarea>
</div>
<div class="mt-2">
<label for="name">  Internationalisation (cours en langue étrangère, étudiants étrangers entrants…) : </label>
<br>
<textarea class="description mt-4 ml-10" id="internationalisation " name="internationalisation"></textarea>
</div>
<div class="mt-2">
<label for="name">  Pour une formation internationale (double diplôme ou formation délocalisée), en quoi le projet s’inscrit-il dans la stratégie internationale de CY ? dans la stratégie d’internationalisation de la composante ? : </label>
<br>
<textarea class="description mt-4 ml-10" id="formationInternationale " name="formationInternationale"></textarea>
</div>
<div class="mt-2">
<label for="name">  Actions de communication envisagées pour promouvoir la formation ? :  </label>
<br>
<textarea class="description mt-4 ml-10" id="actionCom " name="actionCom"></textarea>
</div>

       </div>
   </div>
</template>

<style lang="css" scoped>
input{
     border: 1px solid #ccc;
     width: 200px;
}
.description{
    border: 1px solid #ccc;
    height: 100px;
    width: 500px;
}
.drag{
    height: 100px;
    width: 400px;
    text-align: center;
    
}
</style>