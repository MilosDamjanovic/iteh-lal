<!DOCTYPE html>
<html>
<head>
<title>Pregled igraca</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<script src="../js/bootstrap.js"></script>
<script type="text/javascript">
	/*function nazad(){
		window.href="http://www.google.com";
	}
	*/
</script>

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
<h1>Prikaz kosarkasa</h1>
<hr/>
<br>
<?php
include "../connection.php";
$sql="SELECT ime, prezime, pozicija, starost, ppu FROM kosarkasi ORDER BY idkosarkasa DESC";
if (!$q=$mysqli->query($sql)){
echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
exit();
}
if ($q->num_rows==0){
echo "Nema kosarkasi";
} else {
?>
<table id="id1" border="2">
<tr>
<th><b>Ime</b></th>
<th><b>Prezime</b></th>
<th><b>Pozicija</b></th>
<th><b>Starost</b></th>
<th><b>Poeni po utakmici</b></th>
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
</tr>
<?php
}
?>
</table>
<a href="../index.php"><button class="nazad" onmouseclick="nazad()">Nazad</button></a>
<?php
}
$mysqli->close();
?>
</body>
</html>