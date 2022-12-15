<?php
    try 
    {
      require_once('conn.php');
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
      <center>
      <h2>옴팡이's PHP</h2>
      <img style="width: 900px;"src="https://mblogthumb-phinf.pstatic.net/MjAyMDAzMDNfNTgg/MDAxNTgzMjAxMjU0MTUx.9Ph9r5ezy3L6CVaQ6VxEe6UuGoYxJtnGvV1hqNPAKQAg.IbWEa6z1BdGRK9gHAVBxOuJZ0y4yOImflsfVFP5FNwsg.GIF.theworkscompany/15.gif?type=w800" alt="">
    </center>
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>