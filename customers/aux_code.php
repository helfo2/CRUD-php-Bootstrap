<?php
	function tirarAcentos($string){
	    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
	}

	function validarCPF($cpf){
		$cpf = preg_replace('/[^0-9]/', '', (string)$cpf);

		if(strlen($cpf) != 11) 
			return false;

		$invalidos = array('00000000000',
						'11111111111',
						'22222222222',
						'33333333333',
						'44444444444',
						'55555555555',
						'66666666666',
						'77777777777',
						'88888888888',
						'99999999999');
		
		if(in_array($cpf, $invalidos))
			return false;

		for($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
			$soma += $cpf{$i} * $j;

		$resto = $soma % 11;

		if($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
			return false;

		for($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
			$soma += $cpf{$i} * $j;

		$resto = $soma % 11;

		return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
	}

?>