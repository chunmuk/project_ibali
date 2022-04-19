<meta charset="utf-8">
<?php
header ("content-type:text/html; charset=utf-8");

//// 이전 페이지에서 값 가져오기
$u_id = $_POST["u_id"];
$pwd = $_POST["pwd"];
$u_name = $_POST["u_name"];
$birth = $_POST["birth"];
$email = $_POST["email_id"]."@".$_POST["email_dns"];
$mobile = $_POST["mobile"];
$reg_date = date("Y-m-d");

// 값 확인
echo "아이디 : ".$u_id."<br>";
echo "비밀번호 : ".$pwd."<br>";
echo "이름 : ".$u_name."<br>";
echo "생년월일 : ".$birth."<br>";
echo "이메일 : ".$email."<br>";
echo "전화번호 : ".$mobile."<br>";
echo "가입일 : ".$reg_date."<br>";

/*  DB 접속 */
include "../inc/dbcon.php";

/* 쿼리 작성 */
$sql = "insert into members(";
$sql .= "u_id, pwd, u_name, birth, email, mobile, reg_date";
$sql .= ") values(";
$sql .= "'$u_id', '$pwd', '$u_name', '$birth', '$email', '$mobile', '$reg_date'";
$sql .= ");";
echo $sql;

/* 데이터베이스에 쿼리 전송 */
mysqli_query($dbcon, $sql);

/* DB(연결) 종료 */
mysqli_close($dbcon);

/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        location.href = \"welcome.php\";
    </script>
";
?>
