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
    $sql = "";
    try {
        require_once('conn.php');
        $user_name = $_SESSION['nickname'];
        $date = date("Y-m-d");
        $user_title = $_POST['title'];
        $user_content = nl2br($_POST['contents']); //nl2br 줄바꿈
        $query = "select count(*) from notes";
        $result1 = $conn->query($query);
        $sql = "INSERT INTO notes(name, title, content, date, idx) values(:user_name,:user_title, :user_content, :dates, (SELECT COUNT(*)+1 FROM notes n))";
        //$sql = "INSERT INTO notes(idx, title, content, date) values((SELECT COUNT(*)+1 FROM notes n), :user_title, :user_content, :dates)";
        //mysqli_query($link, 'sql statement')
        //$result = $conn->query($sql);
        $result = $conn->prepare($sql);
        $result->execute([
            ':user_name' => $_SESSION['nickname'], 
            ':user_title' => $user_title, 
            ':user_content' => $user_content,
            ':dates' => $date
        ]);
        header("location:note");
        //$result = mysql_query($conn, $sql);
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
        echo mysql_connect_error();
    }
?>

</body>
</html>