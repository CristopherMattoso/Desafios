<?php
function questA() {
  $n = 100*rand(7, 15);

  $tabela1 = "<table class=\"tabela\"><tr><th>Fatias consumidas</th><th>Frequência</th></tr>";
  $classes1 = array("2 ⊢ 6", "6 ⊢ 10", "10 ⊢ 14", "14 ⊢ 18", "18 ⊢ 22");
  $freq1 = array(rand(1, 20), rand(1, 20), rand(1, 20), rand(1, 20), rand(1, 20));
  $fator = $n/($freq1[0] + $freq1[1] + $freq1[2] + $freq1[3] + $freq1[4]);
  $freq1[0] = round($freq1[0]*$fator);
  $freq1[1] = round($freq1[1]*$fator);
  $freq1[2] = round($freq1[2]*$fator);
  $freq1[3] = round($freq1[3]*$fator);
  $freq1[4] = $n - $freq1[0] - $freq1[1] - $freq1[2] - $freq1[3];
  for ($i = 0; $i < 5; $i++) {
    $tabela1 .= "<tr><td>$classes1[$i]</td><td>$freq1[$i]</td></tr>";
  }
  $tabela1 .= "</table>";

  $tabela2 = "<table class=\"tabela\"><tr><th>Sabor Mais Pedido</th><th>Frequência</th></tr>";
  $classes2 = array("Calabresa", "4 Queijos", "Portuguesa", "Frango com Catupiry", "Outros");
  $freq2 = array(rand(1, 20), rand(1, 20), rand(1, 20), rand(1, 20), rand(1, 20));
  $fator = $n/($freq2[0] + $freq2[1] + $freq2[2] + $freq2[3] + $freq2[4]);
  $freq2[0] = round($freq2[0]*$fator);
  $freq2[1] = round($freq2[1]*$fator);
  $freq2[2] = round($freq2[2]*$fator);
  $freq2[3] = round($freq2[3]*$fator);
  $freq2[4] = $n - $freq2[0] - $freq2[1] - $freq2[2] - $freq2[3];
  for ($i = 0; $i < 5; $i++) {
    $tabela2 .= "<tr><td>$classes2[$i]</td><td>$freq2[$i]</td></tr>";
  }
  $tabela2 .= "</table>";

  $p = "<p>Em uma pesquisa realizada com $n pessoas sobre o consumo mensal de Pizza foram obtidos os seguintes resultados:</p><div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 50px;\">$tabela1 $tabela2</div><p>A partir dos dados nas tabelas determine a média de fatias consumidas por pessoa e a moda dos sabores pedidos.</p>";

  $x = round(100*(4*$freq1[0] + 8*$freq1[1] + 12*$freq1[2] + 16*$freq1[3] + 20*$freq1[4])/$n)/100;
  $maior = max($freq2);
  $moda = "";
  $qt = 0;
  for ($i = 0; $i < 5; $i++) {
    if ($freq2[$i] == $maior) {
      if ($qt > 0) {
        $moda .= ", ";
      }
      $moda .= $classes2[$i];
      $qt++;
    }
  }
  if ($qt == 5) {
    $moda = "sem moda";
  }
  elseif ($qt > 1) {
    $moda = "$qt modas: ".$moda;
  }
  else {
    $moda = "Moda: ".$moda;
  }
  $s = "<p>Média: `bar x = { 4 cdot $freq1[0] + 8 cdot $freq1[1] + 12 cdot $freq1[2] + 16 cdot $freq1[3] + 20 cdot $freq1[4] } / $n = $x`</p><p>$moda</p>";

  return array($p, $s);
}

function questB() {
  $n = rand(20, 50);
  do {
    $medIni = rand(200, 400);
    $pont = rand(100, 500);
    $novaMed = round(($n*$medIni + $pont)/($n+1));
  } while ($medIni == $novaMed);

  $p = "<p>Em um grupo de $n jogadores de um certo jogo ranqueado por pontuações, a média de pontos era de $medIni. Após a entrada e pontuação de mais um jogador a média mudou para $novaMed. Qual foi, aproximadamente, a pontuação deste último jogador?</p>";

  $Sn = $n*$medIni;
  $np1 = $n + 1;
  $Snp1 = $novaMed*$np1;
  $P = $Snp1 - $Sn;
  $s = "<p>`S_n / $n = $medIni` &nbsp &nbsp &nbsp &nbsp `S_n = $Sn` &nbsp &nbsp &nbsp &nbsp `S_(n+1) = $Sn + P`<br>`S_(n+1) / ($n+1) = $novaMed` &nbsp &nbsp &nbsp &nbsp `S_(n+1) = $novaMed cdot $np1` &nbsp &nbsp &nbsp &nbsp `S_(n+1) = $Snp1`<br>`$Sn + P = $Snp1` &nbsp &nbsp &nbsp &nbsp `P = $P`</p>";

  return array($p, $s);
}

function questC() {
  $a = rand(2, 5);
  $b = $a + rand(1, 3);
  $c = $b + rand(1, 3);
  $tabela = "<table class=\"tabela\"><tr><th>Nome</th><th>Lista</th><th>P1</th><th>P2</th></tr>";
  $nomes = array("Maria", "José", "João", "Ana", "Camila");
  $lista = array(rand(50, 100), rand(50, 100), rand(50, 100), rand(50, 100), rand(50, 100));
  $p1 = array(rand(50, 100), rand(50, 100), rand(50, 100), rand(50, 100), rand(50, 100));
  $p2 = array(rand(50, 100), rand(50, 100), rand(50, 100), rand(50, 100), rand(50, 100));
  for ($i = 0; $i < 5; $i++) {
    $tabela .= "<tr><td>$nomes[$i]</td><td>$lista[$i]</td><td>$p1[$i]</td><td>$p2[$i]</td></tr>";
  }
  $tabela .= "</table>";

  $p = "<p>Um professor fez três atividades que avaliou em 100 pontos. No entanto ele deu pesos diferentes para cada atividade. A lista de exercícios tinha peso $a, a prova com consulta (P1) tinha peso $b e a prova tradicional (P2) tinha peso $c. A tabela abaixo traz as notas de 5 alunos, calcule as médias de cada um deles seguindo os pesos das atividades.</p>$tabela";

  $total = $a + $b + $c;
  $tabelaR = "<table class=\"tabela\"><tr><th>Nome</th><th>-</th><th>-</th><th>Média</th></tr>";
  for ($i = 0; $i < 5; $i++) {
    $exp1 = "($lista[$i] . $a + $p1[$i] . $b + $p2[$i] . $c)/($a + $b + $c)";
    $soma = $lista[$i]*$a + $p1[$i]*$b + $p2[$i]*$c;
    $exp2 = "$soma / $total";
    $media = round(100*$soma/$total)/100;
    $tabelaR .= "<tr><td>$nomes[$i]</td><td>$exp1</td><td>$exp2</td><td>$media</td></tr>";
  }
  $tabelaR .= "</table>";
  $s = "$tabelaR";

  return array($p, $s);
}

function questD() {
  do {
    $a = rand(2, 15);
    $b = rand(2, 15);
    $c = rand(2, 15);
  } while (($a == $b) || ($a == $c) || ($b == $c));

  $p = "<p>Calcule as três médias entre $a, $b e $c, aritmética, geométrica e harmônica.<br>`bar x = {x_1 + x_2 + ... + x_n} / n`<br>`bar g = root n {x_1 cdot x_2 cdot ... cdot x_n}`<br>`H = n/{1/x_1 + 1/x_2 + ... + 1/x_n}`</p>";

  $ma = round(100*($a+$b+$c)/3)/100;
  $g = round(100*pow(($a*$b*$c),(1/3)))/100;
  $num = $a*$b + $a*$c + $b*$c;
  $den = $a*$b*$c;
  $H = round(300*$den/$num)/100;
  $s = "<p>`bar x = { $a + $b + $c }/3 = $ma`<br>`bar g = root 3 { $a cdot $b cdot $c } = $g`<br>`H = 3 / { 1/$a + 1/$b + 1/$c } = 3 div $num/$den = $H`</p>";

  return array($p, $s);
}

function questE() {
  $a = rand(2, 20);
  $b = rand(2, 20);
  $c = rand(2, 20);
  $d = rand(2, 20);
  $e = rand(2, 20);
  
  $p = "<p>Calcule o desvio médio entre os valores a seguir: $a, $b, $c, $d e $e.<br>`D_M = {|x_1 - bar x| + |x_2 - bar x| + ... + |x_n - bar x|}/n`</p>";

  $x = ($a+$b+$c+$d+$e)/5;
  $da = abs($a - $x);
  $db = abs($b - $x);
  $dc = abs($c - $x);
  $dd = abs($d - $x);
  $de = abs($e - $x);
  $dm = ($da + $db + $dc + $dd + $de)/5;
  $s = "<p>`bar x = { $a + $b + $c + $d + $e }/5 = $x`<br>`D_M = {|$a - $x| + |$b - $x| + |$c - $x| + |$d - $x| + |$e - $x}/5`<br>`D_M = { $da + $db + $dc + $dd + $de }/5 = $dm`</p>";

  return array($p, $s);
}

?>