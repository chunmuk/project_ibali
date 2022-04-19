<?php

// 이전 페이지에서 값 가져오기
$u_idx = $_POST["u_idx"];
$pwd = $_POST["pwd"];
$birth = $_POST["birth"];
$postalCode = $_POST["postalCode"];
$addr1 = $_POST["addr1"];
$addr2 = $_POST["addr2"];
$email = $_POST["email_id"]."@".$_POST["email_dns"];
$mobile = $_POST["mobile"];

// DB 접속
include "../../inc/dbcon.php";

// 쿼리 작성
// update members set 필드명=값, 필드명=값, ...;
if(!$pwd){
    $sql = "update members set birth='$birth', postalCode='$postalCode', addr1='$addr1', addr2='$addr2', email='$email', mobile='$mobile' where idx=$u_idx;";
} else{
  $sql = "update members set pwd=$pwd, birth=$birth, postalCode='$postalCode', addr1='$addr1', addr2='$addr2', email='$email', mobile='$mobile' where idx=$u_idx;";
};
echo $sql;

// 데이터베이스에 쿼리 전송
mysqli_query($dbcon, $sql);

// * DB(연결) 종료
mysqli_close($dbcon);

// 리디렉션
echo "
    <script type=\"text/javascript\">
        alert(\"정보가 수정되었습니다.\");
        location.href = \"edit.php?u_idx=$u_idx\";
    </script>
";
?>

