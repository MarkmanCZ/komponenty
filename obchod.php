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
                <h4 class="p-1 border-bottom border-2">Nabídka komponent</h4>
                    <div class="list-group">
                        <?php
                            while($row = $result->fetch_assoc()) {
                        ?>
                        <a href="<?= linkComponent($row['url']) ?>" class="list-group-item list-group-item-action"><?= $row["typKomponent"]; ?></a>
                        <?php
                            }
                        ?>
                    </div>
            </div>
            <div class="col-md-9 bg-light">
                <h2 class="text-center m-5"><?php

                    if(!empty($_GET['komp'])) {
                        echo $db->getComponentType((!empty($_GET['komp'])) ? $_GET['komp'] : false)->fetch_array()['typKomponent'];
                    }

                    ?></h2>
                <ul class="d-flex flex-wrap justify-content-center list-unstyled mt-3">
                <?php
                    if(!empty($_GET['komp'])):

                        $result2 = $db->getComponentsUrl((!empty($_GET['komp'])) ? $_GET['komp'] : false);


                        while($row2 = $result2->fetch_assoc()) {
                ?>
                    <li class="m-1">
                        <div class="card card-shop h-100">
                            <img src="<?= getPicture($row2['pic']) ?>" class="card-img-top p-2 w-100" >
                            <div class="card-body">
                                <h5 class="card-title"><?= $row2['nazev'];?></h5>
                                <p><?= $row2['vyrobce'];?></p>
                                <a href="komponent.php?id=<?= $row2['id']; ?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </li>
                    <?php

                        }
                        endif;

                    ?>
                </ul>
            </div>
        </div>
    </div>

    </main>
    <?php include 'template/footer.php';?>