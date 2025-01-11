{%
    set menus = [
        {'name': 'Pagina Inicial', 'href':url('')},
        {'name': 'sobre', 'href': url('sobre-mim')}
        ]      
%}
<header class="mx-auto max-w-4xl opacity-80 p-6 shadow-lg rounded-lg mt-8 items-center justify-between  px-3 py-6 flex">
    <div class="flex items-center space-x-4 gap-x-3">
        Olá {{ session.user.username }}
        {%for menu in menus %}
        <a href="{{menu.href}}" class="hover:underline"> {{ menu.name }}</a>
        {% endfor %}
    </div>
    <div class="flex items-center space-x-4 gap-x-3">
        {% if session.user %}
        <a href="{{url('post/')}}" class="hover:underline px-2 "> Novo Post</a>
        <a href="{{url('logout/')}}" class="hover:underline px-2 ">Sair </a>
        {% endif %}
    </div>
    </div>
</header>