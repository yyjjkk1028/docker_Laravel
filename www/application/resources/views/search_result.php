<?php
    $dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
    $username="lauser";
    $pw="lauser1!";

    try {
        $db = new PDO($dns, $username, $pw);
        echo '접속성공 축하합니다!';
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
  
</head>
<body style="margin:2% 25%;padding:19px 29px 19px;border:1px solid #eeeeee;height:auto;">
	<div>
		<a href="/board/main.php">
			<p style="font-size:19px;color:#000000;">자유 게시판</p>
		</a>
		<a href="./write.php">
			<input type="button" style="padding:5px 12px;Color:#ff5656;Background:#ffffff;font-size:14px;border:1px solid #e3e3e3;border-radius:2px;" value="글쓰기">
		</a>
		<div>
			<table style="width:100%;margin-top:10px;border-top:1px solid #b0b0b0;">
				<tr style="background:white;">
					<th>No.</th>
					<th><center>제목</center></th>
					<th><center>작성자</center></th>
					<th><center>작성일</center></th>
                    <th><center>추천수</center></th>
                    <th><center>조회수</center></th>
				</tr>
				<?php
          $sql2 = query("select * from board where $catagory like '%$search_con%' order by idx desc");
          while($board = $sql2->fetch_array()){
           
          $title=$board["title"]; 
            if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
            $sql3 = query("select * from reply where con_num='".$board['idx']."'");
            $rep_count = mysqli_num_rows($sql3);
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500">
            <?php 
              $lockimg = "<img src='/BBS/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
              if($board['lock_post']=="1")
              { ?><a href='/BBS/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
              }else{?>

        <!--- 추가부분 18.08.01 --->
        <?php
          $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
          $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음
          
          if($boardtime==$timenow){
            $img = "<img src='/BBS/img/new.png' alt='new' title='new' />";
          }else{
            $img ="";
          }
          ?>
        <!--- 추가부분 18.08.01 END -->
        <a href='/BBS/read.php?idx=<?php echo $board["idx"]; ?>'><span style="background:yellow;"><?php echo $title; }?></span><span class="re_ct">[<?php echo $rep_count;?>]<?php echo $img; ?> </span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>

        </tr>
      </tbody>

      <?php } ?>
			</table>
		</div>
	</div>
	<br>
	<center>
		<div id="search_box">
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
	</center>
</body>
</html>