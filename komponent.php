<?php

    include 'template/header.php';

    include 'classes/class.database.php';
    include 'functions.php';

    $db = new Database();

    $row = $db->getComponentsJoin($_GET['id']);

    $resultParam = $db->getParams($row);
?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 bg-light p-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-5 p-2">
                                <img src="<?= getPicture($row['pic']) ?>" class="img-fluid text-center">
                            </div>
                            <div class="col-12 col-md-7">
                                <h2><?= $row['nazev']; ?></h2>
                                <h3><?= $row['vyrobce'];?></h3>
                                <a href="obchod.php?komp=<?= $row['url']; ?>" class="default fw-bold"><?= $row['typKomponent'];?></a>
                                <br>
                                <a href="<?= $row['odkaz'];?>" class="default" target="_blank"><?= $row['odkaz'];?></a>
                                <h2>Parametry</h2>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Název</th>
                                        <th scope="col">Hodnota</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($params = $resultParam->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $params['nazev'];?></td>
                                            <td><?= $params['hodnota'];?></td>
                                        </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php include 'template/footer.php';?>