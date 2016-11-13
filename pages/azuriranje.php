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
<h1>Azuriranje kosarkasa</h1>
<hr/>
<br>
<?php
include "../connection.php";
if (isset ($_GET['akcija']) && isset ($_GET['idkosarkasa'])){
$akcija = $_GET['akcija'];
$id = $_GET['idkosarkasa'];
switch ($akcija){
case "brisanje":
$upit = "DELETE FROM kosarkasi WHERE idkosarkasa = ".$id;
if (!$q=$mysqli->query($upit)){
echo "Nastala je greska pri izvodenju upita<br/>" . mysql_query();
die();
} else {
echo "<p>Brisanje zapisa je uspešno!</p>";
}
break;
case "izmena_forma":
?>
<h1>Izmena kosarkasi</h1>
<hr/>
<!-- castomizovana forma -->
<form method="post" action="?akcija=izmena&idkosarkasa=<?php echo $_GET['idkosarkasa'];?>">
ime : <input type="text" name="ime" /><br/>
prezime : <textarea name="prezime"></textarea><br/>
<input type="submit" name="unos" value="Ubaci" />
</form>
<?php
break;
case "izmena":
if (isset ($_POST['ime']) && isset ($_POST['prezime'])){
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$upit="UPDATE kosarkasi SET ime='". $ime ."', prezime='" . $prezime . "' WHERE idkosarkasa=". $id;
if ($mysqli->query($upit)){
if ($mysqli->affected_rows > 0 ){
echo "<p>Novost je uspešno izmenjena.</p>";
} else {
echo "<p>Novost nije izmenjena.</p>";
}
} else {
echo "<p>Nastala je greška pri izmeni kosarkasi</p>" . mysql_error();
}
} else {
echo "<p>Nisu prosleđeni parametri za izmenu";
}
break;
default:
echo "<p>Nepostojeća akcija!</p>";
break;
}
}
$sql="SELECT idkosarkasa, ime, prezime, pozicija, starost, ppu FROM kosarkasi";
if (!$q=$mysqli->query($sql)){
echo "Nastala je greska pri izvodenju upita<br>" . mysql_query();
die();
}
if ($q->num_rows==0){
echo "Nema kosarkasa";
} else {
?>
<h1>Prikaz kosarkasi</h1>
<hr/>
<table border="2">
<tr>
<td><b>ime</b></td>
<td><b>prezime</b></td>
<td><b>pozicija</b></td>
<td><b>starost</b></td>
<td><b>poeni po utakmici</b></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->ime; ?></td>
<td><?php echo $red->prezime; ?></td>
<td><?php echo $red->pozicija; ?></td>
<td><?php echo $red->starost; ?></td>
<td><?php echo $red->ppu; ?></td>
<td><a href="?akcija=izmena_forma&idkosarkasa=<?php echo $red->idkosarkasa; ?>">Izmena</a></td>
<td><a href="?akcija=brisanje&idkosarkasa=<?php echo $red->idkosarkasa; ?>">Brisanje</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
</body>
</html>
