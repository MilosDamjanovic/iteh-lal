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
<h1>Brisanje kosarkasa</h1>
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
echo "Nema kosarkasi";
} else {
?>
<table border="2 solid purple">
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
<!--napredna stilizacija tabele -->
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
