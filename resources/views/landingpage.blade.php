<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Los Botanicos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/views.css') }}">

  </head>
  <body>
    <div class="preloader">
      <div class="loader">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
      </div>
    </div>
    <div class="page">
      <div class="position-relative">
        <header class="section page-header" id="programs">
          <!--RD Navbar-->
          <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic context-dark" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="10px" data-xl-stick-up-offset="10px" data-xxl-stick-up-offset="10px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
              <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                  <!--RD Navbar Panel-->
                  <div class="rd-navbar-panel">
                    <!--RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!--RD Navbar Brand-->
                    <div class="rd-navbar-brand">
                      <!--Brand--><a class="brand" href="#programs"><img class="brand-logo-light" src="{{ asset('images/logo-empresa-blanco.png') }}" alt="Logo"/></a>
                    </div>
                  </div>
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#programs">Contenido</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#about">Nosotros</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#clients">Clientes</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('index') }}">Ver Plantas</a>
                      </li>
                      @auth
                      <li class="rd-nav-item">
                        <a class="texto-iniciar-sesion" href="{{ route('users.show', Auth::user()->id) }}">
                            <img src="{{ asset('images/icono-iniciar-sesion.png') }}" alt="Perfil" width="30" height="30">
                            {{ Auth::user()->name }}
                        </a>
                      </li>
                          <li class="rd-nav-item">
                              <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                  @csrf
                                  <button type="submit" class="texto-iniciar-sesion button-cerrar-sesion" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer; transition: opacity 0.3s;">
                                      <img src="{{ asset('images/icono-cerrar-sesion.png') }}" alt="Cerrar sesión" width="35" height="35">
                                      Cerrar sesión
                                  </button>
                              </form>
                          </li>
                      @else
                          <li class="rd-nav-item">
                              <a class="texto-iniciar-sesion" href="{{ route('login_form') }}">
                                  <img src="{{ asset('images/icono-iniciar-sesion.png') }}" alt="Iniciar sesión" width="30" height="30">
                                  Iniciar sesión
                              </a>
                          </li>
                          <li class="rd-nav-item">
                              <a class="texto-iniciar-sesion" href="{{ route('users.create') }}">
                                  <img src="{{ asset('images/icono-registrarse.png') }}" alt="Registrarse" width="30" height="30">
                                  Registrarse
                              </a>
                          </li>
                      @endauth
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </header>
        <!--Swiper-->
        <section class="section swiper-container swiper-slider bg-primary" data-autoplay="3500" data-loop="false" data-simulate-touch="false" data-effect="circle-bg" data-speed="750">
          <div class="swiper-bg-text">Plantas</div>
          <div class="swiper-wrapper">
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>¡hola!</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}'>explora la belleza</h1>
                      <p class="big" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>Encuentra lo que desees. Puedes encontrar una gran variedad de plantas exoticas y plantas de ornato comunes.</p>
                      <p class="postitle" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>Se parte de esta experiencia</p>
                    </div>
                    <div class="box-round-wrap"><img src="{{ asset('images/programas-negra.png') }}" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>¿buscás algo especial?</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}'>El Regalo Perfecto</h1>
                      <p class="big" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>Sorprende a tus seres queridos con el regalo de una Planta. Alegra su vida con un un hermoso detalle.</p>
                      <p class="postitle" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>Explora opciones de regalo</p>
                    </div>
                    <div class="box-round-wrap"><img src="{{ asset('images/programas-plantas.png') }}" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>Envío Rápido y Seguro</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}'>Recibe donde sea</h1>
                      <p class="big" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>Recibe tus plantas directamente en tu puerta con nuestro servicio de entrega rápida y segura.</p>
                      <p class="postitle" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>Contactanos para conocer más sobre envíos</p>
                    </div>
                    <div class="box-round-wrap"><img src="{{ asset('images/programas-mundo.png') }}" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" data-circle-cx=".855" data-circle-cy=".5" data-circle-r=".39">
              <div class="swiper-slide-caption section-md">
                <div class="container">
                  <div class="row row-50 align-items-center swiper-custom-row">
                    <div class="col-lg-5">
                      <h3 class="subtitle" data-swiper-anime='{"animation":"swiperContentRide","duration":900,"delay":900}'>Nuestros clientes confian en nosotros</h3>
                      <h1 data-swiper-anime='{"animation":"swiperContentRide","duration":1000,"delay":1000}'>reseñas positivas</h1>
                      <p class="big" data-swiper-anime='{"animation":"swiperContentRide","duration":1100,"delay":1100}'>Descubre por qué nuestros clientes adoran el servicio que ofrecemos. ¡Compradores y vendedores nos respaldan!.</p>
                      <p class="postitle" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>Visita el apartado de reseñas</p>
                    </div>
                    <div class="box-round-wrap"><img src="{{ asset('images/programas-roja.png') }}" alt="" width="671" height="335" data-swiper-anime='{"animation":"swiperContentFade","duration":1000,"delay":1000}'/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Swiper Pagination-->
          <div class="swiper-pagination"></div>
        </section>
      </div>
      <!-- About-->
      <section class="section novi-bg novi-bg-img section-sm bg-gray-100 pb-xl-0" id="about">
        <div class="container">
          <div class="row row-50 flex-wrap-md-reverse flex-lg-wrap align-items-lg-center">
            <div class="col-xl-6 col-lg-6">
              <div class="box-custom-2"><img src="{{ asset('images/foto-nosotros.png') }}" alt="" width="455" height="342"/>
                <div class="box-custom-2-smal">
                  <p class="box-custom-2-name">Dulce Araceli</p>
                  <p class="box-custom-2-position">Agronoma</p>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-6">
              <div class="box-custom-1">
                <h3>Mas sobre nosotros</h3>
                <h2>las orquídeas representan<br>exclusividad y elegancia</h2>
                <p>Desde la antigüedad, las orquídeas han sido altamente valoradas por su forma exótica y sus colores vibrantes, lo que las convierte en una flor que destaca entre las demás.</p>
                <ul class="list-marked">
                  <li>Las orquídeas destacan por su belleza exótica.</li>
                  <li>Añaden un toque de exclusividad a cualquier ambiente.</li>
                  <li>Son una flor que representa distinción y prestigio.</li>
                </ul><a class="button button-primary" href="#">Leer más</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- What we Offer-->
      <section class="section novi-bg novi-bg-img section-md-4 bg-primary">
        <div class="container">
          <div class="text-center">
            <h3>Que ofrecemos</h3>
            <h2>Paquetes de orquídeas</h2>
          </div>
          <body class="body-index">
              <div class="container my-4">
                  <div class="product-row">
                      @foreach($plantas as $planta)
                          <div class="product-card-landing">
                              <a href="{{ route('plantas.show', $planta->id) }}" class="text-decoration-none text-dark">
                                  <img src="{{ asset($planta->photo) }}" alt="{{ $planta->nombre }}" class="product-image mb-3">
                                  <h5 class="product-name-landing">{{ $planta->name }}</h5>
                                  <p class="product-price text-success">{{ $planta->price }} USD</p>
                                  <p class="product-description">
                                      {{ Str::limit($planta->description, 80) }}
                                  </p>
                              </a>
                          </div>
                      @endforeach
                  </div>
              </div>
          </body>
          <a style="background-color: #ffffff; color: #98bf44;" class="button button-primary" href="{{ route('index') }}">Ver más</a>
        </div>
      </section>

      <!-- How it Works-->
      <section class="section novi-bg novi-bg-img section-md-2 bg-default">
        <div class="container">
          <div class="text-center">
            <h3>Como trabajamos</h3>
            <h2>3 pasos para obtener tu orquídea</h2>
          </div>
          <div class="row row-50 post-classic-counter justify-content-lg-between justify-content-center">
            <div class="col-lg-4 col-sm-6">
              <div class="post-classic novi-bg bg-secondary-1">
                <h3 class="post-classic-title">Escoge <br> una orquídea</h3>
                <p class="post-classic-text">Primero, escoge uno de los paquetes que tenemos.</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="post-classic novi-bg bg-secondary-2">
                <h3 class="post-classic-title">Realiza tu pedido</h3>
                <p class="post-classic-text">Después, proporciona tu información para la entrega.</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="post-classic novi-bg bg-secondary-3">
                <h3 class="post-classic-title">Confirma tu pedido <br>y espera la entrega</h3>
                <p class="post-classic-text">Finalmente, espera la llegada de tu orquídea y sigue las instrucciones de cuidado.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Advantages-->
      <section class="section novi-bg novi-bg-img section-custom section-lg bg-primary">
        <div class="container">
          <div class="row row-fix">
            <div class="col-lg-7">
              <div class="row row-40">
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-diamond2"></div>
                      <h3 class="box-icon-title">Calidad</h3>
                    </div>
                    <p class="box-icon-text">Ofrecemos orquídeas de la más alta calidad, cultivadas y seleccionadas con esmero para garantizar su salud, belleza y longevidad. .</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-leaf"></div>
                      <h3 class="box-icon-title">Variedad y exclusividad</h3>
                    </div>
                    <p class="box-icon-text">Disponemos de una amplia y exclusiva colección de orquídeas, que abarca desde las especies más clásicas hasta ejemplares raros y difíciles de encontrar.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-chef"></div>
                      <h3 class="box-icon-title">Experiencia</h3>
                    </div>
                    <p class="box-icon-text">Nuestro equipo está compuesto por expertos que conocen cada detalle sobre las orquídeas.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-egg2"></div>
                      <h3 class="box-icon-title">Atención personalizada</h3>
                    </div>
                    <p class="box-icon-text">Brindamos atencíon en cada momento, desde tu selección hasta la entrega de tus orquídeas.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-custom-3">
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/circulo-azul.png') }}" alt="" width="382" height="187"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/circulo-amarilla.png') }}" alt="" width="382" height="187"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/circulo-naranja.png') }}" alt="" width="382" height="187"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/circulo-morada.png') }}" alt="" width="382" height="187"/>
          </div>
        </div>
      </section>

      <!-- Testimonials-->
      <section class="section novi-bg novi-bg-img section-md-3 bg-default" id="clients">
        <div class="container">
          <div class="row row-40 align-items-center">
            <div class="col-lg-6">
              <div class="owl-pagination-custom" id="owl-pagination-custom">
                <div class="data-dots-custom" data-owl-item="0"><img src="{{ asset('images/mujer-1.png') }}" alt="" width="179" height="89"/>
                </div>
                <div class="data-dots-custom" data-owl-item="1"><img src="{{ asset('images/mujer-2.png') }}" alt="" width="306" height="153"/>
                </div>
                <div class="data-dots-custom" data-owl-item="2"><img src="{{ asset('images/hombre-1.png') }}" alt="" width="179" height="89"/>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <h3>Que dicen nuestros clientes</h3>
              <h2>Testimonios</h2>
              <!-- Owl Carousel-->
              <div class="quote-classic-wrap">
                <div class="quote-classic-img"><img src="{{ asset('images/quote-37x29.png') }}" alt="" width="37" height="14"/>
                </div>
                <div class="owl-carousel owl-carousel-classic" data-items="1" data-dots="true" data-loop="false" data-autoplay="false" data-mouse-drag="false" data-dots-custom="#owl-pagination-custom">
                  <div class="quote-classic">
                    <p class="big">Las orquídeas que compré en esta tienda son simplemente espectaculares. La calidad de las flores es insuperable, y el servicio fue excepcional. ¡Definitivamente volveré a comprar aquí!</p>
                    <h3 class="quote-classic-name">Sofía G.</h3>
                  </div>
                  <div class="quote-classic">
                    <p class="big">La variedad de orquídeas disponibles es increíble. Encontré una especie rara que había estado buscando por mucho tiempo, y llegó en perfectas condiciones. ¡Muy recomendable!</p>
                    <h3 class="quote-classic-name">Laura M.</h3>
                  </div>
                  <div class="quote-classic">
                    <p class="big">Quedé impresionada con la atención personalizada que recibí. Me ayudaron a elegir la orquídea perfecta para regalar, y fue un éxito total. El empaque fue elegante y seguro.</p>
                    <h3 class="quote-classic-name">Carlos R.</h3>
                  </div>
                </div>
              </div><a class="button button-primary button-sm" href="#">Envia tu reseña</a>
            </div>
          </div>
        </div>
      </section>

      <footer class="section footer-classic">
        <div class="container">
          <div class="row row-50 justify-content-between">
            <div class="col-xl-3 col-md-6">
              <!--Brand--><a class="brand" href="#programs"><img class="brand-logo-dark" src="{{ asset('images/logo-empresa-negro.png') }}" alt="" width="181" height="50"/></a>
              <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span></span><span>&nbsp;Todos los derechos reservados</span></p>
            </div>
            <div class="col-xl-3 col-md-6">
              <p class="footer-classic-title">Contacto</p>
              <ul class="footer-classic-list">
                <li>
                  <ul>
                    <li>
                      <dl class="footer-classic-dl">
                        <dt>Tel.</dt>
                        <dd><a href="telefono:#">+52 3367897698</a></dd>
                      </dl>
                    </li>
                    <li>
                      <dl class="footer-classic-dl">
                        <dt>Correo.</dt>
                        <dd><a href="mailto:#">dulceorquidea99@gmail.com</a></dd>
                      </dl>
                    </li>
                  </ul>
                </li>
                <li><a href="#">79989, Guadalajara, Jal. México</a></li>
                <li>
                  <ul class="group group-sm footer-classic-social-list">
                    <li><a class="link-social" href="#">
                        <div class="icon novi-icon mdi mdi-facebook"></div></a></li>
                    <li><a class="link-social" href="#">
                        <div class="icon novi-icon mdi mdi-instagram"></div></a></li>
                    <li><a class="link-social" href="#">
                        <div class="icon novi-icon mdi mdi-youtube-play"></div></a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="col-xl-2 col-md-6">
              <p class="footer-classic-title">Mas informacíon</p>
              <ul class="footer-classic-nav">
                <li><a href="#">Como trabajamos</a></li>
                <li><a href="#">Sobre nosotros</a></li>
                <li><a href="#">Porque escogernos</a></li>
              </ul>
            </div>
            <div class="col-xl-2 col-md-6">
              <p class="footer-classic-title">Paquetes</p>
              <ul class="footer-classic-nav">
                <li><a href="#">Cymbidiumb rosa</a></li>
                <li><a href="#">Epidendrum roja</a></li>
                <li><a href="#">Phalaenopsis rosa</a></li>
                <li><a href="#">Ver más...</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!--coded by kraken-->
  </body>
</html>