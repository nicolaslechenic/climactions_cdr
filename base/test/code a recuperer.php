<?php
session_start();
include('db_connect.php');

if (isset($_GET['user'])) {
    $user = (string) trim($_GET['user']);

    $req = $DB->query(
        "SELECT '*'
      FROM document
      WHERE outil AND genre LIKE ?
      LIMIT 100",
        array("$user%")
    );

    $req = $req->fetch_all();

    foreach ($req as $r) {
?>
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['genre'] . " " . $r['outil'] ?></div>
<?php
    }
}
?>


<!-- <form method='POST' action='detaillivre.php'>
            <table>
                <tr>
                    <td width=''>Choix</td>
                </tr>
                <?php
                $result = mysqli_query($DB, $q) or exit('Erreur SQL !' . $query . '<br>');
                while ($rows = mysqli_fetch_array($result)) {
                ?>
                    <input type='checkbox' name='Reserver[]' value='on" . $data[ id ] . "'></td>;
                <?php
                }
                ?>

            </table>
        </form> -->