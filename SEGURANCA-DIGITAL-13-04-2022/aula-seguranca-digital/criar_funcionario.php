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
    <title>Criar</title>
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
                        <a class="nav-link active" href="criar_funcionario.php">Criar Funcionário</a>
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
        <form class="container mt-4" onsubmit="enviaFunc(event)" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="fomr-label">Email</label>
                <input type="text" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="age" class="fomr-label">Idade</label>
                <input type="text" id="age" class="form-control">
            </div>
            <div class="mb-3">
                <label for="designition" class="fomr-label">Cargo</label>
                <input type="text" id="designition" class="form-control">                
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </main>
</body>

</html>

<script>
    function enviaFunc(event) {
        const obj = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            age: document.getElementById('age').value,
            designation: document.getElementById('designition').value
        };
        event.preventDefault();
        var myInit = {
            method: 'POST',
            mode: "no-cors",
            body: JSON.stringify(obj),
            headers: {
                'Content-Type': 'application/json'
            }
        };
        fetch('http://localhost:50/aula-seguranca-digital/api/create.php', myInit)
            .then(function(response) {
                return response.json();
            }).then(function(response) {
                if (response == 'success') {
                    alert('sucesso')
                        document.getElementById('name').value = '',
                        document.getElementById('email').value = '',
                        document.getElementById('age').value = '',
                        document.getElementById('designition').value = ''
                } else {
                    alert('Erro ao cadastrar funcionário')
                }
            })
    }
</script>