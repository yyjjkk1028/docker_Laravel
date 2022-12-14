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
    $dns = "mysql:host=172.28.0.4;dbname=laravel;charset=utf8";
    $username="lauser";
    $pw="lauser1!";
    $sql = "";
    try {
        $conn = new PDO($dns, $username, $pw);
        header('Content-Type: text/html; charset-utf-8');
        //$user_name = $_POST['username'];
        $date = date("Y-m-d");
        $user_title = $_POST['title'];
        $user_content = $_POST['contents'];
        $query = "select count(*) from notes";
        $result1 = $conn->query($query);
        $sql = "INSERT INTO notes(title, content, date) values(:user_title, :user_content, :dates)";
        //$sql = "INSERT INTO notes(idx, title, content, date) values((SELECT COUNT(*)+1 FROM notes n), :user_title, :user_content, :dates)";
        //mysqli_query($link, 'sql statement')
        //$result = $conn->query($sql);
        $result = $conn->prepare($sql);
        $result->execute([
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