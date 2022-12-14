<?php
$dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
$username="lauser";
$pw="lauser1!";
//define('loging','로그인');
$log_nam ="로그인";
$loging ="회원가입";
try {
    $conn = new PDO($dns, $username,$pw);
} catch (PDOException $th) {
    echo '접속실패 : ' . $th->getMessage();
}

function errMsg($msg){
    echo "<script>
        window.alert('$msg');
        history.back(1);
    </script>";
    exit;
}
function goodMsg($msg){
    echo "<script>
        window.alert('$msg');
    </script>";
    header('location:login');
    exit;
}
?>