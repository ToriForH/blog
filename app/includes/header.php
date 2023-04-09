<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
        <h1 class="logo-text"><span>Shitty</span> Blog</h1>
    </a>
    <i class="fa-solid fa-bars menu-toggle"></i>
    <ul class="nav">
        <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a> </li>
        <!-- <li><a href="#">About</a> </li> -->
        <li><a href="<?php echo BASE_URL . '/contact.php' ?>">Contact Us</a> </li>

        <?php if(isset($_SESSION['id'])): ?>
        <li>
            <a class="username" href="# user">
                <i class="fa-solid fa-user" style="font-size: 0.9em;"></i>
                <?php echo $_SESSION['username']; ?>
                <i class="fa-solid fa-chevron-down arrow-down" style="font-size: 0.8em;"></i>
                <i class="fa-solid fa-chevron-up arrow-up" style="font-size: 0.8em;"></i>
            </a>
            <ul class="us">
                <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a> </li>
                <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a> </li>
            </ul>
        </li>
        <?php else: ?>
            <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a> </li>
            <li><a href="<?php echo BASE_URL . '/login.php' ?>">Log In</a></li>
        <?php endif; ?>
    </ul>
</header>