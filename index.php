<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>발리옵션전문 아이발리</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/option.css">
</head>

<body>
  <div class="container">
    <header class="header">
      <div class="top">
        <h1 class="logo"><a href="http://mukyihan.dothome.co.kr">아이발리</a></h1>
        <?php
        if(!$s_id){ //로그인 전 ?>
        <ul>
          <li class="login"><a href="login/login.php">로그인</a></li>
          <li class="shopping"><a href="#">장바구니</a></li>
        </ul>
        <?php } else{ // 로그인 후 ?>
        <p><?php echo $s_name; ?>님, 안녕하세요.</p>
        <p>
        <?php if($s_id == "admin"){ ?>
        <a href="admin/admin.php">관리자</a>
        <?php }; ?>
        <a href="login/logout.php">로그아웃</a>
        <a href="members/edit.php">정보수정</a>
        </p>
      <?php }; ?>
      </div>
    </header>
    <section class="section_top">
      <div class="main_txt">
        <h2>"발리 옵션선택은 <br><span>아이발리</span>에서"</h2>
        <form class="box" action="option.php">
          <fieldset>
            <legend>검색</legend>
            <label for="search_bar">입력</label>
            <input type="text" placeholder="Option..." id="search_bar">
            <input type="submit" value="Search">
          </fieldset>
        </form>
      </div>
    </section>
    <section class="best_section">
      <div class="best">
        <h2>BEST OPTION</h2>
        <ul class="slides">
          <li>
          <?php
          include "inc/dbcon.php";
          $sql = "select idx, eng_option, name, format(a_price, 0), reserve from `option` order by reserve desc limit 10;";
          $result = mysqli_query($dbcon, $sql);
          for($i=1;$i<=10;){ 
          while($row = mysqli_fetch_array($result)){
            echo '<a href="http://chunmuk.dothome.co.kr/option.php?eng_option='.$row["eng_option"].'&id='.$row["idx"].'" class="item'.$row["idx"].'">
            <div><span>'.$i++.'</span></div>
            <p>'.$row["name"].'</p>
            <p>￦ '.$row["format(a_price, 0)"].'</p>
            </a><li>'; 
          };
        };
          ?>
        </ul>    
      </div>
      <p class="controls">
        <span class="prev">&lsaquo; prev</span>
        <span class="next">next &rsaquo;</span>
      </p>
    </section>
    <nav class="gnb">
      <h2 class="hidden">옵션분류</h2>
      <ul>
        <li class="menu1"><a href="option.php?eng_option=menu1">전체보기</a></li>
        <li class="menu2"><a href="option.php?eng_option=rentcar">렌트카</a></li>
        <li class="menu3"><a href="option.php?eng_option=cruise">크루즈</a></li>
        <li class="menu4"><a href="option.php?eng_option=yogacooking">요가 및 쿠킹</a></li>
        <li class="menu5"><a href="option.php?eng_option=rafting">래프팅</a></li>
        <li class="menu6"><a href="option.php?eng_option=ticket">티켓 및 입장권</a></li>
        <li class="menu7"><a href="option.php?eng_option=golf">골프</a></li>
        <li class="menu8"><a href="option.php?eng_option=watersports">워터스포츠</a></li>
        <li class="menu9"><a href="option.php?eng_option=diving">다이빙</a></li>
        <li class="menu10"><a href="option.php?eng_option=surfing">서핑</a></li>
        <li class="menu11"><a href="option.php?eng_option=spamassage">스파 및 마사지</a></li>
        <li class="menu12"><a href="option.php?eng_option=restaurant">레스토랑</a></li>
        <li class="menu13"><a href="option.php?eng_option=activity">엑티비티</a></li>
        <li class="menu14"><a href="option.php?eng_option=weddingsnap">웨딩 및 스냅</a></li>
      </ul>
    </nav>
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
          <img src="./images/logo.png" alt="아이발리로고">
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
  <script src="js/best_slide.js"></script>
</body>
</html>