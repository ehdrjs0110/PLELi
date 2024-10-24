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

  $no = $_GET['no'];
  $sql = "select * from post where no='$no'";
  $result = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc($result);

    $ct = $row["count"];
    ++$ct;
    
    $sqls = "update post set count = $ct where no='$no'";
    $results = mysqli_query($connect,$sqls);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        #boardContainer {
            display: inline-block;
            text-align: center;
        }
        header{
            background-color: plum;
            height: 130px;
            text-align: center;
        }
        .tia:hover{
            color: white;
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
        a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <script>
        function del(){
              if (confirm("정말 삭제하시겠습니까??") == true){    //확인
                  location.href='delete.php?no=<?php echo $no; ?>';
              }else{   //취소
                  return;
              }
            }
    </script>
</head>
<body class="text-center">
   <header>
        <div class="header-title"><a href="main.php" class="tia">PlELi</a></div>
        <button class="btn btn-md logout" style="background-color:white;color:plum;" onclick="location.href='logout.php'">로그아웃</button>
    </header>
    <br>
    <div id="boardContainer" class="w-50 p-3">
        <table class="table table-bordered border-2">
            <tr>
                <th>제목</th>
                <td><?php echo $row["title"]; ?></td>
            </tr>
            <tr>
                <th>작성자</th>
                <td><?php echo $row["writer"]; ?></td> 
            </tr>
            <tr>
                <th>작성일</th>
                <td><?php echo $row["date"]; ?></td> 
            </tr>
            <tr>
                <th>조회수</th>
                <td><?php echo ++$row["count"]; ?></td>
            </tr>
            <tr>
                <td colspan='2'><?php echo htmlspecialchars_decode($row["content"]); ?></td>
            </tr>                
           
        </table>
    </div>
    <div>
       <button class="btn btn-md " style="background-color:plum;color:white;" onclick="location.href='main.php'">목록</button>
        <button class="btn btn-md " style="background-color:plum;color:white;" onclick="del()">삭제</button>
        <button class="btn btn-md " style="background-color:plum;color:white;" onclick="location.href='rewrite.php?no=<?php echo $no; ?>'">수정</button>
    </div>
    <!-- 부트스트랩 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php
    mysqli_close($connect);
?>