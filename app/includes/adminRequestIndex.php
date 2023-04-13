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
            <a href="index.php" class="btn btn-big">Active Requests</a>
            <a href="index_all.php" class="btn btn-big">All Requests</a>
            <a href="index_answered.php" class="btn btn-big">Answered Requests</a>
        </div>

        <div class="content">

            <h2 class="page-title"><?php echo $title; ?></h2>

            <?php include (ROOT_PATH. "../../app/includes/messages.php"); ?>

            <table>
                <thead>
                <th>№</th>
                <th>Author's email</th>
                <th>Text-preview</th>
                <th>State</th>
                <?php if($title != "Active Requests"): ?>
                    <th>Answered By</th>
                <?php endif; ?>
                <th colspan="2">Action</th>
                </thead>
                <tbody>
                <?php foreach (requests($condition) as $key => $request): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $request['email'] ?></td>
                        <td><?php echo substr($request['message'], 0, 50) . '. . .'; ?></td>
                        <td>
                            <?php if ($request['answered']): ?>
                                Active
                            <?php else: ?>
                                Answered
                            <?php endif; ?>
                        </td>
                        <?php if($title != "Active Requests"): ?>
                            <th><?php echo getValue('users', $request['user_id'], 'username'); ?></th>
                        <?php endif; ?>
                        <td><a href="read.php?id=<?php echo $request['id']; ?>" class="edit">read</a></td>
                        <td>
                                <?php if ($request['answered']): ?>
                                    <a href="index.php?answered=0&r_id=<?php echo $request['id']; ?>" class="publish">mark active</a>
                                <?php else: ?>
                                    <a href="index.php?answered=1&r_id=<?php echo $request['id']; ?>" class="publish">mark answered</a>
                                <?php endif; ?>
                        </td>
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