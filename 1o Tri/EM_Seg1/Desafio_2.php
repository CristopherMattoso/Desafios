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
    include "d2func.php";
      function QuestionBuilder(){
        $i = rand(1, 12);
        switch($i) {
          case 1:
            $aux = barco1();
            break;
          case 2:
            $aux = barco2();
            break;
          case 3:
            $aux = barco3();
            break;
          case 4:
            $aux = barco4();
            break;
          case 5:
            $aux = barco5();
            break;
          case 6:
            $aux = barco6();
            break;
          case 7:
            $aux = barco7();
            break;
          case 8:
            $aux = barco8();
            break;
          case 9:
            $aux = barco9();
            break;
          case 10:
            $aux = barco10();
            break;
          case 11:
            $aux = barco11();
            break;
          case 12:
            $aux = barco12();
            break;
        }
        $questao1 = "$aux[0]";
        $solucao1 = "$aux[1]";

        
        $GLOBALS['solucoes'] = "$solucao1";
        return "$questao1";
      }

      $sala = $_POST["sala"];
      $desafio = "2";
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