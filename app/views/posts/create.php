{% extends 'home.php'%}
{% block title %} Criar Artigo {% endblock %}

{% block conteudo %}
<form action="" method="post" class="max-w-lg mx-auto p-6 rounded-lg shadow-md bg-gradient-to-r from-blue-500 to-transparent">
    <div class="flex flex-col gap-4">
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-300 mb-1">Titulo:</label>
            <input
                type="text"
                id="title"
                name="title"
                required
                class="w-full opacity-70 px-4 py-2  text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Digite o nome do projeto">
        </div>

        <div>
            <label for="descricao" class="block text-sm font-medium text-gray-300 mb-1">Texto:</label>
            <textarea
                id="body"
                name="body"
                required
                class="w-full opacity-70 px-4 py-2  text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Descreva o artigo"
                rows="4"></textarea>
        </div>

        <div>
            <label for="img" class="block text-sm font-medium text-gray-300 mb-1">URL da Imagem:</label>
            <input
                type="file"
                id="img"
                name="img"
                class="w-full px-4 py-2 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
        </div>

        <button
            type="submit"
            name="submit"
            class="w-full bg-cyan-700 hover:bg-cyan-900 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            Salvar
        </button>
    </div>
</form>
{% endblock %}