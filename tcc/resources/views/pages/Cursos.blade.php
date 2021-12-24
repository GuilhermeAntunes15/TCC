@extends('layouts.layoutPrincipal') 
@section('content')
<link rel="stylesheet" href="{{ asset('css/cursos.css') }}" />
<nav>
    <a href="{{route('index')}}" id="logo"
        ><img
            src="{{ asset('img/icone_charlie1-2.png')}}"
            id="img1"
            title="logo" />
        <p>Charlie</p>
        <img src="{{ asset('img/icone_charlie2-2.png')}}" id="img2" title="logo"
    /></a>
    <a href="javascript:void(0);" class="icon" onclick="resp_nav()">
        <i class="fa fa-bars"></i>
    </a>
    <section id="navbar" class="navbar">
        <i
            class="fas fa-moon change_mode"
            onclick="change_mode()"
            alt="Modo escuro"
            id="change_mode"
        ></i>
        <a href="#" id="nav-link">Sobre nós</a>
        <a
            href="{{route('cursos.index')}}"
            id="nav-link"
            style="text-decoration: underline"
            >Cursos</a
        >
        @if(Auth::check())
            <a href="{{route('users.show', Auth::user()->CD_USUARIO)}}" id="nav-link">Perfil</a>
        @else
            <a href="{{route('users.create')}}" class="botao">Inscreva-se</a>
        @endif
    </section>
</nav>

<figure class="figuras">
    <p id="fig0" class="figura">. . .</p>
    <p id="fig1" class="figura">()</p>
    <p id="fig2" class="figura">< /></p>
    <p id="fig3" class="figura">{}</p>
    <p id="fig4" class="figura">...</p>
    <p id="fig5" class="figura">()</p>
    <p id="fig6" class="figura">0101</p>
    <p id="fig7" class="figura">. . .</p>
</figure>

<!----- MAIN ----->

<section id="diretorios" class="comentario">
    <p><a href="{{route('cursos.index')}}">Todos os cursos</a>/</p>
    <p id="dir_atual"><a href="cursos.html">Nome do curso</a></p>
</section>

<div class="main">
    <div id="curso">
        <h2 id="titulo_curso">
            <i class="fas fa-angle-right"></i>
            Nome do curso
        </h2>

        <div id="dados_curso">
            <section class="imagem" id="img_curso">
                <img
                    src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                />
            </section>

            <section id="descricao">
                <p class="comentario">// DESCRIÇÃO</p>
                <p>
                    Descrição bonitona aaa Descrição bonitona aaa Descrição
                    bonitona aaa Descrição Descrição bonitona aaa Descrição
                    bonitona aaa Descrição bonitona aaa Descrição
                </p>
                <div id="desc_lista">
                    <p id="desc_lista_item">
                        <i class="far fa-clock"></i> Horas totais de conteúdo:
                        XX
                    </p>
                    <p id="desc_lista_item">
                        <i class="fas fa-video"></i> Aulas totais: XX
                    </p>
                </div>

                <a href="{{route("cursos.aula")}}" class="botao" id="desc_botao"
                    >Começar curso</a
                >
            </section>

            <p id="curso_andamento">** Curso em andamento</p>
        </div>
    </div>

    <!--------------------------------------------->

    <div class="requisitos" id="requisitos">
        <h3>Requisitos</h3>
        <div id="requis_itens">
            <p>Requisito</p>
            <p>Requisito</p>
            <p>Requisito</p>
            <p>Requisito</p>
            <p>Requisito</p>
            <p>Requisito</p>
            <p>Requisito</p>
        </div>
    </div>

    <div class="aulas" id="aulas">
        <h2>Aulas</h2>
        <div class="aulas_container">
            <a href="{{route("cursos.aula")}}">
                <div class="aulas_itens">
                    <img
                        src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt=""
                    />
                    <div class="aulas_itens_texto">
                        <p class="aulas_itens_titulo">1. Título da aula</p>
                        <p class="aulas_itens_tempo">00 min.</p>
                    </div>
                </div>
            </a>
            <a href="{{route("cursos.aula")}}">
                <div class="aulas_itens">
                    <img
                        src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt=""
                    />
                    <div class="aulas_itens_texto">
                        <p class="aulas_itens_titulo">1. Título da aula</p>
                        <p class="aulas_itens_tempo">00 min.</p>
                    </div>
                </div>
            </a>
            <a href="{{route("cursos.aula")}}">
                <div class="aulas_itens">
                    <img
                    src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500""
                    alt="" />
                    <div class="aulas_itens_texto">
                        <p class="aulas_itens_titulo">1. Título da aula</p>
                        <p class="aulas_itens_tempo">00 min.</p>
                    </div>
                </div>
            </a>
            <a href="{{route("cursos.aula")}}">
                <div class="aulas_itens">
                    <img
                        src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt=""
                    />
                    <div class="aulas_itens_texto">
                        <p class="aulas_itens_titulo">1. Título da aula</p>
                        <p class="aulas_itens_tempo">00 min.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@stop
