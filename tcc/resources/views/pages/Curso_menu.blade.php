@extends('layouts.layoutPrincipal') 
@section('content')
<link rel="stylesheet" href="{{ asset('css/cursos_menu.css') }}" />
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
    <section id="navbar" class="">
        <i
            class="fas fa-moon change_mode"
            onclick="change_mode()"
            alt="Modo escuro"
            id="change_mode"
        ></i>
        <a href="#" id="nav-link">Sobre nós</a>
        <a
            href="{{route('cursos.index')}}"
            style="text-decoration: underline"
            id="nav-link"
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
    <p id="dir_atual"><a href="{{route('cursos.index')}}">Todos os cursos</a></p>
</section>

<div class="main">
    <div id="curso">
        <h2 id="titulo_cursos_menu">Todos os cursos</h2>
    </div>

    <div id="cursos_menu_grid">
        <a href="{{route('cursos.lista')}}" class="cursos_menu_item" id="cursos_menu_item_1">
            <div class="num_curso">1</div>
            <div class="texto_curso"><p>Nome do curso</p></div>
        </a>

        <a href="{{route('cursos.lista')}}" class="cursos_menu_item" id="cursos_menu_item_2">
            <div class="num_curso">2</div>
            <div class="texto_curso"><p>Nome do curso</p></div>
        </a>

        <a href="{{route('cursos.lista')}}" class="cursos_menu_item" id="cursos_menu_item_3">
            <div class="num_curso">3</div>
            <div class="texto_curso"><p>Nome do curso</p></div>
        </a>
    </div>
</div>
@stop
