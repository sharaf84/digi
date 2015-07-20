<?php
$flashMessages = Yii::$app->session->getAllFlashes();
if ( $flashMessages ) {
    foreach ($flashMessages as $key => $message) {
?>
	<div id="flash-message">
		<p class="<?= $key; ?>"><?= $message; ?></p>
	</div>
<?php        
    }
}
?>