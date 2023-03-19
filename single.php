<?php include("path.php");  ?>
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

    <title>Single Post</title>
</head>
<body>

  <?php include (ROOT_PATH . "app/includes/header.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">

<!-- Content -->
<div class="content clearfix">

    <!-- Main Content Wrapper -->
    <div class="main-content single">
        <h1 class="post-title">Title of the post will be written here</h1>
        <img src="assets/images/image-2.png" alt="">
        <div class="post-content">
            <p>Some words to be post content info. Like I write something about shit, but it is nit shit. In case I too tired to write shit content I can write only some mad words to fill up this page with some letters that pretend to be an informative article. If you still read this please stop you won't find here something except boring.</p>
            <p>Again Some words to be post content info. Like I write something about shit, but it is nit shit. In case I too tired to write shit content I can write only some mad words to fill up this page with some letters that pretend to be an informative article. If you still read this please stop you won't find here something except boring.</p>
            <p>2 AgainSome words to be post content info. Like I write something about shit, but it is nit shit. In case I too tired to write shit content I can write only some mad words to fill up this page with some letters that pretend to be an informative article. If you still read this please stop you won't find here something except boring.</p>
            <p>Again 3 Some words to be post content info. Like I write something about shit, but it is nit shit. In case I too tired to write shit content I can write only some mad words to fill up this page with some letters that pretend to be an informative article. If you still read this please stop you won't find here something except boring.</p>
        </div>
    </div>
    <!-- //Main Content -->

    <!-- Sidebar -->
    <div class="sidebar single">

        <div class="section recent">
            <h2 class="section-title">Recent</h2>

            <div class="post clearfix">
                <img src="assets/images/image-2.png" alt="">
                <a href="" class="title"><h4>Some recent post title</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/image-1.png" alt="">
                <a href="" class="title"><h4>Some recent post title</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/image-3.png" alt="">
                <a href="" class="title"><h4>Some recent post title</h4></a>
            </div>
            <div class="post clearfix">
                <img src="assets/images/image-1.png" alt="">
                <a href="" class="title"><h4>Some recent post title</h4></a>
            </div>
        </div>

        <div class="section topics">
            <h2 class="section-title">Topics</h2>
            <ul>
                <li><a href="#">Shit</a></li>
                <li><a href="#">Dirty Shit</a></li>
                <li><a href="#">Holy Shit</a></li>
                <li><a href="#">My Shit</a></li>
                <li><a href="#">Cats' Shit</a></li>
            </ul>
        </div>
    </div>
    <!-- //Sidebar -->

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