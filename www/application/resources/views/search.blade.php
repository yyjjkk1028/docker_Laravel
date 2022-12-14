<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>검색어 결과</h1>
  @foreach ($search as $item)
        검색어: {{$item -> search}}<br>
  @endforeach
  <h3>데이터를 확인하였습니다.</h3>
  <a href="/form">검색입력으로</a>
</body>
</html>