<?php
include("db_connect.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\style.css">
</head>


<body>
    <table>
        <?php
        while ($rows = $result->fetch_array()) {
        ?>
            <!-- <tr>
                <td>Type</td>
                <td>Genre</td>
                <td>Nom</td>

            </tr> -->
            <tr>
                <td><?php echo $rows['type']; ?> </td>
                <td><?php echo $rows['genre']; ?> </td>
                <td><?php echo $rows['outil']; ?> </td>
                <td> <?php $link_address1 = 'detaillivre.php';
                        echo "<a href='" . $link_address1 . "'>Détails document</a>"; ?>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>

</body>



</html>




<!-- 
printf("%s %s (%s)<br />", $row["type"], $row["genre"], $row["outil"]);
}A -->