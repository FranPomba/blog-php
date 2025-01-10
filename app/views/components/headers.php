{%
    set menus = [
        {'name': 'Pagina Inicial', 'href':url('')},
        {'name': 'sobre', 'href':'#'}
        ]      
%}
<header class="mx-auto max-w-4xl opacity-80 p-6 shadow-lg rounded-lg mt-8 items-center justify-between px-3 py-6 flex">
    <div class="flex items-center space-x-4">
        <ul class="flex gap-x-3 font-medium text-gray-200">
            {% if session.user %}
            <li>Olá {{ session.user.username }}</li>
            <li><a href="{{url('post/')}}" class="hover:underline px-2 "> Novo Post</a></li>
            {% endif %}
            {%for menu in menus %}
            <li><a href="{{menu.href}}" class="hover:underline"> {{ menu.name }}</a></li>
            {% endfor %}
        </ul>
    </div>
</header>