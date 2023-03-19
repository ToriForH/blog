<?php include("path.php"); ?>
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

    <title>Blog</title>
</head>
<body>

<!-- Header cause root_path not work -->
<?php include (ROOT_PATH. "/app/includes/header.php"); ?>


<!-- Page Wrapper -->
<div class="page-wrapper">

<!-- Content -->
<div class="content clearfix">
    <!-- Main Content -->
    <div class="main-content">
        <h1 class="recent-post-title">Recent Posts</h1>

        <div class="post clearfix">
            <img src="assets/images/image-3.png" alt="" class="post-image">
            <div class="post-preview">
                <h2><a href="single.html">Some text to be post-preview</a></h2>
                <i class="fa-solid fa-user"> Suka user2</i>
                &nbsp;
                <i class="fa-regular fa-calendar-days"> Unexisting date</i>
                <p class="preview-text">
                    Some text to be preview-text.
                    One more line And more line it will be a limit to characters in this section And some more here. What about 140
                </p>
                <a href="single.html" class="btn read-more">Read More</a>
            </div>
        </div>
        <div class="post clearfix">
            <img src="assets/images/image-1.png" alt="" class="post-image">
            <div class="post-preview">
                <h2><a href="single.html">Some text to be post-preview</a> </h2>
                <i class="fa-solid fa-user"> Suka user2</i>
                &nbsp;
                <i class="fa-regular fa-calendar-days"> Unexisting date</i>
                <p class="preview-text">
                    Some text to be preview-text.
                    One more line.
                </p>
                <a href="single.html" class="btn read-more">Read More</a>
            </div>
        </div><div class="post clearfix">
        <img src="assets/images/image-2.png" alt="" class="post-image">
        <div class="post-preview">
            <h2><a href="single.html">Some text to be post-preview</a> </h2>
            <i class="fa-solid fa-user"> Suka user2</i>
            &nbsp;
            <i class="fa-regular fa-calendar-days"> Unexisting date</i>
            <p class="preview-text">
                Some text to be preview-text.
                One more line.
            </p>
            <a href="single.html" class="btn read-more">Read More</a>
        </div>
    </div>
        <div class="post clearfix">
        <img src="assets/images/image-2.png" alt="" class="post-image">
            <div class="post-preview">
                <h2><a href="single.html">Some text to be post-preview</a> </h2>
                <i class="fa-solid fa-user"> Suka user2</i>
                &nbsp;
                <i class="fa-regular fa-calendar-days"> Unexisting date</i>
                <p class="preview-text">
                    Some text to be preview-text.
                    One more line And more line it will be a limit to characters in this section And some more here. What about 140
                </p>
                <a href="single.html" class="btn read-more">Read More</a>
            </div>
        </div>
    </div>
    <!-- //Main Content -->
    <div class="sidebar">
        <div class="section search">
            <h2 class="section-title">Search</h2>
            <form action="index.html" method="post">
                <input type="text" name="search-term" class="text-input" placeholder="Search...">
            </form>
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