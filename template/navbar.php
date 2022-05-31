<div class="container p-0">
    <nav class="navbar navbar-expand-md navbar-light bg-light p-3 rounded-top mt-1 mt-md-3 border-bottom border-5 mb-4">
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
            ?>
                    <li class="nav-item">
                        <a href="../includes/logout.inc.php" class="btn btn-success">odhlásit</a>
                    </li>
            <?php
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