<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PlanGym</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }
  </style>
  

</head>

<body class="antialiased">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GYM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="https://zen-ritchie-70b7e0.netlify.app/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
          <div class="navbar" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto">
              <nav class="nav">
                <div class="container">
                  <a href="index.html" class="logo">
                    <img src="https://zen-ritchie-70b7e0.netlify.app/img/logo.png" alt="" />
                  </a>
                  <div id="toggle"></div>
                  <ul class="menu" id="menu">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="{{ route('session.index') }}">HIIT</a></li>
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                      </a>

                    </li>
                    <li class="nav-item">
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>

                    </li>
                    @endguest
                  </ul>
                </div>
              </nav>

            </ul>
          </div>
        </div>
      </nav>
      <div class="text" id="inicio">
        <p>Lleva tus entrenamientos de gimnasio al siguiente nivel con <br><span>PlanGym<span></p>
      </div>
    </header>

    <section id="programs">
      <div class="container">
        <h2><span>Informacion</span></h2>
        <div class="contentBox">
          <div class="content">
            <div class="imgBox">
              <img src="https://zen-ritchie-70b7e0.netlify.app/img/Fitness-icon.png" alt="" />
            </div>
            <h3>CONOCE TU BESTIA</h3>
            <p>
              ¿Cómo te fue en tu último entrenamiento?

              Ahora puedes dejar de depender solo de los sentimientos y sensaciones para evaluar la calidad de tu entrenamiento:
              PlanGym es la herramienta perfecta para comenzar a cuantificar tu rendimiento al levantar pesas.
            </p>
          </div>
          <div class="content">
            <div class="imgBox">
              <img src="https://zen-ritchie-70b7e0.netlify.app/img/BodyBuilding-icon.png" alt="" />
            </div>
            <h3>ENTRENAMIENTO CON INTENCIÓN</h3>
            <p>
              El entrenamiento, sin importar cuál sea su objetivo,
              debe tener en cuenta cómo funciona su cuerpo.
              Al medir el rendimiento diariamente,
              instantáneamente tomará mejores decisiones sobre cargas,
              series y repeticiones.
            </p>
          </div>
          <div class="content">
            <div class="imgBox">
              <img src="https://zen-ritchie-70b7e0.netlify.app/img/Yoga-icon.png" alt="" />
            </div>
            <h3>ENTRENAMIENTO DE ALTA INTENSIDAD</h3>
            <p>
              Las ráfagas cortas e intensas de ejercicio se combinan con intervalos de descansos rápidos para un entrenamiento óptimo de intervalos de alta intensidad (HIIT).
              HIIT puede hacer que el cuerpo queme calorías a un ritmo mayor hasta 48-72 horas después.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section id="trainers">
      <div class="container">
        <h2>ÚNETE A LA <span>ÉLITE</span></h2>
        <div class="contentBox">
          <div class="box">
            <div class="imgBox">
              <img src="https://zen-ritchie-70b7e0.netlify.app/img/trainer-1.jpg" alt="" />
            </div>
            <div class="content">
              <h3>Entrenador Personal</h3>
              <h4>Jesus Gargallo</h4>
              <p>
                Utilizo PlanGym porque me esfuerzo por hacer VISIBLE lo invisible
              </p>
              <div class="social-icons">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="imgBox">
              <img src="https://zen-ritchie-70b7e0.netlify.app/img/trainer-2.jpg" alt="" />
            </div>
            <div class="content">
              <h3>Entrenadora Personal</h3>
              <h4>Natalia Samkov</h4>
              <p>
                ¡La web me ayuda a motivarme a ser una atleta más fuerte en el gimnasio!
              </p>
              <div class="social-icons">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="imgBox">
              <img src="https://zen-ritchie-70b7e0.netlify.app/img/trainer-3.jpg" alt="" />
            </div>
            <div class="content">
              <h3>Entrenador Personal</h3>
              <h4>Ayman Kaddar</h4>
              <p>
                ¡Velocidad de la información! ¡Con PlanGym mis atletas no desperdician una repetición!
              </p>
              <div class="social-icons">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="plan">
      <div class="wrap">
        <div class="pricing-wrap">
          <div class="pricing-table">
            <div class="pricing-table-cont">
              <div class="pricing-table-month">
                <div class="pricing-table-head">
                  <h2>BASICO</h2>
                  <h3><sup>30 </sup>€<sub>/MES</sub></h3>
                </div>
                <ul class="pricing-table-list">
                  <li><span>3</span> Sesiones</li>
                  <li><span>3 </span>Clases de Hist</li>
                  <li><span>2 </span>Guia de Nutricion</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="pricing-table">
            <div class="pricing-table-cont">
              <div class="pricing-table-month">
                <div class="pricing-table-head estandar-title">
                  <h2>ESTANDAR</h2>
                  <h3><sup>60 </sup>€<sub>/MES</sub></h3>
                </div>
                <ul class="pricing-table-list">
                  <li><span>6</span> Sesiones</li>
                  <li><span>6 </span> Clases de Hist</li>
                  <li><span>4 </span> Guia de Nutricion</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="pricing-table">
            <div class="pricing-table-cont">
              <div class="pricing-table-month">
                <div class="pricing-table-head">
                  <h2>PREMIUM</h2>
                  <h3><sup>90 </sup>€<sub>/MES</sub></h3>
                </div>
                <ul class="pricing-table-list">
                  <li><span>9</span> Sesiones</li>
                  <li><span>9 </span>Clases de Hist</li>
                  <li><span>6 </span>Guia de Nutricion</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</body>
</html>