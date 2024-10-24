<?
//html로 부터 값 읽어오기
date_default_timezone_set('Asia/Seoul');
session_start();
$writer=$_SESSION['userid'];//세션으로
$title=$_POST['title'];
$content=nl2br($_POST['content']);
$date = date('Y-m-d H:i:s');

//html특수문자 제거
$title_cl = htmlspecialchars($title);
$content_cl = htmlspecialchars($content);

//데이터베이스 연결
$conn=mysqli_connect('localhost', 'root', 'root');
if (!$conn)
{
    echo "
        <script>
          window.alert('게시글이 작성에 실패하였습니다.'); 
          history.go(-1);
        </script>";
}
else
{
    mysqli_select_db($conn, 'db');
    $query="insert into post (writer, title, content, date) values ('$writer', '$title_cl', '$content_cl', '$date');";
    $result = mysqli_query($conn, $query);  
    if($result==true){
        echo "
        <script>
          window.alert('게시글이 작성 되었습니다.'); 
          location.href='main.php';
        </script>";
    }else{
        echo "
        <script>
          window.alert('게시글 작성에 실패했습니다.'); 
          location.href='main.php';
        </script>";
    }
    
}

mysqli_close($conn);
?>


