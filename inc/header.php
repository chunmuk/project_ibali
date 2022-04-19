<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>발리옵션전문 아이발리</title>
  <link rel="stylesheet" href="css/sub.css">
  <link rel="stylesheet" href="css/option.css">
  <style>
    .gnb ul a:hover {
    color: #fff;
    background-color:  #ffa805;
    border-radius: 5px;
    }

    .gnb ul .<?=$_GET["eng_option"]; ?> a {
      color: #fff;
    }

    .<?=$_GET["eng_option"]; ?> a {
      background-color:  #ffa805;
    }

  </style>
</head>

<body>
  <div class="container">
    <header class="header">
      <div class="top">
        <h1 class="logo"><a href="http://chunmuk.dothome.co.kr/">아이발리</a></h1>
        <ul>
          <li class="login"><a href="login/login.php">로그인</a></li>
          <li class="shopping"><a href="#">장바구니</a></li>
        </ul>
      </div>
    </header>
    <section class="section_top">
      <div class="main_txt">
        <h2 class="hidden">검색창</h2>
        <form class="box">
          <fieldset>
            <legend>검색</legend>
            <label for="search_bar">입력</label>
            <input type="text" placeholder="Option..." name="search_bar" id="search_bar">
            <input type="submit" value="Search">
          </fieldset>
        </form>
      </div>
    </section>
