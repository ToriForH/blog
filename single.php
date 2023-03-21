<?php
include("path.php");
include(ROOT_PATH. "app/database/db.php");
include(ROOT_PATH. "app/controllers/topics.php");
include(ROOT_PATH. "app/controllers/posts.php");

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics', ['published' => 1]);
$posts = selectPublished('posts', ['published' => 1]);

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

    <title><?php echo $post['title']; ?> | SiteName </title>
</head>
<body>

  <?php include (ROOT_PATH . "app/includes/header.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">

<!-- Content -->
<div class="content clearfix">

    <!-- Main Content Wrapper -->
    <div class="main-content single">
        <h1 class="post-title"><?php echo $post['title']; ?></h1>
        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="">
        <div class="post-content">
            <?php echo html_entity_decode($post['body']); ?>
        </div>
    </div>
    <!-- //Main Content -->

    <!-- Sidebar -->
    <div class="sidebar single">

        <div class="section recent">
            <h2 class="section-title">Recent</h2>

            <?php $count = 0; foreach ($posts as $p): ?>
            <?php if ($count < 5 && $p['id'] != $post['id']): ?>
            <div class="post clearfix">
                <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                <a href="single.php?id=<?php echo $p['id']; ?>" class="title"><h4><?php echo $p['title']; ?></h4></a>
            </div>
            <?php $count++; endif; ?>
            <?php endforeach; ?>

        </div>

        <div class="section topics">
            <h2 class="section-title">Topics</h2>
            <ul>
                <?php foreach ($topics as $key => $topic): ?>
                    <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                <?php endforeach; ?>
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