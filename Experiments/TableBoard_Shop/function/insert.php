<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!

# 참고 : 에러 메시지 출력 방법
# location.replace & href =>>replace히스토리안남아서 뒤로가기 안됨.
$connect = mysql_connect("localhost","root","1234"); // DB 연결
mysql_select_db("test", $connect);                // DB 선택

$sql ="select * from tableboard_shop where num=$_POST[num]";
$result = mysql_query($sql,$connect);

$row = mysql_fetch_array($result);

$sql="insert into tableboard_shop(num,date,order_id,name,price,quantity) 
    values('$_POST[num]','$_POST[date]','$_POST[order_id]','$_POST[name]','$_POST[price]','$_POST[quantity]')";
echo $sql;


$result = mysql_query($sql,$connect);

mysql_close($connect);
echo "<script> alert('insert - error message') </script>"

?>

<script>
    location.replace('../index.php');
</script>
