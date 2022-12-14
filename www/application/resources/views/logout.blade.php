<?php
//echo "<script type=\"text/javascript\">alert('로그인하였습니다.');</script>";
session_name('테스트세션');
    session_start(); //세션시작

    echo "id 는 ".$_SESSION['id']."입니다.\n";
    echo "nickname 은 ".$_SESSION['nickname']."입니다.\n";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid" style="padding:0; height:100%;">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin:0;">
  <div class="container-fluid justify-content-end">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="/main">로그아웃</a>
        </li>
    </ul>
  </div>
</nav>
      <?php include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/menu.php");?>
    <div class="row content">
  </div>
</div>
</body>
</html>