<?php include 'template/header.php';?>
<?php
    require_once 'includes/functions.inc.php';
    require_once 'classes/class.database.php';
    $db = new Database();
    $results = $db->getComponents();
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
                            <th scope="col">Výrobce</th>
                            <th scope="col">Typ komponentu</th>
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
                                        <th scope="row">'.$row["id"].'</th>
                                        <td>'.$row["nazev"].'</td>
                                        <td>'.$row["vyrobce"].'</td>
                                        <td>'.$row["typKomponent"].'</td>
                                        <td class="text-center">'.$row["delete"].'</td>
                                        <td>                                        
                                            <form action="includes/delete_comp.inc.php" method="POST">
                                                <input type="text" hidden value="'.$row["id"].'" name="id">
                                                <button type="submit" name="submit" class="btn btn-danger">Smazat</button>  
                                            </form>                                       
                                        </td>
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

<?php include 'template/footer.php'?>