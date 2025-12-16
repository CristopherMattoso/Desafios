<?php
function questA() {
  $tabela = "<table class=\"tabela\"><tr><th>2024</th><th>2025</th></tr>";
  $preco24 = array(
    rand(1, 30), 
    rand(1, 30), 
    rand(1, 30), 
    rand(1, 30), 
    rand(1, 30)
  );
  $aum = array(
    rand(21, 26)/20 - 1,
    rand(21, 26)/20 - 1,
    rand(21, 26)/20 - 1,
    rand(21, 26)/20 - 1,
    rand(21, 26)/20 - 1
  );
  $preco25 = array(
    $preco24[0]*($aum[0] + 1),
    $preco24[1]*($aum[1] + 1),
    $preco24[2]*($aum[2] + 1),
    $preco24[3]*($aum[3] + 1),
    $preco24[4]*($aum[4] + 1)
  );
  for ($i = 0; $i < 5; $i++) {
    $a = number_format($preco24[$i], 2, ",", ".");
    $b = number_format($preco25[$i], 2, ",", ".");
    $tabela .= "<tr><td>R$ $a</td><td>R$ $b</td></tr>";
  }
  $tabela .= "</table>";

  $p = "<p>Maria fez um levantamento sobre o aumento de preços de alguns produtos e os anotou em uma tabela:</p>$tabela<p>Calcule o aumento percentual médio destes produtos.</p>";

  $media = ($aum[0] + $aum[1] + $aum[2] + $aum[3] + $aum[4])/5;
  $perc = $media*100;

  $s = "<p>Aumentos:<br>
  `frac{ $preco25[0] - $preco24[0] }{ $preco24[0] } = $aum[0]` <br>
  `frac{ $preco25[1] - $preco24[1] }{ $preco24[1] } = $aum[1]` <br>
  `frac{ $preco25[2] - $preco24[2] }{ $preco24[2] } = $aum[2]` <br>
  `frac{ $preco25[3] - $preco24[3] }{ $preco24[3] } = $aum[3]` <br>
  `frac{ $preco25[4] - $preco24[4] }{ $preco24[4] } = $aum[4]` <br>
  <br>
  Média:
  `frac{ $aum[0] + $aum[1] + $aum[2] + $aum[3] + $aum[4] }{5} = $media` <br>
  Resposta: $perc %
  </p>";

  return array($p, $s);
}

function questB() {
  $n = rand(5, 12);
  $C = $n*rand(1, 5)*100;
  $perc = rand(5, 30);
  $i = $perc/100;
  $juros = $C*$i;
  $total = $C + $juros;
  $parc = $total/$n;

  $p = "<p>João emprestou R$ $C de um banco, pagando $n parcelas de $parc reais.<br>a) Quanto ele pagou de juros?<br>b) Qual o percentual de juros que ele pagou pelo empréstimo?</p>";

  $parc_esper = $C/$n;
  $dif = $parc - $parc_esper;
  
  $s = "<div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 50px;\">
  <p><b>Caminho 1</b><br>
  Total pago:<br>
  `$n cdot $parc = $total` <br>
  Diferença:
  `$total - $C = $juros` <br>
  a) R$ $juros <br>
  Percentual:
  `$juros/$C = $i` <br>
  b) $perc %
  </p>

  <p><b>Caminho 2</b><br>
  Capital dividido pelas parcelas:<br>
  `$C/$n = $parc_esper` <br>
  Diferença das parcelas: <br>
  `$parc - $parc_esper = $dif` <br>
  Total de juros pago: <br>
  `$dif cdot $n = $juros` <br>
  a) R$ $juros <br>
  Percentual:<br>
  `$dif/$parc_esper = $i` <br>
  b) $perc %
  </p>
  </div>";

  return array($p, $s);
}

function questC() {
  $C = rand(3, 8)*100;
  $C_string = number_format($C, 2, ",", ".");
  $perc = rand(2, 10);
  $i = $perc/100;
  $parc = $C*rand(4, 8)/10;

  $p = "<p>Pedro emprestou R$ $C_string para uma amiga pedindo um juros de {$perc}% ao mês. Ela pagou em duas parcelas, a primeira de $parc reais e a segunda com o restante do valor.<br>
  Quanto sua amiga deveria pagar nesta segunda parcela?</p>";

  $juros1 = $C*$i;
  $C2 = $C + $juros1;
  $C3 = $C2 - $parc;
  $juros2 = $C3*$i;
  $C4 = $C3 + $juros2;
  $C4_string = number_format($C4, 2, ",", ".");

  $s = "<p>Juros do primeiro mês: `$C cdot $i = $juros1`<br>
  Dívida total do primeiro mês: `$C + $juros1 = $C2`<br>
  Dívida após pagamento de parcela: `$C2 - $parc = $C3`<br>
  Juros do segundo mês: `$C3 cdot $i = $juros2`<br>
  Dívida total do segundo mês: `$C3 + $juros2 = $C4`<br>
  Resposta: R$ $C4_string</p>";

  return array($p, $s);
}

function questD1() {
  $C = rand(2, 20)*100;
  $i = rand(3, 20)/1000;
  $t = rand(15, 30);
  $C_txt = number_format($C, 2, ",", ".");
  $i_p = number_format($i*100, 1, ",", ".");

  $p = "<p>Um capital de R$ $C_txt foi aplicado a juros simples com uma taxa de {$i_p}% ao mês, durante $t meses.<br>Qual foi o montante acumulado ao final desse período?</p>";
  
  $j = $C*$i*$t;
  $M = $C + $j;
  $s = "<p>Taxa forma decimal: {$i_p}% = $i<br>Juros: J = C . i . t<br>J = $C . $i . $t<br>J = $j<br>M = C + J<br>M = $C + $j = $M</p>";

  return array($p, $s);
}

function questD2() {
  $C = rand(2, 20)*100;
  $i = rand(3, 20)/1000;
  $t = rand(9, 20)*3;
  $C_txt = number_format($C, 2, ",", ".");
  $i_p = number_format($i*100, 1, ",", ".");
  $t_anos = number_format($t/12, 2, ",", ".");

  $p = "<p>Ana emprestou R$ $C_txt a um amigo por $t_anos anos, cobrando juros simples de {$i_p}% ao mês.<br>Quanto ela receberá de juros ao final do período?</p>";
  $j = $C*$i*$t;
  $s = "<p>Taxa forma decimal: {$i_p}% = $i<br>Tempo em meses: $t_anos x 12 = $t<br>Juros: J = C . i . t<br>J = $C . $i . $t<br>J = $j</p>";

  return array($p, $s);
}

function questD3() {
  $C = rand(2, 20)*100;
  $i = rand(3, 20)/1000;
  $t = rand(15, 30);
  $i_p = number_format($i*100, 1, ",", ".");
  $j = $C*$i*$t;
  $j_txt = number_format($j, 2, ",", ".");

  $p = "<p>Pedro aplicou um valor em uma aplicação que rende juros simples de {$i_p}% ao mês. Após $t meses, ele obteve R$ $j_txt de juros.<br>Qual foi o capital inicial investido por Pedro?</p>";
  $it = $i*$t;
  $s = "<p>Taxa forma decimal: {$i_p}% = $i<br>Juros (fórmula espelhada): C . i . t = J<br>C . $i . $t = $j<br>C . $it = $j<br>C = $j / $it<br>C = $C</p>";

  return array($p, $s);
}

function questE() {
  $C = rand(5, 20)*100;
  $C_txt = number_format($C, 2, ",", ".");
  $i = rand(5, 20)/100;
  $i_perc = $i*100;
  $t = rand(5, 20);

  $p = "<p>Um capital de R$ $C_txt foi aplicado a uma taxa de {$i_perc}% ao ano, sob juros compostos. Determine o montante após $t anos.</p>";

  $k = 1 + $i;
  $mult = round(10000*($k**$t))/10000;
  $M = round(10000*$C*((1+$i)**$t))/10000;
  $M_txt = number_format($M, 2, ",", ".");
  
  $s = "<p>`M = C cdot (1 + i)^t`<br>`M = $C cdot (1 + $i)^$t`<br>`M = $C cdot $k^$t`<br>`M = $C cdot $mult...`<br>`M = $M...`<br><b>R$ $M_txt</b></p>";

  return array($p, $s);
}

?>