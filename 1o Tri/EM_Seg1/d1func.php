<?php
function mmc($x, $y) {
  $m = 1;
  while (($x%2 == 0)||($y%2 == 0)) {
    if ($x%2 == 0) {
      $x /= 2;
    }
    if ($y%2 == 0) {
      $y /= 2;
    }
    $m *= 2;
  }
  $p = 3;
  while (($x != 1)||($y != 1)) {
    while (($x%$p == 0)||($y%$p == 0)) {
      if ($x%$p == 0) {
        $x /= $p;
      }
      if ($y%$p == 0) {
        $y /= $p;
      }
      $m *= $p;
    }
    $p += 2;
  }
  return $m;
}

function conj1() {
  $alternativas = array(
      "(  ) O número real representado por 0,5222... é um número irracional.",
      "(  ) A raiz quadrada de um número irracional é sempre um número irracional.",
      "(  ) Se m e n são números irracionais, então m + n é um número irracional.",
      "(  ) O número real `sqrt(2)` pode ser escrito como uma fração simples.",
      "(  ) Toda equação algébrica do 2º grau possui pelo menos uma raiz real.",
      "(  ) O conjunto dos números racionais está contido no conjunto dos números reais.",
      "(  ) A soma de um número racional e um número irracional é sempre um número irracional.",
      "(  ) Todo número real positivo tem uma raiz quadrada real positiva.",
      "(  ) O conjunto dos números reais é um subconjunto dos números complexos.",
      "(  ) O conjunto dos números irracionais é um subconjunto dos números racionais.",
      "(  ) A soma de dois números irracionais pode ser um número racional.",
      "(  ) Todo número inteiro é um número racional.",
      "(  ) O 0 é um elemento em de todos os conjuntos numéricos principais.",
      "(  ) A raiz quadrada de um número negativo é um número real.",
      "(  ) A parte inteira de um número racional é sempre um número inteiro.",
      "(  ) O conjunto dos números racionais é finito.",
      "(  ) O conjunto dos números irracionais é finito.",
      "(  ) O conjunto dos números complexos é um subconjunto dos números reais.",
      "(  ) A diferença de dois números racionais é sempre um número irracional.",
      "(  ) A raiz quadrada de um número primo é sempre um número irracional.",
      "(  ) Todo número racional pode ser representado como uma dízima periódica.",
      "(  ) O número pi (π) é um número racional.",
      "(  ) A divisão de um número racional por zero é um número complexo.",
      "(  ) O conjunto dos números reais é um conjunto infinito.",
      "(  ) A soma de dois números racionais pode ser um número irracional."
  );

  $respostas = array("V", "V", "F", "F", "F", "V", "V", "V", "V", "F", "V", "V", "V", "F", "V", "F", "F", "F", "F", "V", "F", "F", "F", "V", "F");

  $a = rand(0, 24);
  $b = rand(0, 24);
  while ($b == $a) {
    $b = rand(0, 24);
  }
  $c = rand(0, 24);
  while (in_array($c, array($a, $b))) {
    $c = rand(0, 24);
  } 
  $d = rand(0, 24);
  while (in_array($d, array($a, $b, $c))) {
    $d = rand(0, 24);
  }  
  $e = rand(0, 24);
  while (in_array($e, array($a, $b, $c, $d))) {
    $e = rand(0, 24);
  } 

  $p = "<p>1 - Assinale V para as sentenças verdadeiras e F para as falsas.</p><ol type=\"a\"><li>$alternativas[$a]</li><li>$alternativas[$b]</li><li>$alternativas[$c]</li><li>$alternativas[$d]</li><li>$alternativas[$e]</li></ol>";
  $r = "<p><b>1) R: $respostas[$a]-$respostas[$b]-$respostas[$c]-$respostas[$d]-$respostas[$e]</b></p>";

  return array($p, $r);
}

function conj2() {
  $possibilidades = array(
  "<circle cx=\"80\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"75\" y=\"40\">x</text><circle cx=\"110\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"105\" y=\"40\">y</text>", 
  "<circle cx=\"80\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"75\" y=\"40\">x</text><circle cx=\"180\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"175\" y=\"40\">y</text>", 
    "<circle cx=\"80\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"75\" y=\"40\">x</text><circle cx=\"250\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"245\" y=\"40\">y</text>", 
    "<circle cx=\"80\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"75\" y=\"40\">x</text><circle cx=\"320\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"315\" y=\"40\">y</text>", 
    "<circle cx=\"150\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"145\" y=\"40\">x</text><circle cx=\"180\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"175\" y=\"40\">y</text>", 
    "<circle cx=\"150\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"145\" y=\"40\">x</text><circle cx=\"250\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"245\" y=\"40\">y</text>", 
    "<circle cx=\"150\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"145\" y=\"40\">x</text><circle cx=\"320\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"315\" y=\"40\">y</text>", 
    "<circle cx=\"220\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"215\" y=\"40\">x</text><circle cx=\"250\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"245\" y=\"40\">y</text>", 
    "<circle cx=\"220\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"215\" y=\"40\">x</text><circle cx=\"320\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"315\" y=\"40\">y</text>", 
    "<circle cx=\"290\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"285\" y=\"40\">x</text><circle cx=\"320\" cy=\"50\" r=\"3\" fill=\"black\"/><text x=\"315\" y=\"40\">y</text>");

  $alternativas = array(
    "Acima de 2", 
    "Entre 0 e 1", 
    "Entre x e -1", 
    "Abaixo de -2", 
    "Entre y e 0", 
    "Entre x e 0", 
    "Entre -2 e -1", 
    "Entre 0 e x", 
    "Entre x e 1", 
    "Acima de 2");

  $a = rand(0, 9);
  $alt = array($alternativas[$a]);
  while (count($alt) < 5) {
    $i = rand(0, 9);
    if (!(in_array($alternativas[$i], $alt))) {
      array_push($alt, $alternativas[$i]);
    }
  }
  shuffle($alt);
  
  $p = "<p>1 - Dois números x e y estão localizados na reta numérica a seguir.</p><svg width=\"400\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\">
  <!-- Linha principal -->
  <line x1=\"50\" y1=\"50\" x2=\"350\" y2=\"50\" stroke=\"black\" stroke-width=\"2\"/>
  
  <!-- Marcas e números -->
  <line x1=\"60\" y1=\"45\" x2=\"60\" y2=\"55\" stroke=\"black\" stroke-width=\"2\"/>
  <text x=\"55\" y=\"70\">-2</text>
  
  <line x1=\"130\" y1=\"45\" x2=\"130\" y2=\"55\" stroke=\"black\" stroke-width=\"2\"/>
  <text x=\"125\" y=\"70\">-1</text>
  
  <line x1=\"200\" y1=\"45\" x2=\"200\" y2=\"55\" stroke=\"black\" stroke-width=\"2\"/>
  <text x=\"195\" y=\"70\">0</text>
  
  <line x1=\"270\" y1=\"45\" x2=\"270\" y2=\"55\" stroke=\"black\" stroke-width=\"2\"/>
  <text x=\"265\" y=\"70\">1</text>
  
  <line x1=\"340\" y1=\"45\" x2=\"340\" y2=\"55\" stroke=\"black\" stroke-width=\"2\"/>
  <text x=\"335\" y=\"70\">2</text>
  
  $possibilidades[$a]
</svg>
<p>O produto `x cdot y` está localizado:
<ol type=\"a\">
<li>$alt[0]</li>
<li>$alt[1]</li>
<li>$alt[2]</li>
<li>$alt[3]</li>
<li>$alt[4]</li>
</ol>";
  
  $r = "<p><b>1) R: $alternativas[$a]</b></p>";

  return array($p, $r);
}

function conj3() {
  $falsas = array(
      "Entre os números reais 6 e 7 existem apenas números irracionais.",
      "A soma de dois números irracionais é sempre um número racional.",
      "Toda dízima periódica é um número irracional.",
      "O número π é um número racional.",
      "Um número irracional pode ser obtido pela divisão de dois números inteiros.",
      "A raiz quadrada de 9 é um número irracional.",
      "O número 0,999... é um número irracional.",
      "O número de ouro `(sqrt(5) + 1)/2` é um número racional.",
      "A soma de dois números irracionais é sempre irracional.",
      "Todo número não inteiro é irracional.",
      "O número 1,414 é irracional.",
      "O número `sqrt(2)` é um número racional.",
      "A raiz cúbica de 8 é um número irracional.",
      "O número 3,1416 é irracional.",
      "O número `sqrt(16)` é um número irracional.",
      "A soma de um número racional e um número irracional é sempre racional.",
      "O número π pode ser escrito na forma de fração de inteiros.",
      "Nem todos os racionais podem ser colocados na forma de fração",
      "O número 2,71828 é irracional.",
      "O número `sqrt(25)` é um número irracional.",
      "A raiz quadrada de 16 é um número irracional.",
      "O número 0,123456789 é irracional.",
      "O número π é um número inteiro.",
      "O número 0,5 é irracional.",
      "O número 0,333... é um número irracional.",
      "A raiz quadrada de 25 é um número irracional.",
      "O número `sqrt(9)` é um número irracional.",
      "O número `sqrt(64) é um número irracional.",
      "O número 2,5 é irracional.",
      "O número π é um número negativo."
  );

  $verdadeiras = array(
      "Entre os números reais 6 e 7 existem infinitos números irracionais.",
      "A soma de um número racional e um número irracional pode ser racional ou irracional.",
      "Todo número inteiro é um número racional.",
      "O número de ouro `(sqrt(5) + 1)/2` é um número irracional.",
      "O número π é um número irracional.",
      "Toda fração de inteiros é um número racional.",
      "O número `sqrt(2)` é um número irracional.",
      "A raiz quadrada de 2 é um número irracional.",
      "O número `sqrt(3)` é um número irracional.",
      "O número `sqrt(5)` é um número irracional."
  );

  $v = $verdadeiras[rand(0,9)];
  $alt = array($v);
  while (count($alt) < 5) {
    $i = rand(0, 29);
    if (!(in_array($falsas[$i], $alt))) {
        array_push($alt, $falsas[$i]);
    }
  }
  shuffle($alt);

  $p = "<p>1 - Sobre números racionais e irracionais, podemos afirmar que</p>
  <ol type=\"a\">
  <li>$alt[0]</li>
  <li>$alt[1]</li>
  <li>$alt[2]</li>
  <li>$alt[3]</li>
  <li>$alt[4]</li>
  </ol>";

  $r = "<p><b>1) R: $v</b></p>";

  return array($p, $r);
}

function gm1() {
  $inicio = rand(8, 12);
  $fim = rand(4, 10);
  $freq = rand(2, 6);
  
  $p = "<p>2 - Uma torneira não foi fechada corretamente e ficou pingando, das $inicio horas da noite às $fim horas da manhã, com a frequência de uma gota a cada $freq segundos. Sabe-se que cada gota de água tem volume de 0,2 mL. Qual foi o valor do total de água desperdiçada nesse período, em litros?</p>";

  $horas = 12 - $inicio + $fim;
  $minutos = $horas*60;
  $segundos = $minutos*60;
  $gotas = $segundos/$freq;
  $volumemL = $gotas*0.2;
  $volumeL = $volumemL/1000;

  $r = "<p><b>2) R: $volumeL L</b><br>Número de horas entre $inicio da noite e $fim da manhã: $horas<br>$horas h = $minutos min = $segundos s<br>`$segundos/$freq` = $gotas gotas ao todo<br>`$gotas cdot 0,2` mL = $volumemL mL<br>$volumemL mL = $volumeL L</p>";

    return array($p, $r);
}

function gm2() {
  $escala = rand(2,8)*(10**rand(3,5));
  $tamanho = rand(3, 10);
  
  $p = "<p>2 - A planta de uma cidade foi desenhada na escala 1:$escala o que significa que as medidas reais são iguais a $escala vezes as medidas correspondentes na planta. Assim, $tamanho cm da planta correspondem a uma medida real de quantos km?</p>";

  $tamanhocm = $tamanho*$escala;
  $tamanhom = $tamanhocm/100;
  $tamanhokm = $tamanhom/1000;
  $r = "<p><b>2) R: $tamanhokm km</b><br>$tamanho*$escala = $tamanhocm cm reais<br>$tamanhocm cm = $tamanhom m<br>$tamanhom m = $tamanhokm km</p>";

    return array($p, $r);
}

function gm3() {
  $litros = rand(8, 14)/2;
  $globulos = rand(7, 14)/2;
  $esperado = $globulos < 4.5 ? "abaixo do esparado" : ($globulos > 6 ? "acima do esperado" : "dentro do esperado");
  
  $p = "<p>2 - Considere que o corpo de uma determinada pessoa contém $litros litros de sangue e $globulos milhões de glóbulos vermelhos por milímetro cúbico de sangue, $esperado. Com base nesses dados, qual o número de glóbulos vermelhos no corpo dessa pessoa em notação científica?</p>";

  $qtd = $globulos*$litros;
  $qtdnc = $qtd/10;
  
  $r = "<p><b>2) R: `$qtdnc cdot 10^13`</b><br>$litros litros = $litros dm³ = `$litros cdot 10^6` mm³<br>`$globulos cdot 10^6 cdot $litros cdot 10^6 = $qtd cdot 10^12 = $qtdnc cdot 10^13`</p>";

  return array($p, $r);
}

function gm4() {
  $bacterias = array("Escherichia coli", "Bacillus subtilis", "Staphylococcus aureus", "Salmonella enterica", "Lactobacillus acidophilus", "Streptococcus pneumoniae", "Mycobacterium tuberculosis", "Clostridium botulinum", "Helicobacter pylori", "Vibrio cholerae", "Pseudomonas aeruginosa", "Listeria monocytogenes", "Neisseria gonorrhoeae", "Shigella flexneri", "Treponema pallidum", "Legionella pneumophila", "Clostridium difficile", "Campylobacter jejuni", "Borrelia burgdorferi", "Yersinia pestis");
  $descricoes = array("é uma espécie de bactéria que habita naturalmente o intestino de seres humanos e de outros animais.", "é uma bactéria gram-positiva encontrada no solo e no intestino de animais.", "é uma bactéria gram-positiva que pode causar uma variedade de infecções em seres humanos.", "é uma bactéria que pode causar doenças gastrointestinais em seres humanos e animais.", "é uma bactéria probiótica encontrada no trato gastrointestinal de seres humanos e outros animais.", "é uma bactéria gram-positiva que pode causar pneumonia e outras infecções respiratórias.", "é a bactéria responsável pela tuberculose em seres humanos.", "é uma bactéria que produz toxinas que podem causar botulismo, uma doença grave.", "é uma bactéria que pode causar úlceras pépticas e outros problemas gastrointestinais em seres humanos.", "é a bactéria responsável pela cólera, uma doença gastrointestinal grave.", "é uma bactéria oportunista que pode causar infecções em pessoas com sistemas imunológicos comprometidos.", "é uma bactéria que pode causar listeriose, uma infecção alimentar grave.", "é a bactéria responsável pela gonorréia, uma infecção sexualmente transmissível.", "é uma bactéria que causa infecções intestinais, como a disenteria bacilar.", "é a bactéria responsável pela sífilis, uma doença sexualmente transmissível.", "é a bactéria que causa a doença dos legionários, uma forma grave de pneumonia.", "é uma bactéria que pode causar infecções intestinais em pessoas que tomam antibióticos.", "é uma bactéria que é uma das principais causas de doenças gastrointestinais em seres humanos.", "é a bactéria responsável pela doença de Lyme, uma doença transmitida por carrapatos.", "é a bactéria responsável pela peste bubônica, uma doença grave transmitida por pulgas.");

  $tamanhosB = array("`4 cdot 10^(-7)` metros", "`5 cdot 10^(-7)` metros", "`5 cdot 10^(-8)` metros", "`3 cdot 10^(-7)` metros", "`2 cdot 10^(-7)` metros", "`5 cdot 10^(-8)` metros", "`2 cdot 10^(-7)` metros", "`1 cdot 10^(-6)` metros", "`3 cdot 10^(-7)` metros", "`3 cdot 10^(-7)` metros", "`4 cdot 10^(-7)` metros", "`5 cdot 10^(-8)` metros", "`2 cdot 10^(-7)` metros", "`2 cdot 10^(-7)` metros", "`2 cdot 10^(-8)` metros", "`3 cdot 10^(-7)` metros", "`5 cdot 10^(-7)` metros", "`2 cdot 10^(-7)` metros", "`2 cdot 10^(-8)` metros", "`5 cdot 10^(-7)` metros");

  $materiais = array("fio de nylon", "barbante", "película de vidro", "fio de seda", "fio de algodão", "fio de aço", "fio de cabelo humano", "fio de lã", "fio de poliéster", "fio de carbono");
  $tamanhosM = array(100000, 200000, 50000, 80000, 100000, 10000, 100000, 20000, 10000, 2000);

  $n = rand(0, 19);
  $m = rand(0, 9);
  
  $p = "<p>2 - A $bacterias[$n] $descricoes[$n] Sua célula tem forma cilíndrica com $tamanhosB[$n] de raio. Admitindo que a expessura de um $materiais[$m] mede $tamanhosM[$m] nanômetros e dado que 1 nanômetro equivale a `10^(-9)` metros, qual a razão entre o raio de uma célula de $bacterias[$n] e a expessura de um $materiais[$m] em notação científica?</p>";

  $end = strpos($tamanhosB[$n], "cdot") - 2;
  $a = intval(substr($tamanhosB[$n], 1, $end));
  $start = strpos($tamanhosB[$n], "(-") + 2;
  $end = strpos($tamanhosB[$n], ")");
  $b = intval(substr($tamanhosB[$n], $start, $end - $start));
  $c = $tamanhosM[$m];
  $k = 0;
  $d = $c;
  while ($d >= 10) {
    $k += 1;
    $d /= 10;
  }
  $j = 9 - $k;
  $razao = $a/$d;
  $l = $j - $b;
  $razaonc = $razao;
  $exp = $l;
  while ($razaonc < 1) {
    $razaonc *= 10;
    $exp -= 1;
  }
  while ($razaonc >= 10) {
    $razaonc /= 10;
    $exp += 1;
  }
  
  $r = "<p><b>2) R: `$razaonc cdot 10^$exp`</b><br>`($a cdot 10^(-$b))/($c cdot 10^(-9)) = ($a cdot 10^(-$b))/($d cdot 10^$k cdot 10^(-9)) = ($a cdot 10^(-$b))/($d cdot 10^(-$j))`<br>`$razao cdot 10^(-$b + $j) = $razao cdot 10^$l`<br>`$razao cdot 10^$l = $razaonc cdot 10^$exp`</p>";

  return array($p, $r);
}

function rp1() {
  // Array com os nomes dos materiais
  $materiais = array(
      "Cobre",
      "Alumínio",
      "Prata",
      "Ouro",
      "Ferro",
      "Níquel",
      "Tungstênio",
      "Constantan",
      "Bronze",
      "Latão",
      "Nichrome",
      "Tântalo",
      "Platina",
      "Grafite",
      "Carbono"
  );

  // Array com as respectivas resistividades
  $resistividades = array(
      1.68e-8,    // Cobre
      2.82e-8,    // Alumínio
      1.59e-8,    // Prata
      2.44e-8,    // Ouro
      1.0e-7,     // Ferro
      6.99e-8,    // Níquel
      5.6e-8,     // Tungstênio
      4.9e-7,     // Constantan
      3.2e-7,     // Bronze
      6.0e-7,     // Latão
      1.1e-6,     // Nichrome
      1.35e-7,    // Tântalo
      1.06e-7,    // Platina
      5e-5,       // Grafite (valor mais baixo)
      3e-5        // Carbono (valor mais baixo)
  );

  $n = rand(0, 14);
  $A1 = rand(1, 70)*3/10;
  $l1 = rand(10, 300)*9/10;
  $r1 = round(1000*$resistividades[$n]*$l1*10000/$A1)*9/10;
  $razao = rand(2, 6);
  
  $tipo = rand(0, 11);
  switch($tipo) {
    case 0:
      $A2 = $A1;
      $l2 = $l1*$razao;
      $r2 = $r1*$razao;
      $pergunta = "Qual a resistência de um fio de $materiais[$n] com a mesma área, porém de comprimento $l2 cm?";

      $r = "<p><b>3) R: $r2 mΩ</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Comprimento (cm)</th>
          <th>Resistência (mΩ)</th>
        </tr>
        <tr>
          <td>$l1</td>
          <td>$r1</td>
        </tr>
        <tr>
          <td>$l2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$l1 cdot x = $l2 cdot $r1`<br>x = $r2 mΩ</p>";
      break;

    
    case 1:
      $A2 = $A1;
      $l2 = $l1*$razao;
      $r2 = $r1*$razao;
      $pergunta = "Qual o comprimento de um fio de $materiais[$n] com a mesma área, se ele oferecer uma resistência de $r2 mΩ?";

      $r = "<p><b>3) R: $l2 cm</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Resistência (mΩ)</th>
          <th>Comprimento (cm)</th>
        </tr>
        <tr>
          <td>$r1</td>
          <td>$l1</td>
        </tr>
        <tr>
          <td>$r2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$r1 cdot x = $r2 cdot $l1`<br>x = $l2 cm</p>";
      break;

    
    case 2:
      $A2 = $A1;
      $l2 = $l1/$razao;
      $r2 = $r1/$razao;
      $pergunta = "Qual a resistência de um fio de $materiais[$n] com a mesma área, porém de comprimento $l2 cm?";

      $r = "<p><b>3) R: $r2 mΩ</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Comprimento (cm)</th>
          <th>Resistência (mΩ)</th>
        </tr>
        <tr>
          <td>$l1</td>
          <td>$r1</td>
        </tr>
        <tr>
          <td>$l2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$l1 cdot x = $l2 cdot $r1`<br>x = $r2 mΩ</p>";
      break;

    
    case 3:
      $A2 = $A1;
      $l2 = $l1/$razao;
      $r2 = $r1/$razao;
      $pergunta = "Qual o comprimento de um fio de $materiais[$n] com a mesma área, se ele oferecer uma resistência de $r2 mΩ?";
    
      $r = "<p><b>3) R: $l2 cm</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Resistência (mΩ)</th>
          <th>Comprimento (cm)</th>
        </tr>
        <tr>
          <td>$r1</td>
          <td>$l1</td>
        </tr>
        <tr>
          <td>$r2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$r1 cdot x = $r2 cdot $l1`<br>x = $l2 cm</p>";
      break;

    
    case 4:
      $A2 = $A1*$razao;
      $l2 = $l1;
      $r2 = $r1/$razao;
      $pergunta = "Qual a resistência de um fio de $materiais[$n] com o mesmo comprimento, porém de área de seção transversal $A2 mm²?";

      $r = "<p><b>3) R: $r2 mΩ</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Área (mm²)</th>
          <th>Resistência (mΩ)</th>
        </tr>
        <tr>
          <td>$A1</td>
          <td>$r1</td>
        </tr>
        <tr>
          <td>$A2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$A2 cdot x = $A1 cdot $r1`<br>x = $r2 mΩ</p>";
      break;

    
    case 5:
      $A2 = $A1*$razao;
      $l2 = $l1;
      $r2 = $r1/$razao;
      $pergunta = "Qual a área de seção transversal de um fio de $materiais[$n] com o mesmo comprimento, se ele oferecer uma resistência de $r2 mΩ?";

      $r = "<p><b>3) R: $A2 mm²</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Resistência (mΩ)</th>
          <th>Área (mm²)</th>
        </tr>
        <tr>
          <td>$r1</td>
          <td>$A1</td>
        </tr>
        <tr>
          <td>$r2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$r2 cdot x = $r1 cdot $A1`<br>x = $A2 mm²</p>";
      break;

    
    case 6:
      $A2 = $A1/$razao;
      $l2 = $l1;
      $r2 = $r1*$razao;
      $pergunta = "Qual a resistência de um fio de $materiais[$n] com o mesmo comprimento, porém de área de seção transversal $A2 mm²?";

      $r = "<p><b>3) R: $r2 mΩ</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Área (mm²)</th>
          <th>Resistência (mΩ)</th>
        </tr>
        <tr>
          <td>$A1</td>
          <td>$r1</td>
        </tr>
        <tr>
          <td>$A2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$A2 cdot x = $A1 cdot $r1`<br>x = $r2 mΩ</p>";
      break;

    
    case 7:
      $A2 = $A1/$razao;
      $l2 = $l1;
      $r2 = $r1*$razao;
      $pergunta = "Qual a área de seção transversal de um fio de $materiais[$n] com o mesmo comprimento, se ele oferecer uma resistência de $r2 mΩ?";

      $r = "<p><b>3) R: $A2 mm²</b><br></p>
      <table class=\"tabela\">
        <tr>
          <th>Resistência (mΩ)</th>
          <th>Área (mm²)</th>
        </tr>
        <tr>
          <td>$r1</td>
          <td>$A1</td>
        </tr>
        <tr>
          <td>$r2</td>
          <td>x</td>
        </tr>
      </table>
      <p>`$r2 cdot x = $r1 cdot $A1`<br>x = $A2 mm²</p>";
      break;

                        
    case 8:
      $A2 = $A1*$razao;
      $l2 = $l1*$razao;
      $r2 = $r1;
      $pergunta = "Qual a área de seção transversal de um fio de $materiais[$n] com a mesma resistência, porém de comprimento $l2 cm?";

    $r = "<p><b>3) R: $A2 mm²</b><br></p>
    <table class=\"tabela\">
      <tr>
        <th>Comprimento (cm)</th>
        <th>Área (mm²)</th>
      </tr>
      <tr>
        <td>$l1</td>
        <td>$A1</td>
      </tr>
      <tr>
        <td>$l2</td>
        <td>x</td>
      </tr>
    </table>
    <p>`$l1 cdot x = $A1 cdot $l2`<br>x = $A2 mm²</p>";
      break;

    
    case 9:
      $A2 = $A1*$razao;
      $l2 = $l1*$razao;
      $r2 = $r1;
      $pergunta = "Qual o comprimento de um fio de $materiais[$n] com a mesma resistência, porém de área de seção transversal $A2 mm²?";

    $r = "<p><b>3) R: $l2 cm</b><br></p>
    <table class=\"tabela\">
      <tr>
        <th>Área (mm²)</th>
        <th>Comprimento (cm)</th>
      </tr>
      <tr>
        <td>$A1</td>
        <td>$l1</td>
      </tr>
      <tr>
        <td>$A2</td>
        <td>x</td>
      </tr>
    </table>
    <p>`$A1 cdot x = $l1 cdot $A2`<br>x = $l2 cm</p>";
      break;

    
    case 10:
      $A2 = $A1/$razao;
      $l2 = $l1/$razao;
      $r2 = $r1;
      $pergunta = "Qual a área de seção transversal de um fio de $materiais[$n] com a mesma resistência, porém de comprimento $l2 cm?";

    $r = "<p><b>3) R: $A2 mm²</b><br></p>
    <table class=\"tabela\">
      <tr>
        <th>Comprimento (cm)</th>
        <th>Área (mm²)</th>
      </tr>
      <tr>
        <td>$l1</td>
        <td>$A1</td>
      </tr>
      <tr>
        <td>$l2</td>
        <td>x</td>
      </tr>
    </table>
    <p>`$l1 cdot x = $A1 cdot $l2`<br>x = $A2 mm²</p>";
      break;

    
    case 11:
      $A2 = $A1/$razao;
      $l2 = $l1/$razao;
      $r2 = $r1;
      $pergunta = "Qual o comprimento de um fio de $materiais[$n] com a mesma resistência, porém de área de seção transversal $A2 mm²?";

    $r = "<p><b>3) R: $l2 cm</b><br></p>
    <table class=\"tabela\">
      <tr>
        <th>Área (mm²)</th>
        <th>Comprimento (cm)</th>
      </tr>
      <tr>
        <td>$A1</td>
        <td>$l1</td>
      </tr>
      <tr>
        <td>$A2</td>
        <td>x</td>
      </tr>
    </table>
    <p>`$A1 cdot x = $l1 cdot $A2`<br>x = $l2 cm</p>";
      break;

    
    default:
        echo "Aaaaaah";
  }
  
  $p = "<p>3 - Considerando-se os resistores como fios, pode-se exemplificar o estudo das grandezas que influem na resistência elétrica utilizando-se as figuras seguintes.</p><img src=\"img/rp1.png\" width=\"400px\"><p>Em um fio de $materiais[$n] com área de seção transversal (A) igual a $A1 mm², e comprimento (l) $l1 cm a resistência (R) é $r1 mΩ. $pergunta";

  return array($p, $r);
}

function rp2() {
  $bois1 = rand(2, 10);
  $dias1 = rand(5, 20);
  $base = rand(120, 180);
  $quilos1 = $base*$bois1*$dias1;
  $boisadd = rand(2, 5);
  $bois2 = $bois1 + $boisadd;
  $dias2 = $dias1 + rand(4, 10);
  $quilos2 = $base*$bois2*$dias2;
  
  $p = "<p>3 - Sr. Gustavo cria, em seu pequeno sítio, $bois1 bois. Na alimentação desses animais, para um período de $dias1 dias, ele usa $quilos1 kg de ração. Após algum tempo, o fazendeiro adquiriu mais $boisadd bois em um leilão. Quantos quilos de ração serão necessários para alimentar todos os animais durante $dias2 dias?</p>";

  $r = "<p><b>3) R: $quilos2 kg</b><br></p>
  <table class=\"tabela\">
    <tr>
      <th>Bois</th>
      <th>Dias</th>
      <th>Ração (kg)</th>
    </tr>
    <tr>
      <td>$bois1</td>
      <td>$dias1</td>
      <td>$quilos1</td>
    </tr>
    <tr>
      <td>$bois2</td>
      <td>$dias2</td>
      <td>x</td>
    </tr>
  </table>
  <p>`$bois1 cdot $dias1 cdot x = $bois2 cdot $dias2 cdot $quilos1`<br>`x = $quilos2` kg</p>";

  return array($p, $r);
}

function rp3() {
  $a = rand(2, 5);
  $b = $a + rand(1, 4);
  $c = $b + rand(1, 5);
  $aux = mmc($a, $b);
  $mmc = mmc($aux, $c);
  $ma = $mmc/$a;
  $mb = $mmc/$b;
  $mc = $mmc/$c;
  $s = $ma + $mb + $mc;
  $form = $s*rand(1, 50);
  
  $p = "<p>3 - Três funcionários, Ana, Bruno e Camila decidem dividir entre si a tarefa de conferir o preenchimento de $form formulários. A divisão deverá ser feita na razão inversa de seus respectivos tempos de serviço na empresa. Se Ana, Bruno e Camila trabalham há $a, $b e $c anos, respectivamente, qual o número de formulários que cada um deverá conferir?</p>";
  
  $fm = $form*$mmc;
  $x = $fm/$s;
  $aform = $x/$a;
  $bform = $x/$b;
  $cform = $x/$c;
  $r = "<p><b>3) R: Ana: $aform formulários; Bruno: $bform formulários; Camila: $cform formulários.</b><br>`A = x/$a; B = x/$b; C = x/$c`<br>`x/$a + x/$b + x/$c = $form`<br>`({$ma}x + {$mb}x + {$mc}x)/$mmc = $form`<br>`{$s}x = $fm`<br>`x = $x`<br>`A = $aform; B = $bform; C = $cform`</p>";

  return array($p, $r);
}

function rp4() {
  $a = rand(2, 5);
  $b = rand(2, 5);
  $s = 1 + $b + $a*$b;
  $valor = $s*rand(3, 10)*100;
  

  $p = "<p>3 - Uma verba de R$ $valor,00 deve ser dividida entre os municípios Tihuana, Ubiratan e Vila Nova em partes proporcionais ao número de matrículas no Ensino Fundamental de cada um deles. O número de alunos matriculados de Tihuana é $a vezes o número de alunos matriculados de Ubiratan que, por sua vez, tem $b vezes o número de matrículas de Vila Nova. Com base nessas informações, quanto cada município deverá receber?</p>";


  $ab = $a*$b;
  $x = $valor/$s;
  $U = $b*$x;
  $T = $ab*$x;
  $Ts = number_format("$T",2,",",".");
  $Us = number_format("$U",2,",",".");
  $Vs = number_format("$x",2,",",".");
  $r = "<p><b>3) R: Tihuana deve receber R$ $Ts, Ubiratan R$ $Us e Vila Nova R$ $Vs</b><<br>`V = x; U = $b cdot x; T = $a cdot $b cdot x`<br>`x + {$b}x + {$ab}x = $valor`<br>`{$s}x = $valor`<br>`x = $x`<br>`V = $x; U = $U; T = $T`</p>";

  return array($p, $r);
}

function rp5() {
  $h1 = rand(2, 16);
  $v1 = rand(4, 12)*10;
  $d1 = rand(2, 10);
  $h2 = rand(2, 16);
  $v2 = rand(4, 12)*10;
  while ((($h1*$v1*$d1) % ($h2*$v2) != 0)||($h2==$h1)||($v2==$v1)) {
    $h1 = rand(2, 16);
    $v1 = rand(4, 12)*10;
    $d1 = rand(2, 10);
    $h2 = rand(2, 16);
    $v2 = rand(4, 12)*10;
  }

  $p = "<p>3 - José e Pedro decidiram fazer uma viagem de férias para o litoral brasileiro. José, que já havia feito esse percurso, afirmou que, rodando uma média de $h1 horas por dia, a uma velocidade média de $v1 km/h, tinha levado $d1 dias para completá-lo. Pedro comprometeu-se a dirigir $h2 horas por dia, à velocidade média de $v2 km/h. Considerando que Pedro vá dirigindo, qual a quantidade de dias que eles levarão para completar o percurso da viagem?</p>";

  $d2 = ($h1*$v1*$d1)/($h2*$v2);
  $r = "<p><b>3) R: $d2 dias</b><br></p>
  <table class=\"tabela\">
    <tr>
      <th>Horas/dia</th>
      <th>Velocidade (km/h)</th>
      <th>Dias</th>
    </tr>
    <tr>
      <td>$h1</td>
      <td>$v1</td>
      <td>$d1</td>
    </tr>
    <tr>
      <td>$h2</td>
      <td>$v2</td>
      <td>x</td>
    </tr>
  </table>
  <p>`$h2 cdot $v2 cdot x = $h1 cdot $v1 cdot $d1`<br>`x = $d2` dias</p>";

  return array($p, $r);
}

?>