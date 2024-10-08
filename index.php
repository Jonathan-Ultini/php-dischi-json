<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Dischi JSON</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

  <div id="app" class="container py-5">
    <div class="row g-4">
      <!-- Card per ogni album -->
      <div class="col-sm-6 col-md-4 col-lg-3" v-for="album in albums" :key="album.title">
        <div class="card album-card h-100">
          <img :src="album.poster" class="card-img-top" :alt="album.title">
          <div class="card-body text-center">
            <h5 class="card-title">{{ album.title }}</h5>
            <p>{{ album.author }}</p>
            <p class="text-muted">{{ album.year }}</p>
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