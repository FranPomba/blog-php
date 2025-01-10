<section class="space-y-3">
    <div class=" grid grid-cols-4 gap-6 rounded-lg p-3">
        <div class="shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
            {% for post in posts %}
            <div class="p-4">
                <h2 class="font-semibold text-lg text-gray-300">{{ post.title }}</h2>
                {% if session.user %}
                <a href="{{url('post/'~post.id ~ '/edit')}}" class="text-blue-500 text-sm font-medium mt-3 inline-block">Editar →</a>
                {% endif %}
                <p class="text-sm text-gray-200 mt-2">{{ summarizeText(post.body) }}</p>
                <a href="{{url('post/'~post.id)}}" class="text-blue-500 text-sm font-medium mt-3 inline-block">Leia mais →</a>
                <p class="text-gray-200 text-sm font-medium">Postado {{ countTime(post.created_at) }}</p>
                <p class="text-gray-200 text-sm font-medium">Editar</p>
            </div>
            {% endfor %}
        </div>
    </div>
</section>