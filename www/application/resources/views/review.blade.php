<?php
    try 
    {
      require_once($_SERVER["DOCUMENT_ROOT"]."/../resources/views/conn.php");
      if(!session_id()){ // 세션이 실행되어 있는지 여부를 체크합니다.
        session_name('테스트세션'); //기본적으로 세션의 이름은 PHPSESSID 입니다.
        session_start(); //세션 시작 
    }
    $note_idx = $_GET['idx'];
    $sql = "SELECT * FROM notes where idx = :idx ";
    $result = $conn->prepare($sql);
    $result->execute([
        ':idx' => $note_idx]);
    $row = $result -> fetch();
    $not_name = $row['name'];
    $not_title = $row['title'];
    $not_cont = $row['content'];

    $update_sql = "UPDATE notes set thumbup = thumbup + 1 where idx = :idx ";
    $result1 = $conn->prepare($update_sql);
    $result1->execute([
        ':idx' => $note_idx]);
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
        echo mysql_connect_error();
    }
?>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="http://cafecj.daum-img.net/cafebackup/css/1/backup.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
  <style> 
    .search_icon{
      height:20px;
    }
  </style>
</head>
<body>
<div class="container-fluid" style="padding:0;">
    <?php 
      include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/navbar.php");
      include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/menu.php");
    ?>
    <div class="row content">
      <form method="post" action="/insert">
      @csrf
        <center>
        <div style="margin:0;"><h2>&nbsp;&nbsp;&nbsp;자유게시판</h2><br>
        </div>
        <div style="margin:0;padding:19px 29px 19px;border:1px solid #eeeeee;height:auto; width:80%;">
          <div class="table-responsive">
            <table style="width:100%;margin-top:10px;border:1px solid gray;">
              <tbody>
                <tr>
                    <td width="50" style="padding:9px 5px; background:lightblue;"><center>작성자</center></td>
                    <td class="form-control"><?php echo $not_name?></td>
                </tr>
                <tr>
                <td width="50" style="padding:9px 5px; background:lightblue;"><center>제 목</center></td>
                    <td class="form-control"><?php echo $not_title?></td>
                </tr>
                <tr>
                <td width="50" style="padding:9px 5px; background:lightblue;"><center>내 용</center></td>
                    <td class="form-control" style="height: 500px;"><?php echo $not_cont?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <br><a href="/note">
              <input type="button" style="padding:5px 12px;Color:#ff5656;Background:#ffffff;font-size:14px;border:1px solid black;border-radius:2px;" value="목록">
            </a>
        </center>
        <br>
      </form>
    </div>
</div>
<div style="position: relative; z-index: 2;">
<?php include($_SERVER["DOCUMENT_ROOT"]."/../resources/views/footer.php");?>
</div>
</body>
</html>