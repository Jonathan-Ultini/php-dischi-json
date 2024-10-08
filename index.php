<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Dischi JSON</title>
  <link rel="stylesheet" href="styles/style.css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
  <div id="app">
    <div class="album" v-for="album in albums" :key="album.title">
      <img :src="album.poster" :alt="album.title">
      <h3>{{ album.title }}</h3>
      <p>{{ album.author }}</p>
      <p><b>{{ album.year }}</b></p>
      <!-- <p>{{ album.genre }}</p> -->
    </div>
  </div>

  <script>
  new Vue({
    el: '#app',
    data: {
      albums: []
    },
    mounted() {
      // Chiamata API per ottenere i dischi
      axios.get('dischi.php')
        .then(response => {
          this.albums = response.data;
        })
        .catch(error => {
          console.error("Errore nel caricamento dei dati:", error);
        });
    }
  });
  </script>
</body>

</html>