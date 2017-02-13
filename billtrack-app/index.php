<!DOCTYPE html>
<html>
<head>
<?php include('config.php'); ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic,900,900italic,400italic" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet" type="text/css">	
	<link rel="stylesheet" type='text/css' href="reset.css" />
	<link rel="stylesheet" type='text/css' href="style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.4.1/list.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
	<!--list init-->
	<script src="<?php echo $billtrackpath; ?>"></script>
	<!--the rest of the js-->
	<script src="sessiontool.js"></script>
	
	<title><?php echo $title; ?></title>
</head>

<body>
<div id="bills">
<div id="updatelist">
	<header>
	<h1><?php echo $htmltitle; ?></h1>
	<div id="the-selects">
	<!--Dropdown menu for topics-->
		<select id="select1" class="search">
    		<option value=" ">Select Topic ↓</option>
    		<?php for($i=0;$i<count($topics_array);$i++) { echo '<option value="' . $topics_array[$i] . '">' . $topics_array[$i] .'</option>';} ?>
		</select>
	<!--Dropdown menu for bills-->	
		<select id="select2" class="search" >
		<?php echo file_get_contents($bills_path); ?>
		</select>
	</div>
	<div id="search-sort">
		<!--Search box-->	
		<input type="text" class="search" placeholder="Search" />
		<button class="clear-search">Clear</button> 
		<!--Sort by date button-->
		<button class="sort" data-sort="date">Sort by date</button> 
	</div>
	</header>
	<ul class="list">
	</ul>
</div>
<p id="version">&copy; <?php echo date('Y'); ?> <?php echo $org; ?> &bull; version 0.5</p>
</div>
</body>
</html>