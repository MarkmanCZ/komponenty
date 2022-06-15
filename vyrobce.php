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
                    <section>
                        <a href="create.php">Vytvořit nový</a>
                    </section>
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
                                        <td>                                        
                                            <form action="includes/delete_brand.inc.php" method="POST">
                                                <input type="text" hidden value="'.$row["idVyrobce"].'" name="id">
                                                <button type="submit" name="submit" class="btn btn-danger">Smazat</button>  
                                            </form> 
                                        </td>
                                        <td><a  href="edit.php?type=brand&id='.$row['idVyrobce'].'" class="btn btn-success">Editovat</a></td>
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