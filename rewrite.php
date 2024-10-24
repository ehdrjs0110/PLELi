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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <style>
        header{
            background-color: plum;
            height: 130px;
            text-align: center;
        }
         a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
     .logout{
            float: right;
            margin: 40px 30px 0px 0px;
            
        }
         .btn-dong{
                width: 400px;
                margin: auto;
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
     .in{
            width: 400px;
            margin: 0px 760px;
         }
</style>
</head>
<body class="text-center">
<header>
       <div class="header-title"><a href="main.php" class="tia">PlELi</a></div>
        <button class="btn btn-md logout" style="background-color:white;color:plum;" onclick="location.href='logout.php'">로그아웃</button>
    </header>
    <br>
    <div id="board_write">
            <div id="write_area">
                <form enctype="multipart/form-data" action="rewrite_update.php" method="post">
                    <input type="hidden" name="no" id="no" value="<?php echo $row["no"]; ?>">
                    
                    <div id="in_title" class="form-floating mb-3">
                        <input type="text" name="title" id="title" class="form-control in" rows="1" cols="55" placeholder="제목" size="53" maxlength="100" value="<?php echo $row["title"]; ?>" required>
                        <label for="title" class="in">제목</label>
                    </div>
                
                    <div class="form-floating">
                      <textarea name="content" id="content" class="form-control in" placeholder="내용" id="floatingTextarea2" style="height: 450px" required><?php echo htmlspecialchars_decode($row["content"]); ?></textarea>
                      <label for="floatingTextarea2" class="in">내용</label>
                    </div>
                    
                    <br>
                    
                    <div class="d-grid gap-2 btn-dong">
                    <input type="submit" class="btn btn-lg" style="background-color:plum;color:white;" value="저장">
                    </div>
                    
                </form>
            </div>
        </div>
        
        <!-- 부트스트랩 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>