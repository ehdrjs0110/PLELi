<?php
    session_start();
    session_destroy();
    echo "
        <script>
          window.alert('로그아웃 되셨습니다!'); 
          location.href='login.php';
        </script>";
?>
