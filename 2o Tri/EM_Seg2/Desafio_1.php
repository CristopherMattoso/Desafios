<html>
  <head>
    <meta charset="utf-8">
    <title>Desafios</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML"></script>
  </head>
  <body>
    <?php
    include "d1func.php";
      function QuestionBuilder(){
        $i = rand(0, 2);
        $aux = $i == 0 ? prob1() : ($i == 1 ? prob2() : prob3());
        $questao1 = "$aux[0]";
        $solucao1 = "$aux[1]";

        $aux = graph();
        $questao2 = "$aux[0]";
        $solucao2 = "$aux[1]";

        $questao3 = "<p>3 - Escolha uma civilização da antiguidade e levante dados numéricos que a caracterizem como grande império. Depois estabeleça uma função entre duas destas características em que ambas variem de algum modo e que possa ser dito que existe alguma relação. Características possíveis: Extensão Territorial, Poder Militar, Influência Econômica, Influência Cultural, Organização Política, Estabilidade e Longevidade, Impacto Histórico, Diversidade Cultural, Infraestrutura, Patrimônio.</p>";

        $GLOBALS['solucoes'] = "$solucao1<br><br>$solucao2";
        return "$questao1<br>$questao2 $questao3<br><br>";
      }

      $sala = $_POST["sala"];
      $desafio = "1";
      $file = fopen("Sala $sala.txt","r");
      $str = fread($file,filesize("Sala $sala.txt"));
      $nomes = explode("\n",$str);
      fclose($file);
      for ($i = 0; $i < count($nomes)-1; $i++){
        // FOLHA DO ALUNO
        echo "<div>";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>SALA $sala<br>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp NOTA:___</h3>";
        echo "</header>";
        echo "<main>";
        echo QuestionBuilder();
        echo "</main>";
        echo "</div>";
        // GABARITO
        echo "<div>";
        echo "<br><br><br>";
        echo "<header>";
        echo "<h1>SALA $sala<br>DESAFIO $desafio</h1>";
        echo "<h3>ALUNO(A): <i>$nomes[$i]</i> &nbsp &nbsp &nbsp <b>GABARITO</b></h3>";
        echo "</header>";
        echo "<main>";
        echo $solucoes;
        echo "</main>";
        echo "</div>";
      }
    ?>
  </body>
</html>