<div class="container p-0 mx-auto my-1">
    <nav class="navbar navbar-expand-md navbar-light bg-light p-3 rounded-top">
        <a href="index.php" class="navbar-brand fw-bold">MV Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBox" aria-controls="navBox" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navBox">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">domů</a>
                </li>
                <li class="nav-item">
                    <a href="obchod.php" class="nav-link">obchod</a>
                </li>
                <li class="nav-item">
                    <a href="owebu.php" class="nav-link">o webu</a>
                </li>
            <?php
                if(isset($_SESSION['user_data'])):
                    if($_SESSION['user_data']->getGroup() == 10):
            ?>
                <li class="nav-item">
                    <a href="../profile.php" class="nav-link">profil</a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        Administrace
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropMenu">
                        <li><a class="dropdown-item" href="../uzivatele.php">Uživatelé</a></li>
                        <li><a class="dropdown-item" href="../komponenty.php">Komponenty</a></li>
                        <li><a class="dropdown-item" href="../vyrobce.php">Výrobce</a></li>
                    </ul>
                </div>
                <li class="nav-item ms-2">
                    <a href="../includes/logout.inc.php" class="btn btn-outline-success">odhlásit</a>
                </li>
            <?php
                    else:
            ?>
                <li class="nav-item">
                    <a href="../includes/logout.inc.php" class="btn btn-outline-success">odhlásit</a>
                </li>
            <?php
                endif;
                else:
            ?>
                <li class="nav-item">
                    <a href="login.php" class="btn btn-success">administrace</a>
                </li>
            <?php
                endif;
            ?>
            </ul>
        </div>
    </nav>
</div>