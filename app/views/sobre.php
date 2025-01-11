{% extends 'home.php' %}
{% block title %} Sobre Nós {% endblock %}
{% block conteudo %}
{%
    set items = [
        {'href' : 'https://github.com/FranPomba', 'src' : '/public/img/redes_sociais/github_git_icon_145985.ico', 'alt' :  'GitHub'},
        {'href' : 'https://www.linkedin.com/in/francisco-pomba/', 'src' : '/public/img/redes_sociais/LinkedIn.ico', 'alt' :  'LinkedIn'},
        {'href' : 'https://x.com/PombaFrancisco', 'src' : '/public/img/redes_sociais/Twitter-blueberry.ico', 'alt' :  'Twitter'},
        {'href' : 'https://web.facebook.com/francisco.pomba.129', 'src' : '/public/img/redes_sociais/Facebook-blueberry.ico', 'alt' :  'Facebook'}
    ]
%}

<section class="flex gap-x-3">
    <div class="w-2/3">
        <h1 class="text-3xl font-bold">Olá, eu sou o Francisco!</h1>
        <p class="text-xl leading-6 mt-6">Sou estudante de Ciência da Computação e apaixonado por transformar ideias em soluções digitais.
            Já tive algumas experiências desenvolvendo com PHP usando o framework Laravel e Python com os frameworks Django e FastAPI,
            o que me ajudou a explorar maneiras diferentes de criar aplicações funcionais e bem estruturadas.

            Gosto de entender as necessidades de cada projeto e traduzi-las em funcionalidades que sejam úteis e eficientes. 
            Sou organizado, criativo e procuro sempre aprender algo novo, além de valorizar uma boa comunicação para trabalhar em equipe e alinhar expectativas. 
            Estou sempre em busca de desafios que me ajudem a crescer e de oportunidades para contribuir com soluções inovadoras e impactantes..
        </p>
        <ul class="flex gap-x-3 mt-3">
            {% for item in items %}
            <li><a target="_blank" href="{{item.href}}"><img class="h-8 hover:animate-bounce"
                        src="{{item.src}}" alt="{{item.alt}}"></a></li>
            {% endfor %}
        </ul>
    </div>
    <div class="w-1/3 ">
        <div class="flex items-center justify-center">
            <img class="h-60 -mt-6 hover:animate-pulse"
                src="/public/img/IMG-20240624-WA0094.jpg" alt="Foto Francisco Pomba">
        </div>
    </div>
</section>

{% endblock %}