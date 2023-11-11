<!DOCTYPE html>
<html>
<head>
	<title>I-Ching</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
		<a class="navbar-brand" href="#">
			<h1>I-Ching</h1>
			<center>O Livro das Mutações</center>
		</a>	  
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>	  
		<div class="collapse navbar-collapse" id="navbarNav">
		
		</div>	  
    </div>	
  </nav>	
  <div class="container mt-4">    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Qual a sua questão?<br>
        <input type="text" name="inputString" placeholder="">
        <input type="submit" name="submitButton" value="Consultar">
    </form>

<?php

// Main
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber a string do campo de entrada
    $inputString = $_POST["inputString"] ?? "";

    if (empty($inputString)) {
        echo '<p style="color: red;">Sem uma questão não pode existir uma resposta.</p>';
    } else {		
		fBusca($inputString);
	}
}


function fBusca($str) {
	include_once "hexs.php";
	$Coin = $C1 = $C2 = $C3 = $conta = 0;
	$intLinha = array();
	$logic_linha = array();
	$SelectHex = "";

	$SelectHex = $_POST['inputString'] . "\r\n\r\n";
	
	// Consulta
	for ($conta = 1; $conta <= 6; $conta++) {
		$C1 = rand(0, 10);
		if ($C1 == 0 || $C1 == 2 || $C1 == 4 || $C1 == 6 || $C1 == 8 || $C1 == 10) {
			$C1 = 2;
		} else if ($C1 == 1 || $C1 == 3 || $C1 == 5 || $C1 == 7 || $C1 == 9 || $C1 == 11) {
			$C1 = 3;
		}
	
		$C2 = rand(0, 10);
		if ($C2 == 0 || $C2 == 2 || $C2 == 4 || $C2 == 6 || $C2 == 8 || $C2 == 10) {
			$C2 = 2;
		} else if ($C2 == 1 || $C2 == 3 || $C2 == 5 || $C2 == 7 || $C2 == 9 || $C2 == 11) {
			$C2 = 3;
		}
	
		$C3 = rand(0, 10);
		if ($C3 == 0 || $C3 == 2 || $C3 == 4 || $C3 == 6 || $C3 == 8 || $C3 == 10) {
			$C3 = 2;
		} else if ($C3 == 1 || $C3 == 3 || $C3 == 5 || $C3 == 7 || $C3 == 9 || $C3 == 11) {
			$C3 = 3;
		}
	
		$Coin = $C1 + $C2 + $C3;
	
		switch ($Coin) {
			case 6:
				$intLinha[$conta] = 2;
				$logic_linha[$conta] = 6;
				//$SelectHex .= "6 - -<br>";
				break;
			case 7:
				$intLinha[$conta] = 1;
				$logic_linha[$conta] = 7;
				//$SelectHex .= "7 ---<br>";
				break;
			case 8:
				$intLinha[$conta] = 2;
				$logic_linha[$conta] = 8;
				//$SelectHex .= "8 - -<br>";
				break;
			case 9:
				$intLinha[$conta] = 1;
				$logic_linha[$conta] = 9;
				//$SelectHex .= "9 ---<br>";
				break;
		}
	}
	
	// Teste de Hexagrama 1
	if ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		echo '1. CH´IEN / O CRIATIVO';
		$CartaPicture = 'hexa (1).jpg';
		
		if ($logic_linha[1] == 9 && $logic_linha[2] == 9 && $logic_linha[3] == 9 && $logic_linha[4] == 9 && $logic_linha[5] == 9 && $logic_linha[6] == 9) {
			$SelectHex .= $Hexagrama1[7];
			$SelectHex .= $Hexagrama1[8];
			$SelectHex .= $Hexagrama1[9];
			$SelectHex .= $Hexagrama1[10];
		} else {
			for ($conta = 1; $conta <= 6; $conta++) {
				if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
					$SelectHex .= $Hexagrama1[$conta];
				}
			}
			$SelectHex .= $Hexagrama1[8];
			$SelectHex .= $Hexagrama1[9];
			$SelectHex .= $Hexagrama1[10];
		}
	} 
	
	// Teste de Hexagrama 2
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		echo '2. K´UN / O RECEPTIVO';
		$CartaPicture = 'hexa (2).jpg';
		
		if ($logic_linha[1] == 6 && $logic_linha[2] == 6 && $logic_linha[3] == 6 && $logic_linha[4] == 6 && $logic_linha[5] == 6 && $logic_linha[6] == 6) {
			$SelectHex .= $Hexagrama2[7];
			$SelectHex .= $Hexagrama2[8];
			$SelectHex .= $Hexagrama2[9];
			$SelectHex .= $Hexagrama2[10];
		} else {
			for ($conta = 1; $conta <= 6; $conta++) {
				if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
					$SelectHex .= $Hexagrama2[$conta];
				}
			}
			$SelectHex .= $Hexagrama2[8];
			$SelectHex .= $Hexagrama2[9];
			$SelectHex .= $Hexagrama2[10];
		}
	} 
	
	// Teste de Hexagrama 3
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		echo '3. CHUN / DIFICULDADE INICIAL';
		$CartaPicture = 'hexa (3).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama3[$conta];
			}
		}
		$SelectHex .= $Hexagrama3[8];
		$SelectHex .= $Hexagrama3[9];
		$SelectHex .= $Hexagrama3[10];
	} 
	
	// Teste de Hexagrama 4
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		echo '4. MENG / A INSENSATEZ JUVENIL';
		$CartaPicture = 'hexa (4).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama4[$conta];
			}
		}
		$SelectHex .= $Hexagrama4[8];
		$SelectHex .= $Hexagrama4[9];
		$SelectHex .= $Hexagrama4[10];
	}
	
	// Teste de Hexagrama 5
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '5. HSU / A ESPERA (NUTRIÇÃO)';    
		$CartaPicture = 'hexa (5).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama5[$conta];
			}
		}
		$SelectHex .= $Hexagrama5[8];
		$SelectHex .= $Hexagrama5[9];
		$SelectHex .= $Hexagrama5[10];
	}
	
	// Teste de Hexagrama 6
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '6. SUNG / CONFLITO';    
		$CartaPicture = 'hexa (6).jpg';
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama6[$conta];
			}
		}
		$SelectHex .= $Hexagrama6[8];
		$SelectHex .= $Hexagrama6[9];
		$SelectHex .= $Hexagrama6[10];
	}

	// Teste de Hexagrama 7
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '7. SHIH / O EXÉRCITO';    
		$CartaPicture = 'hexa (7).jpg';
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama7[$conta];
			}
		}
		$SelectHex .= $Hexagrama7[8];
		$SelectHex .= $Hexagrama7[9];
		$SelectHex .= $Hexagrama7[10];
	}

	// Teste de Hexagrama 8
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '8. PI / MANTER-SE UNIDO (SOLIDARIEDADE)';		
		$CartaPicture = 'hexa (8).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama8[$conta];
			}
		}
		$SelectHex .= $Hexagrama8[8];
		$SelectHex .= $Hexagrama8[9];
		$SelectHex .= $Hexagrama8[10];
	}

	// Teste de Hexagrama 9
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '9. HSIAO CH´U / O PODER DE DOMAR DO PEQUENO';		
		$CartaPicture = 'hexa (9).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama9[$conta];
			}
		}
		$SelectHex .= $Hexagrama9[8];
		$SelectHex .= $Hexagrama9[9];
		$SelectHex .= $Hexagrama9[10];
	}
	
	// Teste de Hexagrama 10
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '10. LU / A CONDUTA (TRILHAR)';
		
		$CartaPicture = 'hexa (10).jpg';
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama10[$conta];
			}
		}
		$SelectHex .= $Hexagrama10[8];
		$SelectHex .= $Hexagrama10[9];
		$SelectHex .= $Hexagrama10[10];
	}

	// Teste de Hexagrama 11
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '11. T´AI / PAZ';		
		$CartaPicture = 'hexa (11).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama11[$conta];
			}
		}
		$SelectHex .= $Hexagrama11[8];
		$SelectHex .= $Hexagrama11[9];
		$SelectHex .= $Hexagrama11[10];
	}

	// Teste de Hexagrama 12
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '12. PI / ESTAGNAÇÃO';		
		$CartaPicture = 'hexa (12).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama12[$conta];
			}
		}
		$SelectHex .= $Hexagrama12[8];
		$SelectHex .= $Hexagrama12[9];
		$SelectHex .= $Hexagrama12[10];
	}

	// Teste de Hexagrama 13
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '13. TUNG JÊN / COMUNIDADE COM OS HOMENS';		
		$CartaPicture = 'hexa (13).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama13[$conta];
			}
		}
		$SelectHex .= $Hexagrama13[8];
		$SelectHex .= $Hexagrama13[9];
		$SelectHex .= $Hexagrama13[10];
	}

	// Teste de Hexagrama 14
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '14. TA YU / GRANDES POSSES';		
		$CartaPicture = 'hexa (14).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama14[$conta];
			}
		}
		$SelectHex .= $Hexagrama14[8];
		$SelectHex .= $Hexagrama14[9];
		$SelectHex .= $Hexagrama14[10];
	}

	// Teste de Hexagrama 15
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '15. CH´IEN / MODÉSTIA';		
		$CartaPicture = 'hexa (15).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama15[$conta];
			}
		}
		$SelectHex .= $Hexagrama15[8];
		$SelectHex .= $Hexagrama15[9];
		$SelectHex .= $Hexagrama15[10];
	}

	// Teste de Hexagrama 16
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '16. YU / ENTUSIASMO';		
		$CartaPicture = 'hexa (16).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama16[$conta];
			}
		}
		$SelectHex .= $Hexagrama16[8];
		$SelectHex .= $Hexagrama16[9];
		$SelectHex .= $Hexagrama16[10];
	}

	// Teste de Hexagrama 17
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '17.SUI / SEGUIR';		
		$CartaPicture = 'hexa (17).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama17[$conta];
			}
		}
		$SelectHex .= $Hexagrama17[8];
		$SelectHex .= $Hexagrama17[9];
		$SelectHex .= $Hexagrama17[10];
	}

	// Teste de Hexagrama 18
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '18. KU / TRABALHO SOBRE O QUE SE DETERIOROU';		
		$CartaPicture = 'hexa (18).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama18[$conta];
			}
		}
		$SelectHex .= $Hexagrama18[8];
		$SelectHex .= $Hexagrama18[9];
		$SelectHex .= $Hexagrama18[10];
	}

	// Teste de Hexagrama 19
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '19. LIN / APROXIMAÇÃO';		
		$CartaPicture = 'hexa (19).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama19[$conta];
			}
		}
		$SelectHex .= $Hexagrama19[8];
		$SelectHex .= $Hexagrama19[9];
		$SelectHex .= $Hexagrama19[10];
	}

	// Teste de Hexagrama 20
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '20. KUAN / CONTEMPLAÇÃO (A VISTA)';		
		$CartaPicture = 'hexa (20).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama20[$conta];
			}
		}
		$SelectHex .= $Hexagrama20[8];
		$SelectHex .= $Hexagrama20[9];
		$SelectHex .= $Hexagrama20[10];
	}

	// Teste de Hexagrama 21
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '21.SHIH HO / MORDER';		
		$CartaPicture = 'hexa (21).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama21[$conta];
			}
		}
		$SelectHex .= $Hexagrama21[8];
		$SelectHex .= $Hexagrama21[9];
		$SelectHex .= $Hexagrama21[10];
	}

	// Teste de Hexagrama 22
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '22. PI / GRACIOSIDADE (BELEZA)';		
		$CartaPicture = 'hexa (22).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama22[$conta];
			}
		}
		$SelectHex .= $Hexagrama22[8];
		$SelectHex .= $Hexagrama22[9];
		$SelectHex .= $Hexagrama22[10];
	}

	// Teste de Hexagrama 23
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '23. PO / DESINTEGRAÇÃO';		
		$CartaPicture = 'hexa (23).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama23[$conta];
			}
		}
		$SelectHex .= $Hexagrama23[8];
		$SelectHex .= $Hexagrama23[9];
		$SelectHex .= $Hexagrama23[10];
	}
	
	// Teste de Hexagrama 24
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '24. FU / RETORNO (O PONTO DE TRANSIÇÃO)';		
		$CartaPicture = 'hexa (24).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama24[$conta];
			}
		}
		$SelectHex .= $Hexagrama24[8];
		$SelectHex .= $Hexagrama24[9];
		$SelectHex .= $Hexagrama24[10];
	}

	// Teste de Hexagrama 25
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '25. WU WANG / INOCÊNCIA (INESPERADO)';		
		$CartaPicture = 'hexa (25).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama25[$conta];
			}
		}
		$SelectHex .= $Hexagrama25[8];
		$SelectHex .= $Hexagrama25[9];
		$SelectHex .= $Hexagrama25[10];
	}

	// Teste de Hexagrama 26
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '26. TA CH´U / O PODER DE DOMAR DO GRANDE';    
		$CartaPicture = 'hexa (26).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama26[$conta];
			}
		}
		$SelectHex .= $Hexagrama26[8];
		$SelectHex .= $Hexagrama26[9];
		$SelectHex .= $Hexagrama26[10];
	}

	// Teste de Hexagrama 27
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '27. I / AS BORDAS DA BOCA (PROVER ALIMENTO)';		
		$CartaPicture = 'hexa (27).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama27[$conta];
			}
		}
		$SelectHex .= $Hexagrama27[8];
		$SelectHex .= $Hexagrama27[9];
		$SelectHex .= $Hexagrama27[10];
	}

	// Teste de Hexagrama 28
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '28. TA KUO / PREPONDERÂNCIA DO GRANDE';		
		$CartaPicture = 'hexa (28).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama28[$conta];
			}
		}
		$SelectHex .= $Hexagrama28[8];
		$SelectHex .= $Hexagrama28[9];
		$SelectHex .= $Hexagrama28[10];
	}

	// Teste de Hexagrama 29
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '29. K´AN / O ABISMAL (ÁGUA)';		
		$CartaPicture = 'hexa (29).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama29[$conta];
			}
		}
		$SelectHex .= $Hexagrama29[8];
		$SelectHex .= $Hexagrama29[9];
		$SelectHex .= $Hexagrama29[10];
	}

	// Teste de Hexagrama 30
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '30. LI / ADERIR (FOGO)';		
		$CartaPicture = 'hexa (30).jpg';
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama30[$conta];
			}
		}
		$SelectHex .= $Hexagrama30[8];
		$SelectHex .= $Hexagrama30[9];
		$SelectHex .= $Hexagrama30[10];
	}

	// Teste de Hexagrama 31
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '31. HSIEN / A INFLUÊNCIA (CORTEJAR)';		
		$CartaPicture = 'hexa (31).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama31[$conta];
			}
		}
		$SelectHex .= $Hexagrama31[8];
		$SelectHex .= $Hexagrama31[9];
		$SelectHex .= $Hexagrama31[10];
	}

	// Teste de Hexagrama 32
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '32. HENG / DURAÇÃO';		
		$CartaPicture = 'hexa (32).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama32[$conta];
			}
		}
		$SelectHex .= $Hexagrama32[8];
		$SelectHex .= $Hexagrama32[9];
		$SelectHex .= $Hexagrama32[10];
	}

	// Teste de Hexagrama 33
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '33. TUN / A RETIRADA';		
		$CartaPicture = 'hexa (33).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama33[$conta];
			}
		}
		$SelectHex .= $Hexagrama33[8];
		$SelectHex .= $Hexagrama33[9];
		$SelectHex .= $Hexagrama33[10];
	}

	// Teste de Hexagrama 34
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '34. TA CHUANG / O PODER DO GRANDE';		
		$CartaPicture = 'hexa (34).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama34[$conta];
			}
		}
		$SelectHex .= $Hexagrama34[8];
		$SelectHex .= $Hexagrama34[9];
		$SelectHex .= $Hexagrama34[10];
	}

	// Teste de Hexagrama 35
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '35. CHIN / PROGRESSO';		
		$CartaPicture = 'hexa (35).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama35[$conta];
			}
		}
		$SelectHex .= $Hexagrama35[8];
		$SelectHex .= $Hexagrama35[9];
		$SelectHex .= $Hexagrama35[10];
	}

	// Teste de Hexagrama 36
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '36. MING I / OBSCURECIMENTO DA LUZ';		
		$CartaPicture = 'hexa (36).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama36[$conta];
			}
		}
		$SelectHex .= $Hexagrama36[8];
		$SelectHex .= $Hexagrama36[9];
		$SelectHex .= $Hexagrama36[10];
	}

	// Teste de Hexagrama 37
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '37. CHIA JEN / A FAMÍLIA';		
		$CartaPicture = 'hexa (37).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama37[$conta];
			}
		}
		$SelectHex .= $Hexagrama37[8];
		$SelectHex .= $Hexagrama37[9];
		$SelectHex .= $Hexagrama37[10];
	}

	// Teste de Hexagrama 38
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '38. K´UEI / OPOSIÇÃO';		
		$CartaPicture = 'hexa (38).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama38[$conta];
			}
		}
		$SelectHex .= $Hexagrama38[8];
		$SelectHex .= $Hexagrama38[9];
		$SelectHex .= $Hexagrama38[10];
	}

	// Teste de Hexagrama 39
	if ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '39. CHIEN / OBSTRUÇÃO';		
		$CartaPicture = 'hexa (39).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama39[$conta];
			}
		}
		$SelectHex .= $Hexagrama39[8];
		$SelectHex .= $Hexagrama39[9];
		$SelectHex .= $Hexagrama39[10];
	}

	// Teste de Hexagrama 40
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '40. HSIEH / LIBERAÇÃO';		
		$CartaPicture = 'hexa (40).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama40[$conta];
			}
		}
		$SelectHex .= $Hexagrama40[8];
		$SelectHex .= $Hexagrama40[9];
		$SelectHex .= $Hexagrama40[10];
	}

	// Teste de Hexagrama 41
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '41. SUN / DIMINUIÇÃO';		
		$CartaPicture = 'hexa (41).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama41[$conta];
			}
		}
		$SelectHex .= $Hexagrama41[8];
		$SelectHex .= $Hexagrama41[9];
		$SelectHex .= $Hexagrama41[10];
	}

	// Teste de Hexagrama 42
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '42. I / AUMENTO';		
		$CartaPicture = 'hexa (42).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama42[$conta];
			}
		}
		$SelectHex .= $Hexagrama42[8];
		$SelectHex .= $Hexagrama42[9];
		$SelectHex .= $Hexagrama42[10];
	}

	// Teste de Hexagrama 43
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '43. KUAI / IRROMPER (A DETERMINAÇÃO)';		
		$CartaPicture = 'hexa (43).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama43[$conta];
			}
		}
		$SelectHex .= $Hexagrama43[8];
		$SelectHex .= $Hexagrama43[9];
		$SelectHex .= $Hexagrama43[10];
	}

	// Teste de Hexagrama 44
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '44. KOU / VIR AO ENCONTRO';		
		$CartaPicture = 'hexa (44).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama44[$conta];
			}
		}
		$SelectHex .= $Hexagrama44[8];
		$SelectHex .= $Hexagrama44[9];
		$SelectHex .= $Hexagrama44[10];
	}

	// Teste de Hexagrama 45
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '45. TS´UI / REUNIÃO';		
		$CartaPicture = 'hexa (45).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama45[$conta];
			}
		}
		$SelectHex .= $Hexagrama45[8];
		$SelectHex .= $Hexagrama45[9];
		$SelectHex .= $Hexagrama45[10];
	}

	// Teste de Hexagrama 46
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '46. SHÊNG / ASCENSÃO';		
		$CartaPicture = 'hexa (46).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama46[$conta];
			}
		}
		$SelectHex .= $Hexagrama46[8];
		$SelectHex .= $Hexagrama46[9];
		$SelectHex .= $Hexagrama46[10];
	}

	// Teste de Hexagrama 47
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '47. K´UN / OPRESSÃO (A EXAUSTÃO)';		
		$CartaPicture = 'hexa (47).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama47[$conta];
			}
		}
		$SelectHex .= $Hexagrama47[8];
		$SelectHex .= $Hexagrama47[9];
		$SelectHex .= $Hexagrama47[10];
	}

	// Teste de Hexagrama 48
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '48. CHING / O POÇO';		
		$CartaPicture = 'hexa (48).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama48[$conta];
			}
		}
		$SelectHex .= $Hexagrama48[8];
		$SelectHex .= $Hexagrama48[9];
		$SelectHex .= $Hexagrama48[10];
	}

	// Teste de Hexagrama 49
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '49. KO / REVOLUÇÃO';		
		$CartaPicture = 'hexa (49).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama49[$conta];
			}
		}
		$SelectHex .= $Hexagrama49[8];
		$SelectHex .= $Hexagrama49[9];
		$SelectHex .= $Hexagrama49[10];
	}

	// Teste de Hexagrama 50
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '50. TING / O CALDEIRÃO';		
		$CartaPicture = 'hexa (50).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama50[$conta];
			}
		}
		$SelectHex .= $Hexagrama50[8];
		$SelectHex .= $Hexagrama50[9];
		$SelectHex .= $Hexagrama50[10];
	}

	// Teste de Hexagrama 51
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '51. CHÊN / O INCITAR (COMOÇÃO, TROVÃO)';		
		$CartaPicture = 'hexa (51).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama51[$conta];
			}
		}
		$SelectHex .= $Hexagrama51[8];
		$SelectHex .= $Hexagrama51[9];
		$SelectHex .= $Hexagrama51[10];
	}

	// Teste de Hexagrama 52
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '52. KÊN / A QUIETUDE (MONTANHA)';		
		$CartaPicture = 'hexa (52).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama52[$conta];
			}
		}
		$SelectHex .= $Hexagrama52[8];
		$SelectHex .= $Hexagrama52[9];
		$SelectHex .= $Hexagrama52[10];
	}

	// Teste de Hexagrama 53
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '53. CHIEN / DESENVOLVIMENTO (PROGRESSO GRADUAL)';		
		$CartaPicture = 'hexa (53).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama53[$conta];
			}
		}
		$SelectHex .= $Hexagrama53[8];
		$SelectHex .= $Hexagrama53[9];
		$SelectHex .= $Hexagrama53[10];
	}

	// Teste de Hexagrama 54
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '54. KUEI MEI / A JOVEM QUE SE CASA';		
		$CartaPicture = 'hexa (54).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama54[$conta];
			}
		}
		$SelectHex .= $Hexagrama54[8];
		$SelectHex .= $Hexagrama54[9];
		$SelectHex .= $Hexagrama54[10];
	}

	// Teste de Hexagrama 55
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '55. FÊNG / ABUNDÂNCIA (PLENITUDE)';		
		$CartaPicture = 'hexa (55).jpg';		
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama55[$conta];
			}
		}
		$SelectHex .= $Hexagrama55[8];
		$SelectHex .= $Hexagrama55[9];
		$SelectHex .= $Hexagrama55[10];
	}

	// Teste de Hexagrama 56
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '56. LÜ / O VIAJANTEO';		
		$CartaPicture = 'hexa (56).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama56[$conta];
			}
		}
		$SelectHex .= $Hexagrama56[8];
		$SelectHex .= $Hexagrama56[9];
		$SelectHex .= $Hexagrama56[10];
	}

	// Teste de Hexagrama 57
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '57. SUN / A SUAVIDADE (O PENETRANTE, VENTO)';		
		$CartaPicture = 'hexa (57).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama57[$conta];
			}
		}
		$SelectHex .= $Hexagrama57[8];
		$SelectHex .= $Hexagrama57[9];
		$SelectHex .= $Hexagrama57[10];
	}

	// Teste de Hexagrama 58
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '58. TUI / ALEGRIA (LAGO)O';		
		$CartaPicture = 'hexa (58).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama58[$conta];
			}
		}
		$SelectHex .= $Hexagrama58[8];
		$SelectHex .= $Hexagrama58[9];
		$SelectHex .= $Hexagrama58[10];
	}

	// Teste de Hexagrama 59
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '59. HUAN / DISPERSÃO (DISSOLUÇÃO)';		
		$CartaPicture = 'hexa (59).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama59[$conta];
			}
		}
		$SelectHex .= $Hexagrama59[8];
		$SelectHex .= $Hexagrama59[9];
		$SelectHex .= $Hexagrama59[10];
	}

	// Teste de Hexagrama 60
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '60. CHIEH / LIMITAÇÃO';		
		$CartaPicture = 'hexa (60).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama60[$conta];
			}
		}
		$SelectHex .= $Hexagrama60[8];
		$SelectHex .= $Hexagrama60[9];
		$SelectHex .= $Hexagrama60[10];
	}

	// Teste de Hexagrama 61
	elseif ($intLinha[1] == 1 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 1) {
		$Titulo = '61. CHUNG FU / VERDADE INTERIOR';		
		$CartaPicture = 'hexa (61).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama61[$conta];
			}
		}
		$SelectHex .= $Hexagrama61[8];
		$SelectHex .= $Hexagrama61[9];
		$SelectHex .= $Hexagrama61[10];
	}

	// Teste de Hexagrama 62
	elseif ($intLinha[1] == 2 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 2) {
		$Titulo = '62. HSIAO KUO / A PREPONDERÂNCIA DO PEQUENO';		
		$CartaPicture = 'hexa (62).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama62[$conta];
			}
		}
		$SelectHex .= $Hexagrama62[8];
		$SelectHex .= $Hexagrama62[9];
		$SelectHex .= $Hexagrama62[10];
	}

	// Teste de Hexagrama 63
	elseif ($intLinha[1] == 2 && $intLinha[2] == 1 && $intLinha[3] == 2 && $intLinha[4] == 1 && $intLinha[5] == 2 && $intLinha[6] == 1) {
		$Titulo = '63. CHI CHI / APÓS A CONCLUSÃO';		
		$CartaPicture = 'hexa (63).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama63[$conta];
			}
		}
		$SelectHex .= $Hexagrama63[8];
		$SelectHex .= $Hexagrama63[9];
		$SelectHex .= $Hexagrama63[10];
	}

	// Teste de Hexagrama 64
	elseif ($intLinha[1] == 1 && $intLinha[2] == 2 && $intLinha[3] == 1 && $intLinha[4] == 2 && $intLinha[5] == 1 && $intLinha[6] == 2) {
		$Titulo = '64. WEI CHI / ANTES DA CONCLUSÃO';		
		$CartaPicture = 'hexa (64).jpg';
		
		for ($conta = 1; $conta <= 6; $conta++) {
			if ($logic_linha[$conta] == 6 || $logic_linha[$conta] == 9) {
				$SelectHex .= $Hexagrama64[$conta];
			}
		}
		$SelectHex .= $Hexagrama64[8];
		$SelectHex .= $Hexagrama64[9];
		$SelectHex .= $Hexagrama64[10];
	}
	
// Resultado
echo"<div class='container'>
        <div class='row'>
            <div class='col-sm-6'>".
                $SelectHex. 
            "</div>
            <div class='col-sm-6'>
               <img width='100%' src='cards/" . $CartaPicture . "' >
            </div>
        </div>
    </div>";
}

?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


 
 
  
 
 
 