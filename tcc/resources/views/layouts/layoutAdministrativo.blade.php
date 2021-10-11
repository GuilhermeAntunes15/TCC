<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrativo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body id="body-pd">
  <header class="header" id="header">
      <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
      <nav class="nav">
          <div> 
            <a href="{{route("admin.dash")}}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Charile</span> </a>
            <div class="nav_list"> 
                <a href="{{route("admin.dash")}}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Dashboard</span> 
                </a>
                <a href="{{route('usuarios.index')}}" class="nav_link"> <i class='bx bx-user nav_icon'></i> 
                    <span class="nav_name">Users</span> 
                </a> 
                <a href="{{route('linguagemProgramacao.index')}}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> 
                    <span class="nav_name">Languages</span> 
                </a> 
                <a href="{{route('curso.index')}}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> 
                    <span class="nav_name">Courses</span> 
                </a> 
                <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> 
                    <span class="nav_name">All Classes</span> 
                </a>
                <a href="{{route('professor.index')}}" class="nav_link"> <i class='fas fa-users nav_icon'></i> 
                    <span class="nav_name">Teachers</span> 
                </a> 
            </div>
          </div> <a href="{{route("admin.logout")}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
      </nav>
  </div>
  <!--Container Main start-->
  <div class="height-100 bg-light">
      @yield('content')
  </div>

  <script src="{{ asset('js/sidebars.js') }}"></script>
</body>
</html>
