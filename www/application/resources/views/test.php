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
        <h2>본인만 볼 수 있는 하루 기록소</h2>
        <div style="width:100%;margin:0;padding:19px 29px 19px;height:auto;">
			    <p style="font-size:19px;color:#000000;"><?php echo $user_name?>'s Diary</p>
			  <table style="margin-top:10px;border:1px solid black; width:100%; background:white;">
  				<tr style="background:white; height:25px; border:1px dashed black;">
					  <th><center>No.</center></th>
					  <th><center>제목</center></th>
					  <th><center>작성자</center></th>
					  <th><center>작성일</center></th>
            <th><center>조회수</center></th>
				  </tr>
				  <?php
            // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
            $i = 1;
            foreach($result as $board)
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["srt_title"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($board["srt_title"],mb_substr($board["srt_title"],0,30,"utf-8")."...",$board["srt_title"]);
              }
          ?>
          <tbody style="border: 1px dashed black;">
            <tr>
              <td width="50" style="font-size:13px;padding:9px 5px;"><center><?php echo $i; ?></center></td>
              <td width="500" style="font-size:13px;padding:9px 5px;"><center><a href="/diary_review?idx=<?= $i?>"><?php echo $title;?></a></center></td>
              <td width="120" style="font-size:13px;padding:9px 5px;"><center><?php echo $board['srt_name']?></center></td>
              <td width="120" style="font-size:12px;padding:9px 5px;"><center><?php echo $board['srt_dat']?></center></td>
              <td width="100" style="font-size:13px;padding:9px 5px;"><center><?php echo $board['thumbup']; ?></center></td>
              <!-- 추천수 표시해주기 위해 추가한 부분 -->
            </tr>
          </tbody>
            <?php $i= $i+1;} ?>
			  </table>
        <br>
        <a href="/diary_view">
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
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>