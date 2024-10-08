<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Dischi JSON</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="style/styles.css">
</head>

<body>
  <div id="app" class="container py-5">
    <div class="row g-4 m-4 ">
      <!-- Card per ogni album -->
      <div class="col-sm-6 col-md-4 col-lg-4" v-for="album in albums" :key="album.title">
        <div class="card h-100 cursor-pointer text-white" @click="selectAlbum(album)" data-bs-toggle="modal"
          data-bs-target="#albumModal">
          <img :src="album.poster" class="card-img-top" :alt="album.title">
          <div class="card-body text-center">
            <h5 class="card-title">{{ album.title }}</h5>
            <p>{{ album.author }}</p>
            <p><b>{{ album.year }}</b></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Bootstrap per mostrare i dettagli dell'album -->
    <div class="modal fade" id="albumModal" tabindex="-1" aria-labelledby="albumModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-white">
          <div class="modal-header border-0">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <img :src="selectedAlbum.poster" class="img-fluid mb-3" :alt="selectedAlbum.title" style="width: 200px;">
            <h3>{{ selectedAlbum.title }}</h3>
            <p>{{ selectedAlbum.author }}</p>
            <p>{{ selectedAlbum.year }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  new Vue({
    el: '#app',
    data: {
      albums: [],
      selectedAlbum: {} // Variabile per il disco selezionato
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
    },
    methods: {
      selectAlbum(album) {
        this.selectedAlbum = album; // Memorizza l'album cliccato
      }
    }
  });
  </script>
</body>

</html>