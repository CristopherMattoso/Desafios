<?php
function arc($arcRadius, $Ax, $Ay, $Bx, $By, $Cx, $Cy) {
  $norm1 = sqrt(pow($Bx - $Ax, 2) + pow($By - $Ay, 2));
  $norm2 = sqrt(pow($Cx - $Ax, 2) + pow($Cy - $Ay, 2));
  $v1x = ($Bx - $Ax) / $norm1;
  $v1y = ($By - $Ay) / $norm1;
  $v2x = ($Cx - $Ax) / $norm2;
  $v2y = ($Cy - $Ay) / $norm2;
  $arcx1 = $Ax + $arcRadius * $v1x;
  $arcy1 = $Ay + $arcRadius * $v1y;
  $arcx2 = $Ax + $arcRadius * $v2x;
  $arcy2 = $Ay + $arcRadius * $v2y;
  $arcTextX = ($arcx1 + $arcx2) / 2 - 10;
  $arcTextY = ($arcy1 + $arcy2) / 2 + 20;
  return array($arcx1, $arcy1, $arcx2, $arcy2, $arcTextX, $arcTextY);
}

function triEscLLL() {
  $b = rand(20, 50)/10;
  $c = rand(20, 50)/10;
  while ($b == $c) {
    $c = rand(20, 50)/10;
  }
  $a = rand((max($b, $c)+1)*10, ($b+$c-1)*10)/10;
  $angA = acos(-($a**2 - $b**2 - $c**2)/(2*$b*$c));  

  $Ax = 250;
  $Ay = 20;
  $Bx = round(250 + $c*30*sin($angA/2));
  $By = round(20 + $c*30*cos($angA/2));
  $Cx = round(250 - $b*30*sin($angA/2));
  $Cy = round(20 + $b*30*cos($angA/2));

  $markax = $Cx + ($Bx - $Cx)*0.5 - 20;
  $markay = max($By, $Cy) + 10;
  $markbx = ($Ax + $Cx)/2 - 20;
  $markby = $Ay + ($Cy - $Ay)*0.4;
  $markcx = ($Ax + $Bx)/2 + 10;
  $markcy = $Ay + ($By - $Ay)*0.4;
  
  $p = "<p>1) O triângulo abaixo está fora de escala e desproporcional, desenhe-o da maneira correta com régua e compasso no verso desta folha. Depois determine:<br>a) Os ângulos do triângulo.<br>b) O tipo de congruência de triângulos utilizada.<br>c) A classificação deste triângulo com relação aos lados e ângulos.</p>
  <svg width=\"500\" height=\"300\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  
  <!-- Marcar os lados -->
  <!-- Lado 1 -->
  <text x=\"$markax\" y=\"$markay\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$a</text>
  
  <!-- Lado 2 -->
  <text x=\"$markbx\" y=\"$markby\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$b</text>
  
  <!-- Lado 3 -->
  <text x=\"$markcx\" y=\"$markcy\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$c</text>
  </svg>";

  $angB = asin(($b*sin($angA))/$a);
  $angA = round($angA*1800/M_PI)/10;
  $angB = round($angB*1800/M_PI)/10;
  $angC = 180 - $angA - $angB;
  $classific = $angA < 90 ? "Acutângulo" : ($angA > 90 ? "Obtsângulo" : "Retângulo");
  return array($p, "<p>1) a. `hat A = {$angA}°, hat B = {$angB}°, hat C = {$angC}°`<br>b. Congruência LLL<br>c. Escaleno $classific</p>");
  
}

function triIsoLLL() {
  $b = rand(20, 80)/10;
  $a = rand(10, (20*$b) - 10)/10;
  while ($a == $b) {
    $a = rand(20, (20*$b))/10;
  }
  $c = $b;
  $angB = acos(-($b**2 - $a**2 - $c**2)/(2*$a*$c));
  $angA = acos(-($a**2 - $b**2 - $c**2)/(2*$b*$c));
  $Ax = 250;
  $Ay = 20;
  $Bx = round(250 + $c*30*sin($angA/2));
  $By = round(20 + $c*30*cos($angA/2));
  $Cx = round(250 - $b*30*sin($angA/2));
  $Cy = round(20 + $b*30*cos($angA/2));

  $markax = $Cx + ($Bx - $Cx)*0.5 - 10;
  $markay = max($By, $Cy) + 20;
  $markbx = ($Ax + $Cx)/2 - 20;
  $markby = $Ay + ($Cy - $Ay)*0.4;
  $markcx = ($Ax + $Bx)/2 + 10;
  $markcy = $Ay + ($By - $Ay)*0.4;

  $p = "<p>1) O triângulo abaixo está fora de escala e desproporcional, desenhe-o da maneira correta com régua e compasso no verso desta folha. Depois determine:<br>a) Os ângulos do triângulo.<br>b) O tipo de congruência de triângulos utilizada.<br>c) A classificação deste triângulo com relação aos lados e ângulos.</p>
  <svg width=\"500\" height=\"300\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  
  <!-- Marcar os lados -->
  <!-- Lado 1 -->
  <text x=\"$markax\" y=\"$markay\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$a</text>
  
  <!-- Lado 2 -->
  <text x=\"$markbx\" y=\"$markby\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$b</text>
  
  <!-- Lado 3 -->
  <text x=\"$markcx\" y=\"$markcy\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$c</text>
  </svg>";

  $angB = round($angB*1800/M_PI)/10;
  $angC = $angB;
  $angA = 180 - $angB - $angC;
  $classific = max($angA, $angB, $angC) < 90 ? "Acutângulo" : (max($angA, $angB, $angC) > 90 ? "Obtsângulo" : "Retângulo");
  return array($p, "<p>1) a. `hat A = {$angA}°, hat B = {$angB}°, hat C = {$angC}°`<br>b. Congruência LLL<br>c. Isósceles $classific</p>");
  
}

function triLLL() {
  return rand(0,1) == 0 ? triEscLLL() : triIsoLLL();
}

function triLAL() {
  $tipo = rand(0,5);
  $angA = $tipo <= 2 ? rand(30, 75) : ($tipo <= 4 ? rand(105, 150) : 90);
  $b = rand(20, 50)/10;
  $c = $tipo > 3 ? rand(20, 50)/10 : ($tipo > 0 ? $b : round((2*$b*cos($angA*M_PI/180))*100)/100);
  $a = $tipo == 0 ? $b : round(sqrt($b**2 + $c**2 - 2*$b*$c*cos($angA*M_PI/180))*100)/100;

  $Ax = 250;
  $Ay = 20;
  $Bx = round(250 + $c*30*sin($angA*M_PI/360));
  $By = round(20 + $c*30*cos($angA*M_PI/360));
  $Cx = round(250 - $b*30*sin($angA*M_PI/360));
  $Cy = round(20 + $b*30*cos($angA*M_PI/360));

  $markbx = ($Ax + $Cx)/2 - 20;
  $markby = $Ay + ($Cy - $Ay)*0.4;
  $markcx = ($Ax + $Bx)/2 + 10;
  $markcy = $Ay + ($By - $Ay)*0.4;

  $arc1 = arc(20, $Ax, $Ay, $Bx, $By, $Cx, $Cy);
  
  $p = "<p>1) O triângulo abaixo está fora de escala e desproporcional, desenhe-o da maneira correta com régua e compasso no verso desta folha. Depois determine:<br>a) Os outros ângulos do triângulo e o tamanho do outro lado.<br>b) O tipo de congruência de triângulos utilizada.<br>c) A classificação deste triângulo com relação aos lados e ângulos.</p>
  <svg width=\"500\" height=\"300\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  
  <!-- Marcar os lados -->
  <!-- Lado 2 -->
  <text x=\"$markbx\" y=\"$markby\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$b</text>
  
  <!-- Lado 3 -->
  <text x=\"$markcx\" y=\"$markcy\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$c</text>

  <!-- Arco para representar o ângulo oposto ao Lado 1 -->
  <path d=\"M $arc1[0] $arc1[1] A 20 20 0 0 1 $arc1[2] $arc1[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc1[4]\" y=\"$arc1[5]\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angA}°</text>
  </svg>";

  $angB = asin(($b*sin($angA*M_PI/180))/$a);
  $angB = round($angB*18000/M_PI)/100;
  $angC = 180 - $angA - $angB;
  $classific1 = $a == $b ? ($a == $c ? "Equilátero" : "Isósceles") : ($b == $c ? "Isósceles" : ($a == $c ? "Isósceles" : "Escaleno"));
  $classific2 = max($angA, $angB, $angC) < 90 ? "Acutângulo" : (max($angA, $angB, $angC) > 90 ? "Obtsângulo" : "Retângulo");
  return array($p, "<p>1) a. `a = $a, hat B = {$angB}°, hat C = {$angC}°`<br>b. Congruência LAL<br>c. $classific1 $classific2</p>");
  
}

function triALA() {
  $tipo = rand(0,6);
  $angA = $tipo <= 2 ? rand(30, 75) : ($tipo <= 4 ? rand(105, 150) : 90);
  $angC = $tipo % 2 == 1 ? (180 - $angA)/2 : ($tipo == 0 ? $angA : rand(20, 180 - $angA - 20));
  $angB = 180 - $angA - $angC;
  $b = $angA >= 90 ? rand(50, 80)/10 : rand(30, 50)/10;
  $a = $b*sin($angA*M_PI/180)/sin($angB*M_PI/180);
  $c = $b*sin($angC*M_PI/180)/sin($angB*M_PI/180);
  

  $Ax = 250;
  $Ay = 20;
  $Bx = round(250 + $c*30*sin($angA*M_PI/360));
  $By = round(20 + $c*30*cos($angA*M_PI/360));
  $Cx = round(250 - $b*30*sin($angA*M_PI/360));
  $Cy = round(20 + $b*30*cos($angA*M_PI/360));

  $markbx = ($Ax + $Cx)/2 - 20;
  $markby = $Ay + ($Cy - $Ay)*0.4;

  $arc1 = arc(20, $Ax, $Ay, $Bx, $By, $Cx, $Cy);
  $arc2 = arc(20, $Cx, $Cy, $Ax, $Ay, $Bx, $By);

  
  $p = "<p>1) O triângulo abaixo está fora de escala e desproporcional, desenhe-o da maneira correta com régua e compasso no verso desta folha. Depois determine:<br>a) As medidas dos outros lados do triângulo e seu outro ângulo.<br>b) O tipo de congruência de triângulos utilizada.<br>c) A classificação deste triângulo com relação aos lados e ângulos.</p>
  <svg width=\"500\" height=\"300\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  
  <!-- Marcar os lados -->
  <!-- Lado 2 -->
  <text x=\"$markbx\" y=\"$markby\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$b</text>
  
  <!-- Arco para representar o ângulo oposto ao Lado 1 -->
  <path d=\"M $arc1[0] $arc1[1] A 20 20 0 0 1 $arc1[2] $arc1[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc1[4]\" y=\"$arc1[5]\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angA}°</text>
  <path d=\"M $arc2[0] $arc2[1] A 20 20 0 0 1 $arc2[2] $arc2[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc2[4]\" y=\"$arc2[5]\" dx=\"10\" dy=\"-30\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angC}°</text>
  </svg>";

  $a = round($a*100)/100;
  $c = round($c*100)/100;
  $classific1 = $a == $b ? ($a == $c ? "Equilátero" : "Isósceles") : ($b == $c ? "Isósceles" : ($a == $c ? "Isósceles" : "Escaleno"));
  $classific2 = max($angA, $angB, $angC) < 90 ? "Acutângulo" : (max($angA, $angB, $angC) > 90 ? "Obtsângulo" : "Retângulo");
  return array($p, "<p>1) a. `a = $a, c = $c, hat B = {$angB}°`<br>b. Congruência ALA<br>c. $classific1 $classific2</p>");
  
}

function trap() {
  $ab = rand(16, 24)/2;
  $tipo = rand(0,2);
  $angA = $tipo == 0 ? 90 : rand(6, 15)*5;
  $angD = 180 - $angA;
  $angB = $tipo == 1 ? $angA : rand(12, 16)*5;
  while ($tipo != 1 && $angB == $angA) {
    $angB = rand(12, 16)*5;
  }
  $angC = 180 - $angB;

  $ad_Max = $tipo == 0 ? round($ab*tan($angB*M_PI/180)) - 2 : round($ab*sin($angB*M_PI/180)/sin((180 - $angA - $angB)*M_PI/180)) - 2;
  
  $ad = rand($ab, 2*min(8, $ad_Max))/2;
  $bd = round(sqrt($ab**2 + $ad**2 - 2*$ab*$ad*cos($angA*M_PI/180))*100)/100;

  $angD_1 = asin($ab*sin($angA*M_PI/180)/$bd);
  $angD_2 = $angD*M_PI/180 - $angD_1;
  $angB_1 = M_PI - $angD_1 - $angA*M_PI/180;
  if ($angB_1 > $angB*M_PI/180) {
    $angD_1 = M_PI - $angD_1;
    $angD_2 = $angD*M_PI/180 - $angD_1;
    $angB_1 = M_PI - $angD_1 - $angA*M_PI/180;
  }
  $angB_2 = $angB*M_PI/180 - $angB_1;
  $cd = round(100*$bd*sin($angB_2)/sin($angC*M_PI/180))/100;
  $bc = round(100*$bd*sin($angD_2)/sin($angC*M_PI/180))/100;
  $angB_2 = round($angB_2*180/M_PI);
  if ($angB_2 < 10) {
    return trap();
  }

  $Ax = 20;
  $Ay = 280;
  $Bx = 20 + $ab*30;
  $By = 280;
  $Dx = 20 + $ad*30*cos($angA*M_PI/180);
  $Dy = 280 - $ad*30*sin($angA*M_PI/180);
  $Cx = $Dx + $cd*30;
  $Cy = $Dy;

  $markabx = ($Ax + $Bx)/2 - 20;
  $markaby = $Ay + 10;
  $markadx = ($Ax + $Dx)/2 - 20;
  $markady = ($Ay + $Dy)/2;

  $arc1 = arc(20, $Ax, $Ay, $Bx, $By, $Dx, $Dy);
  $arc2 = arc(20, $Cx, $Cy, $Bx, $By, $Dx, $Dy);
  $arc3 = arc(20, $Bx, $By, $Cx, $Cy, $Dx, $Dy);
  
  $p = "<p>1) O quadrilátero abaixo está fora de escala e desproporcional, desenhe-o da maneira correta com régua e compasso no verso desta folha. Depois responda:<br>a) Que tipo de congruências de triângulos você precisou nessa construção?.<br>b) Que tipo de quadrilátero é esse e por quê?</p>
  <svg width=\"500\" height=\"300\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy $Dx,$Dy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  <line x1=\"$Bx\" y1=\"$By\" x2=\"$Dx\" y2=\"$Dy\" style=\"stroke:black;stroke-width:2;\" stroke-dasharray=\"2,2\" />
  
  <!-- Marcar os lados -->
  <!-- Lado 1 -->
  <text x=\"$markabx\" y=\"$markaby\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$ab</text>
  
  <!-- Lado 4 -->
  <text x=\"$markadx\" y=\"$markady\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$ad</text>

  <!-- Arco para representar o ângulo A -->
  <path d=\"M $arc1[0] $arc1[1] A 20 20 1 0 0 $arc1[2] $arc1[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc1[4]\" y=\"$arc1[5]\" dx=\"20\" dy=\"-30\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angA}°</text>
  <path d=\"M $arc2[0] $arc2[1] A 20 20 0 0 1 $arc2[2] $arc2[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc2[4]\" y=\"$arc2[5]\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angC}°</text>
  <path d=\"M $arc3[0] $arc3[1] A 20 20 0 0 0 $arc3[2] $arc3[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc3[4]\" y=\"$arc3[5]\" dx=\"-10\" dy=\"-30\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angB_2}°</text>

  </svg>";

  $classific = $tipo == 0 ? "Retângulo" : ($tipo == 1 ? "Isósceles" : "Escaleno");
  $condicoes = "os ângulos a esquerda: {$angA}° + {$angD}° = 180°, e o mesmo ocorre com os ângulos à direita: {$angB}° + {$angC}° = 180°, de modo que as bases se mostram paralelas, ";
  $condicoes .= $tipo == 0 ? "é retângulo pois possui dois ângulos retos." : ($tipo == 1 ? "é isósceles pois os lados não paralelos são ambos iguais a $ad." : "é escaleno pois não se enquadra nem como retângulo nem como isósceles.");
  $resp = "<p>1) a. Congruência LAL e congruência LAAo<br>b. Trapézio $classific, pois $condicoes</p>";
  return array($p, $resp);

}

function paral() {
  $tipo = rand(0,2);
  $ab = $tipo == 1 ? rand(8, 16)/2 : rand(16, 24)/2;
  $angA = $tipo == 0 ? 90 : ($tipo == 1 ? rand(6, 15)*5 : rand(9, 15)*5);
  $angD = 180 - $angA;
  $angB = $angD;
  $angC = $angA;
  
  $ad = $tipo == 1 ? $ab : rand(8, 16)/2;
  while ($tipo != 1 && $ad == $ab) {
    $ad = rand(12, 20)/2;
  }

  $bd = round(sqrt($ab**2 + $ad**2 - 2*$ab*$ad*cos($angA*M_PI/180))*100)/100;

  $angD_1 = asin($ab*sin($angA*M_PI/180)/$bd);
  $angD_2 = $angD*M_PI/180 - $angD_1;
  $angB_1 = M_PI - $angD_1 - $angA*M_PI/180;
  if ($angB_1 > $angB*M_PI/180) {
    $angD_1 = M_PI - $angD_1;
    $angD_2 = $angD*M_PI/180 - $angD_1;
    $angB_1 = M_PI - $angD_1 - $angA*M_PI/180;
  }
  $angB_2 = $angB*M_PI/180 - $angB_1;
  $cd = round(100*$bd*sin($angB_2)/sin($angC*M_PI/180))/100;
  $bc = round(100*$bd*sin($angD_2)/sin($angC*M_PI/180))/100;
  $angB_2 = round($angB_2*180/M_PI);

  $Ax = 20;
  $Ay = 280;
  $Bx = 20 + $ab*30;
  $By = 280;
  $Dx = 20 + $ad*30*cos($angA*M_PI/180);
  $Dy = 280 - $ad*30*sin($angA*M_PI/180);
  $Cx = $Dx + $cd*30;
  $Cy = $Dy;

  $markabx = ($Ax + $Bx)/2 - 20;
  $markaby = $Ay + 10;
  $markadx = ($Ax + $Dx)/2 - 20;
  $markady = ($Ay + $Dy)/2;

  $arc1 = arc(20, $Ax, $Ay, $Bx, $By, $Dx, $Dy);
  $arc2 = arc(20, $Cx, $Cy, $Bx, $By, $Dx, $Dy);
  $arc3 = arc(20, $Bx, $By, $Cx, $Cy, $Dx, $Dy);
  
  $p = "<p>1) O quadrilátero abaixo está fora de escala e desproporcional, desenhe-o da maneira correta com régua e compasso no verso desta folha. Depois responda:<br>a) Que tipo de congruências de triângulos você precisou nessa construção?.<br>b) Que tipo de quadrilátero é esse e por quê?</p>
  <svg width=\"800\" height=\"300\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy $Dx,$Dy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  <line x1=\"$Bx\" y1=\"$By\" x2=\"$Dx\" y2=\"$Dy\" style=\"stroke:black;stroke-width:2;\" stroke-dasharray=\"2,2\" />
  
  <!-- Marcar os lados -->
  <!-- Lado 1 -->
  <text x=\"$markabx\" y=\"$markaby\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$ab</text>
  
  <!-- Lado 4 -->
  <text x=\"$markadx\" y=\"$markady\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$ad</text>

  <!-- Arco para representar o ângulo A -->
  <path d=\"M $arc1[0] $arc1[1] A 20 20 1 0 0 $arc1[2] $arc1[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc1[4]\" y=\"$arc1[5]\" dx=\"10\" dy=\"-30\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angA}°</text>
  <path d=\"M $arc2[0] $arc2[1] A 20 20 0 0 1 $arc2[2] $arc2[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc2[4]\" y=\"$arc2[5]\" dx=\"-10\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angC}°</text>
  <path d=\"M $arc3[0] $arc3[1] A 20 20 0 0 0 $arc3[2] $arc3[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc3[4]\" y=\"$arc3[5]\" dy=\"-30\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">{$angB_2}°</text>

  </svg>";

  $classific = $tipo == 0 ? "Retângulo" : ($tipo == 1 ? "Losango" : "Paralelogramo");
  $condicoes = "os ângulos a esquerda: {$angA}° + {$angD}° = 180°, e o mesmo ocorre com os ângulos à direita: {$angB}° + {$angC}° = 180°, de modo que as bases se mostram paralelas, além disso os ângulos opostos são congruentes de modo que isso se repete para as laterais, que também serão paralelas, ";
  $condicoes .= $tipo == 0 ? "é retângulo pois possui todos os ângulos retos." : ($tipo == 1 ? "é um losango pois todos os lados são iguais a $ab." : "é um paralelogramo pois não se enquadra nem como retângulo nem como losango.");
  return array($p, "<p>1) a. Congruência LAL e congruência LAAo<br>b. $classific, pois $condicoes</p>");

}

function semTri() {
  $b = rand(20, 50)/10;
  $c = rand(20, 50)/10;
  while ($b == $c) {
    $c = rand(20, 50)/10;
  }
  $a = rand((max($b, $c)+1)*10, ($b+$c-1)*10)/10;
  $angA = acos(-($a**2 - $b**2 - $c**2)/(2*$b*$c));  

  $Ax = 100;
  $Ay = 20;
  $Bx = round(100 + $c*20*sin($angA/2));
  $By = round(20 + $c*20*cos($angA/2));
  $Cx = round(100 - $b*20*sin($angA/2));
  $Cy = round(20 + $b*20*cos($angA/2));

  $Dx = 300;
  $Dy = 20;
  $Ex = round(300 + $c*40*sin($angA/2));
  $Ey = round(20 + $c*40*cos($angA/2));
  $Fx = round(300 - $b*40*sin($angA/2));
  $Fy = round(20 + $b*40*cos($angA/2));

  $divCom = rand(2, 5);
  $menor = rand(2, 5);
  $ab = $divCom*$menor*$c;
  $bc = $divCom*$menor*$a;
  $ac = $divCom*$menor*$b;
  $maior = rand(6, 10);
  $de = $divCom*$maior*$c;
  $ef = $divCom*$maior*$a;
  $df = $divCom*$maior*$b;

  $markbcx = $Cx + ($Bx - $Cx)*0.5 - 10;
  $markbcy = max($By, $Cy) + 10;
  $markacx = ($Ax + $Cx)/2 - 50;
  $markacy = $Ay + ($Cy - $Ay)*0.4;
  $markabx = ($Ax + $Bx)/2 + 10;
  $markaby = $Ay + ($By - $Ay)*0.4;

  $markefx = $Fx + ($Ex - $Fx)*0.5 - 10;
  $markefy = max($Ey, $Fy) + 10;
  $markdfx = ($Dx + $Fx)/2 - 20;
  $markdfy = $Dy + ($Fy - $Dy)*0.4;
  $markdex = ($Dx + $Ex)/2 + 10;
  $markdey = $Dy + ($Ey - $Dy)*0.4;

  $arc1 = arc(15, $Cx, $Cy, $Bx, $By, $Ax, $Ay);
  $arc2 = arc(15, $Ax, $Ay, $Bx, $By, $Cx, $Cy);
  $arc3 = arc(15, $Bx, $By, $Cx, $Cy, $Ax, $Ay);
  $arc4 = arc(20, $Fx, $Fy, $Ex, $Ey, $Dx, $Dy);
  $arc5 = arc(20, $Dx, $Dy, $Ex, $Ey, $Fx, $Fy);
  $arc6 = arc(20, $Ex, $Ey, $Fx, $Fy, $Dx, $Dy);

  $x = rand(2, 12);
  $y = rand(20, 50);
  $coef1 = rand(2, 5);
  $coef2 = abs($ac - $x*$coef1);
  $op1 = $ac > $x*$coef1 ? "{$coef1}x + $coef2" : ($ac < $x*$coef1 ? "{$coef1}x - $coef2" : "{$coef1}x");
  $coef3 = abs($de - $y);
  $op2 = $de > $y ? "y + $coef3" : ($de < $y ? "y - $coef3" : "y");
  
  $p = "<p>2) Os triângulos abaixo são semelhantes. A partir desta informação determine os valores de x e y.</p>
  <svg width=\"500\" height=\"300\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  <polygon points=\"$Dx,$Dy $Ex,$Ey $Fx,$Fy\" style=\"fill:none;stroke:black;stroke-width:2\" />
  
  <!-- Marcar os lados -->
  <!-- Triângulo ABC -->
  <text x=\"$markbcx\" y=\"$markbcy\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$bc</text>
  <text x=\"$markacx\" y=\"$markacy\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$op1</text>
  <text x=\"$markabx\" y=\"$markaby\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$ab</text>

  <!-- Triângulo DEF -->
  <text x=\"$markefx\" y=\"$markefy\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$ef</text>
  <text x=\"$markdfx\" y=\"$markdfy\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$df</text>
  <text x=\"$markdex\" y=\"$markdey\" font-family=\"Arial\" font-size=\"12\" fill=\"black\">$op2</text>
  
  <path d=\"M $arc1[0] $arc1[1] A 15 15 1 0 0 $arc1[2] $arc1[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc1[4]\" y=\"$arc1[5]\" dx=\"10\" dy=\"-17\" font-family=\"Arial\" font-size=\"4\" fill=\"black\">a</text>
  <path d=\"M $arc2[0] $arc2[1] A 15 15 0 0 1 $arc2[2] $arc2[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc2[4]\" y=\"$arc2[5]\" dx=\"5\" dy=\"-5\" font-family=\"Arial\" font-size=\"4\" fill=\"black\">b</text>
  <path d=\"M $arc3[0] $arc3[1] A 15 15 0 0 1 $arc3[2] $arc3[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc3[4]\" y=\"$arc3[5]\" dx=\"-5\" dy=\"-15\" font-family=\"Arial\" font-size=\"4\" fill=\"black\">c</text>

  <path d=\"M $arc4[0] $arc4[1] A 20 20 1 0 0 $arc4[2] $arc4[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc4[4]\" y=\"$arc4[5]\" dx=\"15\" dy=\"-17\" font-family=\"Arial\" font-size=\"4\" fill=\"black\">a</text>
  <path d=\"M $arc5[0] $arc5[1] A 20 20 0 0 1 $arc5[2] $arc5[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc5[4]\" y=\"$arc5[5]\" dx=\"5\" dy=\"-5\" font-family=\"Arial\" font-size=\"4\" fill=\"black\">b</text>
  <path d=\"M $arc6[0] $arc6[1] A 20 20 0 0 1 $arc6[2] $arc6[3]\" 
        fill=\"none\" stroke=\"black\" stroke-width=\"1\" />
  <text x=\"$arc6[4]\" y=\"$arc6[5]\" dx=\"-5\" dy=\"-15\" font-family=\"Arial\" font-size=\"4\" fill=\"black\">c</text>

  </svg>";

  $preop1 = $bc*$df/$ef;
  $res1 = "`{ $op1 } / $df = $bc / $ef` &nbsp &nbsp &nbsp &nbsp `$op1 = $preop1` &nbsp &nbsp &nbsp &nbsp `x = $x`";
  $preop2 = $bc*$ab/$ef;
  $res2 = "`{ $op2 } / $ab = $ef / $bc` &nbsp &nbsp &nbsp &nbsp `$op2 = $preop2` &nbsp &nbsp &nbsp &nbsp `y = $y`";

  return array($p, "<p>2)<br>$res1<br><br>$res2</p>");
  
}

?>