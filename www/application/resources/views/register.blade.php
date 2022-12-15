<?php
    // $dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
    // $username="lauser";
    // $pw="lauser1!";

    // try {
    //     $conn = new PDO($dns, $username, $pw);
    //     //echo '접속성공 축하합니다!';
    //     header('Content-Type: text/html; charset-utf-8');
    //     //$query = "insert into user_join(user_id, user_email, user_pwd) values('$id','$email','$pwd');";
    //     //$result = $db->query($query);
    // } catch (PDOException $th) {
    //     echo '접속실패 : ' . $th->getMessage();
    // }
?>
<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
  <title>Bootstrap Exampe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  </style>
</head>
<body style="height:100%; background: lightgray;">
<div class="container-fluid" style="padding:0; position: relative; z-index: 1;">
      <?php include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/navbar.php");?>
      <?php include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/menu.php");?>
    <div class="row content">
<section class="vh-100 gradient-custom">
<form method="POST" action="/joinProcess">
  @csrf
  <div class="container py-5 h-100" style="margin-top: 50px;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-5" style="margin: 0 30px; height:500px;">
              <h2 class="fw-bold mb-2 text-uppercase">회원가입</h2>
              <br><br><br>
              <div class="form-outline form-white mb-4 pb-2">
                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="닉네임"/>
              </div>
              <div class="form-outline form-white mb-4 pb-2">
                <input type="text" id="userid" name="userid" class="form-control form-control-lg" placeholder="아이디"/>
              </div>
              <div class="form-outline form-white mb-4 pb-2">
                <input type="email" id="useremail" name="useremail" class="form-control form-control-lg" placeholder="이메일"/>
              </div>
              <div class="form-outline form-white mb-4 pb-2">
                <input type="password" id="userpwd1" name="userpwd1" class="form-control form-control-lg" placeholder="비밀번호"/>
              </div>
              <div class="form-outline form-white mb-4 pb-2">
                <input type="password" id="userpwd2" name="userpwd2" class="form-control form-control-lg" placeholder="비밀번호 확인"/>
              </div>

              <button class="btn btn-outline-light btn-lg px-8" style="border: 1px solid white;" type="submit">가입하기</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">계정을 가지고 있습니다? <a href="/login" class="text-white-50 fw-bold">로그인</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
    </section>
  </div>
</div>
<div style="position: relative; z-index: 2;">
<?php include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/footer.php");?>
</div>
</body>
</html>
