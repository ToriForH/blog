<?php
include("path.php");
include(ROOT_PATH. "app/database/db.php");
include(ROOT_PATH. "app/controllers/topics.php");
include(ROOT_PATH. "app/controllers/posts.php");
$posts = publishedCondition('posts');

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
    <link rel="stylesheet" href="assets/css/style.css">

    <title> Gallery </title>
</head>
<body>

<?php include (ROOT_PATH . "app/includes/header.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

        <!-- Main Content Wrapper -->
        <div class="main-content single">
            <?php foreach ($posts as $post): ?>
                <p> </p>
                <img class="single-image" src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="">
                <p> </p>
            <?php endforeach; ?>
        </div>
        <!-- //Main Content -->

        <?php include(ROOT_PATH . "app/includes/sidebar.php"); ?>

    </div>
    <!-- //Content -->

</div>
<!-- // Page Wrapper -->

<?php include(ROOT_PATH . "app/includes/footer.php"); ?>

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom Script -->
<script src="assets/js/scripts.js"></script>

</body>
</html>