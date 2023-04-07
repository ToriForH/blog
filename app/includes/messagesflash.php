<head>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<div class="msg">
    <span class="message">Message text</span>
</div>

<script>
    $('button').click(function (){
        setTimeout(function (){
            $('.msg').addClass("hide");
        },5000);
    });
</script>