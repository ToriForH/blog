<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
        <h1 class="logo-text"><span>Shitty</span> Blog</h1>
    </a>
    <i class="fa-solid fa-bars menu-toggle"></i>
    <ul class="nav">
        <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a> </li>
        <li>
            <a href="# user">
                <i class="fa-solid fa-user" style="font-size: 0.9em;"></i>
                <?php echo $_SESSION['username']; ?>
                <i class="fa-solid fa-chevron-down arrow-toggle" style="font-size: 0.8em;"></i>
            </a>
            <ul class="us">
                <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a> </li>
            </ul>
        </li>
    </ul>
</header>