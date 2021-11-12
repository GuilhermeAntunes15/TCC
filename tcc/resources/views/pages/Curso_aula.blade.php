@extends('layouts.layoutPrincipal')
@section('content')
<link rel="stylesheet" href="{{ asset('css/cursos_aula.css') }}" /> 
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
        <a href="cursos.html" id="nav-link" style="text-decoration: underline"
          >Cursos</a
        >
        @if(Auth::check())
          <a href="{{route('users.show', Auth::user()->CD_USUARIO)}}" id="nav-link">Perfil</a>
        @else
          <a href="inscrever.html" class="botao">Inscreva-se</a>
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
      <p><a href="cursos.html">Nome do curso</a>/</p>
      <p id="dir_atual"><a href="{{asset('cursos.aula')}}">1. Título da aula</a></p>
    </section>

    <div class="main">
      <div id="curso">
        <h2 id="titulo_curso">
          <i class="fas fa-angle-right"></i>
          1. Título da aula
        </h2>
        <section id="video_curso">
          <video
            src="https://player.vimeo.com/external/334344435.sd.mp4?s=d367341a941ffa97781ade70e4f4a28f4a1a5fc8&profile_id=139&oauth2_token_id=57447761"
            poster="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
            controls
          >
            O seu navegador não suporta vídeos incorporados! Tente mudar para
            algum outro :)
          </video>
        </section>
        <section id="proximos_videos_curso">
          <h3 id="titulo_proximos_videos">Próximos vídeos</h3>
          <div id="proximos_videos_curso_grid">
            <a href="{{asset('cursos.aula')}}" class="proximos_videos_item">
              <img
                src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                alt=""
              />
              <figcaption><i class="fas fa-play"></i></figcaption>
              <figure>1. Título do vídeo</figure>
            </a>
            <a href="{{asset('cursos.aula')}}" class="proximos_videos_item">
              <img
                src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                alt=""
              />
              <figcaption><i class="fas fa-play"></i></figcaption>
              <figure>1. Título do vídeo</figure>
            </a>
            <a href="{{asset('cursos.aula')}}" class="proximos_videos_item">
              <img
                src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                alt=""
              />
              <figcaption><i class="fas fa-play"></i></figcaption>
              <figure>1. Título do vídeo</figure>
            </a>
            <a href="{{asset('cursos.aula')}}" class="proximos_videos_item">
              <img
                src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                alt=""
              />
              <figcaption><i class="fas fa-play"></i></figcaption>
              <figure>1. Título do vídeo</figure>
            </a>
          </div>
        </section>
      </div>
    </div>
@stop
