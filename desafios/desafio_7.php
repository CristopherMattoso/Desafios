<html>
  <head>
    <meta charset="utf-8">
    <title>Desafios</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <style>
      body {
        font-size: 12px;
      }
    </style>
    <script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML"></script>
  </head>
  <body>
    <?php
    include "d7func.php";
      function QuestionBuilder1(){
        $questoes = array(questA(), questB(), questC());
        shuffle($questoes);
        $aux = $questoes[0];
        $questao1 = "<h4>Questão 1</h4>$aux[0]";
        $solucao1 = "<h4>1)</h4>$aux[1]";

        $aux = $questoes[1];
        $questao2 = "<h4>Questão 2</h4>$aux[0]";
        $solucao2 = "<h4>2)</h4>$aux[1]";

        $aux = $questoes[2];
        $questao3 = "<h4>Questão 3</h4>$aux[0]";
        $solucao3 = "<h4>3)</h4>$aux[1]";

        $GLOBALS['solucoes1'] = "$solucao1<br><br>$solucao2<br><br>$solucao3<br><br>";
        return "$questao1<br><br>$questao2<br><br>$questao3<br><br>";
      }

      function QuestionBuilder2(){
        $i = rand(0,2);
        $aux = $i == 0 ? questD1() : ($i == 1 ? questD2() : questD3());
        $questao4 = "<h4>Questão 4</h4>$aux[0]";
        $solucao4 = "<h4>4)</h4>$aux[1]";

        $aux = questE();
        $questao5 = "<h4>Questão 5</h4>$aux[0]";
        $solucao5 = "<h4>5)</h4>$aux[1]";

        $GLOBALS['solucoes2'] = "$solucao4<br><br>$solucao5<br><br>";
        return "$questao4<br><br>$questao5<br><br>";
      }

      $desafio = "7";
      $file = fopen("nomes.txt","r");
      $str = fread($file,filesize("nomes.txt"));
      $nomes = explode("\n",$str);
      fclose($file);
      for ($i = 0; $i < count($nomes)-1; $i++){
        // FOLHA DO ALUNO
        echo "<div class=\"pagina\">";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp NOTA:___</h3>";
        echo "</header>";
        echo "<main>";
        echo QuestionBuilder1();
        echo "</main>";
        echo "</div>";

        echo "<div class=\"pagina\">";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp Página 2</h3>";
        echo "</header>";
        echo "<main>";
        echo QuestionBuilder2();
        echo "</main>";
        echo "</div>";

        // GABARITO
        echo "<div class=\"pagina\">";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp <b>GABARITO</b></h3>";
        echo "</header>";
        echo "<main>";
        echo $solucoes1;
        echo "</main>";
        echo "</div>";

        echo "<div class=\"pagina\">";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp <b>GABARITO</b></h3>";
        echo "</header>";
        echo "<main>";
        echo $solucoes2;
        echo "</main>";
        echo "</div>";
      }
    ?>
  </body>
</html>