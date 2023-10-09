<?php
include("path.php");
include(ROOT_PATH. "../../app/controllers/topics.php");

$topics = selectAll('topics', ['published' => 1]);
$posts = publishedCondition('posts');
$temp_titles = selectAll('titles', ['visibility' => 1]);
$titles = array();
foreach ($temp_titles as $key => $value) {
    $titles[$value['label']] = $value;
}
?>

<div class="sidebar">

    <?php if($mainPage): ?>

        <div class="section search">
            <h2 class="section-title"><?php echo $titles['search_bar_title']['title']; ?></h2>
            <form action="index.php" method="post">
                <input type="text" name="search-term" class="text-input" placeholder="Search...">
            </form>
        </div>
    <?php else: ?>
        <div class="section recent">
            <h2 class="section-title"><?php echo $titles['recent_posts_title']['title']; ?></h2>

            <?php $count = 0; foreach ($posts as $p): ?>

                <?php if ($count < 5 && $p['id'] != $post['id']): ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                        <?php if(strlen($p['title']) > 14): ?>
                            <a href="single.php?post_id=<?php echo $p['id']; ?>" class="title"><h4><?php echo substr($p['title'], 0, 12) . '...'; ?></h4></a>
                        <?php else: ?>
                            <a href="single.php?post_id=<?php echo $p['id']; ?>" class="title"><h4><?php echo $p['title']; ?></h4></a>
                        <?php endif; ?>
                    </div>
                <?php $count++; endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="section topics">
        <h2 class="section-title"><?php echo $titles['topic_bar_title']['title']; ?></h2>
        <ul>
            <?php foreach ($topics as $key => $topic): ?>
                <li><a href="<?php echo BASE_URL . '/index.php?topic=' . $topic['name'] . '&page=1'; ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>