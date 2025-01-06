<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <link rel="stylesheet" href="{{url('public/css/styles.css')}}">


</head>

<body class="h-screen bg-cover bg-center bg-[url('../img/bg/fundo1.jpg')] text-gray-200" id="background">
    {% include 'components/headers.php'%}
    <hr>
    <main class="mx-auto max-w-screen-lg min-h-20 px-3 py-6 gap-y-6">
        <div class="bg-opacity-50 text-white h-full flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold">Seja muito Bem Vindo</h1>
        </div>
        {% include 'components/main.php'%}
    </main>

    {% include 'components/footer.php'%}
</body>


</html>