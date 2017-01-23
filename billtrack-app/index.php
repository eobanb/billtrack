<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic,900,900italic,400italic" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet" type="text/css">	
	<link rel="stylesheet" type='text/css' href= "reset.css" />
	<link rel="stylesheet" type='text/css' href= "style-v4.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.4.1/list.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
	<!--list init, edit this-->
	<script src="/ipbs/billtrack/"></script>
	<!--the rest of the js-->
	<script src="sessiontoolv4.js"></script>
	
	<title>Bill Track - Indiana Public Media</title>
</head>

<body>
<div id="bills">
<div id="updatelist">
<header>
<h1><span>StateImpact Indiana</span> Bill Track</h1>

<div id="the-selects">
<!--Dropdown menu for topics-->
	<select id="select1" class="search">
    	<option value=" ">Select Topic ↓</option>
    	<option value="Pre-K">Pre-K</option>
    	<option value="Teacher-Pay">Teacher Pay</option>
    	<option value="Vouchers">School vouchers</option>
	</select>
<!--Dropdown menu for bills-->	
	<select id="select2" class="search" >
	<?php echo file_get_contents('https://indianapublicmedia.org/ipbs/bills/'); // edit this ?>
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

<!--The list-->
      <ul class="list">
      </ul>
</div>
<p id="version">&copy; <?php date_default_timezone_set('America/New_York'); echo date('Y'); ?> Indiana Public Media &bull; version 0.4</p>

</body>
</html>