<?php
include('db_connect.php');

$reponse = ("SELECT * FROM document");

$reponse = mysqli_query($DB, $reponse);

$link_address1 = 'detaillivre.php';


while ($donnée = $reponse->fetch_array()) {
?>
    <p>
        <strong>Document</strong> : <?php echo $donnees['outil']; ?> <br />
        La caution de ce document est de : <?php echo $donnees['caution']; ?> <br />



    </p>






<?php
}
?>