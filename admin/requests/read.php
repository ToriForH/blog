<?php include("../../path.php");
include(ROOT_PATH . "../../app/controllers/requests.php");
$title = 'Request';
$action = 'read.php';
if (isset($_GET['id'])) {
    $request = selectOne('requests', ['id' => $_GET['id']]);
}
adminsOnly();
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

<?php include(ROOT_PATH. "../../app/includes/adminHeader.php"); ?>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper">

    <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="index.php" class="btn btn-big">Active Requests</a>
            <a href="index_all.php" class="btn btn-big">All Requests</a>
            <a href="index_answered.php" class="btn btn-big">Answered Requests</a>
        </div>

        <div class="content request">
            <h2 class="page-title"><?php echo $title; ?></h2>

            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
                <a><h2>Email</h2></a>
                <a><h2><?php echo $request['email']; ?></h2></a>
            </div>
            <div>
                <a><h2>Message</h2></a>
                <a><h3><?php echo $request['message'] ?></h3></a>
            </div>
            <div>
                <a><h2 >State: </h2></a>
                <a><h3>
                    <?php if ($request['answered']): ?>
                        This request is already answered by <?php echo getValue('users', $request['user_id'], 'username') ?>
                    <?php else: ?>
                        This request wait for answer
                    <?php endif; ?>
                </h3></a>
            </div>
            <div>
                <button class="btn btn-big">
                    <?php if ($request['answered']): ?>
                        <a href="index.php?answered=0&r_id=<?php echo $request['id']; ?>" class="btn btn-big">mark active</a>
                    <?php else: ?>
                        <a href="index.php?answered=1&r_id=<?php echo $request['id']; ?>" class="btn btn-big">mark answered</a>
                    <?php endif; ?>
                </button>
            </div>
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
