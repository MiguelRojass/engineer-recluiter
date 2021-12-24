<?php
  $sector = isset($_REQUEST["sector"]) ?$_REQUEST["sector"]:0;
  $maximo = isset($_REQUEST["maximo"]) ?$_REQUEST["maximo"]:0;
  $minimo = isset($_REQUEST["minimo"]) ?$_REQUEST["minimo"]:0;;
  $experiencia = isset($_REQUEST["experiencia"]) ?$_REQUEST["experiencia"]:0;;

$servername = "localhost";
$username = "root";
$password = "maguila11";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_postulante, nombre, experiencia, sector_laboral, aspiracion_salarial, nombre_fotos, descripcion FROM pagweb.postulantes";

$sql = $sql . " where sector_laboral = '$sector' ";

$sql = $sql . " and aspiracion_salarial >= " . $minimo;

$sql = $sql . " and aspiracion_salarial <= " . $maximo;

if ($experiencia == "sin_experiencia"){
  $sql = $sql . " and experiencia >= 0 and experiencia <= 10 ";
}

if ($experiencia == "junior"){
  $sql = $sql . " and experiencia >= 11 and experiencia <= 20 ";
}

if ($experiencia == "mid_level"){
  $sql = $sql . " and experiencia >= 21 and experiencia <= 30 ";
}

if ($experiencia == "avanzado"){
  $sql = $sql . " and experiencia >= 31 ";
}

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
    <link rel="shortcut icon" href="/images/Favicon.png" type="image/x-icon">
</head>
<body class="paginaprincipal">
      <header class="hero">
        <nav>
            <div class="nav_logo">
                <img src="./images/Logo PagWeb.png">
            </div>
        <section class="hero_container container">
              <h1 class="hero_title">Choose the best engineers!</h2>
              <p class="hero_paragraph">Our engineering recruitment company allows you to choose from hundreds of professionals who fit the needs of your business.</p>
              <p class="hero_paragraph">To start, you simply have to fill out the following form:</p>
        </section>
        </nav>
      </header>

    <section>
        <form action="index.php" class="form_filter">
        <div class="row">
          <div class="label">
            <label for="select_experiencia">Years of Experience:</label>
          </div>
            <select name="experiencia" id="select_experiencia">
                <option <?php if($experiencia == "sin_experiencia") print "selected"; ?> value="sin_experiencia">Without experience</option>
                <option <?php if($experiencia == "junior") print "selected"; ?> value="junior">From 11 to 20 years</option>
                <option <?php if($experiencia == "mid_level") print "selected"; ?> value="mid_level">21 to 30 years</option>
                <option <?php if($experiencia == "avanzado") print "selected"; ?> value="avanzado">More than 30 years</option>
            </select>
        </div>
        <div class="row">
          <div class="label">
            <label for="select_sector">Laboral Sector:</label>
          </div>
            <select name="sector" id="select_sector">
                <option <?php if($sector == "M1") print "selected"; ?> value="M1"> Mechanical</option>
                <option  <?php if($sector == "M2") print "selected"; ?>  value="M2"> Environmental</option>
                <option <?php if($sector == "M3") print "selected"; ?> value="M3"> Industrial</option>
                <option <?php if($sector == "M4") print "selected"; ?> value="M4">Civil</option>
            </select>
        </div>
        <div class="row">
          <div class="label">
            <label for="select_salarial">Salary range:</label>
          </div>
            <input type="text" placeholder="Minimum: " name="minimo" value="<?php print $minimo; ?>">
            <input type="text" placeholder="Maximum: " name="maximo" value="<?php print $maximo; ?>">
        </div>
        <div class="button">
            <input type="submit" value="Search!" class="form_button">
        </div>
        </form>
    </section>
    
    <section>
      <table class="table_results">
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Laboral Sector</th>
          <th>Wage Aspiration</th>
          <th>Years of Experience</th>
        </tr>
 <?php       if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>  
<tr>
  <td rowspan = 2>
    <div>
    <img class="foto_postulante"  src="./images/postulantes/<?php print $row ["nombre_fotos"]; ?>">
    </div>
    <div class="div_ver_mas">
      <a href="perfil.php?id_postulante=<?php print $row ["id_postulante"]; ?>" target="_blank">View profile!</a>
    </div>
  </td> 
  <td> 
    <?php print $row ["nombre"]; ?>
  </td>
  <td class="columna_sectorlaboral">
    <?php print $row ["sector_laboral"]; ?>
  </td>
  <td class="columna_aspiracionsalarial">
    <?php print $row ["aspiracion_salarial"]; ?>
  </td>
  <td class="columna_experiencia">
    <?php print $row ["experiencia"]; ?>
  </td>
</tr>
<tr>
  <td colspan= 4>
    <div class="div_descripcion">
      <?php print $row ["descripcion"]; ?>
    </div>
  </td>
</tr>
 <?php }
} else {
  echo "<div class='mensaje_noresultados'> No se han encontrado coincidencias :( </div>";
}
?>
      </table>
    </section>
</body>
</html>