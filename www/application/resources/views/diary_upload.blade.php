<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/../resources/views/conn.php");
    try {
        if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
            session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
            session_start(); //세션 시작 
        }
        $user_name = $_SESSION['nickname'];
        $date = date("Y-m-d");
        $user_title = $_POST['title'];
        $user_content = nl2br($_POST['contents']); //nl2br 줄바꿈
        $sql = "INSERT INTO user_sercet(srt_name, srt_title, srt_cont, srt_dat, idx) values(:user_name,:user_title, :user_content, :dates, (SELECT COUNT(*)+1 FROM user_sercet n))";
        $result = $conn->prepare($sql);
        $result->execute([
            ':user_name' => $user_name, 
            ':user_title' => $user_title, 
            ':user_content' => $user_content,
            ':dates' => $date
        ]);
        header("location:diary");
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
        echo mysql_connect_error();
    }
?>