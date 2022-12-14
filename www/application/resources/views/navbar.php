<?php
if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
  session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
  session_start(); //세션 시작 
}
if(!isset($_SESSION['nickname']))
  {
  $log_nam ="로그인";
  $loging ="회원가입";
  $log_href = "login";
  $href = "register";
  }
  else{
  $log_nam = $_SESSION['nickname'];
  $loging ="로그아웃";
  $log_href = "main";
  $href = "logout";
  }
  // $log_nam ="로그인";
  // $loging ="회원가입";
  // $href = "register";
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
<h3 style="color:white; margin-left: 20px;margin-top: 10px; width: 200px;">옴팡이's PHP</h3>
  <div class="container-fluid justify-content-end">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" id="log_nam2" name="log_nam2" href="/<?php echo $log_href;?>"><?php echo $log_nam;?></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="dbcd" name="abcd" href="/<?php echo $href;?>" ><?php echo $loging;?></a>
        </li>
    </ul>
  </div>
</nav>
</body>
</html>
