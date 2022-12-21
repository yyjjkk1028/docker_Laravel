<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once('conn.php');
try {
    if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
        session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
        session_start(); //세션 시작 
    }
    $userid = $_POST['userid'];
    $password = $_POST['userpwd'];
    $sql = "SELECT * FROM user_join where user_id = :userid ";
    $result = $conn->prepare($sql);
    $result->execute([':userid' => $userid]);
    $row = $result -> fetch();
    if(!$userid){
            errMsg("아이디를 입력해주세요.");
        } elseif(!isset($row['user_id'])){
            errMsg('존재하지 않는 아이디입니다.');
        } elseif(!$password){
            errMsg('비밀번호를 입력해주세요.');
        } elseif($password != $row['user_pwd']){
            errMsg('비밀번호가 일치하지 않습니다.');
        }
    if($userid === $row['user_id'] && $password === $row['user_pwd']){ //post로 받은 정보와 저장된 정보를 비교합니다.
        $_SESSION['id'] = $userid; //세션에 key value 등록합니다.
        $_SESSION['nickname'] = $row['user_name'];
        $_SESSION['pwd'] = $password;
        header("location:main");
    }
}
catch (PDOException $th) {
    echo '접속실패 : ' . $th->getMessage();
}
    
?>
    
</body>
</html>