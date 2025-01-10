{% extends "home.php"%}
{% block title %} {{ post.title }} {% endblock %}

{% block conteudo %}
<div class="max-w-4xl bg-slate-600 opacity-80  mx-auto p-6 shadow-lg rounded-lg mt-8">

    <h1 class="text-3xl font-bold text-gray-200 mb-4">{{post.title}}</h1>

    <div class="text-sm text-gray-200 mb-6 flex items-center justify-between">
        <div>
            Publicado em <span class="font-medium">{{post.created_at | date('d/m/Y', timezone: "Africa/Luanda") }}</span> por <span class="font-medium">Francisco Pomba</span>
        </div>
        {% if session.user %}
        <div class="flex items-center space-x-4">
            <a href="{{ url('post/' ~ post.id ~ '/edit') }}"
                class="bg-emerald-500 text-white hover:bg-emerald-600 py-1 px-3 text-sm rounded font-medium">
                Editar Post
            </a>
            <form action="{{ url('post/' ~ post.id ~ '/edit') }}" method="post">
                <button type="submit"
                    class="bg-red-500 text-white text-sm font-medium py-1 px-3 rounded hover:bg-red-600">
                    Eliminar
                </button>
            </form>
        </div>
        {% endif %}
    </div>



    <div class="text-gray-200 leading-relaxed">
        <p class="mb-4">
            {{post.body}}
        </p>
        <p class="text-gray-200 text-sm font-medium">Postado {{ countTime(post.created_at) }}</p>
    </div>

    <div class="mt-6">
        <a href="{{url('')}}"
            class="text-gray-300 font-semibold hover:underline">← Voltar</a>
    </div>
</div>


{% endblock %}