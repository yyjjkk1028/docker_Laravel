<?php
    try 
    {
      require_once($_SERVER["DOCUMENT_ROOT"]."/../resources/views/conn.php");
      if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
        session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
        session_start(); //세션 시작 
    }
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
        echo mysql_connect_error();
    }
?>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="http://cafecj.daum-img.net/cafebackup/css/1/backup.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
  
</head>
<body>
<div class="container-fluid" style="padding:0; position: relative; z-index: 1;">
    <?php 
      include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/navbar.php");
      include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/menu.php");
      if($log_nam =="로그인")
      {
        errMsg("로그인을 하십시오.");
      }
    ?>
    <div class="row content">
      <form method="post" action="/insert">
      @csrf
        <div style="margin:0;"><h2>&nbsp;&nbsp;&nbsp;게시판 글쓰기</h2>
        </div>
        <div style="margin:0;padding:19px 29px 19px;border:1px solid #eeeeee;height:auto;">
          <div>
            <table style="width:100%;margin-top:10px;border-top:1px solid #b0b0b0;">
              <tbody>
                  <tr><input type="text" class="form-control" id="title" name="title" placeholder="글 제목" ></tr>
                  <tr><textarea class="form-control" placeholder="글 내용" name="contents" id="contents" style="height: 350px;margin-top:10px;" required></textarea></tr>
              </tbody>
            </table>
              <input type="submit" style="padding:5px 12px;Color:#ff5656;Background:#ffffff;font-size:14px;border:1px solid #e3e3e3;border-radius:2px;" value="확인">
            <a href="/note">
              <input type="button" style="padding:5px 12px;Color:#ff5656;Background:#ffffff;font-size:14px;border:1px solid #e3e3e3;border-radius:2px;" value="취소">
            </a>
          </div>
        </div>
        <br>
      </form>
    </div>
</div>
<div style="position: relative; z-index: 2;">
<?php include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/footer.php");?>
</div>
</body>
</html>