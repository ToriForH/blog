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

    <title>Admin Section - <?php echo $pageTitle; ?></title>
</head>
<body>

<?php include(ROOT_PATH. "../../app/includes/header.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Post</a>
            <a href="index.php" class="btn btn-big">Manage My Posts</a>
            <a href="index_published.php" class="btn btn-big">Manage Published Posts</a>
            <a href="index_suggested.php" class="btn btn-big">Manage Suggested Posts</a>
            <?php if ($_SESSION['moder']): ?>
                <a href="index_all.php" class="btn btn-big">Manage All Posts</a>
            <?php endif; ?>
        </div>

        <div class="content">

            <h2 class="page-title"><?php echo $pageTitle; ?></h2>

            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>

            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <?php if($pageTitle == "Edit Post"): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endif; ?>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $title?>" class="text-input main">
                </div>
                <div>
                    <label>Body</label>
                    <textarea name="body" id="body"><?php echo $body ?></textarea>
                </div>
                <div>
                    <label>Image</label>
                    <?php if($pageTitle == "Edit Post"): ?>
                    <p>Don't select any image to save an old one</p>
                    <?php endif; ?>
                    <input type="file" name="image" class="text-input">
                </div>
                <div>
                    <label>Topic</label>
                    <select name="topic_id" class="text-input">
                        <option value=""></option>
                        <?php foreach ($topics as $key => $topic): ?>
                            <?php if (!empty($topic_id) && $topic_id == $topic['id']): ?>
                                <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="button-group">
                    <button type="submit" name ="<?php echo $submitName; ?>" class="btn btn-big"><?php echo $submitTitle; ?></button>
                    <?php if($_SESSION['moder']): ?>
                        <button type="submit" name="<?php echo $publishName; ?>" class="btn btn-big">Publish Post</button>
                    <?php endif; ?>
                </div>

            </form>
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