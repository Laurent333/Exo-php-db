<?php
include_once( 'config/global.php' );
include_once( 'sources/articles/articles.php' );
include_once( 'sources/commentaires/commentaires.php' );
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>PHP - PHP-MySQL</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="page">
		<div id="header">
			<?php include( 'header.inc.php' ); ?>
		</div>	
		<div id="col_left">
        	<?php include( 'menu.inc.php' ); ?>
		</div>
		
		<div id="col_right">
			<?php
			switch( $page ){
				
				case 'home' : include( 'view/home.php' ); break;
				
				case 'articleform' : include( 'view/articleform.php' ); break;
				
				default : include( 'view/home.php' ); break;	
				
			}
			?>
		</div>
	
		<div id="bas_page">	
		</div>
	</div>
<div id="footer">
	<?php include( 'footer.inc.php' ); ?>
</div>
</body>
</html>