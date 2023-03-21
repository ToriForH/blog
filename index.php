<?php
include("path.php");
include(ROOT_PATH. "app/database/db.php");
include(ROOT_PATH. "app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_POST['search-term']) && $_POST['search-term'] != '') {
    $postsTitle = "Searching for '" . $_POST['search-term'] . "'";
    $posts = searchPost($_POST['search-term']);
} else {
    $posts = selectAll('posts', ['published' => 1]);
}

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

    <title>Blog</title>
</head>
<body>

<?php include (ROOT_PATH. "/app/includes/header.php"); ?>
<?php include (ROOT_PATH. "/app/includes/messages.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">

<!-- Content -->
<div class="content clearfix">
    <!-- Main Content -->
    <div class="main-content">
        <h1 class="recent-post-title"><?php echo $postsTitle; ?></h1>

        <?php foreach ($posts as $post): ?>
        <div class="post clearfix">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
            <div class="post-preview">
                <h2><a href="single.html"><?php echo $post['title']; ?></a> </h2>
                <i class="fa-solid fa-user"> <?php echo getValue('users', $post['user_id'], 'username'); ?></i>
                &nbsp;
                <i class="fa-regular fa-calendar-days"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                <p class="preview-text">
                    <?php echo html_entity_decode(substr($post['body'], 0, 140) . '. . .'); ?>
                </p>
                <a href="single.html" class="btn read-more">Read More</a>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <!-- //Main Content -->
    <div class="sidebar">
        <div class="section search">
            <h2 class="section-title">Search</h2>
            <form action="index.php" method="post">
                <input type="text" name="search-term" class="text-input" placeholder="Search...">
            </form>
        </div>
        <div class="section topics">
            <h2 class="section-title">Topics</h2>
            <ul>
                <?php foreach ($topics as $key => $topic): ?>
                <?php if ($topic['published'] == 1): ?>
                    <li><a href="#"><?php echo $topic['name']; ?></a></li>
                <?php endif; ?>
                <?php endforeach; ?>
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