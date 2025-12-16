<html>
  <head>
    <meta charset="utf-8">
    <title>Desafios</title>
    <style>
      body {
        text-align: center;
        width: 70%;
        margin: auto;
      }
      section {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        border: 1px black solid;
      }
      h2 {
        background-color: gray;
      }
      .botao_desafio {
        display: grid;
        text-align: center;
      }
      .botao_desafio * {
        height: 40px;
      }
      textarea {
        height: auto;
      }

    </style>
  </head>
  <body>
    <h2>Geometria</h2>
    <section>
      <form class="botao_desafio" action="desafios/desafio_1.php" method="post">
        <label>Mediatriz e Bissetriz</label>
        <button type="submit">Desafio 1</button>
      </form>
      <form class="botao_desafio" action="desafios/desafio_2.php" method="post">
        <label>Semelhança de Triângulos</label>
        <button type="submit">Desafio 2</button>
      </form>
      <form class="botao_desafio" action="desafios/desafio_3.php" method="post">
        <label>Triângulos Retângulos, Estudo de Ângulos, Proporcionalidade</label>
        <button type="submit">Desafio 3</button>
      </form>
      <form class="botao_desafio" action="desafios/desafio_4.php" method="post">
        <label>Construções Geométricas</label>
        <button type="submit">Desafio 4</button>
      </form>
    </section>
    <h2>Estatística e Financeira</h2>
    <section>
      <form class="botao_desafio" action="desafios/desafio_5.php" method="post">
        <label>Tabelas e Gráficos</label>
        <button type="submit">Desafio 5</button>
      </form>
      <form class="botao_desafio" action="desafios/desafio_6.php" method="post">
        <label>Medidas de Tendência Central</label>
        <button type="submit">Desafio 6</button>
      </form>
      <form class="botao_desafio" action="desafios/desafio_7.php" method="post">
        <label>Matemática Financeira</label>
        <button type="submit">Desafio 7</button>
      </form>
    </section>
    <br><br><br><br>
    <div>
      <form action="index.php" method="post" style="grid-template-columns: 4fr 1fr">
      <h2 style="grid-column: span 5;">Lista de Nomes</h2>
      <?php
        $file = fopen("desafios/nomes.txt","r");
        $str = fread($file,filesize("desafios/nomes.txt"));
        $nomes = explode("\n",$str);
        fclose($file);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $str = $_POST['nomes'] ?? $str;
          $nomes = explode("\n",$str);
          file_put_contents("desafios/nomes.txt", $str);
        }

        $size = count($nomes);
        echo "<textarea name=\"nomes\" rows=\"$size\" cols=\"50\">$str</textarea>";
      ?>
        <button type="submit">Atualizar</button>
      </form>
    </div>
  </body>
</html>