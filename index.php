<?php
include("path.php");
include(ROOT_PATH. "app/database/db.php");
include(ROOT_PATH. "app/controllers/posts.php");

$posts = array();
$postsTitle = 'Recent Posts';
$mainPage = true;

if (isset($_POST['search-term'])) {
    if ($_POST['search-term'] == '') {
        unset($_POST['search-term']);
        header('location: ' . BASE_URL . '/index.php');
    } else {
        $postsTitle = "Searching for '" . $_POST['search-term'] . "'";
        $posts = searchPost($_POST['search-term']);
    }
} else if (isset($_GET['t_id'])) {
    $posts = publishedCondition('posts', ['topic_id' => $_GET['t_id']]);
    $postsTitle = "Searching for posts under '" . $_GET['name'] . "'";
} else if (isset($_GET['page'])) {
    $paginatedPosts = paginatePublished($_GET['page']);
    $postsTitle = "Page" . $_GET['page'];
} else {
    $paginatedPosts = paginatePublished();
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

    <?php include(ROOT_PATH . "app/includes/carousel.php"); ?>

<!-- Content -->
<div class="content clearfix">
    <!-- Main Content -->
    <div class="main-content">
        <h1 class="recent-post-title"><?php echo $postsTitle; ?> </h1>

        <?php foreach ($paginatedPosts['posts'] as $post): ?>
        <div class="post clearfix">
            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
            <div class="post-preview">
                <div>
                    <?php if(strlen($post['title']) > 30): ?>
                        <h2><a class="title" href="single.php?post_id=<?php echo $post['id']; ?>"><?php echo substr($post['title'], 0, 30) . '...'; ?></a> </h2>
                    <?php else: ?>
                        <h2><a class="title" href="single.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a> </h2>
                    <?php endif; ?>
                </div>
                <div>
                    <i class="fa-solid fa-user"> <?php echo getValue('users', $post['user_id'], 'username'); ?></i>
                    &nbsp;
                    <i class="fa-regular fa-calendar-days"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                </div>
                <div>
                    <?php if(strlen($post['body']) > 140): ?>
                        <span class="preview-text">
                    <?php echo html_entity_decode(substr($post['body'], 0, 140) . '. . .'); ?>
                    </span>
                    <?php else: ?>
                        <span class="preview-text">
                    <?php echo html_entity_decode($post['body']); ?>
                    </span>
                    <?php endif; ?>
                </div>
                <a href="single.php?post_id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
            </div>
        </div>
        <?php endforeach; ?>

        <div >
            <ul class="pagination-links">
                <li><a href="index.php?page=<?php //echo $paginatedPosts['prevPage'] ?>" class="link"><i class="fa-solid fa-chevron-left"></i></a></li>
                <li><a href="#" class="link active"> 1 </a></li>
                <li><a href="index.php?page=2" class="link"> 2 </a></li>
                <li><a href="#" class="link"> 3 </a></li>
                <li><a href="#" class="link"> 4 </a></li>
                <li><a href="#" class="link"> 5 </a></li>
                <li><a href="#" class="link"> 6 </a></li>
                <li><a href="#" class="link"> 7 </a></li>
                <li><a href="#" class="link"> 8 </a></li>
                <li><a href="#" class="link"> 9 </a></li>
                <li><a href="#" class="link"> 10 </a></li>
                <li><a href="#" class="link"> 11 </a></li>
                <li><a href="#" class="link"> 12 </a></li>
                <li><a href="#" class="link"> 13 </a></li>
                <li><a href="#" class="link"> 14 </a></li>
                <li><a href="#" class="link"> 15 </a></li>
                <li><a href="index.php?page=<?php //echo $paginatedPosts['nextPage'] ?>" class="link"><i class="fa-solid fa-chevron-right"></i></a></li>
            </ul>
        </div>


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

<!-- Carousel -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Custom Script -->
<script src="assets/js/scripts.js"></script>

</body>
</html>