<?php include 'template/header.php';?>

<?php
    $result = [];

    require_once 'classes/class.database.php';
    $db = new Database();
    if(isset($_GET['type']) && isset($_GET['id'])) {
        $content_id = $_GET['id'];
        $content_type = $_GET['type'];

        switch ($content_type) {
            case "brand":
                $result = $db->getBrandsId($content_id);
        }
    }
    $data = $result->fetch_array();
?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="img-thumbnail p-3">
                        <form action="includes/edit.inc.php" method="POST">
                            <div class="p-3">
                                <label for="id">ID Výrobce</label>
                                <input type="text" class="form-control" name="id" id="id" value="<?= $data['idVyrobce']; ?>">
                            </div>
                            <div class="p-3">
                                <label for="name">Název výrobce</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?= $data['vyrobce']; ?>">
                            </div>
                            <div class="p-3">
                                <label for="delete">Zakázaný/Smazaný</label>
                                <input type="text" class="form-control" name="delete" id="delete" value="<?= $data['delete']; ?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary px-auto mx-3">Odeslat</button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>

<?php include 'template/footer.php';?>