<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="config/materialize/css/materialize.min.css">
    <title>Curso de MVC</title>
</head>
<body>

    <!-- No NAV vamos inserir nossa navegação definida no sistema de rotas -->
    <nav class="purple lighten-2">
        <div class="nav-wrapper container">
            <a href="?router=Site/home/" class="brand-logo light">Curso de MVC</a>

            <ul class="right">
                <li><a href="?router=Site/cadastro/">Cadastro</a></li>
                <li><a href="?router=Site/consulta/">Consultas</a></li>                
            </ul>
        </div>
    </nav>

    <script src="config/materialize/js/materialize.min.js"></script>
</body>
</html>