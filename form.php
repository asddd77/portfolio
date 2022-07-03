<?php
//var_dump($_POST);
// 変数の初期化
$page_flag = 0;
$clean = array();

// サニタイズ
if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	}
}

if( !empty($_POST['btn_confirm']) ) {

	$page_flag = 1;
} elseif ( !empty($_POST['btn_submit']) ) {

	$page_flag = 2;

    // 変数とタイムゾーンを初期化
	$auto_reply_subject = null;
	$auto_reply_text = null;
    $header = null;
    $admin_reply_subject = null;
	$admin_reply_text = null;
	date_default_timezone_set('Asia/Tokyo');

    // ヘッダー情報を設定
	$header = "MIME-Version: 1.0\n";
	$header .= "From: 浅田菜名\n";
	$header .= "Reply-To: 浅田菜名\n";

	// 件名を設定
	$auto_reply_subject = 'お問い合わせありがとうございます。';

	// 本文を設定
	$auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。送信が完了したことをご連絡致します。\n\n
    ご返信までしばらくお待ちくださいませ。";
	$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	$auto_reply_text .= "氏名：" . $_POST['your_name'] . "\n";
	$auto_reply_text .= "メールアドレス：" . $_POST['email'] . "\n";
    $auto_reply_text .= "お問い合わせ内容：" . nl2br($_POST['contact']) . "\n\n";
	$auto_reply_text .= "浅田菜名";

	// メール送信
	mb_send_mail( $_POST['email'], $auto_reply_subject, $auto_reply_text, $header);

    // 運営側へ送るメールの件名
	$admin_reply_subject = "お問い合わせを受け付けました";
	
	// 本文を設定
	$admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
	$admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	$admin_reply_text .= "氏名：" . $_POST['your_name'] . "\n";
	$admin_reply_text .= "メールアドレス：" . $_POST['email'] . "\n";
    $admin_reply_text .= "お問い合わせ内容：" . nl2br($_POST['contact']) . "\n\n";

	// 運営側へメール送信
	mb_send_mail( 'main.info.contact@asada-nana.main.jp', $admin_reply_subject, $admin_reply_text, $header);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
</head>
<body>
<h1>CONTACT</h1>

<?php if( $page_flag === 1 ): ?>

<form method="post" action="">
	<div class="element_wrap">
		<label>氏名</label>
		<p><?php echo $_POST['your_name']; ?></p>
	</div>
	<div class="element_wrap">
		<label>メールアドレス</label>
		<p><?php echo $_POST['email']; ?></p>
	</div>
    <div class="element_wrap otoiawase">
		<label>お問い合わせ内容</label>
		<br>
		<p><?php echo nl2br($_POST['contact']); ?></p>
	</div>
	<div class="element_wrap">
		<label>プライバシーポリシーに同意する</label>
		<p><?php if( $_POST['agreement'] === "1" ){ echo '同意する'; }
		else{ echo '同意しない'; } ?></p>
	</div>
	<input type="submit" name="btn_back" value="戻る">
	<input type="submit" name="btn_submit" value="送信">
	<input type="hidden" name="your_name" value="<?php echo $_POST['your_name']; ?>">
	<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
    <input type="hidden" name="contact" value="<?php echo $_POST['contact']; ?>">
	<input type="hidden" name="agreement" value="<?php echo $_POST['agreement']; ?>">
</form>

<?php elseif( $page_flag === 2 ): ?>
<p>送信が完了しました。</p>

<?php else: ?>
<form method="post" action="">
	<div class="element_wrap">
		<label>氏名</label>
		<input type="text" name="your_name" value="<?php if( !empty($_POST['your_name']) ){ echo $_POST['your_name']; } ?>" required>
	</div>
	<div class="element_wrap">
		<label>メールアドレス</label>
		<input type="text" name="email" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>" required>
	</div>
    <div class="element_wrap">
		<label>お問い合わせ内容</label>
		<textarea name="contact" required>
            <?php if( !empty($_POST['contact']) ){ echo $_POST['contact']; } ?>
        </textarea>
	</div>
	<div class="element_wrap">
		<label for="agreement">
            <input id="agreement" type="checkbox" name="agreement" value="1" <?php if( !empty($_POST['agreement']) && $_POST['agreement'] === "1" ){ echo 'checked'; } ?> required>プライバシーポリシーに同意する
        </label>
	</div>
	<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>
<?php endif; ?>
</body>
</html>