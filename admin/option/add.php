<?php
include "../inc/admin_session.php";

$dbcon = mysqli_connect("localhost", "root", "", "ibali") or die ("접속에 실패하였습니다.");
mysqli_set_charset($dbcon, "utf8");

$sql = "select * from option";

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
  <fieldset>
    <legend>상품추가</legend>
      <form action="add_ok.php" method="post">
      <label for="option">옵션종류</label>
      <select name="option" id="option">
        <option value="">선택</option>
        <option value="렌트카">렌트카</option>
        <option value="크루즈">크루즈</option>
        <option value="요가/쿠킹">요가/쿠킹</option>
        <option value="래프팅">래프팅</option>
        <option value="티켓/입장권">티켓/입장권</option>
        <option value="골프">골프</option>
        <option value="워터스포츠">워터스포츠</option>
        <option value="다이빙">다이빙</option>
        <option value="서핑">서핑</option>
        <option value="스파/마사지">스파/마사지</option>
        <option value="레스토랑">레스토랑</option>
        <option value="엑티비티">엑티비티</option>
        <option value="웨딩/스냅">웨딩/스냅</option>
      </select>
      <label for="eng_option">영문</label>
      <select name="eng_option" id="eng_option">
        <option value="">선택</option>
        <option value="rentcar">rentcar</option>
        <option value="cruise">cruise</option>
        <option value="yogacooking">yogacooking</option>
        <option value="rafting">rafting</option>
        <option value="ticket">ticket</option>
        <option value="golf">golf</option>
        <option value="watersports">watersports</option>
        <option value="diving">diving</option>
        <option value="surfing">surfing</option>
        <option value="spamassage">spamassage</option>
        <option value="restaurant">restaurant</option>
        <option value="activity">activity</option>
        <option value="weddingsnap">weddingsnap</option>
      </select>
      <br>
      <label for="name">이름</label>
      <input type="text" name="name" id="name">
      <br>
      <label for="a_price">성인요금</label>
      <input type="text" name="a_price" id="a_price">
      <br>
      <label for="c_price">아동요금</label>
      <input type="text" name="c_price" id="c_price">
      <br>
      <button type="submit">등록</button>
      </form>
    </fieldset>
    <ul>
      <?php
        while($row = mysqli_fetch_array($result)){
        echo '<li><a href="http://localhost/website3/admin/option/option.php?id='.$row['idx'].'">'.$row["name"].'</a></li>';
        }
      ?>
    </ul>