<?
 //데이터베이스에서 아이디 비밀번호 확인하는 부분
  $connect = mysqli_connect("localhost","root","root");//채워줘
//  mysql_set_charset("utf8",$connect);
  mysqli_select_db($connect,"db");//채워줭
 
  $id = $_POST['userid'];
  $pw = $_POST['userpw'];
 
    $special_pattern = "/[`~!@#$%^&*|\\\'\";:\/?^=^+_()<>]/";  //특수기호 정규표현식

    if(preg_match($special_pattern, $id) ){  //받은 아이디에 특수기호가있으면

        $msg = "특수문자는 사용할 수 없습니다."; 

        echo "<script>alert('$msg');history.back();</script>";
    }else if(preg_match($special_pattern, $pw)){
        $msg = "특수문자는 사용할 수 없습니다."; 

        echo "<script>alert('$msg');history.back();</script>";
    }else{
        
    

  if (!$id) {
    echo "
    <script>
      window.alert('아이디를 입력하세요');
      history.go(-1);
      </script>";
  }
  else if (!$pw) {
    echo "
    <script>
      window.alert('패스워드를 입력하세요')
      history.go(-1)
      </script>";
 
  }
  else {
 
 
  $sql = "select * from member where id='$id'";
  $result = mysqli_query($connect,$sql);
  $num1 = mysqli_num_rows($result);
 
  $sql = "select * from member where id='$id' and password='$pw'";
  $result = mysqli_query($connect,$sql);
  $num2 = mysqli_num_rows($result);
      
  if (!$num1) {
    echo "
    <script>
      window.alert('아이디/비밀번호가 틀렸습니다 다시 입력하세요')
      history.go(-1)
      </script>";
  }
  else if (!$num2) {
    echo "
    <script>
      window.alert('아이디/비밀번호가 틀렸습니다 다시 입력하세요')
      history.go(-1)
      </script>";
  }
  else {
    session_start();
    $user = mysqli_fetch_array($result);
    $_SESSION['userid'] = $id;
    echo "
    <script>
      location.href='main.php'
    </script>";
  }
}
mysql_close($connect);
}
?>
 
<meta charset="utf-8">