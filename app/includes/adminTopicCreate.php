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
            <a href="create.php" class="btn btn-big">Add Topic</a>
            <a href="index.php" class="btn btn-big">Published Topic</a>
            <?php if($_SESSION['moder']): ?>
                <a href="index_all.php" class="btn btn-big">Manage All Topics</a>
                <a href="index_suggested.php" class="btn btn-big">Manage Suggested Topics</a>
            <?php endif; ?>
            <a href="index_my.php" class="btn btn-big">Manage My Topics</a>
        </div>

        <div class="content">

            <h2 class="page-title"><?php echo $title; ?></h2>
            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>

            <form action="<?php echo $action; ?>" method="post">
                <?php if($title == "Edit Topic"): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endif; ?>
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="text-input main">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description" id="body"><?php echo $description; ?></textarea>
                </div>
                <div class="button-group">
                    <button type="submit" name="<?php echo $submitName; ?>" class="btn btn-big"><?php echo $submitTitle; ?></button>
                    <?php if($_SESSION['moder']): ?>
                        <button type="submit" name="<?php echo $publishName; ?>" class="btn btn-big"><?php echo $publishTitle; ?></button>
                    <?php endif; ?>
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