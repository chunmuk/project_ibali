<?php
include "inc/dbcon.php";
include "inc/header.php";
$sql = "select distinct `option`, eng_option from `option`;";
$result = mysqli_query($dbcon, $sql);
?>
    <nav class="gnb">
      <h2 class="hidden">옵션분류</h2>
      <ul class="allMenu">
        <li class="menu1"><a href="option.php?eng_option=menu1">전체보기</a></li>
      </ul>
      <ul class="etcMenu">
        <?php
        while($row = mysqli_fetch_array($result)){
          echo '<li class="'.$row["eng_option"].'"><a href="option.php?eng_option='.$row["eng_option"].'">'.$row["option"].'</a></li>';
        };
        ?>        
      </ul>
    </nav>
    <section class="option_section">
      <h2 class="hidden">옵션분류</h2>
      <div class="option">
      <?php
        if(isset($_GET["eng_option"]) && empty($_GET["id"])){
          if($_GET["eng_option"] == "menu1"){
            $sql = "select idx, eng_option, name, format(a_price, 0) from `option`;";
            $result = mysqli_query($dbcon, $sql);
            while($row = mysqli_fetch_array($result)){
              echo '<a href="http://chunmuk.dothome.co.kr/option.php?eng_option='.$row["eng_option"].'&id='.$row["idx"].'" class="item'.$row["idx"].'">
              <div></div>
              <p>'.$row["name"].'</p>
              <p>￦ '.$row["format(a_price, 0)"].'</p>
              </a>'; 
            };
          }
          else{
            $get = $_GET["eng_option"];
            $sql = "select idx, eng_option, name, format(a_price, 0) from `option` where eng_option='$get';";
            $result = mysqli_query($dbcon, $sql);
            while($row = mysqli_fetch_array($result)){
              echo '<a href="http://chunmuk.dothome.co.kr/option.php?eng_option='.$row["eng_option"].'&id='.$row["idx"].'" class="item'.$row["idx"].'">
              <div></div>
              <p>'.$row["name"].'</p>
              <p>￦ '.$row["format(a_price, 0)"].'</p>
              </a>'; 
            }
          }
        };
      ?>
      </div>
    </section>
    <?php
        if(isset($_GET["id"])){
    ?>
    <section class="option_section">
      <div class="detail">
        <?php
        echo '<div class="item'.$_GET["id"].'">';
        ?>
          <div class="detail_image"></div>
          <span class="option_booking">
            <?php
            $get = $_GET["id"];
            $sql = "select idx, name, format(a_price, 0), a_price, format(c_price, 0), c_price from `option` where idx='$get';";
            $result = mysqli_query($dbcon, $sql);
            $row = mysqli_fetch_array($result)
            ?> 
            <?php 
            echo '<h2>'.$row['name'].'</h2><hr>';
            echo '<p>성&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp인 &nbsp&nbsp<span>'.$row['format(a_price, 0)'].'원</span></p>';
            echo '<p>아&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp동 &nbsp&nbsp<span>'.$row['format(c_price, 0)'].'원</span></p><hr>';
            ?>
            <label>사용날짜</label><input type="date"><br>
            <label>성인인원</label><input id="a_pax" type="text" value="1" onkeyup='printName()' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            <label>&nbsp&nbsp아동인원</label><input id="c_pax" type="text" value="0" onkeyup='printName()' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br>
            <label>필수선택</label>
              <select>
                <option value="">필수선택</option>
                <option>선택01</option>
                <option>선택02</option>
                <option>선택03</option>
              </select>
            <hr>
            <span class="totalBox">
            <label>합계금액 &nbsp</label>
            <span id="totalPrice">
              <?php
              echo $row['format(a_price, 0)'].'원';
              ?>
            </span>
            <span class="BtnBox">
            <button class="marketBtn">장바구니 담기</button>
            <button class="bookingBtn">예약하기</button>
            </span>
          </span>
        </div>
        <div class="manual">
          <ul>
            <button id="btn1">프로그램 안내</button>
            <button id="btn2">사용방법</button>
            <button id="btn3">취소규정</button>
          </ul>
          <?php
          include "inc/".$row["idx"].".txt";
          ?>
        </div>
      </div>
    </section>

    <!-- 옵션수량에 따른 합계금액 연산스크립트 -->
    <script>
    var a_price = "<?php echo $row['a_price']; ?>";
    var c_price = "<?php echo $row['c_price']; ?>";
    var b = Number(a_price);
    var c = Number(c_price);
    var innerText = document.getElementById("a_pax").innerText;
    var innerText2 = document.getElementById("c_pax").innerText;

    function printName(){
      var a_pax = document.getElementById("a_pax").value;
      var c_pax = document.getElementById("c_pax").value;
      var totalPrice = Number((a_pax * b)+(c_pax * c));
    document.getElementById("totalPrice").innerText = totalPrice.toLocaleString() + "원";
    };   
    </script>

    <!-- 옵션설명 스크립트 -->
    <script type="text/javascript" src="js/option_desc.js"></script>
    <?php
        };
      mysqli_close($dbcon);

      include "inc/footer.php";
    ?>