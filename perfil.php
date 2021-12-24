<?php
  $id_postulante = $_REQUEST["id_postulante"];

$servername = "localhost";
$username = "root";
$password = "maguila11";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_postulante, nombre, experiencia, sector_laboral, aspiracion_salarial, nombre_fotos, descripcion, profesion, habilidades, video, empresas FROM pagweb.postulantes";

$sql = $sql . " where id_postulante = '$id_postulante' ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$skills = explode(',',$row["habilidades"]);
$empresas = explode(',',$row["empresas"]);

$sql = "SELECT id_postulante, empresa, desde, hasta FROM pagweb.experiencia 
where id_postulante = $id_postulante order by desde";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Recluiter</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="shortcut icon" href="/" type="image/x-icon">
</head>
<body>
     <section class="hero_container container">
        <h1 class="hero_title"><?php print $row ["nombre"]; ?> </h1>
        <h2 class="hero_title"><?php print $row ["profesion"]; ?></h2>
    </section>

    <section>
        <div class="div_cv">
            <div class="div_foto">
              <img class="foto_postulante"  src="./images/postulantes/<?php print $row ["nombre_fotos"]; ?>">
            </div>
            <div class="div_texto">
                <h1>Resume:</h1>
                <h4><?php print $row ["descripcion"]; ?></h4>
                <div>
                    <h1>Skills and Interests:</h1>
                    <ul>
                    <?php foreach($skills as $item) {  ?>
                        <li><?php print $item; ?> </li>  
                    <?php } ?>
                    
                    </ul>
                </div>
                <div>
                    <h1>Work Experience:</h1>
                    <ul>
                    <?php while($row2 = $result->fetch_assoc()) {  ?>
                        <li title="I worked in <?php print $row2['empresa']  ; ?> desde <?php print $row2['desde']; ?> hasta <?php print $row2['hasta'];  ?> "><?php print $row2['empresa']; ?> </li>  
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php if (strlen($row ["video"])>0) { ?>

    <section>
        <div class="div_video">
           <h1>Experiences</h1>
           <video controls="controls">
              <source src="./videos/<?php print $row ["video"]; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
           </video>
        </div>
    </section>
    <?php } ?>
    </body>
</html>