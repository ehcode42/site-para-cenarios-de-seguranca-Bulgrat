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
    <title>Editar</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="criar_funcionario.php">Criar Funcionário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="ver_funcionario.php">Ver Funcionário</a>
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
    <form class="container mt-4" onsubmit="verFunc(event)" method="POST">
            <div class="mb-3">
                <label for="id_func" class="form-label">ID do Funcionário:</label>
                <input type="text" id="id_func" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
        <div class="container mt-4">
            <h2 id="titulo"></h2>
            <p id="name"></p>
            <p id="email"></p>
            <p id="age"></p>
            <p id="designation"></p>
        </div>
    </main>
</body>

</html>

<script>
    function verFunc(event) {
       var id = document.getElementById('id_func').value;
       event.preventDefault();
       var myInit = {
            method: 'GET',
            mode: "no-cors",
            headers: {
                'Content-Type': 'application/json'
            }
        };
        fetch('http://localhost:50/aula-seguranca-digital/api/single_read.php/?id=' + id, myInit)
            .then(function(response) {
                return response.json();
            }).then(function(response) {
                if (response == "error") {
                    document.getElementById("titulo").innerHTML = 'Não foram encontrados os dados desse funcionário';
                } else {
                    console.log(response)
                    document.getElementById("titulo").innerHTML = 'Dados do funcionário';
                    document.getElementById("name").innerHTML = 'Nome: ' + response.name;
                    document.getElementById("email").innerHTML = 'Email: ' + response.email;
                    document.getElementById("age").innerHTML = 'Idade: ' + response.age;
                    document.getElementById("designation").innerHTML = 'Cargo: ' + response.designation;
                }
            })
    }
</script>