<?php

include 'template/header.php';

include 'classes/class.database.php';
include 'functions.php';

$db = new Database();
$result = $db->getComponents();
?>
    <main>

        <div class="container">
            <div class="row">
                <div class="col-md-3 bg-secondary text-light p-2">
                    <h4 class="p-1 border-bottom border-2">Značky</h4>
                    <div class="list-group">
                        <form action="znacky.php">
                            <select class="form-select" id="list" onchange="getValue('brand')">
                                <option selected>Vyber znacku</option>
                                <?php
                                    foreach($db->getAllBrands() as $brand) {
                                        echo '<option value="'.$brand['vyrobce'].'">'.$brand['vyrobce'].'</option>';
                                    }
                                ?>
                            </select>
                        </form>
                    </div>

                </div>
                <div class="col-md-9 bg-light">
                    <h2 class="text-center p-4">Podle značky</h2>
                    <ul class="d-flex flex-wrap justify-content-center list-unstyled mt-3">
                        <?php
                        if(!empty($_GET['brand'])){
                            $result2 = $db->getComponentsBrand((!empty($_GET['brand'])) ? $_GET['brand'] : false);

                            $per_page = 3;
                            $curr_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
                            if(is_numeric($curr_page)):


                            $num_of_pages = ceil($result2->num_rows / $per_page);
                            $offset = ($curr_page - 1) * $per_page;
                            $products = $db->getComponentsUrlLimitBrand((!empty($_GET['brand'])) ? $_GET['brand'] : false, $per_page, $offset);

                            while($row2 = $products->fetch_assoc()) {
                                ?>
                                <li class="m-1">
                                    <div class="card card-shop h-100">
                                        <div class="card-img-top">
                                            <img src="<?= getPicture($row2['pic']) ?>" class="img-fluid p-2">
                                        </div>
                                        <div class="p-2 align-items-end mt-auto">
                                            <h5 class="card-title"><?= $row2['nazev'];?></h5>
                                            <p><?= $row2['vyrobce'];?></p>
                                            <a href="komponent.php?id=<?= $row2['id']; ?>" class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            endif;
                        }
                        ?>
                    </ul>
                    <div class="text-center p-2">
                        <?php

                        if(!empty($num_of_pages)):
                            for($page=1;$page <= $num_of_pages; $page++) {
                                echo '<a href="znacky.php?brand=' . $_GET['brand'] .'&page='.$page.'" class="btn btn-primary m-1">' . $page .'</a>';
                            }
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php include 'template/footer.php';?>