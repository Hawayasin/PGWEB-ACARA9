<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul pada tab browser -->
    <title>LeafletJS</title>
    <!-- Leaflet CSS Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">
    <style>
        /* Tampilan peta fullscreen */
        html, body, #map {
            height: 100%;
            width: 100%;
            margin: 0px;
        }
    </style>
</head>

<body>
    <!-- Leaflet JavaScript Library -->
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <div id="map"></div>

    <script>
        /* Initial Map note: sesuaikan setView koordinat dan zoom level ke titik tengah lembar peta*/
        var map = L.map('map').setView([-7.77, 110.37], 10); //lat, long, zoom


   /* Tile Basemap */
   var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIG UGM" target="_blank">DIVSIG UGM</a>'});
        basemap1.addTo(map);

        /* Layer Marker */
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pgweb-8";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tugas_pgweb";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lat = $row["Latitude"];
                $long = $row["longitude"];
                $info = $row["kecamatan"];
                echo "L.marker([$lat, $long]).addTo(map).bindPopup('$info');";
            }
        } 
        else {
            echo "0 results";
        }
        $conn->close();
        ?>

    </script>
</body>

</html>