<?php
function prob1() {
  $a = rand(2, 7)*10;
  $b = rand(3, 10)*100;
  $x1 = rand(5, 15)*10;
  $x2 = rand(10, 20)*10;
  while ($x2 <= $x1) {
    $x2 = rand(10, 20)*10;
  }
  $val1 = $a*$x1 + $b;
  $val2 = $a*$x2 + $b;
  $p = "<p>1 - Uma banda toca todo mês em uma casa de shows. Seu cachê consiste em um valor fixo e um adicional por cliente da noite. Em uma noite com $x1 clientes a banda recebeu um cachê de R$ $val1, em outra noite a banda recebeu R$ $val2 por uma noite com $x2 clientes. Desse modo determine a função C(x) que molda o cachê desta banda para uma quantidade x de clientes.</p>";

  $Dx = $x2 - $x1;
  $Dval = $val2 - $val1;
  $var1 = $a*$x1;
  $r = "<p>$x2 - $x1 = $Dx clientes a mais<br>$val2 - $val1 = $Dval reais a mais<br>a = $Dval/$Dx = $a reais por cliente<br>C($x1) = $a . $x1 + b = $val1<br>$var1 + b = $val1<br>b = $b<br><b>C(x) = {$a}x + $b</b></p>";
  return array($p, $r);
}

function prob2() {
  $a = rand(4, 10)/20;
  $b = rand(30, 60)/10;
  $x1 = rand(2, 14)*10;
  $x2 = rand(8, 20)*10;
  while ($x2 <= $x1) {
    $x2 = rand(8, 20)*10;
  }
  $val1 = $a*$x1 + $b;
  $val2 = $a*$x2 + $b;
  $p = "<p>1 - Joaquim é um churrasqueiro profissional. Quando vai realizar um evento ele sempre calcula a quantidade de carne exata que deve levar de acordo com o número de convidados, e nunca erra pois tem uma boa margem de segurança. Em sua última festa havia $x1 convidados e ele levou $val1 kg de carne, e todos comeram bem. Ele possui um evento próximo no qual haverão $x2 convidados, e ele calcula que deverá levar $val2 kg de carne. Qual é a função Q(x) que ele utiliza para saber a quantidade de carne, em kg, para um número x de convidados?</p>";

  $Dx = $x2 - $x1;
  $Dval = $val2 - $val1;
  $var1 = $a*$x1;
  $r = "<p>$x2 - $x1 = $Dx convidados a mais<br>$val2 - $val1 = $Dval kg a mais<br>a = $Dval/$Dx = $a kg por convidado<br>Q($x1) = $a . $x1 + b = $val1<br>$var1 + b = $val1<br>b = $b<br><b>Q(x) = {$a}x + $b</b></p>";
  return array($p, $r);
}

function prob3() {
  $a = rand(1, 6)/20;
  $b = rand(5, 15)*10 - 0.1;
  $x1 = rand(1, 15);
  $x2 = rand(5, 20);
  while ($x2 <= $x1) {
    $x2 = rand(5, 20);
  }
  $val1 = $a*$x1 + $b;
  $val2 = $a*$x2 + $b;
  $val1_f = number_format($val1, 2, "," , "");
  $val2_f = number_format($val2, 2, "," , "");
  $p = "<p>1 - Tentando entender sua conta de celular, Dona Ana faz as contas de quanto usou de internet em cada mês, além do que seu plano cobria, e o gasto. Em um mês ela usou $x1 MB de internet além do plano, e pagou R$ $val1_f por isso, no mês seguinte ela usou $x2 MB além do plano e gastou R$ $val2_f por isso. Qual a função V(x) que modela o valor de sua conta para cada x MB além do plano que ela usa?</p>";

  $Dx = $x2 - $x1;
  $Dval = $val2 - $val1;
  $var1 = $a*$x1;
  $Dval_f = number_format($Dval, 2, ",", "");
  $a_f = number_format($a, 2, ",", "");
  $b_f = number_format($b, 2, ",", "");
  $var1_f = number_format($var1, 2, ",", "");
  $r = "<p>$x2 - $x1 = $Dx MB a mais<br>$val2_f - $val1_f = $Dval_f reais a mais<br>a = $Dval_f/$Dx = $a_f reais por MB<br>V($x1) = $a_f`cdot`$x1 + b = $val1_f<br>$var1_f + b = $val1_f<br>b = $b_f<br><b>V(x) = {$a_f}x + $b_f</b></p>";
  return array($p, $r);
}

function graph() {
  $Ax = 0;
  $Ay = 0;
  $Bx = 0;
  $By = 0;
  while ($Ax*$Ay*$Bx*$By == 0) {
    $a = rand(0,10) - 5;
    while (abs($a) < 2) {
      $a = rand(0,10) - 5;
    }
    $Dx = rand(1, 3);
    $Dy = $Dx*$a;
    $max = 20 - $Dx;
    $Ax = rand(0, $max) - 10;
    $Bx = $Ax + $Dx;
    if ($a > 0) {
      $max = 20 - $Dy;
      $Ay = rand(0, $max) - 10;
    }
    else {
      $min = abs($Dy);
      $Ay = rand($min, 20) - 10;
    }
    $By = $Ay + $Dy;
    $b = $Ay - ($a*$Ax);
  
    $E1x = -10;
    $E1y = $a*$E1x + $b;
    if (abs($E1y) > 10) {
      $E1y = -10;
      $E1x = ($E1y - $b)/$a;
    }
    $E2x = $E1x < 0 ? 10 : -10;
    $E2y = $a*$E2x + $b;
    if (abs($E2y) > 10) {
      $E2y = $E1y < 0 ? 10 : -10;
      $E2x = ($E2y - $b)/$a;
    }
  }
  
  $Ax_g = $Ax*20 + 250;
  $Ay_g = 250 - $Ay*20;
  $Bx_g = $Bx*20 + 250;
  $By_g = 250 - $By*20;
  $E1x_g = $E1x*20 + 250;
  $E1y_g = 250 - $E1y*20;
  $E2x_g = $E2x*20 + 250;
  $E2y_g = 250 - $E2y*20;

  // gráfico base
  $g = "<svg width=\"500\" height=\"480\" xmlns=\"http://www.w3.org/2000/svg\">
    <!-- Plano cartesiano -->
    <!-- Eixos -->
    <line x1=\"50\" y1=\"250\" x2=\"450\" y2=\"250\" stroke=\"black\" />
    <line x1=\"250\" y1=\"50\" x2=\"250\" y2=\"450\" stroke=\"black\" />

    <!-- Setas nos eixos -->
    <line x1=\"450\" y1=\"250\" x2=\"445\" y2=\"245\" stroke=\"black\" />
    <line x1=\"450\" y1=\"250\" x2=\"445\" y2=\"255\" stroke=\"black\" />
    <line x1=\"250\" y1=\"50\" x2=\"245\" y2=\"55\" stroke=\"black\" />
    <line x1=\"250\" y1=\"50\" x2=\"255\" y2=\"55\" stroke=\"black\" />

    <!-- Função afim: y = ax + b -->
    <line x1=\"$E1x_g\" y1=\"$E1y_g\" x2=\"$E2x_g\" y2=\"$E2y_g\" stroke=\"red\" stroke-width=\"2\" />

    <!-- Pontos -->
    <circle r=\"5\" cx=\"$Ax_g\" cy=\"$Ay_g\" fill=\"blue\" />
    <circle r=\"5\" cx=\"$Bx_g\" cy=\"$By_g\" fill=\"blue\" />

    <!-- Rótulos dos eixos -->
    <text x=\"460\" y=\"255\" font-family=\"Arial\" font-size=\"12\">x</text>
    <text x=\"255\" y=\"45\" font-family=\"Arial\" font-size=\"12\">y</text><!-- Marcas nos eixos -->
    <!-- Eixo X -->
    <line x1=\"$Ax_g\" y1=\"245\" x2=\"$Ax_g\" y2=\"255\" stroke=\"black\" />
    <line x1=\"$Bx_g\" y1=\"245\" x2=\"$Bx_g\" y2=\"255\" stroke=\"black\" />
    <text x=\"$Ax_g\" y=\"270\" dx=\"-5\" font-family=\"Arial\" font-size=\"12\">$Ax</text>
    <text x=\"$Bx_g\" y=\"270\" dx=\"-5\" font-family=\"Arial\" font-size=\"12\">$Bx</text>

    <!-- Eixo Y -->
    <line x1=\"245\" y1=\"$Ay_g\" x2=\"255\" y2=\"$Ay_g\" stroke=\"black\" />
    <line x1=\"245\" y1=\"$By_g\" x2=\"255\" y2=\"$By_g\" stroke=\"black\" />
    <text x=\"230\" y=\"$Ay_g\" dy=\"5\" font-family=\"Arial\" font-size=\"12\">$Ay</text>
    <text x=\"230\" y=\"$By_g\" dy=\"5\" font-family=\"Arial\" font-size=\"12\">$By</text>

    
  </svg>";
  
  $x = rand(20, 50);
  $p = "<p>2 - Observe o gráfico abaixo. Determine qual a lei de formação da função `f(x)` que determina este gráfico e então determine `f($x)`.</p>$g";

  $Ax_n = - $Ax;
  $Ay_n = - $Ay;
  $y = $a*$x + $b;
  $b_abs = abs($b);
  $b_txt = $b > 0 ? "+ $b_abs" : "- $b_abs";
  $Axa = $Ax*$a;
  $ax = $a*$x;
  $r = "<p>`f(color(red)(x)) = a color(red)(x) + b`<br>`f(color(red)($Ax)) = $Ay`<br>`a cdot color(red)($Ax) + b = $Ay`<br>`f(color(red)($Bx)) = $By`<br>`a cdot color(red)($Bx) + b = $By`<br>`{($Ax a + b = $Ay, color(red)(times (-1))),($Bx a + b = $By, text( )):}`<br>`{($Ax_n a - b = $Ay_n),($Bx a + b = $By):} +`<br>`$Dx a = $Dy`<br>`a = $a`<br>`$Ax color(blue)(a) + b = $Ay`<br>`$Ax cdot color(blue)($a) + b = $Ay`<br>`$Axa + b = $Ay`<br>`b = $Ay - $Axa`<br>`b = $b`<br>`f(color(red)(x)) = $a color(red)(x) $b_txt`<br>`f(color(red)($x)) = $a cdot color(red)($x) $b_txt = $ax $b_txt = $y`</p>";

  return array($p, $r);
}
?>