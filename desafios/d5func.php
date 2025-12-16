<?php
function quest1() {
  do {
    $rows = rand(2, 5);
    $columns = rand(4, 8);
  } while ($rows*$columns < 10 or $rows*$columns > 40);
  $elementos = array();

  $tabela = "<table class=\"tabela\">";
  for ($i = 0; $i < $rows; $i++) {
    $tabela .= "<tr>";
    for ($j = 0; $j < $columns; $j++) {
      $elem = rand(150, 450);
      array_push($elementos, $elem);
      $tabela .= "<td>$elem</td>";
    }
    $tabela .= "</tr>";
  }
  $tabela .= "</table>";

  $p = "<p>1 - A tabela de dados brutos abaixo se refere às anotações de uma pesquisa sobre a quantidade de tempo, em minutos, de uso de celular de uma classe de alunos, organize estes dados em <b>rol</b>, depois faça uma tabela de frequências para esses dados. Após essa organização faça uma tabela de classes com 5 classes e um gráfico de colunas.</p>$tabela";

  sort($elementos);
  $amp = $elementos[count($elementos)-1] - $elementos[0];
  $amp_class = round($amp/40)*10;
  $floor = floor($elementos[0]/10)*10;
  while ($floor + 4*$amp_class > $elementos[count($elementos)-1]) {
    $amp_class -= 10;
  }
  
  $tabela = "<table class=\"tabela\">";
  $last = 0;
  $counts = array();
  for ($i = 0; $i < 5; $i++) {
    $ceil = $floor + $amp_class;
    $count = 0;
    while ($last < count($elementos) && $elementos[$last] < $ceil) {
      $last++;
      $count++;
    }
    array_push($counts, $count);
    $tabela .= "<tr><td>$floor ⊢ $ceil</td><td>$count</td></tr>";
    $floor = $ceil;
  }
  $tabela .= "</table>";

  $top = max($counts);
  $percentiles = array();
  foreach ($counts as $count) {
    array_push($percentiles, round(100*$count/$top));
  }

  $graf = "<div class=\"grafico\">
  <div class=\"barra\" style=\"height: {$percentiles[0]}%;\">$counts[0]</div>
  <div class=\"barra\" style=\"height: {$percentiles[1]}%;\">$counts[1]</div>
  <div class=\"barra\" style=\"height: {$percentiles[2]}%;\">$counts[2]</div>
  <div class=\"barra\" style=\"height: {$percentiles[3]}%;\">$counts[3]</div>
  <div class=\"barra\" style=\"height: {$percentiles[4]}%;\">$counts[4]</div>
  </div>";

  $s = "<div style=\"display: grid;grid-template-columns: 1fr 1fr\"><div><p>1) Exemplo de Tabela de Classes:</p>$tabela</div><div><p>Exemplo de gráfico:</p>$graf</div></div>";

  return array($p, $s);
}

function quest2() {
  $p1 = rand(10, 40);
  $p2 = rand(10, 30);
  $p3 = rand(10, 80 - $p1 - $p2);
  $p4 = rand(10, 90 - $p1 - $p2 - $p3);
  $p5 = 100 - $p1 - $p2 - $p3 - $p4;
  $ang1 = M_PI*$p1/50;
  $ang2 = M_PI*$p2/50;
  $ang3 = M_PI*$p3/50;
  $ang4 = M_PI*$p4/50;
  
  $Ax = 0;
  $Ay = 100;
  $Bx = $Ax*cos($ang1) + $Ay*sin($ang1);
  $By = $Ay*cos($ang1) - $Ax*sin($ang1);
  $Cx = $Bx*cos($ang2) + $By*sin($ang2);
  $Cy = $By*cos($ang2) - $Bx*sin($ang2);
  $Dx = $Cx*cos($ang3) + $Cy*sin($ang3);
  $Dy = $Cy*cos($ang3) - $Cx*sin($ang3);
  $Ex = $Dx*cos($ang4) + $Dy*sin($ang4);
  $Ey = $Dy*cos($ang4) - $Dx*sin($ang4);

  $t1x = ($Ax + $Bx)/2;
  $t1y = ($Ay + $By)/2;
  $mod1 = sqrt($t1x**2 + $t1y**2);
  $t1x = 120 + $t1x*50/$mod1;
  $t1y = 120 - $t1y*50/$mod1;

  $t2x = ($Cx + $Bx)/2;
  $t2y = ($Cy + $By)/2;
  $mod2 = sqrt($t2x**2 + $t2y**2);
  $t2x = 120 + $t2x*50/$mod2;
  $t2y = 120 - $t2y*50/$mod2;

  $t3x = ($Cx + $Dx)/2;
  $t3y = ($Cy + $Dy)/2;
  $mod3 = sqrt($t3x**2 + $t3y**2);
  $t3x = 120 + $t3x*50/$mod3;
  $t3y = 120 - $t3y*50/$mod3;

  $t4x = ($Ex + $Dx)/2;
  $t4y = ($Ey + $Dy)/2;
  $mod4 = sqrt($t4x**2 + $t4y**2);
  $t4x = 120 + $t4x*50/$mod4;
  $t4y = 120 - $t4y*50/$mod4;

  $t5x = ($Ax + $Ex)/2;
  $t5y = ($Ay + $Ey)/2;
  $mod5 = sqrt($t5x**2 + $t5y**2);
  $t5x = 120 + $t5x*50/$mod5;
  $t5y = 120 - $t5y*50/$mod5;


  $Ax += 120;
  $Bx += 120;
  $Cx += 120;
  $Dx += 120;
  $Ex += 120;
  $Ay = 120 - $Ay;
  $By = 120 - $By;
  $Cy = 120 - $Cy;
  $Dy = 120 - $Dy;
  $Ey = 120 - $Ey;

  
  $svg = "<svg width=\"320\" height=\"240\" viewBox=\"0 0 320 240\" xmlns=\"http://www.w3.org/2000/svg\" font-family=\"sans-serif\" font-size=\"12\" text-anchor=\"middle\">
    <!-- Setor 1: $p1% -->
    <path d=\"M120,120 L$Ax,$Ay A100,100 0 0,1 $Bx,$By Z\" fill=\"red\" />
    <text x=\"$t1x\" y=\"$t1y\" fill=\"white\">$p1%</text>

    <!-- Setor 2: $p2% -->
    <path d=\"M120,120 L$Bx,$By A100,100 0 0,1 $Cx,$Cy Z\" fill=\"orange\" />
    <text x=\"$t2x\" y=\"$t2y\" fill=\"black\">$p2%</text>

    <!-- Setor 3: $p3% -->
    <path d=\"M120,120 L$Cx,$Cy A100,100 0 0,1 $Dx,$Dy Z\" fill=\"yellow\" />
    <text x=\"$t3x\" y=\"$t3y\" fill=\"black\">$p3%</text>

    <!-- Setor 4: $p4% -->
    <path d=\"M120,120 L$Dx,$Dy A100,100 0 0,1 $Ex,$Ey Z\" fill=\"green\" />
    <text x=\"$t4x\" y=\"$t4y\" fill=\"white\">$p4%</text>

    <!-- Setor 5: $p5% -->
    <path d=\"M120,120 L$Ex,$Ey A100,100 0 0,1 $Ax,$Ay Z\" fill=\"blue\" />
    <text x=\"$t5x\" y=\"$t5y\" fill=\"white\">$p5%</text>

    <!-- Legenda -->
    <rect width=\"20\" height=\"10\" x=\"240\" y=\"20\" fill=\"red\" />
    <text x=\"290\" y=\"30\">Morango</text>
    <rect width=\"20\" height=\"10\" x=\"240\" y=\"40\" fill=\"orange\" />
    <text x=\"290\" y=\"50\">Chocolate</text>
    <rect width=\"20\" height=\"10\" x=\"240\" y=\"60\" fill=\"yellow\" />
    <text x=\"290\" y=\"70\">Baunilha</text>
    <rect width=\"20\" height=\"10\" x=\"240\" y=\"80\" fill=\"green\" />
    <text x=\"290\" y=\"90\">Menta</text>
    <rect width=\"20\" height=\"10\" x=\"240\" y=\"100\" fill=\"blue\" />
    <text x=\"290\" y=\"110\">Outros</text>
  </svg>";

  $total = rand(2, 12)*100;
  $p = "<p>2 - O gráfico a seguir representa a preferência por sabores de sorvete de uma comunidade de $total pessoas. Determine quantas pessoas especificamente gostam de cada um dos sabores e indique qual é o sabor preferido.</p>$svg";

  $v1 = $p1*$total/100;
  $v2 = $p2*$total/100;
  $preferido = $v1 > $v2 ? "Morango" : "Chocolate";
  $maior = $v1 > $v2 ? $v1 : $v2;
  $v3 = $p3*$total/100;
  $preferido = $maior > $v3 ? $preferido : "Baunilha";
  $maior = $maior > $v3 ? $maior : $v3;
  $v4 = $p4*$total/100;
  $preferido = $maior > $v4 ? $preferido : "Menta";
  $maior = $maior > $v4 ? $maior : $v4;
  $v5 = $p5*$total/100;
  $preferido = $maior > $v5 ? $preferido : "Outros";
  $maior = $maior > $v5 ? $maior : $v5;
  
  $tabela = "<table class=\"tabela\">
    <tr><th>Sabor</th><th>Frequência</th></tr>
    <tr><td>Morango</td><td>$v1</td></tr>
    <tr><td>Chocolate</td><td>$v2</td></tr>
    <tr><td>Baunilha</td><td>$v3</td></tr>
    <tr><td>Menta</td><td>$v4</td></tr>
    <tr><td>Outros</td><td>$v5</td></tr>
    </table>"; 
  $s = "<p>2) $preferido</p>$tabela";

  return array($p, $s);
}

?>