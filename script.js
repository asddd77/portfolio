const mouseStalker = ".cursor";           // マウスストーカーになる要素を指定
const mouseStalkerArea = window;        // マウスストーカーが機能する要素を指定

const stkrSize = parseInt($(mouseStalker).css("width").replace(/px/, ""));
const stkrPosX = parseInt($(mouseStalker).css("left").replace(/px/, ""));
const stkrPosY = parseInt($(mouseStalker).css("top").replace(/px/, ""));
const cssPosAjust = stkrPosX + (stkrSize / 2);
let scale = 1;

// 追従用の処理
$(mouseStalkerArea).hover(function(){
  $(mouseStalkerArea).mousemove(function(e){
    let x = e.clientX - cssPosAjust;
    let y = e.clientY - cssPosAjust;
    $(mouseStalker).css({
      "transform": "translate(" + x + "px," + y + "px) scale(" + scale + ")",
    });
  });
});

// loadong anime
let time = new Date().getTime();

$(window).on('load',function () {
  	let now = new Date().getTime();
  	if (sessionStorage.getItem('access')) {
      	stopload();
  	} else if (now-time<=2000) {
    	setTimeout('stopload()',5000-(now-time));
    	return;
  	} else {
    	stopload();
  	}
});

function stopload(){
	const load = document.querySelector('.load_anime');
	load.classList.add('loaded');
}

// window.onload = function() {
//   const load = document.querySelector('.load_anime');
//   load.classList.add('loaded');
// }

//slider
$(document).ready(function () {
	$('.slide-items').bxSlider();
});

//hum
$(".hum_btn").click(function () {
	$(this).toggleClass('active');
	$(".hum_nav").fadeToggle(500);
});