<?php
include("../../path.php");
include(ROOT_PATH . "../../app/controllers/posts.php");
$titles = selectAll('titles');
$topics = selectAll('topics', ['published' => 1]);
$title = 'Site Titles';
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
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Admin Section - <?php echo $title; ?></title>
</head>
<body>

<?php include(ROOT_PATH. "../../app/includes/header.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="site_titles.php" class="btn btn-big">Manage Titles</a>
            <a href="links_settings.php" class="btn btn-big">Manage Links</a>
            <a href="contacts_settings.php" class="btn btn-big">Manage Contacts</a>
            <a href="site_info.php" class="btn btn-big">Manage Site Info</a>
        </div>

        <div class="content">

            <h2 class="page-title"><?php echo $title; ?></h2>

            <?php include (ROOT_PATH. "../../app/includes/messages.php"); ?>

            <?php foreach ($titles as $key => $t): ?>
                <form action="edit_title.php" method="post" class="content request">
                    <input type="hidden" name="id" value="<?php echo $t['id']; ?>">
                    <div>
                        <label>Label</label>
                        <input type="text" name="label" value="<?php echo $t['label']; ?>" class="text-input main" readonly>
                    </div>
                    <div>
                        <label>Title</label>
                        <?php if($t['label'] == 'carousel_topic'): ?>
                            <select name="title" style="font-size: 1.3em">
                                <?php foreach ($topics as $k => $topic): ?>
                                    <?php if($topic['id'] == $t['title']): ?>
                                        <option value="<?php echo $topic['id']; ?>" selected><?php echo $topic['name']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        <?php elseif ($t['label'] == 'footer_blog_name'): ?>
                            <input type="text" name="title" value="<?php echo getValue('titles', selectOne('titles', ['label' => 'site_name'])['id'], 'title') . getValue('titles', selectOne('titles', ['label' => 'site_name_second_part'])['id'], 'title'); ?>" class="text-input main" readonly>
                        <?php else: ?>
                            <input type="text" name="title" value="<?php echo $t['title']; ?>" class="text-input main">
                        <?php endif; ?>
                    </div>
                    <div>
                        <label>Visibility</label>
                        <?php if($t['visibility'] == 1): ?>
                            <input type="checkbox" name="visibility" value="<?php echo $t['visibility']; ?>" checked>
                        <?php else: ?>
                            <input type="checkbox" name="visibility" value="<?php echo $t['visibility']; ?>">
                        <?php endif; ?>
                    </div>
                    <div class="button-group">
                        <button type="submit" name="save-title" class="btn btn-big">Save Changes</button>
                    </div>
                </form>
            <?php endforeach; ?>
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
<script src="../../assets/js/scripts.js"></script>

</body>
</html>