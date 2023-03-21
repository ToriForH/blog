<?php include("../../path.php"); ?>
<?php include(ROOT_PATH. "../../app/controllers/topics.php"); ?>

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

    <title>Admin Section - Manage Topics</title>
</head>
<body>

<?php include(ROOT_PATH. "../../app/includes/adminHeader.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="suggest.php" class="btn btn-big">Suggest New Topic</a>
            <a href="topicIndex.php" class="btn btn-big">Manage My Topics</a>
        </div>

        <div class="content">

            <h2 class="page-title">Manage Topics</h2>

            <?php include (ROOT_PATH. "../../app/includes/messages.php"); ?>

            <table>
                <thead>
                <th>№</th>
                <th>Name</th>
                <th colspan="3">Action</th>
                </thead>
                <tbody>
                <?php $number = 1; foreach ($topics as $key => $topic): ?>
                <?php if ($topic['user_id'] == $_SESSION['id']): ?>
                    <tr>
                        <td><?php echo $number++; ?></td>
                        <td><?php echo $topic['name']; ?></td>
                        <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                        <td><a href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></td>
                        <?php if ($topic['published']): ?>
                            <td>published</td>
                        <?php else: ?>
                            <td>not published</td>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
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