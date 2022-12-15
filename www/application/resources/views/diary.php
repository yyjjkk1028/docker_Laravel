<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>일기장</title>
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
    <?php 
      require_once('conn.php');
      include('navbar.php');
      include('menu.php');
      if($log_nam =="로그인")
      {
        errMsg("로그인을 하십시오.");
      }
      try {
        if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
          session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
          session_start(); //세션 시작 
        }
        $user_name = $_SESSION['nickname'];
        $query = "SELECT * FROM user_sercet where srt_name = :user_name order by srt_dat asc limit 0,10 ";
        $result = $conn->prepare($query);
        $result->execute([
          ':user_name' => $user_name]);
      } catch (PDOException $th) {
          echo '접속실패 : ' . $th->getMessage();
      }
    ?>
    <div class="row content">
        <h2 style="margin-top: 10px;"><?php echo $user_name?>'s Diary</h2>
        <div style="width:100%;margin:0;padding:19px 29px 19px;height:auto;">
				  <?php
                    $i = 1;
                    foreach($result as $board)
                    {
                        $title=$board["srt_title"]; 
                        if(strlen($title)>30)
                        { 
                            $title=str_replace($board["srt_title"],mb_substr($board["srt_title"],0,30,"utf-8")."...",$board["srt_title"]);
                        }
                    ?>
                        <p style="background:white; border-radius:10px; padding:15px;">
                            <span style="font-size: 25px;"><?php echo $i; ?>. </span>
                            <a href="/diary_review?idx=<?= $i?>" style="font-size:25px;padding:9px 5px; font-weight: bold; color: black;"><?php echo $title;?></a>
                            <span style="color:gray;">&nbsp;&nbsp;(<?php echo $board['srt_dat']?>)</span>
                        </p>
                    <?php $i= $i+1;
                    } ?>
        
            <a href="/diary_view">
			    <input type="button" style="padding:5px 12px;Color:#ff5656;Background:#ffffff;font-size:14px;border:1px solid white;border-radius:10px;" value="글쓰기">
		    </a><hr><br>
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
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>