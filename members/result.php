<?php
// 이전 페이지에서 값 가져오기
$u_id = $_POST["input_id"];

// DB연결
include "../inc/dbcon.php";

// 쿼리작성
$sql = "select u_id from members where u_id='$u_id';";

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);


$num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>검색 결과</title>
  <style type="text/css">
    body, button {font-size:16px}
    a {decoration : none, color : blue;}
    .bld {font-weight : bold;}
    .able {font-weight : bold; color:blue;}
    .d_able {font-weight : bold; color:red;}
  </style>
  <?php if(!$num){ ?>
  <script>
    function return_id() {
      opener.document.getElementById("u_id").value = "<?php echo $u_id;?>";
      window.close();
    };
  </script>
  <?php }; ?>
</head>

<body>
  <p>
    입력하신 <span class="bld">"<?php echo $u_id;?>"</span>은 사용할 수 
<?php if(!$num){  ?>
    <span class=\"able\">있는</span> 
    <?php } else { ?>
    <span class=\"d_able\">없는</span>
    <?php }; ?>
    아이디입니다.<br>
    <?php if(!$num){ ?>
    <a href="#" onclick="return_id()">[사용하기]</a>
    <?php }; ?>
    <a href="#" onclick="history.back()">[다시 검색]</a>
  </p>
</body>

</html>