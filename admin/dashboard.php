<?php include("../path.php"); ?>
<?php include(ROOT_PATH. "../app/controllers/users.php"); ?>
<?php include(ROOT_PATH. "../app/database/db.php"); ?>

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
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../assets/css/admin.css">

    <title>Admin Section - Dashboard</title>
</head>
<body>

<?php include(ROOT_PATH. "../app/includes/adminHeader.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">
    <?php include(ROOT_PATH. "../app/includes/adminSidebar.php"); ?>
    <!-- Admin Content -->
    <div class="admin-content">
        <div class="content">
            <h2 class="page-title">Dashboard</h2>
            <?php include(ROOT_PATH . "../app/includes/messages.php"); ?>
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
<script src="../assets/js/scripts.js"></script>

</body>
</html>