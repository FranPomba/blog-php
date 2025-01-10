{% extends "home.php"%}
{% block title %} Artigos {% endblock %}

{% block conteudo %}
<form action="" method="post" class="max-w-lg mx-auto p-6 rounded-lg shadow-md bg-gradient-to-r from-blue-500 to-transparent">
    <div class="flex items-center justify-center">
        <h1 class="text-xl font-bold items-center justify-center">Cadastrar Usuário</h1>
    </div>
    <div class="flex flex-col gap-4">
        <div>
            <label for="username" class="block text-sm font-medium text-gray-300 mb-1">Usuario</label>
            <input
                type="text"
                id="username"
                name="username"
                required
                class="w-full opacity-70 px-4 py-2  text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Digite o seu nome de Usuário">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                required
                class="w-full opacity-70 px-4 py-2  text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Digite o seu email">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                class="w-full opacity-70 px-4 py-2  text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Digite a senha">
        </div>
        <button
            type="submit"
            name="submit"
            class="w-full bg-cyan-700 hover:bg-cyan-900 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            Cadastrar
        </button>
        <div class="p-">
            <span class="text-gray-900 font-medium">Já possui uma conta? <a href="{{url('login')}}" class="text-blue-800 underline">entrar</a></span>
        </div>
    </div>
</form>
{% endblock %}