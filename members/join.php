<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/join.css">
  <title>발리옵션전문 아이발리</title>
  <style>
    span {
      font-size: 14px;
      color: #f00
    }
  </style>
  <script type="text/javascript" src="../js/join.js"></script>
</head>

<body>
  <div class="container">
    <header class="header">
      <div class="top">
        <h1 class="logo"><a href="../index.php">아이발리</a></h1>
        <ul>
          <li class="login"><a href="../login/login.php">로그인</a></li>
          <li class="shopping"><a href="#">장바구니</a></li>
        </ul>
      </div>
    </header>
    <section class="section_top">
      <div class="main_txt">
        <form class="box">
          <fieldset>
            <legend>검색</legend>
            <label for="search_bar">입력</label>
            <input type="text" placeholder="Option..." id="search_bar">
            <input type="submit" value="Search">
          </fieldset>
        </form>
      </div>
    </section>
    <nav class="gnb">
      <h2 class="hidden">옵션분류</h2>
      <ul class="allMenu">
      <li class="menu1"><a href="../option.php?eng_option=menu1">전체보기</a></li>
      </ul>
      <ul class="etcMenu">
        <?php
        include "../inc/dbcon.php";
        $sql = "select distinct `option`, eng_option from `option`;";
        $result = mysqli_query($dbcon, $sql);
        while($row = mysqli_fetch_array($result)){
          echo '<li class="'.$row["eng_option"].'"><a href="../option.php?eng_option='.$row["eng_option"].'">'.$row["option"].'</a></li>';
        };
        ?> 
      </ul>
    </nav>
    <section class="join_section">
      <div class="join_div">
        <h2 class="login_logo">
          <img src="../images/login_logo.png" alt="아이발리로고">
        </h2>
        <form name="join_form" action="insert.php" method="post" onsubmit="return form_check()">
          <fieldset>
            <legend>회원가입</legend>
            <p class="joinbox" id="idtext">
              <label for="u_id">아이디*<span class="err_id"></span></label>
              <br>
              <input type="text" name="u_id" id="u_id" placeholder="4~12글자만 입력할 수 있습니다." readonly>
              <button type="button" onclick="id_search()">중복확인</button>
            </p>

            <p class="joinbox">
              <label for="pwd">비밀번호*<span class="err_pwd"></span></label>
              <br>
              <input type="password" name="pwd" id="pwd" placeholder="4~8글자만 입력할 수 있습니다.">
            </p>

            <p class="joinbox">
              <label for="repwd">비밀번호 확인*<span class="err_repwd"></span></label>
              <br>
              <input type="password" name="repwd" id="repwd">
            </p>

            <p class="joinbox">
              <label for="u_name">이름*<span class="err_name"></span></label>
              <br>
              <input type="text" name="u_name" id="u_name">
            </p>

            <p class="joinbox">
              <label for="birth">생년월일<span></span></label>
              <br>
              <input type="text" name="birth" id="birth" placeholder="ex) 20211022">
            </p>

            <p class="emailbox">
              <label for="email_id">이메일</label>
              <br>
              <input type="text" name="email_id" id="email_id"> @
              <input type="text" name="email_dns" id="email_dns">
              <select name="email_sel" id="email_sel" onchange="change_email()">
                <option value="">직접입력</option>
                <option value="naver.com">NAVER</option>
                <option value="hanmail.net">DAUM</option>
                <option value="gmail.com">GOOGLE</option>
              </select>
            </p>

            <p class="joinbox">
              <label for="mobile">전화번호*<span class="err_mobile"></span></label>
              <br>
              <input type="text" name="mobile" id="mobile" placeholder="숫자만 입력">
            </p>

            <p>
              <input type="checkbox" name="agree" id="agree" value="y">
                <label for="agree">약관 동의</label>
            </p>

            <p>
              <button type="submit" class="joinbtn">가입하기</button>
            </p>
          </fieldset>
        </form>
      </div>
    </section>
    <?php
    include "../inc/footer.php";
    ?>