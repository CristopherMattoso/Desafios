<?php
function plano() {
  $plano = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>
  </svg>
  ";
  return array($plano,$plano);
}

function barco1() {
  // retângulo inclinado 1
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand (0, 2) - 6;
      $Ay = rand(3, 5);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand (1, 3);
      $Ay = rand(3, 5);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand (1, 3);
      $Ay = rand(0, 2) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 2) - 6;
      $Ay = rand(0, 2) - 4;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay + 1;
  $Cx = $Ax + 2;
  $Cy = $Ay;
  $Dx = $Ax + 3;
  $Dy = $Ay - 1;
  $Ex = $Ax + 2;
  $Ey = $Ay - 2;
  $Fx = $Ax + 1;
  $Fy = $Ay - 1;
  //internos
  $Gx = $Ax + 1;
  $Gy = $Ay;
  $Hx = $Ax + 2;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand (0, 3) - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 3) - 6 - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand (0, 3) - 6 - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand (0, 3) - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";
  
  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCD, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Dx, $Dy) e D = ($Ex, $Ey). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";
  
  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco2() {
  // hexágono 1
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 2) - 5;
      $Ay = rand(3, 6);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(2, 4);
      $Ay = rand(3, 6);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(2, 4);
      $Ay = rand(0, 3) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 2) - 5;
      $Ay = rand(0, 3) - 4;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay;
  $Cx = $Ax + 2;
  $Cy = $Ay - 1;
  $Dx = $Ax + 1;
  $Dy = $Ay - 2;
  $Ex = $Ax;
  $Ey = $Ay - 2;
  $Fx = $Ax - 1;
  $Fy = $Ay - 1;
  //internos
  $Gx = $Ax;
  $Gy = $Ay - 1;
  $Hx = $Ax + 1;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(1, 4) - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 3) - 5 - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 3) - 5 - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(1, 4) - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";
  
  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCDEF, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Cx, $Cy), D = ($Dx, $Dy), E = ($Ex,$Ey) e F = ($Fx,$Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco3() {
  // pentágono 1
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 3) - 6;
      $Ay = rand(3, 6);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(3, 6);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(0, 3) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 3) - 6;
      $Ay = rand(0, 3) - 4;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay;
  $Cx = $Ax + 2;
  $Cy = $Ay;
  $Dx = $Ax + 2;
  $Dy = $Ay - 1;
  $Ex = $Ax + 1;
  $Ey = $Ay - 2;
  $Fx = $Ax;
  $Fy = $Ay - 2;
  $Gx = $Ax;
  $Gy = $Ay - 1;
  //interno
  $Hx = $Ax + 1;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 4) - 6 - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 4) - 6 - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCDE, onde A = ($Ax,$Ay), B = ($Cx, $Cy), C = ($Dx, $Dy), D = ($Ex, $Ey) e E = ($Fx,$Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco4() {
  // trapézio 1
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 2) - 5;
      $Ay = rand(3, 6);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(2, 4);
      $Ay = rand(3, 6);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(2, 4);
      $Ay = rand(0, 3) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 2) - 5;
      $Ay = rand(0, 3) - 4;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay;
  $Cx = $Ax + 2;
  $Cy = $Ay - 2;
  $Dx = $Ax + 1;
  $Dy = $Ay - 2;
  $Ex = $Ax;
  $Ey = $Ay - 2;
  $Fx = $Ax - 1;
  $Fy = $Ay - 2;
  //internos
  $Gx = $Ax;
  $Gy = $Ay - 1;
  $Hx = $Ax + 1;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(1, 4) - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 3) - 5 - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 3) - 5 - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(1, 4) - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCD, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Cx, $Cy) e D = ($Fx, $Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco5() {
  // retângulo inclinado 2
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand (0, 2) - 3;
      $Ay = rand(3, 5);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand (4, 6);
      $Ay = rand(3, 5);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand (4, 6);
      $Ay = rand(0, 2) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 2) - 3;
      $Ay = rand(0, 2) - 4;
      break;
  }
  $Bx = $Ax - 1;
  $By = $Ay + 1;
  $Cx = $Ax - 2;
  $Cy = $Ay;
  $Dx = $Ax - 3;
  $Dy = $Ay - 1;
  $Ex = $Ax - 2;
  $Ey = $Ay - 2;
  $Fx = $Ax - 1;
  $Fy = $Ay - 1;
  //internos
  $Gx = $Ax - 1;
  $Gy = $Ay;
  $Hx = $Ax - 2;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand (2, 5) - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 3) - 3 - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand (0, 3) - 3 - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand (2, 5) - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCD, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Dx, $Dy) e D = ($Ex, $Ey). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco6() {
  // hexágono 2
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 3) - 5;
      $Ay = rand(4, 6);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(2, 5);
      $Ay = rand(4, 6);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(2, 5);
      $Ay = rand(1, 3) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 3) - 5;
      $Ay = rand(1, 3) - 4;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay - 1;
  $Cx = $Ax + 1;
  $Cy = $Ay - 2;
  $Dx = $Ax;
  $Dy = $Ay - 3;
  $Ex = $Ax - 1;
  $Ey = $Ay - 2;
  $Fx = $Ax - 1;
  $Fy = $Ay - 1;
  //internos
  $Gx = $Ax;
  $Gy = $Ay - 1;
  $Hx = $Ax;
  $Hy = $Ay - 2;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(1, 5) - $Ax;
      $Vy = rand(0, 3) - 3 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 4) - 5 - $Ax;
      $Vy = rand(0, 3) - 3 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 4) - 5 - $Ax;
      $Vy = rand(3, 6) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(1, 5) - $Ax;
      $Vy = rand(3, 6) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCDEF, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Cx, $Cy), D = ($Dx, $Dy), E = ($Ex,$Ey) e F = ($Fx,$Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco7() {
  // pentágono 2
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 3) - 6;
      $Ay = rand(3, 6);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(3, 6);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(0, 3) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 3) - 6;
      $Ay = rand(0, 3) - 4;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay;
  $Cx = $Ax + 2;
  $Cy = $Ay - 1;
  $Dx = $Ax + 2;
  $Dy = $Ay - 2;
  $Ex = $Ax + 1;
  $Ey = $Ay - 2;
  $Fx = $Ax;
  $Fy = $Ay - 2;
  $Gx = $Ax;
  $Gy = $Ay - 1;
  //interno
  $Hx = $Ax + 1;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 4) - 6 - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 4) - 6 - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCDE, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Cx, $Cy), D = ($Dx, $Dy) e E = ($Fx,$Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco8() {
  // pentágono 3
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 3) - 6;
      $Ay = rand(3, 6);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(3, 6);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(0, 3) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 3) - 6;
      $Ay = rand(0, 3) - 4;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay;
  $Cx = $Ax + 2;
  $Cy = $Ay;
  $Dx = $Ax + 2;
  $Dy = $Ay - 1;
  $Ex = $Ax + 2;
  $Ey = $Ay - 2;
  $Fx = $Ax + 1;
  $Fy = $Ay - 2;
  $Gx = $Ax;
  $Gy = $Ay - 1;
  //interno
  $Hx = $Ax + 1;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 4) - 6 - $Ax;
      $Vy = rand(0, 4) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 4) - 6 - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCDE, onde A = ($Ax,$Ay), B = ($Cx, $Cy), C = ($Ex, $Ey), D = ($Fx, $Fy) e E = ($Gx,$Gy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco9() {
  // pentágono 4
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 3) - 4;
      $Ay = rand(1, 4);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(3, 6);
      $Ay = rand(1, 4);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(3, 6);
      $Ay = rand(0, 3) - 6;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 3) - 4;
      $Ay = rand(0, 3) - 6;
      break;
  }
  $Bx = $Ax;
  $By = $Ay + 1;
  $Cx = $Ax;
  $Cy = $Ay + 2;
  $Dx = $Ax - 1;
  $Dy = $Ay + 2;
  $Ex = $Ax - 2;
  $Ey = $Ay + 1;
  $Fx = $Ax - 2;
  $Fy = $Ay;
  $Gx = $Ax - 1;
  $Gy = $Ay;
  //interno
  $Hx = $Ax - 1;
  $Hy = $Ay + 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(0, 4) - 6 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 4) - 4 - $Ax;
      $Vy = rand(0, 4) - 6 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 4) - 4 - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(4, 0) - $Ax;
      $Vy = rand(2, 6) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 7; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCDE, onde A = ($Ax,$Ay), B = ($Cx, $Cy), C = ($Ex, $Ey), D = ($Fx, $Fy) e E = ($Gx,$Gy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco10() {
  // trapézio 2
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 2) - 5;
      $Ay = rand(1, 4);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(2, 4);
      $Ay = rand(1, 4);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(2, 4);
      $Ay = rand(0, 3) - 6;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 2) - 5;
      $Ay = rand(0, 3) - 6;
      break;
  }
  $Bx = $Ax + 1;
  $By = $Ay;
  $Cx = $Ax + 2;
  $Cy = $Ay + 2;
  $Dx = $Ax + 1;
  $Dy = $Ay + 2;
  $Ex = $Ax;
  $Ey = $Ay + 2;
  $Fx = $Ax - 1;
  $Fy = $Ay + 2;
  //internos
  $Gx = $Ax;
  $Gy = $Ay + 1;
  $Hx = $Ax + 1;
  $Hy = $Ay + 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(1, 4) - $Ax;
      $Vy = rand(0, 4) - 6 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 3) - 5 - $Ax;
      $Vy = rand(0, 4) - 6 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 3) - 5 - $Ax;
      $Vy = rand(0, 4) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(1, 4) - $Ax;
      $Vy = rand(0, 4) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCD, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Cx, $Cy) e D = ($Fx, $Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco11() {
  // trapézio 3
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 3) - 6;
      $Ay = rand(3, 5);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(3, 5);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(1, 4);
      $Ay = rand(0, 2) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 3) - 6;
      $Ay = rand(0, 2) - 4;
      break;
  }
  $Bx = $Ax;
  $By = $Ay - 1;
  $Cx = $Ax + 2;
  $Cy = $Ay - 2;
  $Dx = $Ax + 2;
  $Dy = $Ay - 1;
  $Ex = $Ax + 2;
  $Ey = $Ay;
  $Fx = $Ax + 2;
  $Fy = $Ay + 1;
  //internos
  $Gx = $Ax + 1;
  $Gy = $Ay;
  $Hx = $Ax + 1;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 4) - 6 - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 4) - 6 - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(0, 4) - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCD, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Cx, $Cy) e D = ($Fx, $Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}

function barco12() {
  // trapézio 4
  $case = rand(0, 3);
  $pol1 = array();
  switch($case) {
    case 0:
      // 4º quadrante
      $Ax = rand(0, 3) - 4;
      $Ay = rand(3, 5);
      break;
    case 1:
      // 1º quadrante
      $Ax = rand(3, 6);
      $Ay = rand(3, 5);
      break;
    case 2:
      // 2º quadrante
      $Ax = rand(3, 6);
      $Ay = rand(0, 2) - 4;
      break;
    case 3:
      // 3º quadrante
      $Ax = rand (0, 3) - 4;
      $Ay = rand(0, 2) - 4;
      break;
  }
  $Bx = $Ax;
  $By = $Ay - 1;
  $Cx = $Ax - 2;
  $Cy = $Ay - 2;
  $Dx = $Ax - 2;
  $Dy = $Ay - 1;
  $Ex = $Ax - 2;
  $Ey = $Ay;
  $Fx = $Ax - 2;
  $Fy = $Ay + 1;
  //internos
  $Gx = $Ax - 1;
  $Gy = $Ay;
  $Hx = $Ax - 1;
  $Hy = $Ay - 1;
  array_push($pol1, array($Ax, $Ay), array($Bx, $By), array($Cx, $Cy), array($Dx, $Dy), array($Ex, $Ey), array($Fx, $Fy), array($Gx, $Gy), array($Hx, $Hy));

  //Reflexão
  $pol2 = array();
  $tiporef = rand(0,1);
  $k = count($pol1);
  switch ($tiporef) {
    case 0:
      // reflexão por Oy
      $ref = "Oy";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][0];
        $Py = $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
    case 1:
      // reflexão por Ox
      $ref = "Ox";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][0];
        $Py = 0 - $pol1[$i][1];
        array_push($pol2, array($Px, $Py));
      }
      break;
  }

  // Rotação
  $pol3 = array();
  $tiporot = ($case + $tiporef) % 2;
  $k = count($pol1);
  switch ($tiporot) {
    case 0:
      // rotação 90° por O antihorário
      $rot = "anti-horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = 0 - $pol1[$i][1];
        $Py = $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
    case 1:
      // rotação 90° por O horário
      $rot = "horário";
      for ($i = 0; $i < $k; $i++) {
        $Px = $pol1[$i][1];
        $Py = 0 - $pol1[$i][0];
        array_push($pol3, array($Px, $Py));
      }
      break;
  }

  // Translação
  switch($case) {
    case 0:
      // 2º quadrante
      $Vx = rand(2, 6) - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 1:
      // 3º quadrante
      $Vx = rand (0, 4) - 4 - $Ax;
      $Vy = rand(0, 3) - 4 - $Ay;
      break;
    case 2:
      // 4º quadrante
      $Vx = rand(0, 4) - 4 - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
    case 3:
      // 1º quadrante
      $Vx = rand(2, 6) - $Ax;
      $Vy = rand(2, 5) - $Ay;
      break;
  }
  $pol4 = array();
  for ($i = 0; $i < $k; $i++) {
    $Px = $pol1[$i][0] + $Vx;
    $Py = $pol1[$i][1] + $Vy;
    array_push($pol4, array($Px, $Py));
  }

  $pol1_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol1[$i][0];
    $y = -$pol1[$i][1];
    $pol1_str .= "$x,$y ";
  }
  $pol1_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol2_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol2[$i][0];
    $y = -$pol2[$i][1];
    $pol2_str .= "$x,$y ";
  }
  $pol2_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol3_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol3[$i][0];
    $y = -$pol3[$i][1];
    $pol3_str .= "$x,$y ";
  }
  $pol3_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $pol4_str = "<polygon points=\"";
  for($i = 0; $i < 6; $i++) {
    $x = $pol4[$i][0];
    $y = -$pol4[$i][1];
    $pol4_str .= "$x,$y ";
  }
  $pol4_str .= "\" fill=\"blue\" fill-opacity=\"0.5\" stroke=\"blue\" stroke-width=\"0.1\"/>";

  $plano_res = "
  <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"600\" viewBox=\"-7 -7 14 14\">
    <!-- Eixos X e Y -->
    <line x1=\"-6\" y1=\"0\" x2=\"6\" y2=\"0\" stroke=\"black\" stroke-width=\"0.05\"/>
    <line x1=\"0\" y1=\"-6\" x2=\"0\" y2=\"6\" stroke=\"black\" stroke-width=\"0.05\"/>

    <!-- Malha -->
    <g stroke=\"lightgrey\" stroke-width=\"0.02\">
      <!-- Linhas verticais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"-6\" y2=\"6\"/>
        <line x1=\"-5\" y1=\"-6\" x2=\"-5\" y2=\"6\"/>
        <line x1=\"-4\" y1=\"-6\" x2=\"-4\" y2=\"6\"/>
        <line x1=\"-3\" y1=\"-6\" x2=\"-3\" y2=\"6\"/>
        <line x1=\"-2\" y1=\"-6\" x2=\"-2\" y2=\"6\"/>
        <line x1=\"-1\" y1=\"-6\" x2=\"-1\" y2=\"6\"/>
        <line x1=\"1\" y1=\"-6\" x2=\"1\" y2=\"6\"/>
        <line x1=\"2\" y1=\"-6\" x2=\"2\" y2=\"6\"/>
        <line x1=\"3\" y1=\"-6\" x2=\"3\" y2=\"6\"/>
        <line x1=\"4\" y1=\"-6\" x2=\"4\" y2=\"6\"/>
        <line x1=\"5\" y1=\"-6\" x2=\"5\" y2=\"6\"/>
        <line x1=\"6\" y1=\"-6\" x2=\"6\" y2=\"6\"/>
      </g>
      <!-- Linhas horizontais -->
      <g>
        <line x1=\"-6\" y1=\"-6\" x2=\"6\" y2=\"-6\"/>
        <line x1=\"-6\" y1=\"-5\" x2=\"6\" y2=\"-5\"/>
        <line x1=\"-6\" y1=\"-4\" x2=\"6\" y2=\"-4\"/>
        <line x1=\"-6\" y1=\"-3\" x2=\"6\" y2=\"-3\"/>
        <line x1=\"-6\" y1=\"-2\" x2=\"6\" y2=\"-2\"/>
        <line x1=\"-6\" y1=\"-1\" x2=\"6\" y2=\"-1\"/>
        <line x1=\"-6\" y1=\"1\" x2=\"6\" y2=\"1\"/>
        <line x1=\"-6\" y1=\"2\" x2=\"6\" y2=\"2\"/>
        <line x1=\"-6\" y1=\"3\" x2=\"6\" y2=\"3\"/>
        <line x1=\"-6\" y1=\"4\" x2=\"6\" y2=\"4\"/>
        <line x1=\"-6\" y1=\"5\" x2=\"6\" y2=\"5\"/>
        <line x1=\"-6\" y1=\"6\" x2=\"6\" y2=\"6\"/>
      </g>
    </g>

    <!-- Polígonos -->
    $pol1_str
    $pol2_str
    $pol3_str
    $pol4_str
  </svg>
  ";
  $p = "<p>Seu barco principal é formado pelo polígono ABCD, onde A = ($Ax,$Ay), B = ($Bx, $By), C = ($Cx, $Cy) e D = ($Fx, $Fy). O segundo barco você conseguirá por meio da reflexão por $ref. O terceiro barco deverá aparecer por meio da rotação do principal em 90°, com centro em (0,0) no sentido $rot. O quarto barco é uma translação do principal pelo vetor V = ($Vx, $Vy). Escreva todos os hit-points de seu barco principal e desenhe seu mapa para jogar.<br><br>Pontos: (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp) - (&nbsp &nbsp,&nbsp &nbsp)<br><br>Informações do jogo:<br>Retas usadas pelo seu adversário que devem também ser desenhados no plano cartesiano.<br><br><br>r: ________________________ &nbsp &nbsp s: ________________________<br><br>Pelo menos 2 \"tiros\" (pontos) dados pelo adversário e as distâncias calculadas até o ponto mais próximo<br><br>Tiro 1: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br>Tiro 2: (&nbsp &nbsp,&nbsp &nbsp) - Ponto mais próximo: (&nbsp &nbsp,&nbsp &nbsp) - Distância:_______<br><br></p>";

  $r = "<p>($Ax,$Ay) - ($Bx,$By) - ($Cx,$Cy) - ($Dx,$Dy) - ($Ex,$Ey) - ($Fx,$Fy) - ($Gx,$Gy) - ($Hx,$Hy)</p>$plano_res";
  return array($p, $r);
}
?>