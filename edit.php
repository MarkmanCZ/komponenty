<?php include 'template/header.php';?>

<?php
    $result = [];
    require_once 'includes/functions.inc.php';
    require_once 'classes/class.database.php';
    $db = new Database();
?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                        if(isset($_GET['type']) && isset($_GET['id'])) {
                            $content_id = $_GET['id'];
                            $content_type = $_GET['type'];

                            switch ($content_type) {
                                case "brand":
                                    $result = $db->getBrandsId($content_id);
                                    $data = $result->fetch_array();
                    ?>
                    <section class="img-thumbnail p-3">
                        <form action="includes/edit.inc.php?type=<?= $_GET['type'];?>&id=<?= $data['idVyrobce']; ?>" method="POST">
                            <div class="p-3">
                                <label for="id">ID Výrobce</label>
                                <input type="text" class="form-control" name="id" id="id" disabled value="<?= $data['idVyrobce']; ?>">
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
                    <?php
                                break;
                                case "comp":
                                    $result = $db->getComponentId($content_id);
                                    $data = $result->fetch_array();
                                ?>
                                    <section class="img-thumbnail p-3">
                                        <form action="includes/edit.inc.php?type=<?= $_GET['type'];?>&id=<?= $data['id'];?>" method="POST">

                                            <div class="p-3">
                                                <label for="id">ID Komponentu</label>
                                                <input type="text" class="form-control" name="id" id="id" disabled value="<?= $data['id']; ?>">
                                            </div>
                                            <div class="p-3">
                                                <label for="name">Název komponentu</label>
                                                <input type="text" class="form-control" name="name" id="name"  value="<?= $data['nazev']; ?>">
                                            </div>
                                            <div class="p-3">
                                                <label for="type">Typ komponentu</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected><?= $data['typKomponent']; ?></option>
                                                    <?php
                                                        $result = $db->getComponentsFromTypeMinu($data['typKomponent']);
                                                        while($row = $result->fetch_assoc()) {

                                                    ?>
                                                        <option value="<?= $row['idKomponent']?>"><?= $row['typKomponent']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="p-3">
                                                <label for="brand">Výrobce komponentu</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected><?= $data['vyrobce']; ?></option>
                                                    <?php
                                                    $result = $db->getBrandsMinus($data['idVyrobce']);
                                                        while($row = $result->fetch_assoc()) {

                                                            ?>
                                                            <option value=""><?= $row['vyrobce']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="p-3">
                                                <label for="pic">Obrázek komponentu</label>
                                                <input type="text" class="form-control" name="pic" id="pic"  value="<?= $data['pic']; ?>">
                                            </div>
                                            <div class="p-3">
                                                <label for="delete">Smazaný/Zakázaný</label>
                                                <input type="text" class="form-control" name="delete" id="delete" value="<?= $data['delete']; ?>">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary px-auto mx-3">Odeslat</button>
                                        </form>
                                    </section>

                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php include 'template/footer.php';?>