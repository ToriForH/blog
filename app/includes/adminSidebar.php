<?php
include("path.php");
include(ROOT_PATH. "app/database/db.php");
?>
<div class="left-sidebar">
    <ul>
        <?php if($_SESSION['admin']): ?>
            <li><a href="<?php echo BASE_URL . '/admin/users/index.php' ?>">Manage Users</a></li>
        <?php endif; ?>
        <?php if($_SESSION['manager']): ?>
            <li><a href="<?php echo BASE_URL . '/admin/topics/index.php' ?>">Manage Topics</a></li>
        <?php endif; ?>
        <li><a href="<?php echo BASE_URL . '/admin/posts/index.php' ?>">Manage Posts</a></li>

    </ul>
</div>
