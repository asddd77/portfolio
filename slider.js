
//学園祭
$(function () {
    // スライドリストの合計値を計算
    let width = $('.slider-list').outerWidth(true);  //一枚分の幅
    let length = $('.slider-list').length; //listの数
    let slideArea = width * length; //レール全体=スライド一枚*スライド合計数
    $('.slider-area').css('width', slideArea); //計算した合計幅を指定
    let slideCurrent = 0;
    let lastCurrent = $('.slider-list').length - 1;

    ////////// スライドの切り替わりを「changeslide」として定義
    function changeslide() {
        $('.slider-area').stop().animate({ // stopメソッドを入れることでアニメーション1回毎に止める
            left: slideCurrent * -width // 代入されたスライド数 × リスト1枚分の幅を左に動かす
        });
        ////////// ページネーションの変数を定義（＝スライド現在値が必要）
        let pagiNation = slideCurrent + 1; // nth-of-typeで指定するため0に＋1をする
        $('.pagination-circle').removeClass('target'); // targetクラスを削除
        $(".pagination-circle:nth-of-type(" + pagiNation + ")").addClass('target'); // 現在のボタンにtargetクラスを追加
    };

    $('.js-btn-next').click(function () {
        if (slideCurrent === lastCurrent) { // 現在のスライドが最終スライドの場合
        slideCurrent = 0;
        changeslide(); // スライド初期値の値を代入して関数実行（初めのスライドに戻す）
        } else {
        slideCurrent++;
        changeslide(); // そうでなければスライド番号を増やして（次のスライドに切り替え）関数実行
        };
    });
    　// BACKボタン
    $('.js-btn-back').click(function () {
        if (slideCurrent === 0) { // 現在のスライドが初期スライドの場合
        slideCurrent = lastCurrent;
        changeslide(); // 最終スライド番号を代入して関数実行（最後のスライドに移動）
        } else {
        slideCurrent--;
        changeslide(); // そうでなければスライド番号を減らして（前のスライドに切り替え）関数実行
        };
    });

});

$('.slider').slick({
    autoplay: true,//自動的に動き出すか。初期値はfalse。
    infinite: true,//スライドをループさせるかどうか。初期値はtrue。
    speed: 500,//スライドのスピード。初期値は300。
    slidesToShow: 3,//スライドを画面に3枚見せる
    slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
    prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
    nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
    centerMode: true,//要素を中央ぞろえにする
    variableWidth: true,//幅の違う画像の高さを揃えて表示
    dots: true,//下部ドットナビゲーションの表示
});