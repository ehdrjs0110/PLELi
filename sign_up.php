<?php
        $id=$_POST['id'];
        $pw=$_POST['password'];
        $name=$_POST['name'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];

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
    else if (!$name) {
    echo "
    <script>
      window.alert('이름을 입력하세요')
      history.go(-1)
      </script>";
 
  }
    else if (!$tel) {
    echo "
    <script>
      window.alert('전화번호를 입력하세요')
      history.go(-1)
      </script>";
 
  }
    else if (!$email) {
    echo "
    <script>
      window.alert('이메일을 입력하세요')
      history.go(-1)
      </script>";
 
  }else{
    
    $special_pattern = "/[`~!@#$%^&*|\\\'\";:\/?^=^+_()<>]/";  //특수기호 정규표현식
    $special_pattern_e = "/[`~!#$%^&*|\\\'\";:\/?^=^+_()<>]/"; //email용
        
    if(preg_match($special_pattern, $id) ){  //받은 아이디에 특수기호가있으면

        $msg = "특수문자는 사용할 수 없습니다."; 

        echo "<script>alert('$msg');history.back();</script>";
    }else if(preg_match($special_pattern, $pw)){
        $msg = "특수문자는 사용할 수 없습니다."; 

        echo "<script>alert('$msg');history.back();</script>";
    }else if(preg_match($special_pattern, $name)){
        $msg = "특수문자는 사용할 수 없습니다."; 

        echo "<script>alert('$msg');history.back();</script>";
    }else if(preg_match($special_pattern, $tel)){
        $msg = "특수문자는 사용할 수 없습니다."; 

        echo "<script>alert('$msg');history.back();</script>";
    }else if(preg_match($special_pattern_e, $email)){
        $msg = "특수문자는 사용할 수 없습니다."; 

        echo "<script>alert('$msg');history.back();</script>";
    }else{
    

        $conn = mysqli_connect("localhost","root","root");
if (!$conn)
{
    echo "회원가입 실패";
}
else
{
        mysqli_select_db($conn,"db");
 
        //입력받은 데이터를 DB에 저장
        $query = "insert into member (id, password, name, tel, email) values ('$id', '$pw', '$name', '$tel', '$email')";
 
        mysqli_query($conn, $query);
         echo "
            <script>
              window.alert('회원가입 되었습니다..'); 
              location.href='login.php';
            </script>";
           
}
 
        mysqli_close($conn);
}
}
?>
