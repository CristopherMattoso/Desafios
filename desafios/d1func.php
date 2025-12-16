<?php
function quest1A() {
  $n = rand(200, 900); //tamanho de cada segmento
  $x = rand(20, 100);
  $a = rand(2, 6);
  $b = $n - $a*$x;
  $c = rand(2, 6);
  while ($c == $a) {
    $c = rand(2, 6);
  }
  $d = $n - $c*$x;
  $i = rand(0, 2); // randomiza a pergunta para encontrar o valor de x, o valor de AP ou AB
  $perg = $i == 0 ? "x" : ($i == 1 ? "AP" : "AB");

  $expr1 = str_replace("+ -", "- ", "{$a}x + $b");
  $expr2 = str_replace("+ -", "- ", "{$c}x + $d");
  

  $p = "<p>1 - Assumindo que o segmento MN seja a mediatriz de AB calcule o valor de $perg.</p>
  <svg width=\"300\" height=\"200\" viewBox=\"0 0 300 200\" xmlns=\"http://www.w3.org/2000/svg\">
    <!-- Segmento AB -->
    <line x1=\"50\" y1=\"150\" x2=\"250\" y2=\"150\" stroke=\"black\" stroke-width=\"2\"/>
    <circle cx=\"50\" cy=\"150\" r=\"4\" fill=\"black\"/>
    <circle cx=\"250\" cy=\"150\" r=\"4\" fill=\"black\"/>
    <text x=\"45\" y=\"165\" font-size=\"12\">A</text>
    <text x=\"255\" y=\"165\" font-size=\"12\">B</text>
    
    <!-- Mediatriz MN -->
    <line x1=\"150\" y1=\"50\" x2=\"150\" y2=\"180\" stroke=\"blue\" stroke-width=\"2\" stroke-dasharray=\"4\"/>
    <circle cx=\"150\" cy=\"50\" r=\"4\" fill=\"blue\"/>
    <circle cx=\"150\" cy=\"180\" r=\"4\" fill=\"blue\"/>
    <text x=\"135\" y=\"45\" font-size=\"12\">M</text>
    <text x=\"135\" y=\"195\" font-size=\"12\">N</text>
    
    <!-- Ponto de interseção P -->
    <circle cx=\"150\" cy=\"150\" r=\"4\" fill=\"red\"/>
    <text x=\"155\" y=\"145\" font-size=\"12\">P</text>
    
    <!-- Expressões algébricas -->
    <text x=\"90\" y=\"130\" font-size=\"14\">$expr1</text>
    <text x=\"180\" y=\"130\" font-size=\"14\">$expr2</text>
  </svg>";

  $ab = 2*$n;
  $Da = $a - $c;
  $Db = $d - $b;
  $calculo_x = "$expr1 = $expr2<br>{$a}x - {$c}x = $d - $b<br>{$Da}x = $Db<br>x = $Db/$Da<br>x = $x";
  switch ($i) {
    case 0:
      $s = "<p><b>1) x = $x</b><br>$calculo_x</p>";
      break;
    case 1:
      $s = "<p><b>1) AP = $n</b><br>$calculo_x<br>AP = $a . $x + $b = $n</p>";
      break;
    default:
      $s = "<p><b>1) AB = $ab</b><br>$calculo_x<br>AP = $a . $x + $b = $n<br>AB = 2 . $n = $ab</p>";
  }

  return array($p, $s);
}

function quest1B() {
  $n = rand(30, 60); //tamanho de cada ângulo
  $x = rand(2, 20);
  $a = rand(2, 6);
  $b = $n - $a*$x;
  $c = rand(2, 6);
  while ($c == $a) {
    $c = rand(2, 6);
  }
  $d = $n - $c*$x;
  $nb = -$b;
  $nd = -$d;
  $ang1 = $b > 0 ? "{$a}x + {$b}°" : ($b < 0 ? "{$a}x - {$nb}°" : "{$a}x");
  $ang2 = $d > 0 ? "{$c}x + {$d}°" : ($d < 0 ? "{$c}x - {$nd}°" : "{$c}x");
  $i = rand(0, 2); // randomiza a pergunta para encontrar o valor de x, o valor de AOP ou AOB
  $perg = $i == 0 ? "x" : ($i == 1 ? "AÔP" : "AÔB");


  $p = "<p>1 - Assumindo que o segmento OP seja a bissetriz de AÔB calcule o valor de $perg.</p>
  <svg width=\"300\" height=\"200\" viewBox=\"0 0 300 200\" xmlns=\"http://www.w3.org/2000/svg\">
    <!-- Semiretas OA e OB -->
    <line x1=\"150\" y1=\"150\" x2=\"50\" y2=\"50\" stroke=\"black\" stroke-width=\"2\"/>
    <line x1=\"150\" y1=\"150\" x2=\"250\" y2=\"50\" stroke=\"black\" stroke-width=\"2\"/>
    <text x=\"40\" y=\"50\" font-size=\"12\">A</text>
    <text x=\"255\" y=\"50\" font-size=\"12\">B</text>
    <text x=\"155\" y=\"160\" font-size=\"12\">O</text>
  
    <!-- Bissetriz OP -->
    <line x1=\"150\" y1=\"150\" x2=\"150\" y2=\"50\" stroke=\"blue\" stroke-width=\"2\" stroke-dasharray=\"4\"/>
    <text x=\"155\" y=\"55\" font-size=\"12\">P</text>
  
    <!-- Arcos para indicar os ângulos -->
    <path d=\"M 130 130 A 15 15 0 0 1 150 120\" fill=\"none\" stroke=\"black\" stroke-width=\"1\"/>
    <path d=\"M 150 120 A 15 15 0 0 1 170 130\" fill=\"none\" stroke=\"black\" stroke-width=\"1\"/>
  
    <!-- Expressões algébricas -->
    <text x=\"105\" y=\"105\" font-size=\"8\">$ang1</text>
    <text x=\"155\" y=\"105\" font-size=\"8\">$ang2</text>
  </svg>";

  $aob = 2*$n;
  $s = $i == 0 ? "1) x = {$x}°" : ($i == 1 ? "1) AÔP = {$n}°" : "1) AÔB = {$aob}°");
  $Da = $a - $c;
  $Db = $d - $b;
  $calculo_x = "$ang1 = $ang2<br>{$a}x - {$c}x = $d - $b<br>{$Da}x = $Db<br>x = $Db/$Da<br>x = {$x}°";
  switch ($i) {
    case 0:
      $s = "<p><b>1) x = {$x}°</b><br>$calculo_x</p>";
      break;
    case 1:
      $s = "<p><b>1) AÔP = {$n}°</b><br>$calculo_x<br>AÔP = $a . $x + $b = {$n}°</p>";
      break;
    default:
      $s = "<p><b>1) AÔB = {$aob}°</b><br>$calculo_x<br>AÔP = $a . $x + $b = {$n}°<br>AÔB = 2 . $n = {$aob}°</p>";
  }

  return array($p, $s);
}

function quest2() {
  $Ax = rand(90, 100);
  $Ay = rand(70, 90);
  $Bx = rand(170, 190);
  $By = rand(120, 140);
  $Cx = rand(110, 130);
  $Cy = rand(130, 150);
  $p = "<p>2 - Siga os passos abaixo e então descreva formalmente o que ocorreu.</p>
  <ul>
  <li>Com um compasso centrado em A marque dois pontos sobre a linha DE (se necessário extenda a reta DE)</li>
  <li>Utilizando a mesma abertura do compasso coloque-o sobre os pontos marcados no passo anterior e forme arcos do lado direito de DE (marcando um ponto na interceção)</li>
  <li>Repita o processo com os pontos B e C</li>
  <li>Ligue os três pontos marcados à esquerda de DE</li>
  </ul>
  <svg width=\"300\" height=\"200\" viewBox=\"0 0 300 200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Triângulo aleatório -->
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" fill=\"white\" stroke=\"black\" stroke-width=\"2\"/>
  
  <!-- Marcação dos vértices -->
  <text x=\"$Ax\" y=\"$Ay\" dx=\"-5\" dy=\"-5\" font-size=\"12\">A</text>
  <text x=\"$Bx\" y=\"$By\" dx=\"5\" dy=\"5\" font-size=\"12\">B</text>
  <text x=\"$Cx\" y=\"$Cy\" dx=\"-10\" dy=\"10\" font-size=\"12\">C</text>

  <!-- Simetria -->
  <line x1=\"250\" y1=\"10\" x2=\"250\" y2=\"190\" stroke=\"black\" stroke-width=\"2\"/>
  <text x=\"260\" y=\"10\" font-size=\"12\">D</text>
  <text x=\"260\" y=\"195\" font-size=\"12\">E</text>
  </svg>";


  $rAx = 250 - $Ax;
  $rBx = 250 - $Bx;
  $rCx = 250 - $Cx;

  $s = "<p><b>2) Reflexão</b></p>
  <svg width=\"300\" height=\"200\" viewBox=\"0 0 300 200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Simetria -->
  <line x1=\"0\" y1=\"10\" x2=\"0\" y2=\"190\" stroke=\"black\" stroke-width=\"2\"/>
  <text x=\"10\" y=\"10\" font-size=\"12\">D</text>
  <text x=\"10\" y=\"195\" font-size=\"12\">E</text>

  <!-- Triângulo Refletido -->
  <polygon points=\"$rAx,$Ay $rBx,$By $rCx,$Cy\" fill=\"white\" stroke=\"blue\" stroke-width=\"2\"/>
  
  <!-- Marcação dos vértices -->
  <text x=\"$rAx\" y=\"$Ay\" dx=\"5\" dy=\"-5\" font-size=\"12\">A'</text>
  <text x=\"$rBx\" y=\"$By\" dx=\"-15\" dy=\"5\" font-size=\"12\">B'</text>
  <text x=\"$rCx\" y=\"$Cy\" dx=\"10\" dy=\"10\" font-size=\"12\">C'</text>
  </svg>";
  return array($p, $s);
}


?>