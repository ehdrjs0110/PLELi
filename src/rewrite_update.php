<?
//html로 부터 값 읽어오기
date_default_timezone_set('Asia/Seoul');

$no=$_POST['no'];
$title=$_POST['title'];
$content=nl2br($_POST['content']);
//$date=$_POST['date'];php함수 현재시간날짜
$date = date('Y-m-d H:i:s');

$title_cl = htmlspecialchars($title);
$content_cl = htmlspecialchars($content);

//데이터베이스 연결
$conn=mysqli_connect('localhost', 'root', 'root');
if (!$conn)
{
    echo "
        <script>
          window.alert('게시글이 수정에 실패하였습니다.'); 
          history.go(-1);
        </script>";
}
else
{
    mysqli_select_db($conn, 'db');
    $query = "update post set title = '$title_cl', content = '$content_cl', date = '$date' where no='$no'";
    mysqli_query($conn, $query);   
    echo "
        <script>
          window.alert('게시글이 수정 되었습니다.'); 
          location.href='main.php';
        </script>";
}

mysqli_close($conn);
?>


