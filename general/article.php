<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require_once ($connection_config);
	
	if (!isset($_GET['id'])){
		header("Location:$index_url");
	}
	$title = 'Administration page';
	// Storing all necessary files in arrays for further import
	$customScripts_array = array("loader.js");
	$customStylesheets_array = array("header.style.css", "loader.style.css");

	// Get strings from the database 
	// query string
	$sql = 'SELECT `title`,`content` FROM appletree_general.articles WHERE `id` = :id';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([':id' => $_GET['id']]);

	$result = $stmt->fetch();
	$title = $result['title'];
	// Loader gif
	$spinner_src = $imgs . "spinner.gif";
?>
<!DOCTYPE html>
<html>
<?php require_once($head_ldp); ?>
<body>
	<?php require_once($header_ldp); ?>
	<div id="loader_div" class="loader">
		<img src="<?=$spinner_src?>" alt="spinner">
	</div>
	<div class="container">
		<article style="overflow-wrap: break-word;">
			<div class="row">
				<h2 class="col my-5"><b><?= $title ?></b></h2>
			</div>
			<div class="row content" style="font-size: 2vw;">
				<div class="col">
					<p ><?= $result['content'] ?><p>
				</div>
			</div>
		</article>
		
	</div>
	

</body>
<!-- Importing jQuery, BootStrap's and custom scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function(){
		fix_loader("loader_div");
	})
</script>
<?php foreach ($customScripts_array as $value){	echo "<script src='$js$value'></script>".PHP_EOL; } ?>
</html>