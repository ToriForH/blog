<?php
include("path.php");
include(ROOT_PATH. "app/database/db.php");

?>
<div class="left-sidebar">
    <ul>
        <li><a href="<?php echo BASE_URL . '/admin/users/profile.php' ?>">My profile</a></li>
        <?php if($_SESSION['role'] > 2): ?>
            <li><a href="<?php echo BASE_URL . '/admin/users/index.php' ?>">Manage Users</a></li>
            <li><a href="<?php echo BASE_URL . '/admin/requests/index.php' ?>">Manage Requests</a></li>
        <?php endif; ?>
        <li><a href="<?php echo BASE_URL . '/admin/topics/index.php' ?>">Manage Topics</a></li>
        <li><a href="<?php echo BASE_URL . '/admin/posts/index.php' ?>">Manage Posts</a></li>
        <?php if($_SESSION['role'] > 3): ?>
            <li><a href="<?php echo BASE_URL . '/admin/site_configuration/site_titles.php' ?>">Manage Site</a></li>
        <?php endif; ?>
    </ul>
</div>
