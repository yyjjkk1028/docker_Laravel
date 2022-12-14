<?php
if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
  session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
  session_start(); //세션 시작 
  if(!$_SESSION['nickname'])
  {
  $log_nam ="로그인";
  $loging ="회원가입";
  }
  else{
  $log_nam = $_SESSION['nickname'];
  $loging ="로그아웃";
  }
}
function disconn()
{
      //특정 세션 변수 삭제
  unset($_SESSION['id']);
  unset($_SESSION['nickname']);

  session_unset();   // 모든 세션 변수의 등록 해지
  session_destroy(); // 세션 아이디의 삭제
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin:0;">
  <div class="container-fluid justify-content-end">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" id="log_nam2" name="log_nam2" href="/login"><?php echo $log_nam;?></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="dbcd" name="abcd" href="/login" onclick="disconn()"><?php echo $loging;?></a>
        </li>
    </ul>
  </div>
</nav>
</body>
</html>
