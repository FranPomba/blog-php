{% extends "home.php"%}
{% block title %} {{ post.title }} {% endblock %}

{% block conteudo %}
<div class="max-w-4xl bg-slate-600 opacity-80  mx-auto p-6 shadow-lg rounded-lg mt-8">

    <h1 class="text-3xl font-bold text-gray-200 mb-4">{{post.title}}</h1>

    <div class="text-sm text-gray-200 mb-6">
        Publicado em <span class="font-medium">{{post.created_at | date('d/m/Y', timezone: "Africa/Luanda") }}</span> por <span class="font-medium">Francisco Pomba</span>
    </div>

    <div class="mb-6">
        <img
            src="/images/exemplo.jpg"
            alt="Imagem do Post"
            class="w-full h-64 object-cover rounded-lg">
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