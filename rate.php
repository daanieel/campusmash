<?php
// Rate orientado



require_once 'config.php';

$campusMASH = new arq_classes_campusMASH;

date_default_timezone_set('America/Sao_Paulo');

$data = date('Y-m-d H:i:s');


if ($_GET['winner'] && $_GET['loser']) {
	
	$verificaHash = $campusMASH->verificaHash($_GET['hash']);
	
	if($verificaHash==true){
		
		// Get objeto da vencedora
		$winner = $campusMASH->getImageById($_GET['winner']);
		
		// get objeto da perdedora
		$loser = $campusMASH->getImageById($_GET['loser']);
		
		//verifica AutoClick
		$verificaAuto = $campusMASH->blockAutoClicker($winner[0]->id);
		
		if($verificaAuto==true){
			// header de volta a index
			//echo "Ganho de Mais";exit;
			header('location: http://campusmash.com.br');exit;
		}
		
		//echo '<pre>';
		//print_r($winner);exit;
		
		// Updade score da ganhadora
		$winner_expected = $campusMASH->expected($loser->score, $winner->score);
		$winner_new_score = $campusMASH->win($winner->score, $winner_expected);
		$upWin = $campusMASH->updateScore($winner_new_score, 1, $winner[0]->id);
		
		// update score da perdedora
		$loser_expected = $campusMASH->expected($winner->score, $loser->score);
		$loser_new_score = $campusMASH->loss($loser->score, $loser_expected);
		$upLoser = $campusMASH->updateScore($loser_new_score, 0, $loser[0]->id);
		
		//insert battle no banco
		$insertBattle = $campusMASH->insertBattle($winner[0]->id, $loser[0]->id, $data);
		
		// header de volta a index
		//echo 'foi';exit;
		header('location: http://campusmash.com.br');
	
	 } else {
		// header de volta a index
		//echo 'Hash Invalida';exit;
		header('location: http://campusmash.com.br');
	}
	
}