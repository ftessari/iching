# iching
I-Ching O Livro das Mutações, para consulta online.

![iching](https://github.com/ftessari/iching/assets/20548035/c0d01a68-9307-419c-a2db-32d9106e910f)

O código faz a verificação randômica do lançamento das 3 moedas, verificando sua condição binária e somando para saber se cada linha do trigrama será usada o descartada.  Em seguida forma o hexagrama.

<code>
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
  </code>

**Tradicionalmente**
Você deverá jogar juntamente as três moedas I-Ching por seis vezes seguidas. Cada arremesso vai formar uma das linhas do hexagrama do I Ching. As três vezes iniciais formarão o trigrama inferior e as três posteriores o trigrama superior.
O lado ‘yin’ da moeda I Ching é representado pela “coroa” (valor monetário) e tem valor 2. O lado ‘yang’ da moeda I Ching é representado pela “cara” (brasão ou figura) e recebe o valor 3. O valor da soma das moedas I Ching jogadas indicará a linha a ser formada. Todas as linhas com soma par são representadas de forma aberta (— —) e as com soma ímpar são representadas de forma fechada (——-).

**Os quatro resultados possíveis**
Três caras = Yang + Yang + Yang             = 3 + 3 + 3 = 9 = (—o—)
Duas caras e uma coroa = Yang + Yang + Yin  = 3 + 3 + 2 = 8 = (— —)
Duas coroas e uma cara = Yin + Yin + Yang   = 2 + 2 + 3 = 7 = (——-)
Três coroas = Yin + Yin + Yin               = 2 + 2 + 2 = 6 = (—x—)

O I-Ching mistura aleatoriedade, lógica e interpretação (criatividade).
