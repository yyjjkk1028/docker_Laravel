<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid justify-content-between">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="/myphp">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/note">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="/login">로그인</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/register">회원가입</a>
        </li>
    </ul>
  </div>
</nav>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem; ">

        <form method="post" action="/test">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">로그인</h2>
              <br><br>

              <div class="form-outline form-white mb-4">
                <input type="text" id="userid" name="userid" class="form-control form-control-lg" placeholder="아이디"/>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="userpwd" name="userpwd" class="form-control form-control-lg" placeholder="비밀번호"/>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">로그인</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="/register" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>