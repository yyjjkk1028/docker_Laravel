<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .sidenav {
      background-color: darkgray;
      height: 100%;
      width:300px;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: 1500px;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    .menu {
      width:240px;
    }
  </style>
</head>
<body style="height:100%; background:lightgray;">
    <div class="col-sm-3 sidenav" style="height:1200px;">
      <ul class="nav nav-pills nav-stacked" id="category">
      <li><a style="color:black;" href="/main" class="menu"><h2 style="font-weight:bold;">Home</h2></a></li>
        <li><a style="color:black" href="/note" class="menu"><h2 style="font-weight:bold;">자유게시판</h2></a></li>
        <li><a style="color:black" href="/diary" class="menu"><h2 style="font-weight:bold;">일기장</h2></a></li>
        <li><a style="color:black" href="/service" class="menu"><h2 style="font-weight:bold;">고객센터</h2></a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search search_icon"></span>
          </button>
        </span>
      </div>
      <br><br><br>
      <img style="width: 250px;"src="https://mblogthumb-phinf.pstatic.net/MjAyMDAxMDhfMjk5/MDAxNTc4NDQ1OTI1MDY5.NVMC0jz0iu4SQmI-2l5bOlHdNF6wZ_M7pDmvuxLuvKMg.Ykw9JPWDTho2namxehCPA-at8Vuv2hKKwpXyvXJNDRgg.GIF.theworkscompany/11.gif?type=w800" alt="">
    </div>
</body>
</html>
