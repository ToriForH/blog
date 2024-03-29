<?php $roles = selectAll('roles');
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

<?php include(ROOT_PATH . "../../app/includes/header.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH . "../../app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add User</a>
            <a href="index.php" class="btn btn-big">Manage All Users</a>
            <a href="index_admin.php" class="btn btn-big">Manage Moders and Admins</a>
            <a href="index_regular.php" class="btn btn-big">Manage Only Regular Users</a>
        </div>

        <div class="content">

            <h2 class="page-title"><?php echo $title; ?></h2>
            <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>

            <table>
                <thead>
                <th>№</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th colspan="2">Action</th>
                </thead>
                <tbody>
                <?php foreach (users($condition) as $key => $user): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <?php foreach ($roles as $k => $role): ?>
                            <?php if($role['id'] == $user['role']): ?>
                                <td><?php echo $role['name']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">edit</a></td>
                        <?php if($user['role'] == 4): ?>
                            <td>Superadmin</td>
                        <?php else: ?>
                            <td><a href="index.php?delete_id=<?php echo $user['id']; ?>" class="delete">delete</a></td>
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