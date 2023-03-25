<!-- Sidebar -->
<?php
include("path.php");
$topics = selectAll('topics', ['published' => 1]);
$posts = selectPublished('posts', ['published' => 1]);
?>
<div class="sidebar single">

    <div class="section recent">
        <h2 class="section-title">Recent posts</h2>

        <?php $count = 0; foreach ($posts as $p): ?>
            <?php if ($count < 5 && $p['id'] != $post['id']): ?>
                <div class="post clearfix">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                    <a href="single.php?post_id=<?php echo $p['id']; ?>" class="title"><h4><?php echo $p['title']; ?></h4></a>
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