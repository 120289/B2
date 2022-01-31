<?php include ("include/Connection.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title></title>
  </head>
  <body>

    <form id="tabel" method="post">
      <input type="number" name="id" placeholder="id...">
      <input type="text" name="voornaam" placeholder="Voornaam...">
      <input type="text" name="achternaam" placeholder="Achternaam...">
      <input type="date" name="geboortedatum">
      <button type="submit" name="add">Toevoegen</button>
      <button type="submit" name="reset">Reset tabel</button>

    </form>

    <?php

     if(isset($_POST['add'])) {
    $id = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $geboortedatum = $_POST['geboortedatum'];

    $query = "INSERT INTO verjaardagen (id, voornaam, achternaam, geboortedatum) values ('$id', '$voornaam', '$achternaam', '$geboortedatum')";
    mysqli_query($conn, $query);

    header("location: index.php");
  }

    if (isset($_POST['reset'])) {
      $delete = "DELETE FROM verjaardagen WHERE 1";
      mysqli_query($conn, $delete);
      header("location: index.php");
    }

 $sql = "SELECT id, voornaam, achternaam, geboortedatum FROM verjaardagen";
 $result = $conn->query($sql);

 $query = "SELECT geboortedatum FROM verjaardagen";
 $resultaat = mysqli_query($conn, $query);

 if ($result->num_rows > 0) {
     echo "<table id='bday'><tr><th>id</th><th>Voornaam</th><th>Achternaam</th><th>Geboortedatum</th><th>Leeftijd</th></tr>";

     while($row = $result->fetch_assoc()) {
       $jaar = $row['geboortedatum'];
       $van = new DateTime($jaar);
       $naar = new DateTime('today');
       $leeftijd = $van->diff($naar)->y;

         echo "<tr><td>".$row["id"]."</td><td>".$row["voornaam"]."</td><td>".$row["achternaam"]."</td><td>".$row["geboortedatum"]."</td><td>".$leeftijd."</td></tr>";
     }
     echo "</table>";
 } else {
     echo "Er zijn geen verjaardagen ingevoerd.";
 }


 $conn->close();
      ?>
  </body>
</html>
