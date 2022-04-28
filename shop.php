    <?php include 'template/header.php';?>

   <?php include 'includes/functions.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3 bg-secondary text-light p-2">
                <h4 class="p-1 border-bottom border-2">Nabídka komponent</h4>
                <div class="list-group">
                    <a href="<?= linkComponent('desky') ?>" class="list-group-item list-group-item-action">Základní desky</a>
                    <a href="<?= linkComponent('cpu') ?>" class="list-group-item list-group-item-action">Procesory</a>
                    <a href="<?= linkComponent('grafiky') ?>" class="list-group-item list-group-item-action">Grafické karty</a>
                </div>
            </div>
            <div class="col-md-9 bg-light">

            </div>
        </div>
    </div>

    <?php include 'template/footer.php';?>