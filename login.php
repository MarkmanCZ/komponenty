<?php include 'template/header.php'?>
<main>
<div class="container">
    <div class="row">
        <div class="col-12 bg-light">
            <form action="includes/login.inc.php" method="POST">
                <div class="p-3">
                    <label for="login">Email nebo Přezdívka</label>
                    <input type="text" class="form-control" name="login" id="login">
                </div>
                <div class="p-3">
                    <label for="pwd">Heslo</label>
                    <input type="password" class="form-control" name="pwd" id="pwd">
                </div>
                <button type="submit" name="submit" class="btn btn-primary ms-3 mb-3">Odeslat</button>
            </form>
            <section>
                <?php
                    if(isset($_GET["error"])):
                ?>
                <!-- ERRORS -->
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>Nastala chyba!</strong> <?= showError(); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    endif;

                ?>
            </section>
        </div>
    </div>
</div>
</main>

<?php include 'template/footer.php'?>
