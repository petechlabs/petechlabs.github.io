<?php
session_start();

ini_set('default_charset', 'UTF-8');

include("conectarDatabase.php");

$nome = $email = "";
$erroNome = $erroEmail = "";
$idTutor = mt_rand(1, 1000);

function limparDados($dados) {
  // organiza os dados recebidos
  $dados = trim($dados); // tira espaços em branco
  $dados = stripslashes($dados); // tira aspas
  $dados = htmlspecialchars($dados); // substitui caracteres especiais

  return $dados;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = limparDados($_POST["nome"]);
  $email = limparDados($_POST["email"]);

  $query = "INSERT INTO tutores(idTutor, nome, email)
  VALUES ('$idTutor', '$nome', '$email')";

  //mysqli_query($conexao, $query);

  if (mysqli_query($conexao, $query)) {
    echo "Dados inseridos com sucesso no banco de dados!";
  } else {
    echo "Erro ao inserir os dados: " . mysqli_error($conexao);
  }
  
  mysqli_close($conexao);
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="imgs/logo-nariz-petech.png"/>
  <title>Petech</title>
  <link rel="stylesheet" href="/css/style.css"/>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="imgs/logo-nariz-petech.png" alt="logo petech">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">petech</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">quem somos</a>
          </li>
        </ul>
      </div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="pesquisar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">pesquisar</button>
      </form>
    </div>
  </nav>

  <!--formulário-->
  <div class="container">
    <br>
    <h3>cadastre-se!</h3>
    <p>para utilizar a Petech, é simples e gratuito, apenas passe
      as informações abaixo, e, quando preciso, lhe passamos elas de volta
    </p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h4>suas informações</h4>
      <div class="row">
        <div class="mb-3 col">
          <label class="form-label">seu nome</label>
          <input class="form-control" type="text" placeholder="Ana Carla" name="nome" value="<?php echo $nome;?>">
        </div>
        <div class="mb-3 col">
          <label class="form-label">seu email</label>
          <input class="form-control" type="email" placeholder="anacarla@exemplo.com" name="email" value="<?php echo $email;?>">
        </div>
        <input type="submit">
      </div>
    </form>

      <h4>sobre seu pet</h4>
      <div class="row">
        <div class="col">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radioPet" id="radioPet1">
            <label class="form-check-label" for="radioPet1">gato</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radioPet" id="radioPet2">
            <label class="form-check-label" for="radioPet2">cachorro</label>
          </div>
        </div>
        <br>
        <div class="col">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radioGender" id="radioGender1">
            <label class="form-check-label" for="radioGender1">macho</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="radioGender" id="radioGender2">
            <label class="form-check-label" for="radioGender2">fêmea</label>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col">
            <label class="form-label">nome</label>
            <input class="form-control" type="text" placeholder="lilica" name="nome-pet">
          </div>
          <div class="mb-3 col">
            <label class="form-label">data de nascimento</label>
            <input class="form-control" type="text" placeholder="01/01/2000" name="nascimento-pet">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">observações importantes sobre o animal</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">foto da carteira de vacina</label>
          <input class="form-control" type="file" id="formFile" name="carteira-vacina">
        </div>
      </div>
      <div class="col-auto">
        <button type="submit" class="send-btn">enviar</button>
      </div>
    </form>
  </div>
  <br>

  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>