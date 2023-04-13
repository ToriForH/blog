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
            <a href="create.php" class="btn btn-big">Add Post</a>
            <a href="index.php" class="btn btn-big">Manage My Posts</a>
            <a href="index_published.php" class="btn btn-big">Manage Published Posts</a>
            <a href="index_suggested.php" class="btn btn-big">Manage Suggested Posts</a>
            <?php if ($_SESSION['moder']): ?>
                <a href="index_all.php" class="btn btn-big">Manage All Posts</a>
            <?php endif; ?>
        </div>

        <div class="content">

            <h2 class="page-title"><?php echo $title; ?></h2>

            <?php include (ROOT_PATH. "../../app/includes/messages.php"); ?>

            <table>
                <thead>
                <th>№</th>
                <th>Title</th>
                <th>Author</th>
                <th>Topic</th>
                <th colspan="3">Action</th>
                </thead>
                <tbody>
                <?php foreach (posts($condition) as $key => $post): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $post['title'] ?></td>
                        <td><?php echo getValue('users', $post['user_id'], 'username'); ?></td>
                        <td><?php echo getValue('topics', $post['topic_id'], 'name'); ?></td>
                        <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                        <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
                        <?php if($_SESSION['moder']): ?>
                            <td>
                                <?php if ($post['published']): ?>
                                    <a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">unpublish</a>
                                <?php else: ?>
                                    <a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">publish</a>
                                <?php endif; ?>
                            </td>
                        <?php else: ?>
                            <td>
                                <?php if ($post['published']): ?>
                                    published
                                <?php else: ?>
                                    suggested
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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