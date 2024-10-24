<?php
session_start();
if(!isset($_SESSION['userid'])){
    echo "
        <script>
          window.alert('로그인을 해주세요.'); 
          location.href='login.php';
        </script>";
}

$connect = mysqli_connect("localhost","root","root");
  mysqli_select_db($connect,"db");

  $sql = "select * from post ORDER BY no DESC";
  $result = mysqli_query($connect,$sql);
  
?>
<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PlAy LisT</title>
    <!-- 부트스트랩 CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .board{
            padding: 0px 150px;
        }
        .logout{
            float: right;
            margin: 40px 30px 0px 0px;
            
        }
        .header-title{
            color: white;
            font-size: 80px;
            display:inline;
            margin-left: 120px;
        }
        .tia:hover{
            color: white;
        }
        th{
            color: plum;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        a:hover{
            color: plum;
        }
        h1{
            color: plum;
        }
        header{
            background-color: plum;
            height: 130px;
            text-align: center;
        }
    </style>
</head>


<body>
    <header>
        <div class="header-title"><a href="main.php" class="tia">PlELi</a></div>
        <button class="btn btn-md logout" style="background-color:white;color:plum;" onclick="location.href='logout.php'">로그아웃</button>
    </header>
    <br>
    <div class="board">
        <h1>PlAy LisT</h1>
        
        <button class="btn btn-md" style="background-color:plum;color:white;" onclick="location.href='write.html'">글쓰기</button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th >작성자</th>
                    <th>작성일</th>
                    <th>조회</th>
                    
                </tr>
            </thead>
            <tbody id="tableBody">
               <?php  while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row["no"]; ?></td>
                    <td><a href="content.php?no=<?php echo $row["no"]; ?>"><?php echo $row["title"]; ?></a></td>
                    <td><?php echo $row["writer"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td><?php echo $row["count"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

<!-- 부트스트랩 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>


<?php
    mysqli_close($connect);
?>