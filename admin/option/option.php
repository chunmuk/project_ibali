<?php
include "../inc/admin_session.php";

$dbcon = mysqli_connect("localhost", "root", "", "ibali") or die ("접속에 실패하였습니다.");
mysqli_set_charset($dbcon, "utf8");

$sql = "select * from option;";

$result = mysqli_query($dbcon, $sql);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원목록</title>  
  <script type="text/javascript">
    function del_check(idx){
      var i = confirm("정말 삭제하시겠습니까?\n삭제한 아이디는 복원하실 수 없습니다.");
      
      if (i == true){
        // alert("delete.php?u_idx="+idx);
        location.href = "delete.php?u_idx="+idx;
      };
    };
  </script>
</head>
<body>
<h2>* 관리자 페이지 *</h2>
    <p><?php echo $s_name; ?>님, 안녕하세요.</p>
    <p>
      <a href="../../admin/admin.php">홈으로</a>
      <a href="../option/option.php">상품 관리</a>
      <a href="../../admin/members/list.php">회원 관리</a>
      <a href="../../login/logout.php">로그아웃</a>
      <a href="../../members/edit.php">정보수정</a>
    </p>
    <hr>
    <a href="add.php">상품추가</a>
    <ul>
      <?php
        while($row = mysqli_fetch_array($result)){
        echo '<li><a href="http://localhost/website3/admin/option/option.php?id='.$row['idx'].'">'.$row["name"].'</a></li>';
        }

        mysqli_close($dbcon);
      ?>
    </ul>