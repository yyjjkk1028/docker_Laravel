<?php
    require_once('conn.php');
    try {
        // $conn = new PDO($dns, $username, $pw);
        // header('Content-Type: text/html; charset-utf-8');
        //$result = mysql_query($conn, $sql);
        $user_name = $_POST['username'];
        $user_id = $_POST['userid'];
        $user_email = $_POST['useremail'];
        $user_pwd1 = $_POST['userpwd1'];
        $user_pwd2 = $_POST['userpwd2'];
        if(!$user_name)
        {
            errMsg("닉네임를 입력해주세요.");
        }
        if(!$user_id)
        {
            errMsg("아이디를 입력해주세요.");
        }
        if(!$user_email)
        {
            errMsg("이메일을 입력해주세요.");
        }
        if(!$user_pwd1)
        {
            errMsg("비밀번호를 입력해주세요.");
        }
        if($user_pwd1 != $user_pwd2){
            errMsg("비밀번호가 일치하지 않습니다.");
        }
        $select_sql = "SELECT * FROM user_join where user_id = :user_id ";
        $sel_res = $conn->prepare($select_sql);
        $sel_res->execute([ ':user_id' => $user_id ]);
        $row = $sel_res -> fetch();
        if(isset($row['user_id'])){
            errMsg('이미 존재하는 아이디입니다.');
        }
        else{
            $sql = "INSERT INTO user_join(user_name, user_id, user_email, user_pwd) VALUES(:user_name, :user_id, :user_email, :user_pwd)";
            $result = $conn->prepare($sql);
            $result->execute([
                ':user_name' => $user_name,
                ':user_id' => $user_id,
                ':user_email' => $user_email, 
                ':user_pwd' => $user_pwd2 ]);
        echo goodmsg('회원가입되었습니다');
        header("location:main");
        }
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
        echo mysql_connect_error();
    }
?>
