<?php
 
    header("Content-Type: text/html; charset=UTF-8");
    ini_set( "display_errors", 1 );

    $name= $_POST['name'];
    $message= $_POST['msg'];
 
    $file= $_FILES['upload'];
    $srcName= $file['name'];
    $fileSize= $file['size'];
    $fileType= $file['type'];
    $tmpName= $file['tmp_name'];
 
    echo "$name <br/>";
    echo "$message <br/>";
    echo "$srcName <br/>";
    echo "$tmpName <br/>";
    echo "$fileSize <br/>";
    echo "$fileType <br/>";
 
    //임시 저장소에 있는 이미지 파일을 
    //php문서가 있는 곳과 같은 폴더 안에
    //uploads라는 폴더 안으로 이동 시키기
 
    $path= "uploads/";
    $fileName= date('Ymdhis').$srcName;
 
    //최종 이지미 파일의 경로
    $dstName= "$path . $fileName";
    $result=move_uploaded_file($tmpName, $dstName);
    if($result) echo "success upload file.";
    else echo "fail upload file";
 
    //Data 저장하는 날짜와 시간
    $now= date('Y-m-d h:m:s');
 
    //Database에 업로드 된 데이터 저장
    //Database를 제어해주는 프로그램(DBMS : MySQL) 사용
 
    //php에서 Database서버와 연동하기
    //MySQL DB에 접속하기!!
    $conn=mysqli_connect("localhost","cjfghk5697","han020615!","cjfghk5697"); //DB 서버 주소, DB 접속 아이디, DB접속 비번, DB명 (파일명) 
    //한글 깨짐 방지
    mysqli_query($conn,"set names utf8");

    //SQL 쿼리문 작성
    $sql="INSERT INTO board(name,message, file, date) VALUES ('$name','$message','$dstName','$now')";

    #query = "INSERT INTO tblGames (name, description, image) VALUES ('$name', '$description', '". $target_path ."')";
    
    $result=mysqli_query($conn,$sql);
    if ($result === false) { // false가 나왔다면 무슨 에러인지 출력한다(29번 줄의  태그를 주석 쳐야 제대로 볼 수 있다)
        echo mysqli_error($conn);
      }
    if($result){
        echo "insert success";    
    } else{
        echo "insert fail";
        #header("Location: http://cjfghk5697.dothome.co.kr/"); 

    }
 
    mysqli_close($conn);
 
?>
 
 


