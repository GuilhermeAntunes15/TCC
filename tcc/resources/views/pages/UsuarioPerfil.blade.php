@extends('layouts.layoutPrincipal') 
@section('content') 
        <link rel="stylesheet" href="{{ asset('css/usuario_perfil.css') }}" />
        
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <script src="{{ asset('js/principal.css') }}"></script>
        <script src="{{ asset('js/usuario_perfil.css') }}"></script>
        <nav>
            <a href="{{route('index')}}" id="logo"
                ><img
                    src="{{ asset('img/icone_charlie1-2.png')}}"
                    id="img1"
                    title="logo" />
                <p>Charlie</p>
                <img
                    src="{{ asset('img/icone_charlie2-2.png')}}"
                    id="img2"
                    title="logo"
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
                <a href="{{route('cursos.index')}}" id="nav-link">Cursos</a>
                <a href="{{route('users.create')}}" class="botao">Inscreva-se</a>
            </section>
        </nav>

        <div class="notif_janela" id="notif_janela_sair">
            <div class="notif notif_sair" id="notif_usuario_sair">
                <figure class="notif_icone">{!}</figure>
                <h3 class="notif_titulo">Tem certeza que deseja sair?</h3>
                <div class="notif_div_botoes">
                    <button class="notif_botao_sim">Sim</button>
                    <button
                        class="notif_botao_nao"
                        onclick="notifFecha('notif_sair', 'notif_janela_sair')"
                    >
                        Não
                    </button>
                </div>
            </div>
        </div>

        <figure class="figuras">
            <p id="fig0" class="figura">...</p>
            <p id="fig1" class="figura">()</p>
            <p id="fig2" class="figura">< /></p>
            <p id="fig3" class="figura">{}</p>
            <p id="fig4" class="figura">...</p>
            <p id="fig5" class="figura">()</p>
            <p id="fig6" class="figura">0101</p>
            <p id="fig7" class="figura">. . .</p>
        </figure>

        <div  class="main">
            <div id="usuario_titulo">
                <div id="usuario_imagem_div">
                    <img
                        id="usuario_imagem_img"
                        src="https://www.smashbros.com/images/og/kirby.jpg"
                        alt=""
                    />
                    <figcaption>
                        <i class="far fa-file-image"></i>
                        <p>Alterar imagem</p>
                    </figcaption>
                </div>

                <h2 class="usuario_esquerda">Perfil do usuário</h2>
            </div>

            <div class="container">
                <div id="usuario_menu_menu">
                    <p
                        id="usuario_informacoes_pessoais"
                        onclick="usuarioPerfil_mudaMenu(this.id)"
                        class="usuario_ativo_p"
                    >
                        <i
                            class="fas fa-angle-right"
                            id="usuario_informacoes_pessoais_i"
                        ></i
                        >Informações pessoais
                    </p>
                    <p
                        id="usuario_cursos_iniciados"
                        onclick="usuarioPerfil_mudaMenu(this.id)"
                    >
                        <i
                            class="fas fa-angle-right"
                            id="usuario_cursos_iniciados_i"
                        ></i
                        >Cursos iniciados
                    </p>
                    <p
                        id="usuario_certificados"
                        onclick="usuarioPerfil_mudaMenu(this.id)"
                    >
                        <i
                            class="fas fa-angle-right"
                            id="usuario_certificados_i"
                        ></i
                        >Certificados
                    </p>
                    <p
                        id="usuario_sair"
                        onclick="notifAbre('notif_usuario_sair', 'notif_janela_sair')"
                    >
                        <i class="fas fa-sign-out-alt"></i>Sair
                    </p>
                </div>

                <div id="usuario_menu_varia">
                    <div id="usuario_informacoes_pessoais_div">
                        <form action="">
                            <input
                                type="text"
                                value="{{$nome}}"
                                name="nome"
                                placeholder="Nome completo"
                                id="txtNome"
                            />
                            <input
                                type="text"
                                name="usuario"
                                value="{{$usuario}}"
                                placeholder="Usuario"
                                id="txtUsuario"
                            />
                            <input
                                type="email"
                                name="email"
                                value="{{$email}}"
                                placeholder="E-mail"
                                id="txtEmail"
                            />
                            {{-- <input
                                type="text"
                                name="senha"
                                placeholder="Senha"
                                id="txtSenha"
                            /> --}}
                        </form>
                    </div>

                    <div id="usuario_cursos_iniciados_div">
                        <a href="cursos.html">
                            <div class="usuario_cursos_curso">
                                <img
                                    src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                    alt=""
                                    class="usuario_cursos_imagem"
                                />
                                <div class="usuario_cursos_descricao">
                                    <p class="usuario_cursos_descricao_texto">
                                        Nome do curso
                                    </p>
                                    <p
                                        class="
                                            usuario_cursos_descricao_andamento
                                        "
                                    >
                                        * Em andamento
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a href="cursos.html">
                            <div class="usuario_cursos_curso">
                                <img
                                    src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                    alt=""
                                    class="usuario_cursos_imagem"
                                />
                                <div class="usuario_cursos_descricao">
                                    <p class="usuario_cursos_descricao_texto">
                                        Nome do curso
                                    </p>
                                    <p
                                        class="
                                            usuario_cursos_descricao_andamento
                                        "
                                    >
                                        * Em andamento
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a href="cursos.html">
                            <div class="usuario_cursos_curso">
                                <img
                                    src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                    alt=""
                                    class="usuario_cursos_imagem"
                                />
                                <div class="usuario_cursos_descricao">
                                    <p class="usuario_cursos_descricao_texto">
                                        Nome do curso
                                    </p>
                                    <p
                                        class="
                                            usuario_cursos_descricao_andamento
                                        "
                                    >
                                        * Em andamento
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div id="usuario_certificados_div"></div>
                </div>
            </div>

            <button class="botao" id="usuario_btnSalvar">Salvar</button>
        </div>
@stop