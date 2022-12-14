<?php
    $dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
    $username="lauser";
    $pw="lauser1!";

    try {
        $db = new PDO($dns, $username, $pw);
        //echo '접속성공 축하합니다!';
        header('Content-Type: text/html; charset-utf-8');
        $query = "select * from notes order by idx desc limit 0,10";
        $result = $db->query($query);
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
    }
?>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="http://cafecj.daum-img.net/cafebackup/css/1/backup.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
  <style>
    .sidenav {
      background-color: darkgray;
      height: 100%;
      width:300px;
    }
    .search_icon{
      height:20px;
    }
  </style>
</head>
<body>
<div class="container-fluid" style="padding:0;">
    <?php include('navbar.php');?>
    <?php include('menu.php');?>
    <div class="row content">
    </div>
  </div>
</div>
</body>
</html>