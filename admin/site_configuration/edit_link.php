<?php
include("../../path.php");
include(ROOT_PATH . "../../app/controllers/posts.php");
$title = 'Edit Link';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Kanit&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Admin Section - <?php echo $title; ?></title>
</head>
<body>

<?php include(ROOT_PATH. "../../app/includes/header.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="site_titles.php" class="btn btn-big">Manage Titles</a>
            <a href="links_settings.php" class="btn btn-big">Manage Links</a>
            <a href="contacts_settings.php" class="btn btn-big">Manage Contacts</a>
            <a href="site_info.php" class="btn btn-big">Manage Site Info</a>
        </div>

        <div class="content">

            <h2 class="page-title"><?php echo $title; ?></h2>

            <?php include (ROOT_PATH. "../../app/includes/messages.php"); ?>

            <form action="edit_link.php" method="post" class="content request">
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="text-input main">
                </div>
                <div>
                    <label>Link</label>
                    <input type="text" name="link" value="<?php echo $link; ?>" class="text-input main">
                </div>
                <div>
                    <label>Visibility Header</label>
                    <?php if($header == 1): ?>
                        <input type="checkbox" name="header" value="<?php echo $header; ?>" checked>
                    <?php else: ?>
                        <input type="checkbox" name="header" value="<?php echo $header; ?>">
                    <?php endif; ?>
                </div>
                <div>
                    <label>Visibility User Menu</label>
                    <?php if($user_menu == 1): ?>
                        <input type="checkbox" name="user_menu" value="<?php echo $user_menu; ?>" checked>
                    <?php else: ?>
                        <input type="checkbox" name="user_menu" value="<?php echo $user_menu; ?>">
                    <?php endif; ?>
                </div>
                <div>
                    <label>Visibility Footer</label>
                    <?php if($footer == 1): ?>
                        <input type="checkbox" name="footer" value="<?php echo $footer; ?>" checked>
                    <?php else: ?>
                        <input type="checkbox" name="footer" value="<?php echo $footer; ?>">
                    <?php endif; ?>
                </div>
                <div class="button-group">
                    <button type="submit" name="add-link" class="btn btn-big">Save Link</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Admin Content -->

</div>
<!-- // Page Wrapper -->

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- CkEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>


<!-- Custom Script -->
<script src="../../assets/js/scripts.js"></script>

</body>
</html>