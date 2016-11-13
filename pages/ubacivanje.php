<!DOCTYPE html>
<html>
<head>
	<title>Ubacivanje</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/bootstrap.js"></script>
</head>
<body>
	<div id="wrap">
	 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dream Team</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="prikaz.php">Read</a></li>
            <li><a href="azuriranje.php">Update</a></li>
            <li><a href="brisanje.php">Delete</a></li>
            <li><a href="ubacivanje.php">Create</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
     </nav> <br> <br>
<h1>Unos kosarkasi</h1>
<hr/>
<br>
<form method="post" action="">
<span>Ime :</span>  <input type="text" name="ime" /><br> <br>	
<span>Prezime :</span>  <input type="text" name="prezime"> <br> <br>
<span>Pozicija :</span> <br> <br>
    <input type="radio" name="pozicija" value="plej"> Plej <br>
    <input type="radio" name="pozicija" value="bek"> Bek <br>
    <input type="radio" name="pozicija" value="krilo"> Krilo <br>
    <input type="radio" name="pozicija" value="krilni-centar"> Krilni Centar<br>
    <input type="radio" name="pozicija" value="centar"> Centar <br>
  <br>
<span>Starost : </span>  <input type="text" size="20" name="starost"> <br> <br>
<span>Poeni po utakmici : </span>  <input type="text" size="20" name="ppu"> <br>
<!-- ovu liniju promeniti po html5 standardu -->
 <!--<button class="btn btn-primary" type="submit" name="unos">Ubaci</button> -->
 <input type="submit" name="unos" value="Posalji"> 
</form>
<?php
/*U form tagu action atribut nema vrednost. Kada je action atribut definisan na ovaj način podaci se šalju
 ka stranici na kojoj se nalazi forma. Forma se prikazuje na unosvesti.php pa će se i nakon submit - ovanja
 forme opet otvarati ista stranica. 
 */
if (isset($_POST["unos"])){
//Prikupljanje podataka sa forme
if (isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['pozicija']) && isset($_POST['starost']) && isset($_POST['ppu']))
{	
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$pozicija = $_POST['pozicija'];
$starost = $_POST['starost'];
$ppu = $_POST['ppu'];

//Operacije nad bazom
 include "../connection.php";
$sql="INSERT INTO kosarkasi (ime, prezime, pozicija, starost, ppu) VALUES ('".$ime."', '".$prezime."', '".$pozicija."', '".$starost."', '".$ppu."')";
//PROUCITI OVU LINIJU KODA
if ($mysqli->query($sql)){
print "<p>Novost je uspešno ubačena</p>";
header("location:ubacivanje.php");
exit();
} else {
echo "<p>Nastala je greška pri ubacivanju kosarkasi</p>" . $mysqli->error;
}
} else {
//Ako POST parametri nisu prosleđeni
echo "Nisu prosleđeni parametri!";
}
$mysqli->close();
}
?>
</div>
</body>
</html>