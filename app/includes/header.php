<?php include("../../path.php");

$links = selectAll('navigation', ['header' => 1]);

if(isset($_SESSION['id'])) {
    $user_menu = selectAll('navigation', ['user_menu' => 1]);
    foreach ($links as $key => $link) {
        if( $link['name'] == 'Log In' || $link['name'] == 'Sign Up') {
            unset($links[$key]);
        }
    }
}
?>

<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
        <h1 class="logo-text"><span>Somename</span> Blog</h1>
    </a>
        <i class="fa-solid fa-bars menu-toggle"></i>
        <ul class="nav">

            <?php foreach ($links as $key => $link): ?>
            <li><a href="<?php echo BASE_URL . $link['link']; ?>"><?php echo $link['name']; ?></a> </li>
            <?php endforeach; ?>

            <?php if(isset($_SESSION['id'])): ?>
                <li>
                    <a class="username" href="# user">
                        <i class="fa-solid fa-user" style="font-size: 0.9em;"></i>
                        <?php echo $_SESSION['username']; ?>
                        <i class="fa-solid fa-chevron-down arrow-down" style="font-size: 0.8em;"></i>
                        <i class="fa-solid fa-chevron-up arrow-up" style="font-size: 0.8em;"></i>
                    </a>
                    <ul class="us">
                        <?php foreach ($user_menu as $key => $link): ?>
                            <?php if($link['link'] == '/logout.php'): ?>
                                <li><a class="logout" href="<?php echo BASE_URL . $link['link']; ?>"><?php echo $link['name']; ?></a> </li>
                            <?php else: ?>
                                <li><a href="<?php echo BASE_URL . $link['link']; ?>"><?php echo $link['name']; ?></a> </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
</header>