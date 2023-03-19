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
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../css/admin.css">

    <title>Admin Section - Manage Posts</title>
</head>
<body>
<header>
    <div class="logo">
        <h1 class="logo-text"><span>Shitty</span> Blog</h1>
    </div>
    <i class="fa-solid fa-bars menu-toggle"></i>
    <ul class="nav">
        <li><a href="#">Home</a> </li>
        <li>
            <a href="# user">
                <i class="fa-solid fa-user" style="font-size: 0.9em;"></i>
                Suka User
                <i class="fa-solid fa-chevron-down arrow-toggle" style="font-size: 0.8em;"></i>
            </a>
            <ul class="us">
                <li><a href="#" class="logout">Logout</a> </li>
            </ul>
        </li>
    </ul>
</header>

<!-- Admin Page Wrapper -->
<div class="admin-wrapper clearfix">

    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <ul>
            <li><a href="index.html">Manage Posts</a></li>
            <li><a href="../user/index.html">Manage Users</a></li>
            <li><a href="../topics/index.html">Manage Topics</a></li>
        </ul>
    </div>
    <!-- //Left Sidebar -->
    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
            <a href="create.html" class="btn btn-big">Add Post</a>
            <a href="index.html" class="btn btn-big">Manage Posts</a>
        </div>

        <div class="content">

            <h2 class="page-title">Manage Posts</h2>

            <table>
                <thead>
                <th>№</th>
                <th>Title</th>
                <th>Author</th>
                <th colspan="3">Action</th>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>This is the first post</td>
                    <td>Suka User</td>
                    <td><a href="#" class="edit">edit</a></td>
                    <td><a href="#" class="delete">delete</a></td>
                    <td><a href="#" class="publish">publish</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>This is the first post</td>
                    <td>Suka User</td>
                    <td><a href="#" class="edit">edit</a></td>
                    <td><a href="#" class="delete">delete</a></td>
                    <td><a href="#" class="publish">publish</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Admin Content -->

</div>
<!-- // Page Wrapper -->

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom Script -->
<script src="../../js/scripts.js"></script>

</body>
</html>