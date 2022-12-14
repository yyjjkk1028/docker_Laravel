<?php
//echo "<script type=\"text/javascript\">alert('로그인하였습니다.');</script>";
session_name('테스트세션');
    session_start(); //세션시작

    echo "id 는 ".$_SESSION['id']."입니다.\n";
    echo "nickname 은 ".$_SESSION['nickname']."입니다.\n";
    //특정 세션 변수 삭제
// unset($_SESSION['id']);
// unset($_SESSION['nickname']);

// session_unset();   // 모든 세션 변수의 등록 해지
// session_destroy(); // 세션 아이디의 삭제
?>