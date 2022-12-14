<?php
session_name('테스트세션');
session_start(); //세션시작
session_unset();   // 모든 세션 변수의 등록 해지
header('location: main');
?>
