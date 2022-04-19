let btn1 = document.getElementById('btn1');
let btn2 = document.getElementById('btn2');
let btn3 = document.getElementById('btn3');
let desc = document.querySelector('.desc');
let howToUse = document.querySelector('.howToUse');
let refund = document.querySelector('.refund');

btn1.addEventListener("click", function () {
  btn1.style.backgroundColor = "#ffa805";
  btn2.style.backgroundColor = "#424649";
  btn3.style.backgroundColor = "#424649";
  desc.style.display = "block";
  howToUse.style.display = "none";
  refund.style.display - "none";
});

btn2.addEventListener("click", function () {
  btn1.style.backgroundColor = "#424649";
  btn2.style.backgroundColor = "#ffa805";
  btn3.style.backgroundColor = "#424649";
  howToUse.style.display = "block";
  desc.style.display = "none";
  refund.style.display = "none";
});

btn3.addEventListener("click", function () {
  btn1.style.backgroundColor = "#424649";
  btn2.style.backgroundColor = "#424649";
  btn3.style.backgroundColor = "#ffa805";
  refund.style.display = "block";
  desc.style.display = "none";
  howToUse.style.display = "none";
});