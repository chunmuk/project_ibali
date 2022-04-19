<?php
include "../inc/admin_session.php";

// 클릭한 사용자 정보 가져오기
$u_idx = $_GET["u_idx"];

// DB 연결
include "../../inc/dbcon.php";

// 쿼리 작성
$sql = "select * from members where idx=$u_idx;";

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// 결과 가져오기
$array = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입</title>  
  <script type="text/javascript">
    function form_check() {
      // alert("TEST");

      // 객체 생성
      var u_name = document.getElementById("u_name");
      var u_id = document.getElementById("u_id");
      var pwd = document.getElementById("pwd");
      var repwd = document.getElementById("repwd");
      var mobile = document.getElementById("mobile");
      var agree = document.getElementById("agree");

      if (u_name.value == "") { // if(!uname.value){ // 값이 없다면
        // if(uname.value != ""){ // if(uname.value){ // 값이 있다면
        // alert("이름을 입력하세요.");
        var err_txt = document.querySelector(".err_name");
        err_txt.textContent = "이름을 입력하세요.";
        // err_txt.textContent = "<em>이름을 입력하세요.</em>";
        u_name.focus();
        return false;
      };

      if (u_id.value == "") {
        var err_txt = document.querySelector(".err_id");
        err_txt.textContent = "아이디를 입력하세요.";
        u_id.focus();
        return false;
      };

      var uid_len = uid.value.length;
      if (uid_len < 4 || uid_len > 12) {
        var err_txt = document.querySelector(".err_id");
        err_txt.textContent = "아이디는 4~12글자만 입력할 수 있습니다.";
        uid.focus();
        return false;
      };

      if (pwd.value == "") {
        var err_txt = document.querySelector(".err_pwd");
        err_txt.textContent = "비밀번호를 입력하세요.";
        pwd.focus();
        return false;
      };
      var pwd_len = pwd.value.length;
      if (pwd_len < 4 || pwd_len > 8) {
        var err_txt = document.querySelector(".err_pwd");
        err_txt.textContent = "비밀번호는 4~8글자만 입력할 수 있습니다.";
        pwd.focus();
        return false;
      };

      if (pwd.value != repwd.value) {
        var err_txt = document.querySelector(".err_repwd");
        err_txt.textContent = "비밀번호를 확인해 주세요.";
        repwd.focus();
        return false;
      };

      // 정규식 작성(규칙 만들기)해서 변수에 저장
      var reg_mobile = /^[0-9]+$/g;
      // var reg_mobile = /^[0-9]{10,11}$/g; //{,} 띄어쓰기 주의
      if (!reg_mobile.test(mobile.value)) {
        var err_txt = document.querySelector(".err_mobile");
        err_txt.textContent = "전화번호는 숫자만 입력할 수 있습니다.";
        mobile.focus();
        return false;
      };
    };

    function change_email() {
      var email_dns = document.getElementById("email_dns");
      var email_sel = document.getElementById("email_sel");

      var idx = email_sel.options.selectedIndex;
      var sel_txt = email_sel.options[idx].value;
      email_dns.value = sel_txt;
    };

    function id_search() {
      window.open("search_id.php", "", "width=600, height=250, left=0, top=0");
    };

    function addr_search() {
      window.open("search_addr.html", "", "width=600, height=400, left=0, top=0");
    };

    function del_check(){
      var i = confirm("정말 삭제하시겠습니까?\n삭제한 아이디는 복원하실 수 없습니다.");
      if (i == true){
        location.href = "delete.php?u_idx=<?php echo $u_idx; ?>";
      };
    };
  </script>
</head>

<body>
  <form name="edit_form" action="edit_ok.php" method="post" onsubmit="return edit_check()">
    <fieldset>
      <legend>회원 정보 수정</legend>
      <input type="hidden" name="u_idx" value="<?php echo $u_idx; ?>">
      <p>
        <span class="txt">이름 : </span>
        <?php echo $array["u_name"]; ?>
      </p>

      <p>
        <span class="txt">아이디 : </span>
        <?php echo $array["u_id"]; ?>
      </p>

      <p>
        <label for="pwd" class="txt">비밀번호<span class="err_pwd"></span></label>
        <input type="password" name="pwd" id="pwd" value="<?php echo $array["pwd"]; ?>">

      </p>

      <p class="joinbox">
        <label for="repwd">비밀번호 확인*<span class="err_repwd"></span></label>
        <input type="password" name="repwd" id="repwd" value="<?php echo $array["pwd"]; ?>">
      </p>

      <?php  
        // str_replace("어떤 문자를", "어떤 문자로", "어떤 문장에서")
        $birth = str_replace("-", "", $array["birth"]);
      ?>

      <p>
        <label for="repwd" class="txt">생년월일</label>
        <input type="text" name="birth" id="birth" class="birth" value="<?php echo $birth ?>">
        <span>* ex) 20211022</span>
      </p>

      <p>
        <label>주소</label>
        <input type="text" name="postalCode" value="<?php echo $array["postalCode"]; ?>">
        <button type="button">주소검색</button>
        <br>
        기본주소<input type="text" name="addr1" value="<?php echo $array["addr1"]; ?>">
        <br>
        상세주소<input type="text" name="addr2" value="<?php echo $array["addr2"]; ?>">
      </p>

      <?php  
        // explode("기준 문자", "어떤 문자로", "어떤 문장에서")
        $email = explode("@", $array["email"]);
      ?>

      <p class="emailbox">
        <label for="email_id">이메일</label>
        <br>
        <input type="text" name="email_id" id="email_id" value="<?php echo $email[0]; ?>"> @
        <input type="text" name="email_dns" id="email_dns" value="<?php echo $email[1]; ?>">
        <select name="email_sel" id="email_sel" onchange="change_email()">
          <option value="">직접입력</option>
          <option value="naver.com">NAVER</option>
          <option value="hanmail.net">DAUM</option>
          <option value="gmail.com">GOOGLE</option>
        </select>
      </p>

      <p class="joinbox">
        <label for="mobile">전화번호*<span class="err_mobile"></span></label>
        <input type="text" name="mobile" id="mobile" value="<?php echo $array["mobile"]; ?>">
      </p>

      <p>
        <button type="button" onclick="location.href='list.php'">회원목록으로</button>
        <button type="button" onclick="location.href='../admin.php'">홈으로</button>
        <button type="button" onclick="del_check()">회원삭제</button>
        <button type="submit" class="joinbtn">저장하기</button>
      </p>
    </fieldset>
  </form>
</body>

</html>