<?php
$dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
$username="lauser";
$pw="lauser1!";
try {
    $conn = new PDO($dns, $username,$pw);
    if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
        session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
        session_start(); //세션 시작 
        
    }
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