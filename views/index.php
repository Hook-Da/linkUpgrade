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
		<div class="wrapper">
		<nav id="navigation">
			<ul>
				<li><button>+ Theme</button></li>
				<li><button>+ Popular</button></li>
				<li><button>+ New Link</button></li>

			</ul>
			<ul>
				<li><button data-link="popular">Popular</button></li>
				<li><button data-link="links">Links</button></li>
			</ul>
		</nav>
	</div>
	</header>
	<div class="container" id="container">
		<div id="firstCol" class="child">
			<?php
				foreach ($popular as $link => $value) {
					$valueName = str_replace('_', ' ', $value->name);
					echo '<div class="outterDiv"><a href="'.$value->link.'" target="_blank"><img src="'.URL.'public/img/'.$value->img.'"><div>'.$valueName.'</div></a></div>';
				}
			?>
		</div>
		<div id="secondCol" class="child">
			<?php
				foreach($links as $item => $rules)
			{
				echo '<div class="selects"><div class="title"><span class="deleteUpdate">'.$item.':</span></div><select>';
				foreach($rules as $rule )
				{
					echo '<option value="'.$rule->link.'">'.$rule->description.'</option>';
				}
				echo "</select><button class='buttonSel'>Go to</button></div>";
			}
			?>
		</div>
	</div>
<script type="text/javascript" src="<?=URL?>public/js/axios.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/lastevent.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/deledit.js"></script>
<script type="text/javascript" src="<?=URL?>public/js/js.js"></script>
</body>
</html>