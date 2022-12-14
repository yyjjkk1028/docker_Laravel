<?php
    $dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
    $username="lauser";
    $pw="lauser1!";

    try {
        $db = new PDO($dns, $username, $pw);
        //echo '접속성공 축하합니다!';
        header('Content-Type: text/html; charset-utf-8');
        $query = "select * from notes order by date asc limit 0,10";
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
    .search_icon{
      height:20px;
    }
  </style>
</head>
<body>
<div class="container-fluid" style="padding:0; height:100%; position: relative; z-index: 1;">
    <?php 
      include('navbar.php');
      include('menu.php');
    ?>
    <div class="row content">
      <div style="width:100%;margin:0;padding:19px 29px 19px;height:auto;">
		    <a href="board/main.php">
			    <p style="font-size:19px;color:#000000;">비밀저장소</p>
		    </a>
			  
        <br>
        <a href="/write">
			    <input type="button" style="padding:5px 12px;Color:#ff5656;Background:#ffffff;font-size:14px;border:1px solid black;border-radius:2px;" value="글쓰기">
		    </a>
        <hr><br>
        <form action="/search_result" method="post">
				  <select name="catgo" style="padding:4px;Color:#ff5656;border:1px solid #e3e3e3;border-radius:2px;">
  					<option value="subject">제목</option> 
					  <option value="writer">글쓴이</option>
					  <option value="content">내용</option>
				  </select>
				  <input type="search" name="search" size="40" required="required" style="padding:4px;border:1px solid #e3e3e3;border-radius:2px;">
				  <input type="submit" style="padding:5px 12px;Color:#ffffff;Background:#ff5656;border:1px solid #e3e3e3;border-radius:2px;" value="검색"> 
			  </form>
      </div>
		  <div id="search_box" style="margin:0;">
  			
		  </div>
  </div>
</div>
<div style="position: relative; z-index: 2;">
<?php include('footer.php');?>
</div>
</body>
</html>