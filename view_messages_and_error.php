<?php if(!empty($_SESSION["success_message"])): ?>
	<div class="col-md-12">
		<div class="alert alert-success">
			<?php foreach($_SESSION["success_message"] as $message): ?>
				<p><?php echo $message; ?></p>
			<?php endforeach; ?>
		</div>
	</div>
	<?php unset($_SESSION["success_message"]); ?>
<?php elseif(!empty($_SESSION["error_message"])): ?>
	<div class="col-md-12">
		<div class="alert alert-danger">
			<?php foreach($_SESSION["error_message"] as $error): ?>
				<p><?php echo $error; ?></p>
			<?php endforeach; ?>
		</div>
	</div>
	<?php unset($_SESSION["error_message"]); ?>
<?php elseif(!empty($_SESSION["info_meesage"])): ?>
	<div class="col-md-12">
		<div class="alert alert-info">
			<?php foreach($_SESSION["info_meesage"] as $error): ?>
				<p><?php echo $error; ?></p>
			<?php endforeach; ?>
		</div>
	</div>
	<?php unset($_SESSION["info_meesage"]); ?>
<?php elseif(!empty($_SESSION["warning_meesage"])): ?>
	<div class="col-md-12">
		<div class="alert alert-warning">
			<?php foreach($_SESSION["warning_meesage"] as $error): ?>
				<p><?php echo $error; ?></p>
			<?php endforeach; ?>
		</div>
	</div>
	<?php unset($_SESSION["warning_meesage"]); ?>
<?php endif; ?>