<?php include 'template/header.php';?>
<?php
    require_once 'classes/class.database.php';
    $db = new Database();
    $results = $db->getAllUsers();
?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                        if(isset($_GET['page'])) {
                            switch ($_GET['page']) {
                                case "delete":
                                    //smaz uzivatele
                                    $db->delete($_GET['uid']);
                                case "edit":
                                    //edituj uzivatele
                            }
                        }else {
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Celé jméno</th>
                                <th scope="col">Email</th>
                                <th scope="col">Přezdívka</th>
                                <th scope="col">Skupina</th>
                                <th scope="col">Registrován</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row = $results->fetch_assoc()) {
                        echo '
                            <tr>
                                <th scope="row">'.$row["user_id"].'</th>
                                <td>'.$row["user_name"].'</td>
                                <td>'.$row["user_email"].'</td>
                                <td>'.$row["user_nick"].'</td>
                                <td>'.$row["user_group"].'</td>
                                <td>'.$row["user_registred_at"].'</td>
                                <td><a href="uzivatele.php?page=delete&uid='.$row["user_id"].'" class="btn btn-danger">Smazat</a></td>
                                  <td><a href="uzivatele.php?page=edit&uid='.$row["user_id"].'" class="btn btn-success">Editovat</a></td>
                            </tr>
                        ';
                            }
                        ?>
                        </tbody>
                    </table>
                            <?php } ?>
                </div>
            </div>
        </div>
    </main>

<?php include 'template/footer.php'?>