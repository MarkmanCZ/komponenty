<?php include 'template/header.php';?>

    <main>
        <div class="container">
            <div class="bg-light rounded">
                <form action="includes/profile.inc.php" method="POST">
                    <div class="p-3">
                        <label for="full_name" class="pb-1">Celé jméno</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" value="<?= $_SESSION['user_data']->getFullName(); ?>">
                    </div>
                    <div class="p-3">
                        <label for="username" class="pb-1">Přezdívka</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= $_SESSION['user_data']->getNickname();?>">
                    </div>
                    <div class="p-3">
                        <label for="email" class="pb-1">Email</label>
                        <input type="email" class="form-control" name="email" id="email"  value="<?= $_SESSION['user_data']->getEmail();?>">
                    </div>
                    <div class="p-3">
                        <label for="pwd" class="pb-1">Heslo</label>
                        <input type="password" class="form-control" name="pwd" id="pwd" >
                    </div>
                    <div class="p-3">
                        <label for="pwd_check" class="pb-1">Heslo kontrola</label>
                        <input type="password" class="form-control" name="pwd_check" id="pwd_check">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary ms-3 mb-3">Odeslat</button>
                </form>
                <section class="p-3 pb-1">
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
    </main>

<?php include 'template/footer.php'?>
