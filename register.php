<?php include 'template/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-12 bg-light">
            <form action="includes/register.inc.php" method="POST">
                <div class="p-3">
                    <label for="full_name">Celé jméno</label>
                    <input type="text" class="form-control" name="full_name" id="full_name">
                </div>
                <div class="p-3">
                    <label for="username">Přezdívka</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="p-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="p-3">
                    <label for="pwd">Heslo</label>
                    <input type="password" class="form-control" name="pwd" id="pwd">
                </div>
                <div class="p-3">
                    <label for="pwd_check">Heslo</label>
                    <input type="password" class="form-control" name="pwd_check" id="pwd_check">
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

<?php include 'template/footer.php'?>
