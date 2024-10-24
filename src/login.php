<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
    <!-- 부트스트랩 CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  </head>
    <style>
        .btn-dong{
            width: 500px;
            margin: auto;
        }
        .loginBox{
            width: 600px;
            height: 500px;
            margin: auto;
            margin-top: 200px;
            background-color: whitesmoke;
        }
        .form-control{
            width: 500px;
        }
        .in{
            margin: 50px 50px 10px 50px;
        }
        .loginBoxTitle{
            color: plum;
            font-size: 100px;
        }
        a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        a:hover{
            color: plum;
        }
    </style>
  <body class="text-center">
    <div class="container">
     <div class="loginBox border border-gray border-2">
      <form class="login" name="loginForm" action="login_search.php" method="post">
            <div class="loginBoxTitle">PlELi</div>
            <div class="in">
                <div class="form-floating mb-3">
                  <input class="form-control" type="text" name="userid" id="floatingInput" placeholder="아이디">
                  <label for="floatingInput">아이디</label>
                </div>
                <div class="form-floating">
                  <input class="form-control" type="password" name="userpw" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">비밀번호</label>
                </div>
            </div>
        <br>
        <div class="d-grid gap-2 btn-dong">
        <input type="submit" class="btn btn-lg" style="background-color:plum;color:white;" value="Log In">
        </div>
        <br>
        <a href="sign_up.html">회원가입</a> 
       
      </form>
     </div>
    </div>
    <!-- 부트스트랩 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>