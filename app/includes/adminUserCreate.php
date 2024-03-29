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

<?php include(ROOT_PATH. "../../app/includes/header.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">

    <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <?php if($title != 'My profile'): ?>
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add User</a>
            <a href="index.php" class="btn btn-big">Manage All Users</a>
            <a href="index_admin.php" class="btn btn-big">Manage Moders and Admins</a>
            <a href="index_regular.php" class="btn btn-big">Manage Only Regular Users</a>
        </div>
        <?php endif; ?>

        <div class="content">

            <h2 class="page-title"><?php echo $title; ?></h2>

            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>

            <form action="<?php echo $action; ?>" method="post">
                <?php if($title != 'Add User'): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endif; ?>
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
                </div>
                <div>
                    <?php if($title != 'Add User'): ?>
                        <label>New Password</label>
                    <?php else: ?>
                        <label>Password</label>
                    <?php endif; ?>
                    <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
                </div>
                <div>
                    <label>Password Confirmation</label>
                    <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
                </div>
                <?php if($title != 'My profile'): ?>
                <div>
                    <label>Role</label>
                    <select name="role" class="text-input">
                        <?php foreach ($roles as $key => $r): ?>
                            <?php if (!empty($role) && $role == $r['id']): ?>
                                <option selected value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
                <div class="button-group">
                    <button type="submit" name="<?php echo $submitName; ?>" class="btn btn-big"><?php echo $submitTitle; ?></button>
                    <?php if($action == 'profile.php'): ?>
                        <button type="submit" name="delete-profile" class="btn btn-big">Delete My Profile</button>
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