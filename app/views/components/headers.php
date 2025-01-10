{%
    set menus = [
        {'name': 'Pagina Inicial', 'href':url('')},
        {'name': 'sobre', 'href':'#'}
        ]      
%}
<header class="mx-auto max-w-screen-lg items-center justify-center px-3 py-6 flex">
    <div class="">
        <ul class="flex gap-x-3 font-medium text-gray-200">
            {% if session.user %}
            <li>Olá {{ session.user.username }}</li>
            <li><a href="{{url('post/')}}" class="hover:underline"> Novo Post</a></li>
            {% endif %}
            {%for menu in menus %}
            <li><a href="{{menu.href}}" class="hover:underline"> {{ menu.name }}</a></li>
            {% endfor %}
        </ul>
    </div>
</header>