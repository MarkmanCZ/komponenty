<?php

    include 'template/header.php';

    include 'classes/class.database.php';
    include 'functions.php';

    $db = new Database();
    $result = $db->getConn()->query("SELECT * FROM mt_typkomponent");

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
                <ul class="d-flex flex-wrap justify-content-center list-unstyled">
                <?php

                   $page_number = (!empty($_GET['page'])) ? $_GET['page'] : false;

                    $stmt = $db->getConn()->prepare("SELECT * FROM mt_komponent as komp INNER JOIN mt_typkomponent AS typ ON typ.idKomponent = komp.typKomponent_id INNER JOIN mt_vyrobce AS vyrb 
                    ON vyrb.idVyrobce = komp.vyrobce_id  
                    WHERE typ.url = ?;");
                    $stmt->bind_param("s", $_GET['komp']);
                    $stmt->execute();

                    $result = $stmt->get_result();


                    while($row2 = $result->fetch_assoc()) {
                ?>
                    <li class="m-1">
                        <div class="card card-shop h-100">
                            <img src="<?= getPicture($row2['pic']) ?>" class="card-img-top p-2 w-100" >
                            <div class="card-body">
                                <h5 class="card-title"><?= $row2['nazev'];?></h5>
                                <p><?= $row2['vyrobce'];?></p>
                                <a href="#" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </li>
                    <?php

                        }

                    ?>
                </ul>
            </div>
        </div>
    </div>

    </main>
    <?php include 'template/footer.php';?>