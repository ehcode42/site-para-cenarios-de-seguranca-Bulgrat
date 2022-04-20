<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="criar_funcionario.php">Criar Funcionário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ver_funcionario.php">Ver Funcionário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_funcionario.php">Editar Funcionário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="excluir_funcionario.php">Excluir Funcionário</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <h2 class="my-4">Listagem dos Empregados:</h2>
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Cargo</th>
                <th>Criado em</th>
            </thead>
            <tbody>
                <ul>
                    <?php
                    $url = 'http://localhost:50/aula-seguranca-digital/api/read.php';
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
                    $return = curl_exec($curl);
                    curl_close($curl);
                    $emps = json_decode($return, true);
                    for ($i = 0; $i < 10; $i++) {
                        echo '<tr>' . '<td>' . $emps['body'][$i]['id'] . '</td>' . 
                                      '<td>' . $emps['body'][$i]['name'] . '</td>' . 
                                      '<td>' . $emps['body'][$i]['email'] . '</td>' .
                                      '<td>' . $emps['body'][$i]['age'] . '</td>' .
                                      '<td>' . $emps['body'][$i]['designation'] . '</td>' .
                                      '<td>' . $emps['body'][$i]['created'] . '</td>' .
                              '</tr>';
                    }
                    ?>
                </ul>
            </tbody>
        </table>
    </main>
</body>

</html>