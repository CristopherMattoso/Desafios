<?php
function pir() {
  //Coordenadas R3
  $h_trap = rand(5, 8);
  $h_tri = rand(2, 4);
  $Ax = 0;
  $Ay = 0;
  $Bx = rand(5, 10);
  $By = 0;
  $Cx = $Bx + rand(1, 3);
  $Cy = $h_trap;
  $Dx = rand($Ax + 1, $Bx - 1);
  $Dy = $h_trap + $h_tri;
  $Ex = $Ax - rand(1, 3);
  $Ey = $h_trap;
  $Vx = ($Ax + $Bx + $Cx + $Dx + $Ex)/5;
  $Vy = ($Ay + $By + $Cy + $Dy + $Ey)/5;
  $Vz = rand(10, 18);

  //Coordenadas isométricas
  $iso_Ax = $Ax;
  $iso_Ay = $Ay;
  $iso_Bx = -($By - $Bx)*sqrt(3)/2;
  $iso_By = ($Bx + $By)/2;
  $iso_Cx = -($Cy - $Cx)*sqrt(3)/2;
  $iso_Cy = ($Cx + $Cy)/2;
  $iso_Dx = -($Dy - $Dx)*sqrt(3)/2;
  $iso_Dy = ($Dx + $Dy)/2;
  $iso_Ex = -($Ey - $Ex)*sqrt(3)/2;
  $iso_Ey = ($Ex + $Ey)/2;
  $iso_Vx = -($Vy - $Vx)*sqrt(3)/2;
  $iso_Vy = $Vz + ($Vx + $Vy)/2;
  $iso_Vy_proj = ($Vx + $Vy)/2;

  //Coordenadas SVG pirâmide
  $razao = 12;
  $base = 280;
  $inicio = 20 - $razao*$iso_Ex;
  $pir_Ax = $iso_Ax*$razao + $inicio;
  $pir_Ay = $base - $iso_Ay*$razao;
  $pir_Bx = $iso_Bx*$razao + $inicio;
  $pir_By = $base - $iso_By*$razao;
  $pir_Cx = $iso_Cx*$razao + $inicio;
  $pir_Cy = $base - $iso_Cy*$razao;
  $pir_Dx = $iso_Dx*$razao + $inicio;
  $pir_Dy = $base - $iso_Dy*$razao;
  $pir_Ex = $iso_Ex*$razao + $inicio;
  $pir_Ey = $base - $iso_Ey*$razao;
  $pir_Vx = $iso_Vx*$razao + $inicio;
  $pir_Vy = $base - $iso_Vy*$razao;
  $pir_Vy_proj = $base - $iso_Vy_proj*$razao;
  $VCx = $pir_Cx - $pir_Vx;
  $VCy = $pir_Cy - $pir_Vy;
  $VBx = $pir_Bx - $pir_Vx;
  $VBy = $pir_By - $pir_Vy;
  if ($VCy/$VCx < $VBy/$VBx) {
    $BVC = "<polygon points=\"$pir_Bx,$pir_By $pir_Vx,$pir_Vy $pir_Cx,$pir_Cy\" style=\"fill:lightgreen;stroke:black;stroke-width:3\" />";
  }
  else {
    $BVC = "<line x1=\"$pir_Bx\" y1=\"$pir_By\" x2=\"$pir_Cx\" y2=\"$pir_Cy\" style=\"stroke:black;stroke-width:2;stroke-dasharray:2,2\" /><line x1=\"$pir_Cx\" y1=\"$pir_Cy\" x2=\"$pir_Vx\" y2=\"$pir_Vy\" style=\"stroke:black;stroke-width:2;stroke-dasharray:2,2\" />";
  }
  $VDx = $pir_Dx - $pir_Vx;
  $VDy = $pir_Dy - $pir_Vy;
  $VEx = $pir_Ex - $pir_Vx;
  $VEy = $pir_Ey - $pir_Vy;
  if ($VDy/$VDx > $VEy/$VEx) {
    $DVE = "<polygon points=\"$pir_Dx,$pir_Dy $pir_Vx,$pir_Vy $pir_Ex,$pir_Ey\" style=\"fill:lightgreen;stroke:black;stroke-width:3\" />";
  }
  else {
    $DVE = "<line x1=\"$pir_Dx\" y1=\"$pir_Dy\" x2=\"$pir_Ex\" y2=\"$pir_Ey\" style=\"stroke:black;stroke-width:2;stroke-dasharray:2,2\" /><line x1=\"$pir_Dx\" y1=\"$pir_Dy\" x2=\"$pir_Vx\" y2=\"$pir_Vy\" style=\"stroke:black;stroke-width:2;stroke-dasharray:2,2\" />";
  }
  $pir = "<svg width=\"250\" height=\"300\">
  <!-- face AVB -->
  <polygon points=\"$pir_Ax,$pir_Ay $pir_Vx,$pir_Vy $pir_Bx,$pir_By\" style=\"fill:lightgreen;stroke:black;stroke-width:3\" />
  <!-- face AVE -->
  <polygon points=\"$pir_Ax,$pir_Ay $pir_Vx,$pir_Vy $pir_Ex,$pir_Ey\" style=\"fill:lightgreen;stroke:black;stroke-width:3\" />
  <!-- faces laterais -->
  $BVC
  $DVE
  <!-- face CVD -->
  <line x1=\"$pir_Cx\" y1=\"$pir_Cy\" x2=\"$pir_Dx\" y2=\"$pir_Dy\" style=\"stroke:black;stroke-width:2;stroke-dasharray:2,2\" />
  <!-- Altura -->
  <line x1=\"$pir_Vx\" y1=\"$pir_Vy\" x2=\"$pir_Vx\" y2=\"$pir_Vy_proj\" style=\"stroke:red;stroke-width:4;stroke-dasharray:10,3\" />
  <line x1=\"$pir_Vx\" y1=\"$pir_Vy\" x2=\"$pir_Ax\" y2=\"$pir_Ay\" style=\"stroke:black;stroke-width:2\" />
  <text x=\"$pir_Vx\" y=\"$pir_Vy_proj\" dx=\"15\" dy=\"-60\" fill=\"red\">H</text>
  <text x=\"$pir_Ax\" y=\"$pir_Ay\" dy=\"15\" dx=\"-15\" fill=\"black\">A</text>
  <text x=\"$pir_Bx\" y=\"$pir_By\" dy=\"15\" dx=\"10\" fill=\"black\">B</text>
  <text x=\"$pir_Cx\" y=\"$pir_Cy\" dy=\"-5\" dx=\"10\" fill=\"black\">C</text>
  <text x=\"$pir_Dx\" y=\"$pir_Dy\" dy=\"-5\" dx=\"10\" fill=\"black\">D</text>
  <text x=\"$pir_Ex\" y=\"$pir_Ey\" dy=\"10\" dx=\"-15\" fill=\"black\">E</text>
  <text x=\"$pir_Vx\" y=\"$pir_Vy\" dy=\"-10\" dx=\"5\" fill=\"black\">V</text>
  </svg>";

  //Coordenadas SVG pentágono
  $razao = 20;
  $base = 260;
  $inicio = 20 - $Ex*$razao;
  $pent_Ax = $Ax*$razao + $inicio;
  $pent_Ay = $base - $Ay*$razao;
  $pent_Bx = $Bx*$razao + $inicio;
  $pent_By = $base - $By*$razao;
  $pent_Cx = $Cx*$razao + $inicio;
  $pent_Cy = $base - $Cy*$razao;
  $pent_Dx = $Dx*$razao + $inicio;
  $pent_Dy = $base - $Dy*$razao;
  $pent_Ex = $Ex*$razao + $inicio;
  $pent_Ey = $base - $Ey*$razao;
  $mx = ($pent_Ax + $pent_Bx)/2;
  $nx = ($pent_Cx + $pent_Ex)/2;

  $pent = "<svg width=\"350\" height=\"300\">
  <!-- Polígono -->
  <polygon points=\"$pent_Ax,$pent_Ay $pent_Bx,$pent_By $pent_Cx,$pent_Cy $pent_Dx,$pent_Dy $pent_Ex,$pent_Ey\" style=\"fill:lightgreen;stroke:black;stroke-width:3\" />
  <text x=\"$mx\" y=\"$pent_Ay\" dy=\"20\" fill=\"black\">m</text>
  <!-- divisão Trapézio e Triângulo -->
  <line x1=\"$pent_Ex\" y1=\"$pent_Ey\" x2=\"$pent_Cx\" y2=\"$pent_Cy\" style=\"stroke:black;stroke-width:2;stroke-dasharray:2,2\" />
  <text x=\"$nx\" y=\"$pent_Ey\" dy=\"20\" fill=\"black\">n</text>
  <!-- Altura Triângulo -->
  <line x1=\"$pent_Dx\" y1=\"$pent_Dy\" x2=\"$pent_Dx\" y2=\"$pent_Cy\" style=\"stroke:blue;stroke-width:2;stroke-dasharray:2,2\" />
  <text x=\"$pent_Dx\" y=\"$pent_Dy\" dy=\"40\" dx=\"10\" fill=\"blue\">p</text>
  <!-- Altura Trapézio -->
  <line x1=\"$pent_Ax\" y1=\"$pent_Ay\" x2=\"$pent_Ax\" y2=\"$pent_Cy\" style=\"stroke:red;stroke-width:2;stroke-dasharray:2,2\" />
  <text x=\"$pent_Ax\" y=\"$pent_Ay\" dy=\"-40\" dx=\"10\" fill=\"red\">q</text>
  <text x=\"$pent_Ax\" y=\"$pent_Ay\" dy=\"15\" dx=\"-15\" fill=\"black\">A</text>
  <text x=\"$pent_Bx\" y=\"$pent_By\" dy=\"15\" dx=\"10\" fill=\"black\">B</text>
  <text x=\"$pent_Cx\" y=\"$pent_Cy\" dy=\"-5\" dx=\"10\" fill=\"black\">C</text>
  <text x=\"$pent_Dx\" y=\"$pent_Dy\" dy=\"-5\" dx=\"10\" fill=\"black\">D</text>
  <text x=\"$pent_Ex\" y=\"$pent_Ey\" dy=\"10\" dx=\"-15\" fill=\"black\">E</text>
  </svg>";

  $n = $Cx - $Ex;
  $questao1 = "<p>1 - A pirâmide de base pentagonal abaixo tem altura H = $Vz cm, o pentágono da base foi desenhado ao lado e dividido em duas formas, onde m = $Bx cm, <span style=\"white-space: nowrap\">n = $n cm</span>, p = $h_tri cm e q = $h_trap cm. Se esta pirâmide for totalmente submersa em um tanque de água de 20 cm de largura por 20 cm de comprimento quantos centímetros o nível de água do tanque deverá subir?</p>$pir $pent";
  $area_pent = ($Bx + $n)*$h_trap/2 + $n*$h_tri/2;
  $volume = $area_pent*$Vz/3;
  $nivel = $volume/400;
  $solucao1 = "<p>1) Área Pentágono: `A_{trap} + A_{tri} = {($Bx + $n) cdot $h_trap}/2 + { $n cdot $h_tri}/2 = $area_pent cm²`<br>Volume Pirâmide: `{A_{pent} cdot H}/3 = { $area_pent cdot $Vz }/3 = $volume cm³`<br>Volume deslocado: `20 cdot 20 cdot H = $volume`<br>`H = $volume/400`<br><b>Nível Subido = $nivel cm\n</b></p>";
  
  return array($questao1,$solucao1);
}

function troncopir() {
  $tronco = "<svg width=\"200\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\">
  <polygon points=\"69,60 99,80 139,60 109,40\" fill=\"lightgray\" stroke=\"black\" stroke-width=\"2\"/>
  <polygon points=\"69,60 99,80 99,180 35,140\" fill=\"lightgray\" stroke=\"black\" stroke-width=\"2\"/>
  <polygon points=\"99,80 139,60 173,140 99,180\" fill=\"lightgray\" stroke=\"black\" stroke-width=\"2\"/>
  <line x1=\"35\" y1=\"140\" x2=\"109\" y2=\"100\" stroke=\"black\" stroke-width=\"2\" stroke-dasharray=\"2,2\" />
  <line x1=\"109\" y1=\"40\" x2=\"109\" y2=\"100\" stroke=\"black\" stroke-width=\"2\" stroke-dasharray=\"2,2\" />
  <line x1=\"173\" y1=\"140\" x2=\"109\" y2=\"100\" stroke=\"black\" stroke-width=\"2\" stroke-dasharray=\"2,2\" />
</svg>
";
  $Lme = rand(5, 30);
  $trios = array(array(3,4,5), array(5,12,13), array(6,8,10), array(7,24,25), array(8,15,17), array(9,12,15), array(10,24,26), array(12,35,37), array(12,16,20), array(15,20,25), array(16,30,34),array(18,24,30), array(20,21,29), array(21,28,35)); //14 trios
  $k = $trios[rand(0,13)];
  $Lma = $Lme + 2*$k[0];
  $Htro = $k[1];
  $htra = $k[2];
  $perg = "<p>2 - Um tronco de pirâmide de bases quadradas possui lado da base maior $Lma cm, lado da base menor $Lme cm e sua altura for $Htro cm. Calcule o seu volume e a sua área superficial total.</p>$tronco";
  
  $ABma = $Lma**2;
  $ABme = $Lme**2;
  $soma = $ABma + $ABme + ($Lma*$Lme);
  $V = $soma*$Htro/3;
  $Atrap = (($Lma + $Lme) * $htra)/2;
  $Atot = $ABma + $ABme + 4*$Atrap;
  $resp = "<p>2) Área base maior: `$Lma^2 = $ABma`; Área base menor: `$Lme^2 = $ABme`;<br>Volume: `V = H/3 cdot [A_B + sqrt(A_B cdot A_b) + A_b]`<br>`V = $Htro/3 cdot [$ABma + sqrt($ABma cdot $ABme) + $ABme]`<br>`V = $Htro/3 cdot $soma = $V`<br><b>V = $V cm³</b><br><br>Altura Trapézio: `(($Lma - $Lme)/2)^2 + $Htro^2 = h^2`<br>`h = $htra`<br>Área Trapézio: `{($Lma + $Lme) cdot $htra}/2 = $Atrap`<br>Área total: `$ABma + $ABme + 4 cdot $Atrap = $Atot`<br><b>A = $Atot cm²</b></p>";
  return array($perg,$resp);
}

function troncocone() {


  return array($a,$b);
}


?>