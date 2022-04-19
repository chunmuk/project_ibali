function form_check() {

  // 객체 생성
  var u_id = document.getElementById("u_id");
  var pwd = document.getElementById("pwd");
  var u_name = document.getElementById("u_name");
  var repwd = document.getElementById("repwd");
  var mobile = document.getElementById("mobile");
  var agree = document.getElementById("agree");

  if (u_id.value == "") {
    var err_txt = document.querySelector(".err_id");
    err_txt.textContent = "아이디를 입력하세요.";
    u_id.focus();
    return false;
  };

  var u_id_len = u_id.value.length;
  if (u_id_len < 4 || u_id_len > 12) {
    var err_txt = document.querySelector(".err_id");
    err_txt.textContent = "아이디는 4~12글자만 입력할 수 있습니다.";
    u_id.focus();
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

  if (u_name.value == "") {
    var err_txt = document.querySelector(".err_name");
    err_txt.textContent = "이름을 입력하세요.";
    u_name.focus();
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

  if (!agree.checked) {
    alert("약관 동의가 필요합니다.");
    agree.focus();
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
  window.open("search_addr.php", "", "width=600, height=400, left=0, top=0");
};