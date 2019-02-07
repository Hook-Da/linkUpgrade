<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF8">
	<title>New Links</title>
	<link href="<?=URL?>public/img/duckduckgo.com.ico" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/style.css">
</head>
<body>
	<header class="mainHeader">
		<nav>
			<ul>
				<li><button class="btn">+ Theme</button></li>
				<li><button class="btn">+ Popular</button></li>
				<li><button class="btn">+ New Link</button></li>
				<li><button id="time"></button></li>
			</ul>
		</nav>
	</header>
	<div class="container">
		<div class="child">
			<?php
				foreach ($popular as $link => $value) {
					$valueName = str_replace('_', ' ', $value->name);
					echo '<div><a href="'.$value->link.'" target="_blank"><img src="'.URL.'public/img/'.$value->img.'"><div>'.$valueName.'</div></a></div>';
				}
			?>
		</div>
		<div id="secondCol" class="child">
			<?php
				foreach($links as $item => $rules)
			{
				echo '<div class="selects"><div class="title"><span class="deleteUpdate">'.$item.':</span><button class="buttonSel">Go to</button></div><select>';
				foreach($rules as $rule )
				{
					echo '<option value="'.$rule->link.'">'.$rule->description.'</option>';
				}
				echo "</select></div>";
			}
			?>
		</div>
	</div>
<script type="text/javascript" src="<?=URL?>public/js/js.js"></script>
</body>
</html>