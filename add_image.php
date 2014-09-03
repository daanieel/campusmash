<?php



	require 'arq/classes/instagram.php';
	
	require_once 'config.php';
	
	$campusMASH = new arq_classes_campusMASH;
	
	// Setup class
      $instagram = new Instagram(array(
        'apiKey'      => 'fd0df113d18d4cf1a7fa487e765a1021',
        'apiSecret'   => 'd1301f9d084c4e769880290f9e3ff25a',
        'apiCallback' => 'http://geniusparty.com.br/instagram/PHP-API/example/success.php' // must point to success.php
      ));
      
      // Display the login button
      $loginUrl = $instagram->getLoginUrl(array(
											  'basic',
											  'likes',
											  'comments',
											  'relationships'
											));
    // functions
    if($_GET['fun']){
	    
	    switch($_GET['fun']){
		    
		    case 1: 
		    
		    	$dadosMedia = array (
						
						0 => $_GET['mediaID'],
						
						1 => $_GET['link'],
						
						2 => $_GET['imagem'],
						
						3 => $_GET['imagem_low'],
						
						4 => $_GET['user']
						
						);
						
				$addMediaBanco = $campusMASH->addMediaBanco($dadosMedia);
				
				if ($addMediaBanco){
					
					
					
				}
		    
		    break;
		    
		    case 2:
		    	
		    	$rejeitarMedia = $campusMASH->rejeitarMediaBanco($_GET['mediaID']);
		    	
		    	if ($rejeitarMedia){
					
					//echo 'Imagem Rejeitada';
					
				}
		    	
		    break;
		    
		    
		    
	    }
	    
    }

	$tag = 'sexygeek';
	
	// Get recently tagged media
	$media = $instagram->getTagMedia($tag);
	
	$tt = $campusMASH->blockAutoClicker(22);
	
	//echo '<pre>';
	//print_r($media);
	//echo '</pre>';
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CampusMASH</title>
<style type="text/css">
body, html {font-family:Arial, Helvetica, sans-serif;width:100%;margin:0;padding:0;text-align:center;}
h1 {background-color:#600;color:#fff;padding:20px 0;margin:0;}
a img {border:0;}
td {font-size:11px;}
.image {background-color:#eee;border:1px solid #ddd;border-bottom:1px solid #bbb;padding:5px;}
</style>
</head>
<body>
 
<h1>Add Foto Sistema</h1>
<h3>Quer saber qual a garota geek mais gata da #CampusParty2014?.</h3>

<? $teste = $campusMASH->getMediaTags($media); ?>

<hr style="margin-top: 30px">
<footer style="margin: 10px">
	<a href="index.php">Inicio</a> - <a href="como_usar.php">Como participar</a> - <a href="creditos.php">Creditos</a>
</footer>

</body>
</html>
	
	
	
	
	

