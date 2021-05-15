<?php
 
header("Content-Type: text/html; charset=UTF-8");
 
//MySQL DB에 접속하기
$conn=mysqli_connect("localhost","cjfghk5697","han020615!","cjfghk5697");
 
//한긓깨짐 방지
mysqli_query($conn,"set names utf8");
 
//DB에서 데이터를 읽어오는 쿼리문
$sql="select * from board";
$result=mysqli_query($conn, $sql);
 
//$result는 결과 데이터들을 가지고 있는 테이블(표)
 
//총 레코드 수(행의 개수, 줄수)
$rowCount= mysqli_num_rows($result);
 
for($i=0;$i<$rowCount;$i++){
    $row= mysqli_fetch_array($result, MYSQLI_ASSOC); //php는 배열이 두 종류가 있다. 
    //연관 배열로 한줄 데이터 얻어오기.
 
    echo "$row[id] <br/>";
    echo "<h2>$row[name] </h2>";
    echo "$row[message] <br/>";
 
    echo "<img src='$row[file]'> <br/>";
    //echo "$row[file] <br/>";
    echo "$row[date] <br/>";
    echo "------------------ <br/><br/>";
}
 
mysqli_close($conn);
 
?>