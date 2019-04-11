# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- tableboard_shop인 tabel 생성
- 기본키=num
- 입력값의 타입과 일치하도록 속성의 타입을 설정
  
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- TABLE에 있는 모든 DB를 가져오는 SQL문을 작성
- $numOfrow = 전체 DB의 갯수
```
<?php
    # TODO: MySQL 데이터베이스 연결 및 레코드 가져오기!
    $connect = mysql_connect("localhost", "kjm", "1234"); // MySQL 데이터베이스 연결
    mysql_select_db("kjm_db", $connect); // DB 선택
    $sql = "select * from tableboard_shop";  // sql 쿼리 string 생성
    $result = mysql_query($sql);  // sql 쿼리 실행
    $numOfrow = mysql_num_rows($result);   // 선택된 sql 갯수
?>

- $row = mysql_fetch_row($result) DB를 받아옴
- 받아온 DB의 값을 $row[index]에지정
<?php
    # TODO : 아래 표시되는 내용을, MySQL 테이블에 있는 레코드로 대체하기!
    # Note : column6 에 해당하는 Total 은 Price 값과 Quantity 값의 곱으로 표시!
        for($i=0;$i<$numOfrow;$i++) {
                $row = mysql_fetch_row($result);
                echo '<tr onclick="location.href = (\'board_form.php?num='; echo $i+1;echo '\')">';
                echo '<td class="column1">'; echo $row[1]; echo '</td>';
                echo '<td class="column2">'; echo $row[2]; echo '</td>';
                echo '<td class="column3">'; echo $row[3]; echo '</td>';
                echo '<td class="column4">'; echo '$'; echo $row[4]; echo '</td>';
                echo '<td class="column5">'; echo $row[5]; echo '</td>';
                echo '<td class="column6">'; echo '$'; echo $row[4]*$row[5]; echo '</td>';
                echo '</tr>';
         }
?>
```

## function

### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- $sql = "insert into tableboard_shop을 이용해 안에 들어갈 타입에 알맞은 값을 받아 values들을 넣어준다. 
- $_POST를 이용해 Value 값들을 받아옴
```
<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!
$connect = mysql_connect("localhost", "kjm", "1234");
mysql_select_db("kjm_db", $connect); // DB 선택
$sql = "insert into tableboard_shop(date,order_id, name, price, quantity) 
             values('$_POST[date]','$_POST[order_id]','$_POST[name]','$_POST[price]','$_POST[quantity]')"; // sql 쿼리 string 생성
$result = mysql_query($sql); // sql 쿼리 실행
# 참고 : 에러 메시지 출력 방법
if(!$result) {
    echo "<script> alert('ERROR!!'); </script>";
}
mysql_close();

?>
```

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- $sql = "update tableboard_shop set date를 이용해 업데이트할 값들을 타입에 알맞은 값을 받아 업데이트해준다.
- DB를 입력한 값으로 수정
- $_GET[num] 수정할 DB를 찾음
```
<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!
$connect = mysql_connect("localhost", "kjm", "1234");
mysql_select_db("kjm_db", $connect); // DB 선택
$sql = "update tableboard_shop set date ='$_POST[date]',order_id ='$_POST[order_id]', name='$_POST[name]',price='$_POST[price]',quantity='$_POST[quantity]' where num = $_GET[num]"; // sql 쿼리 string 생성
$result = mysql_query($sql);  // sql 쿼리 실행
# 참고 : 에러 메시지 출력 방법
if(!$result) {
    echo "<script> alert('update - error message') </script>";
}

?>
```
### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
- delete from tableboard_shop where num = $_GET[num]문을 사용해 num이 기본키 이므로 num을 삭제해준다. 
- alter table tableboard_shop auto_increment=1 문을 이용해 테이블에 저장된 값을 삭제해준다. 
```
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
$sql2 = "set @cnt =0";
$sql3 =  "update tableboard_shop set tableboard_shop.num = @cnt:=@cnt+1";
$sql4 =  "alter table tableboard_shop auto_increment=1";
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);
$result4 = mysql_query($sql4);
# 참고 : 에러 메시지 출력 방법
if(!$result || !$result2 || !$result3 || !$result4) {
    echo "<script> alert('delete - error message') </script>";
}
mysql_close();

<script>
    location.replace('../index.php');
</script>
```
