<?php
	require_once 'config.php';
	
	$campusMASH = new arq_classes_campusMASH;
	
	$images = $campusMASH->getRand();
	
	$imagesTops = $campusMASH->getTop10();
	
		
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CampusMASH</title>
<style type="text/css">
body, html {font-family: 'Open Sans', sans-serif;width:100%;margin:0;padding:0;text-align:center;}
h1 {background-color:#600;color:#fff;padding:20px 0;margin:0;}
a img {border:0;}
td {font-size:11px;}
.image {background-color:#eee;border:1px solid #ddd;border-bottom:1px solid #bbb;padding:5px;}
</style>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47199631-2', 'campusmash.com.br');
  ga('send', 'pageview');

</script>

</head>
<body>
 
<h1>CampusMASH <span><a style="color: rgb(55, 67, 252); font-size: 20px;" href="como_usar.php">#QueroParticipar</a></span> </h1>
<h3>Quer saber qual a geek mais gata da #CampusParty2014?.</h3>
<h2>Quem e mais quente? Clique para escolher.</h2>
<center>
<table>
 <tr>
  <td valign="top" class="image"><a href="rate.php?winner=<?=$images['1_instagram_id']?>&loser=<?=$images['2_instagram_id']?>&hash=<?=$images['hash']?>"><img src="<?=$images['1_instagram_url_standart']?>" width="300" height="300" /></a></td>
  <td align="center" valign="middle"><h3>ou</h3></td>
  <td valign="top" class="image"><a href="rate.php?winner=<?=$images['2_instagram_id']?>&loser=<?=$images['1_instagram_id']?>&hash=<?=$images['hash']?>"><img src="<?=$images['2_instagram_url_standart']?>" width="300" height="300" /></a></td>
 </tr>
 <tr>
  <td>Ganho: <?=$images['1_wins']?>, Perdeu: <?=$images['1_losses']?></td>
  <td align="center" valign="middle"></td>
  <td>Ganho: <?=$images['2_wins']?>, Perdeu: <?=$images['2_losses']?></td>
 </tr>
</table>
</center>
<h2>#Top10Campuseira</h2>
<center>
<table>
 <tr>
  <? foreach($imagesTops as $key => $image) : ?>
  <td valign="top"><a target="_blank" href="<?=$image->instagram_link?>"><img src="<?=$image->instagram_url_low?>" width="100" height="100" /></a></td>
  <? endforeach ?>
 </tr>

</table>
</center>

<hr style="margin-top: 30px">
<footer style="margin: 10px">
	<a href="index.php">Inicio</a> - <a href="como_usar.php">Como participar</a> - <a href="creditos.php">Creditos</a>
</footer>
</body>
</html>
	
	