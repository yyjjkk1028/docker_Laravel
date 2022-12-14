<?php
$dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
$username="lauser";
$pw="lauser1!";

    $db = new PDO($dns, $username, $pw);
    header('Content-Type: text/html; charset-utf-8');
    $query = "select * from notes order by idx desc limit 0,10";
    $result = $db->query($query);


//각 변수에 write.php에서 input name값들을 저장한다
$username = $_POST['name'];
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($username && $userpw && $title && $content){
    $sql = query("insert into board(name,pw,title,content,date) values('".$username."','".$userpw."','".$title."','".$content."','".$date."')");
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/BBS/index.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>
