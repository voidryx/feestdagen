<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="feestdagen.css"> 
</head>
<body>

<?php
     $db_server = "localhost";
     $db_user = "root";
     $db_pass = "";
     $db_name = "feestdagen";
     $conn = "";

     $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
     
     
    $sql = "SELECT feestdag, datum, maand FROM feestdagen";
     $result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    echo "<div class='table-wrapper'>";
    echo "<table>";

    // kolom namen
    echo "<tr>";
    echo "<th>feestdag</th>";
    echo "<th>datum</th>";
    echo "<th>maand</th>";
    echo "</tr>";

    // data uit database
    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['feestdag']) . "</td>";
        echo "<td>" . htmlspecialchars($row['datum']) . "</td>";
        echo "<td>" . htmlspecialchars($row['maand']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

} else {
    echo "0 resultaten";
}

$conn->close();
        
        ?>

</body>
</html>