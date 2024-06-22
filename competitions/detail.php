<?php
include "../config/conn.php"
?>

<?php
isset($_GET['slug']);
$slug = $_GET['slug'];

$sql = "SELECT * FROM competition WHERE slug='$slug'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] .
            "Name: " . $row["name"] .
            "Slug Name: " . $row["slug"] .
            "Banner: " . $row["banner"] .
            "Max-Teams: " . $row["max_teams"] .
            "<br>";


        $id = $row['id'];

        $sql = "SELECT provinces.name_thai, provinces.name_english 
          FROM provinces 
          INNER JOIN competition_provinces 
          ON competition_provinces.province_id=provinces.id 
          WHERE competition_provinces.competition_id=$id";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "name thai: " . $row["name_thai"] .
                    " name english: " . $row["name_english"] .
                    "<br>";
            }
        }
    }
} else {
    echo "no";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name;?></title>
</head>

<body>
    <h1>Competition Info Page</h1>
</body>

</html>