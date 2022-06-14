<?php include 'template/header.php';?>
<?php
require_once 'includes/functions.inc.php';
require_once 'classes/class.database.php';
$db = new Database();
$results = $db->getAllBrands();
?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col">Název</th>
                            <th scope="col" class="text-center">Zakázaný/Smazaný</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($row = $results->fetch_assoc()) {
                            echo '
                                    <tr>
                                        <th scope="row">'.$row["idVyrobce"].'</th>
                                        <td>'.$row["vyrobce"].'</td>
                                        <td  class="text-center">'.$row["delete"].'</td>
                                        <td><a href="vyrobce.php?delete='.$row["idVyrobce"].'" class="btn btn-danger">Smazat</a></td>
                                        <td><a  href="" class="btn btn-success">Editovat</a></td>
                                    </tr>
                                ';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php
    if(isset($_GET['delete'])) {
        $db->deleteBrand($_GET['delete']);
    }
    else if(isset($_GET['edit'])) {
        //TODO: edit
    }
?>

<?php include 'template/footer.php'?>