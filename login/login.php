<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <title>발리옵션전문 아이발리</title>
</head>

<body>
  <div class="container">
    <header class="header">
      <div class="top">
        <h1 class="logo"><a href="../index.php">아이발리</a></h1>
        <ul>
          <li class="login"><a href="login.php">로그인</a></li>
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
    <section class="login_section">
      <div class="login_div">
        <h2 class="login_logo">
          <img src="../images/login_logo.png" alt="아이발리로고">
        </h2>
        <form action="login_ok.php" method="post">
          <fieldset>
            <legend>로그인</legend>
            <div class="loginBox">
              <div>
                <label for="u_id"></label>
                <input type="text" name="u_id" id="u_id" placeholder="아이디 입력">
              </div>
              <div>
                <label for="pwd"></label>
                <input type="password" name="pwd" id="pwd" placeholder="비밀번호 입력">
              </div>
            </div>
            <div class="checkbox">
              <input type="checkbox">
              <span>자동 로그인</span>
              <span class="searchid">
                <a href="">아이디 찾기</a>
                |
                <a href="">비밀번호 찾기</a>
              </span>
            </div>
            <button class="loginbotton" type="submit">로그인</button>
            <div class="elselb">
              <button class="nlb" type="submit"><img src="../images/naver.png" alt="네이버"> 네이버로 로그인</button>
              <button class="klb" type="submit"><img src="../images/kakao.jpg" alt="카카오톡"> 카카오톡으로 로그인</button>
            </div>
            <a href="../members/join.php" class="makeid">회원가입</a>
          </fieldset>
        </form>
      </div>
    </section>
    <footer class="footer">
      <div class="footer_top">
        <h2>사이트 이용안내</h2>
        <ul class="term">
          <li><a href="#">회사소개</a></li>
          <li><a href="#">개인정보이용정책</a></li>
          <li><a href="#">업무안내</a></li>
          <li><a href="#">공제보험가입증서</a></li>
          <li><a href="#">통신판매업증서</a></li>
          <li><a href="#">사이트맵</a></li>
          <li><a href="#">입금계좌</a></li>
          <li><a href="#">공지사항</a></li>
        </ul>
      </div>

      <div class="footer_bottom">
        <div class="logo_bottom">
          <img src="../images/logo.png" alt="아이발리로고">
        </div>

        <div class="info">
          <p>(주)바캉스클럽</p>
          <address>인천 연수구 송도과학로 56, 2008호 (송도동, 송도테크노파크 비티센타)</address>
          <p class="number">고객만족센터 02.9797.979
            <span>평일 오전 9시~오후 6시</span>
          </p>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>