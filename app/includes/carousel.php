<?php
$slider_topic = 1;  //Main
$countOfSlider = countTopicPosts($slider_topic);
$slider = searchTopic($slider_topic, $countOfSlider['total'], 1, $countOfSlider['total']);
$slider_posts = $slider['posts'];
?>

<!-- Post Slider -->
<div class="post-slider">
    <h1 class="slider-title"><?php echo getValue('topics', $slider_topic, 'name'); ?> Posts</h1>
    <i class="fa-solid fa-chevron-left prev"></i>
    <i class="fa-solid fa-chevron-right next"></i>

    <div class="post-wrapper">
        <?php foreach ($slider_posts as $post): ?>
            <div class="post">
                <div class="image-wrapper">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                </div>
                <div class="post-info">
                    <?php if(strlen($post['title']) > 20): ?>
                        <span><a class="title" href="single.php?post_id=<?php echo $post['id']; ?>"><?php echo substr($post['title'], 0, 20) . '...'; ?></a> </span>
                    <?php else: ?>
                        <span><a class="title" href="single.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a> </span>
                    <?php endif; ?>
                    <div>
                        <i class="fa-solid fa-user"> <?php echo getValue('users', $post['user_id'], 'username'); ?></i>
                        &nbsp;
                        <i class="fa-regular fa-calendar-days"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- //Post Slider -->
