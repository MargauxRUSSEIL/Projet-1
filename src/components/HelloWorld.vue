<template>
  <div class="hello">
    <h1>Formations</h1>
    <table>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Date</th>
        <th scope="col">Lieux</th>
        <th scope="col">Département</th>
        <th scope="col">Niveau</th>
        <th scope="col">Durée</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Paris</td>
        <td>75001</td>
        <td>15/01/2021</td>
        <td>LP DW</td>
        <td>Bac + 3</td>
        <td>12</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Paris</td>
        <td>75001</td>
        <td>13/01/2021</td>
        <td>LP WAM</td>
        <td>Bac + 3</td>
        <td>12</td>
      </tr>
    </table>
  </div>
</template>

<script>
  export default {
    name: 'HelloWorld',
    props: {
      msg: String
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
</style>
