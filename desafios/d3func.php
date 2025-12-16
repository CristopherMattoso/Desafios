<?php
function inscrito() {
    $cx = 200;
    $cy = 100;
    $r = 80;

    // Ângulos em radianos
    do {
      $a1 = deg2rad(rand(180, 270));
      $a2 = deg2rad(rand(90, 180));
      $anguloCentral = abs(rad2deg($a1 - $a2));
  } while ($anguloCentral >= 180 || $anguloCentral < 30); // evita ângulos muito pequenos


    // Ângulo intermediário para o ponto inscrito
    $mid = ($a1 + $a2) / 2 + deg2rad(180 + rand(-20, 20));

    // Coordenadas dos pontos
    $Ax = $cx + $r * cos($a1);
    $Ay = $cy + $r * sin($a1);
    $Bx = $cx + $r * cos($a2);
    $By = $cy + $r * sin($a2);
    $Cx = $cx + $r * cos($mid);
    $Cy = $cy + $r * sin($mid);

    // Calcular ângulo inscrito (metade do central)
    $anguloInscrito = $anguloCentral / 2;

    // Posicionar os textos dentro dos ângulos
    $pxCentral = $cx + (($Ax + $Bx) / 2 - $cx)*0.3; // Ponto médio do ângulo central
    $pyCentral = $cy + (($Ay + $By) / 2 - $cy)*0.3;

    $pxInscrito = $Cx + (($Ax + $Bx) / 2 - $Cx)*0.2; // Ponto médio do ângulo inscrito
    $pyInscrito = $Cy + (($Ay + $By) / 2 - $Cy)*0.2;

    // Gera o SVG como string
    $svg = "<svg width=\"400\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Circunferência -->
  <circle cx=\"$cx\" cy=\"$cy\" r=\"$r\" fill=\"none\" stroke=\"black\" />

  <!-- Segmentos do ângulo central -->
  <line x1=\"$cx\" y1=\"$cy\" x2=\"$Ax\" y2=\"$Ay\" stroke=\"blue\" />
  <line x1=\"$cx\" y1=\"$cy\" x2=\"$Bx\" y2=\"$By\" stroke=\"blue\" />

  <!-- Segmentos do ângulo inscrito -->
  <line x1=\"$Cx\" y1=\"$Cy\" x2=\"$Ax\" y2=\"$Ay\" stroke=\"green\" />
  <line x1=\"$Cx\" y1=\"$Cy\" x2=\"$Bx\" y2=\"$By\" stroke=\"green\" />

  <!-- Pontos -->
  <circle cx=\"$Ax\" cy=\"$Ay\" r=\"3\" fill=\"red\" />
  <circle cx=\"$Bx\" cy=\"$By\" r=\"3\" fill=\"red\" />
  <circle cx=\"$Cx\" cy=\"$Cy\" r=\"3\" fill=\"orange\" />
  <circle cx=\"$cx\" cy=\"$cy\" r=\"3\" fill=\"black\" />

  <!-- Textos para os ângulos -->
  <text x=\"$pxCentral\" y=\"$pyCentral\" font-size=\"14\" fill=\"blue\" text-anchor=\"middle\" dy=\"5\"> {$anguloCentral}° </text>
  <text x=\"$pxInscrito\" y=\"$pyInscrito\" font-size=\"14\" fill=\"green\" text-anchor=\"middle\" dy=\"5\"> x </text> </svg>";

  $p = "Calcule o valor de x: <br>$svg";
  $r = "`a_c = 2 cdot a_i`<br>`{$anguloCentral}° = 2 cdot x`<br>`x = {$anguloInscrito}°`";
  return array($p, $r);
  
}

function tales() {
  // Definir três retas paralelas em posições aleatórias
  do {
    $y1 = rand(3, 5)*10;
    $y2 = rand(7, 10)*10;
    $y3 = rand(12, 17)*10;
  } while (($y2 - $y1 == $y3 - $y2));

  // Definir tamanhos das secções
  $AB = $y2 - $y1;
  $ang1 = asin(($y2 - $y1)/$AB);
  $BC = round(($y3 - $y2)/sin($ang1));
  $DE = $AB*6/5;
  $ang2 = acos(($y2 - $y1)/$DE);
  $EF = round(($y3 - $y2)/cos($ang2));

  // Definir pontos que formam as transversais
  $ACx1 = 20;
  $ACy1 = 180;
  $ACx2 = 20 + round(360/tan($ang1));
  $ACy2 = 20;
  $DFx1 = $ACx2 + rand(20, 30);
  $DFy1 = 20;
  $DFx2 = $DFx1 + round(360*tan($ang2));
  $DFy2 = 180;

  // Definir posição dos textos
  $T1x = 10 + round(cos($ang1)*($BC + $AB/2));
  $T1y = $y3 - round(sin($ang1)*($BC + $AB/2));
  $T2x = 10 + round(cos($ang1)*($BC/2));
  $T2y = $y3 - round(sin($ang1)*($BC/2));
  $T3x = $DFx1 + 80 + round(sin($ang2)*($DE/2));
  $T3y = $y1 + round(cos($ang2)*($DE/2));
  $T4x = $DFx1 + 120 + round(sin($ang2)*($DE + $EF/2));
  $T4y = $y1 + round(cos($ang2)*($DE + $EF/2));
  

  $svg = "<svg width=\"400\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Retas paralelas -->
  <line x1=\"0\" y1=\"$y1\" x2=\"400\" y2=\"$y1\" stroke=\"black\" />
  <line x1=\"0\" y1=\"$y2\" x2=\"400\" y2=\"$y2\" stroke=\"black\" />
  <line x1=\"0\" y1=\"$y3\" x2=\"400\" y2=\"$y3\" stroke=\"black\" />

  <!-- Transversais -->
  <line x1=\"$ACx1\" y1=\"$ACy1\" x2=\"$ACx2\" y2=\"$ACy2\" stroke=\"red\" />
  <line x1=\"$DFx1\" y1=\"$DFy1\" x2=\"$DFx2\" y2=\"$DFy2\" stroke=\"red\" />

  <!-- Textos para os lados -->
  <text x=\"$T1x\" y=\"$T1y\" font-size=\"14\" fill=\"blue\" text-anchor=\"middle\"> $AB </text>
  <text x=\"$T2x\" y=\"$T2y\" font-size=\"14\" fill=\"blue\" text-anchor=\"middle\"> $BC </text>
  <text x=\"$T3x\" y=\"$T3y\" font-size=\"14\" fill=\"blue\" text-anchor=\"middle\"> $DE </text>
  <text x=\"$T4x\" y=\"$T4y\" font-size=\"14\" fill=\"blue\" text-anchor=\"middle\"> x </text>
  </svg>";

  $p = "Calcule o valor de x: <br>$svg";
  $produto = $BC*$DE;
  $r = "`$AB/$DE = $BC/x`<br>`$AB cdot x = $BC cdot $DE`<br>`$AB x = $produto`<br>`x = $EF`";
  return array($p, $r);
}

function alternos() {
  $ang1 = atan(rand(3, 18)*10/120);
  $ang1Graus = round($ang1*180/M_PI);
  $ang2 = atan(rand(3, 18)*10/120);
  $ang2Graus = round(180 - $ang2*180/M_PI);

  $V3x = 180;
  $V3y = 100;
  $arc3x1 = $V3x - 20*sin($ang1);
  $arc3y1 = $V3y - 20*cos($ang1);
  $arc3x2 = $V3x - 20*sin($ang2);
  $arc3y2 = $V3y + 20*cos($ang2);
  $txt3x = $V3x - 30;
  $txt3y = $V3y + 5;
  
  $Tr1x1 = $V3x - 100*tan($ang1); 
  $Tr1y1 = 0;
  $Tr1x2 = $V3x + 20*tan($ang1);
  $Tr1y2 = 120;
  $V1x = $V3x - 80*tan($ang1);
  $V1y = 20;
  $arc1x1 = $V1x + 20;
  $arc1y1 = $V1y;
  $arc1x2 = $V1x + 20*sin($ang1);
  $arc1y2 = $V1y + 20*cos($ang1);
  $txt1x = $V1x + 30;
  $txt1y = $V1y + 15;

  $Tr2x1 = $V3x - 100*tan($ang2); 
  $Tr2y1 = 200;
  $Tr2x2 = $V3x + 20*tan($ang2);
  $Tr2y2 = 80;
  $V2x = $V3x - 80*tan($ang2);
  $V2y = 180;
  $arc2x1 = $V2x - 20;
  $arc2y1 = $V2y;
  $arc2x2 = $V2x + 20*sin($ang2);
  $arc2y2 = $V2y - 20*cos($ang2);
  $txt2x = $V2x - 30;
  $txt2y = $V2y - 20;

  $svg = "<svg width=\"400\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Retas paralelas -->
  <line x1=\"50\" y1=\"20\" x2=\"200\" y2=\"20\" stroke=\"black\" stroke-width=\"2\"/>
  <line x1=\"50\" y1=\"180\" x2=\"200\" y2=\"180\" stroke=\"black\" stroke-width=\"2\"/>

  <!-- Transversal 1 -->
  <line x1=\"$Tr1x1\" y1=\"$Tr1y1\" x2=\"$Tr1x2\" y2=\"$Tr1y2\" stroke=\"blue\" stroke-width=\"2\"/>
  
  <!-- Transversal 2 -->
  <line x1=\"$Tr2x1\" y1=\"$Tr2y1\" x2=\"$Tr2x2\" y2=\"$Tr2y2\" stroke=\"green\" stroke-width=\"2\"/>

  <!-- Arco para ângulo agudo (na intersecção da transversal 1 com a primeira paralela) -->
  <path d=\"M $arc1x1,$arc1y1 A20,20 0 0,1 $arc1x2,$arc1y2\" fill=\"none\" stroke=\"red\" stroke-width=\"2\"/>
  <text x=\"$txt1x\" y=\"$txt1y\" font-size=\"14\" fill=\"red\">{$ang1Graus}°</text>

  <!-- Arco para ângulo obtuso (na intersecção da transversal 1 com a segunda paralela) -->
  <path d=\"M $arc2x1,$arc2y1 A20,20 0 0,1 $arc2x2,$arc2y2\" fill=\"none\" stroke=\"orange\" stroke-width=\"2\"/>
  <text x=\"$txt2x\" y=\"$txt2y\" font-size=\"14\" fill=\"orange\">{$ang2Graus}°</text>

  <!-- Arco para ângulo entre as transversais (no ponto onde elas se cruzam) -->
  <path d=\"M $arc3x1,$arc3y1 A20,20 1 0,0 $arc3x2,$arc3y2\" fill=\"none\" stroke=\"purple\" stroke-width=\"2\"/>
  <text x=\"$txt3x\" y=\"$txt3y\" font-size=\"14\" fill=\"purple\">x</text>
  </svg>";

  $x = $ang1Graus + (180 - $ang2Graus);

  $xinf = 180 - $ang2Graus;
  $p = "Calcule o valor de x: <br>$svg";
  $r = "`x_\"sup\" = $ang1Graus` por alternos internos<br>`x_\"inf\" + $ang2Graus = 180 rightarrow x_\"inf\" = $xinf` por colaterais internos<br>`x = x_\"sup\" + x_\"inf\" rightarrow x = {$x}°`";
  return array($p, $r);

}

function trigonometria() {
  do {
    $b_px = rand(4, 16)*10;
    $angBGraus = rand(20, 60);
    $angB = $angBGraus*M_PI/180;
    $c_px = $b_px/tan($angB);
  } while (($c_px < 40)||($c_px > 400));

  $Ax = 20;
  $Ay = 180;
  $Bx = $Ax + $c_px;
  $By = $Ay;
  $Cx = $Ax;
  $Cy = $Ay - $b_px;

  $retx = $Ax + 15;
  $rety = $Ay - 15;
  $arcx1 = $Bx - 20;
  $arcy1 = $By;
  $arcx2 = $Bx - 20*cos($angB);
  $arcy2 = $By - 20*sin($angB);
  $textAngx = $Bx - 40;
  $textAngy = $By - 5;

  $textbx = 5;
  $textby = $Ay - $b_px/2;
  $textcx = $Ax + $c_px*0.4;
  $textcy = 195;
  $textax = $textcx + 10;
  $textay = $textby - 10;

  $seno = round(1000*sin($angB))/1000;
  $cosseno = round(1000*cos($angB))/1000;
  $tangente = round(1000*tan($angB))/1000;

  $caso = rand(0,2);
  switch ($caso ) {
    case 0: //seno
      $b = rand(10, 50);
      $a = round($b/sin($angB));
      $x = $a*round(1000*sin($angB))/1000;
      $r = "`sin ({$angBGraus}°) = \"CO\"/\"HI\"`<br>`$seno = x/$a`<br>`x = $seno cdot $a`<br>`x = $x`";
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">$a</text>
  <text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">x</text>";
      break;
    case 1: //cosseno
      $b = rand(10, 50);
      $a = round($b/sin($angB));
      $x = $a*round(1000*cos($angB))/1000;
      $r = "`cos ({$angBGraus}°) = \"CA\"/\"HI\"`<br>`$cosseno = x/$a`<br>`x = $cosseno cdot $a`<br>`x = $x`";
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">$a</text>
  <text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">x</text>";
      break;
    case 2: //tangente
      $b = rand(10, 50);
      $c = round($b/tan($angB));
      $x = $c*round(1000*tan($angB))/1000;
      $r = "`tan ({$angBGraus}°) =\"CO\"/\"CA\"`<br>`$tangente = x/$c`<br>`x = $tangente cdot $c`<br>`x = $x`";
      $textos = "<text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">x</text>
  <text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">$c</text>";
      break;
  }

  $svg = "<svg width=\"400\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Triângulo Retângulo -->
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:2\" />

  <!-- Ângulos -->
  <line x1=\"$Ax\" y1=\"$rety\" x2=\"$retx\" y2=\"$rety\" stroke=\"green\" stroke-width=\"2\" />
  <line x1=\"$retx\" y1=\"$Ay\" x2=\"$retx\" y2=\"$rety\" stroke=\"green\" stroke-width=\"2\" />

  <path d=\"M $arcx1,$arcy1 A20,20 0 0,1 $arcx2,$arcy2\" fill=\"none\" stroke=\"red\" stroke-width=\"2\"/>
  <text x=\"$textAngx\" y=\"$textAngy\" font-size=\"14\" fill=\"red\">{$angBGraus}°</text>

  <!-- Textos para os lados -->
  $textos

  </svg>";

  $p = "Calcule o valor de x:<br>Dados `sin ({$angBGraus}°) approx $seno, cos ({$angBGraus}°) approx $cosseno, tan ({$angBGraus}°) approx $tangente` <br>$svg";

  return array($p, $r);
}

function pitagoras() {
  $ternos = array(array(3,4,5), array(5,12,13), array(8,15,17));
  $trio = $ternos[rand(0,2)];
  $angB = atan($trio[0]/$trio[1]);
  do {
    $b_px = rand(4, 16)*10;
    $c_px = $b_px/tan($angB);
  } while (($c_px < 40)||($c_px > 400));

  $Ax = 20;
  $Ay = 180;
  $Bx = $Ax + $c_px;
  $By = $Ay;
  $Cx = $Ax;
  $Cy = $Ay - $b_px;

  $retx = $Ax + 15;
  $rety = $Ay - 15;
  $arcx1 = $Bx - 20;
  $arcy1 = $By;
  $arcx2 = $Bx - 20*cos($angB);
  $arcy2 = $By - 20*sin($angB);
  $textAngx = $Bx - 40;
  $textAngy = $By - 5;

  $textbx = 5;
  $textby = $Ay - $b_px/2;
  $textcx = $Ax + $c_px*0.4;
  $textcy = 195;
  $textax = $textcx + 10;
  $textay = $textby - 10;

  $caso = rand(0,2);
  switch ($caso ) {
    case 0: //a
      $b = $trio[0]*rand(1, 20);
      $c = round($b/tan($angB));
      $a = round($b/sin($angB));
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">x</text>
  <text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">$b</text><text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">$c</text>";
      $asqr = $a**2;
      $bsqr = $b**2;
      $csqr = $c**2;
      $r = "`a^2 = b^2 + c^2`<br>`x^2 = $b^2 + $c^2`<br>`x^2 = $bsqr + $csqr`<br>`x^2 = $asqr`<br>`x = $a`";
      break;
    case 1: //b
      $b = $trio[0]*rand(1, 20);
      $c = round($b/tan($angB));
      $a = round($b/sin($angB));
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">$a</text>
  <text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">x</text><text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">$c</text>";
      $asqr = $a**2;
      $bsqr = $b**2;
      $csqr = $c**2;
      $r = "`a^2 = b^2 + c^2`<br>`$a^2 = x^2 + $c^2`<br>`$asqr = x^2 + $csqr`<br>`x^2 = $bsqr`<br>`x = $b`";
      break;
    case 2: //c
      $b = $trio[0]*rand(1, 20);
      $c = round($b/tan($angB));
      $a = round($b/sin($angB));
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">$a</text>
  <text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">$b</text><text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">x</text>";
      $asqr = $a**2;
      $bsqr = $b**2;
      $csqr = $c**2;
      $r = "`a^2 = b^2 + c^2`<br>`$a^2 = $b^2 + x^2`<br>`$asqr = $bsqr + x^2`<br>`x^2 = $csqr`<br>`x = $c`";
      break;
  }

  $svg = "<svg width=\"400\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Triângulo Retângulo -->
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:2\" />

  <!-- Ângulos -->
  <line x1=\"$Ax\" y1=\"$rety\" x2=\"$retx\" y2=\"$rety\" stroke=\"green\" stroke-width=\"2\" />
  <line x1=\"$retx\" y1=\"$Ay\" x2=\"$retx\" y2=\"$rety\" stroke=\"green\" stroke-width=\"2\" />

  <!-- Textos para os lados -->
  $textos

  </svg>";

  $p = "Calcule o valor de x: <br>$svg";
  return array($p, $r);
}

function relacoes() {
  $ternos = array(array(3,4,5), array(5,12,13), array(8,15,17));
  $trio = $ternos[rand(0,2)];
  $angB = atan($trio[1]/$trio[0]);
  do {
    $h_px = rand(4, 16)*10;
    $c_px = $h_px/sin($angB);
    $a_px = $c_px/cos($angB);
  } while (($a_px < 60)||($a_px > 400));
  $b_px = sqrt($a_px**2 - $c_px**2);
  $m_px = $b_px**2/$a_px;
  $n_px = $c_px**2/$a_px;

  $Bx = 20;
  $By = 180;
  $Cx = $Bx + $a_px;
  $Cy = $By;
  $Ax = $Bx + $c_px*cos($angB);
  $Ay = $By - $c_px*sin($angB);

  $textax = $Bx + $a_px*0.35;
  $textay = 195;
  $textnx = $Bx + $n_px*0.4;
  $textny = 175;
  $texthx = $Bx + $n_px + 10;
  $texthy = $By - $h_px/2;
  $textmx = $Bx + $n_px + 0.4*$m_px;
  $textmy = $textny;
  $textcx = $textnx - 15;
  $textcy = $texthy;
  $textbx = $textmx + 10;
  $textby = $texthy - 10;

  $caso = rand(0,2);
  switch ($caso ) {
    case 0: //m
      $b = $trio[1]*rand(1, 20);
      $c = round($b/tan($angB));
      $a = round($b/sin($angB));
      $m = round(100*$b**2/$a)/100;
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">$a</text>
  <text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">$b</text><text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">$c</text><text x=\"$textmx\" y=\"$textmy\" font-size=\"14\" fill=\"green\">x</text>";
      $bsqr = $b**2;
      $r = "`b^2 = a cdot m`<br>`$b^2 = $a cdot x`<br>`$a x = $bsqr`<br>`x = $m`";
      break;
    case 1: //n
      $b = $trio[1]*rand(1, 20);
      $c = round($b/tan($angB));
      $a = round($b/sin($angB));
      $n = round(100*$c**2/$a)/100;
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">$a</text>
  <text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">$b</text><text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">$c</text><text x=\"$textnx\" y=\"$textny\" font-size=\"14\" fill=\"red\">x</text>";
      $csqr = $c**2;
      $r = "`c^2 = a cdot n`<br>`$c^2 = $a cdot x`<br>`$a x = $csqr`<br>`x = $n`";
      break;
    case 2: //h
      $b = $trio[1]*rand(1, 20);
      $c = round($b/tan($angB));
      $a = round($b/sin($angB));
      $h = round(100*$b*$c/$a)/100;
      $textos = "<text x=\"$textax\" y=\"$textay\" font-size=\"14\" fill=\"black\">$a</text>
  <text x=\"$textbx\" y=\"$textby\" font-size=\"14\" fill=\"black\">$b</text><text x=\"$textcx\" y=\"$textcy\" font-size=\"14\" fill=\"black\">$c</text><text x=\"$texthx\" y=\"$texthy\" font-size=\"14\" fill=\"blue\">x</text>";
      $bXc = $b*$c;
      $r = "`a cdot h = b cdot c`<br>`$a cdot x = $b cdot $c`<br>`$a x = $bXc`<br>`x = $h`";
      break;
  }

  $svg = "<svg width=\"400\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Triângulo Retângulo -->
  <polygon points=\"$Ax,$Ay $Bx,$By $Cx,$Cy\" style=\"fill:none;stroke:black;stroke-width:3\" />
  <line x1=\"$Ax\" y1=\"$Ay\" x2=\"$Ax\" y2=\"$By\" style=\"stroke:blue;stroke-width:2;\" />
  <line x1=\"$Bx\" y1=\"$By\" x2=\"$Ax\" y2=\"$By\" style=\"stroke:red;stroke-width:2;\" />
  <line x1=\"$Ax\" y1=\"$Cy\" x2=\"$Cx\" y2=\"$Cy\" style=\"stroke:green;stroke-width:2;\" />

  <!-- Textos para os lados -->
  $textos

  </svg>";

  $p = "Calcule o valor de x: <br>$svg";
  return array($p, $r);
}
?>