<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */
# TODO: MySQL DB에서, num에 해당하는 레코드 삭제하기!
$connect = mysql_connect("localhost", "kjm", "1234");
mysql_select_db("kjm_db", $connect); // DB 선택
$sql = "delete from tableboard_shop where num = $_GET[num]"; // sql 쿼리 string 생성
$result = mysql_query($sql); // sql 쿼리 실행
# 참고 : 에러 메시지 출력 방법
echo "<script> alert('delete - error message') </script>"
?>

<script>
    location.replace('../index.php');
</script>
