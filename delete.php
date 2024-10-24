<?php
$connect = mysqli_connect("localhost","root","root");
  mysqli_select_db($connect,"db");

  $no = $_GET['no'];
  $sql = "delete from post where no='$no'";
  $result = mysqli_query($connect,$sql);

    if($result == true){
         echo "
        <script>
          window.alert('게시글이 삭제 되었습니다.'); 
          location.href='main.php';
        </script>";
    }else{
        echo "
        <script>
          window.alert('게시글 삭제에 실패 하셨습니다.');
          history.go(-1);
        </script>";
    }

mysql_close($connect);
?>