<?php
$flashMessages = Yii::$app->session->getAllFlashes();
if ( $flashMessages ) {
?>
	<div class="flash-messagesBox">
		<div class="flash-messagesClose"><i class="fa fa-close"></i></div>
		<div class="flash-messages">
<?php
    foreach ($flashMessages as $key => $message) {
?>
		<div class="flash-message <?= $key; ?>">
			<p><?= $message; ?></p>
		</div>
<?php        
    }
?>
		</div>
	</div>
<?php
}
?>