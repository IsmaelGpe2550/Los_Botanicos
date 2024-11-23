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
                      <p class="postitle" data-swiper-anime='{"animation":"swiperContentRide","duration":1200,"delay":1200}'>¡Visita los comentarios!</p>
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
      <div class="row mt-4">
          <div class="col-12 text-center">
            <img src="images/logo-empresa-negro.png" alt="Imagen de Los Botánicos" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
          </div>
      </div>  
      <div class="container">
        <br></br>
          <h3 class="text-center">Acerca de Los Botánicos</h3>
          <div class="row">
            <!-- Historia -->
            <div class="col-md-4">
              <div class="info-box">
                <h4>Quiénes Somos</h4>
                <p>
                  Los Botánicos nació de nuestra pasión por la naturaleza y el deseo de acercar las maravillas del mundo vegetal a todos los hogares de manera accesible y sostenible.
                </p>
              </div>
            </div>
            <!-- Misión -->
            <div class="col-md-4">
              <div class="info-box">
                <h4>Nuestra Misión</h4>
                <p>
                  Ofrecer a nuestros clientes la mejor selección de plantas, herramientas y conocimientos para crear espacios verdes que inspiran y transforman.
                </p>
              </div>
            </div>
            <!-- Valores -->
            <div class="col-md-4">
              <div class="info-box">
                <h4>Nuestros Valores</h4>
                <ul>
                  <li>Compromiso con la sostenibilidad.</li>
                  <li>Calidad en cada detalle.</li>
                  <li>Atención al cliente personalizada.</li>
                  <li>Amor por la naturaleza.</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Por Qué Elegirnos -->
          <div class="row mt-4">
            <div class="col-12">
              <div class="info-box text-center">
                <h4>Por Qué Elegirnos</h4>
                <p>
                  Nos diferenciamos por nuestra atención personalizada, plantas de alta calidad y un compromiso genuino con el cuidado del medio ambiente. 
                  ¡Únete a nuestra comunidad y transforma tus espacios con plantas que inspiran!
                </p>
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
            <h2>Variedad y Comunidad en un Solo Lugar</h2>
            <p class="text-center">Descubre una amplia selección de plantas ofrecidas por nuestra plataforma y nuestra comunidad de vendedores en el siguiente boton:</p>
          </div>
          <body class="body-index">
              <div class="container my-4">
                  <div class="product-row">
                      @foreach($plantas as $planta)
                          <div class="product-card-landing">
                              <a href="{{ route('plantas.show', $planta->id) }}" class="text-decoration-none text-dark">
                                  <img src="{{ asset($planta->photo) }}" alt="{{ $planta->nombre }}" class="product-image mb-3">
                                  <h5 class="product-name-landing">{{ $planta->name }}</h5>
                                  <p class="product-price text-success">{{ $planta->price }} MXN</p>
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

      <!-- How We Work -->
      <section class="section novi-bg novi-bg-img section-sm bg-gray-100 pb-xl-0" id="how-we-work">
        <div class="container">
          <h3 class="text-center">Cómo Trabajamos</h3>
          <div class="row">
            <!-- Selección Cuidadosa -->
            <div class="col-md-4 text-center">
              <div class="info-box">
                <img src="images/seleccion.jpg" alt="Selección Cuidadosa" class="img-fluid mb-3" style="max-height: 100px; border-radius: 50%;">
                <h4>Selección Cuidadosa</h4>
                <p>Cada planta que ofrecemos es seleccionada cuidadosamente por expertos para garantizar su frescura y calidad.</p>
              </div>
            </div>
            <!-- Proceso de Compra -->
            <div class="col-md-4 text-center">
              <div class="info-box">
                <img src="images/compras-simples.jpg" alt="Proceso de Compra" class="img-fluid mb-3" style="max-height: 100px; border-radius: 50%;">
                <h4>Proceso de Compra Simple</h4>
                <p>Explora nuestro catálogo, añade tus plantas favoritas al carrito y realiza tu pedido de forma segura.</p>
              </div>
            </div>
            <!-- Empaque Sostenible -->
            <div class="col-md-4 text-center">
              <div class="info-box">
                <img src="images/empaques.png" alt="Empaque Sostenible" class="img-fluid mb-3" style="max-height: 100px; border-radius: 50%;">
                <h4>Empaque Sostenible</h4>
                <p>Usamos empaques ecológicos que protegen tus plantas durante el transporte y cuidan del medio ambiente.</p>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <!-- Entrega Puntual -->
            <div class="col-md-6 text-center">
              <div class="info-box">
                <img src="images/puntual.jpg" alt="Entrega Puntual" class="img-fluid mb-3" style="max-height: 100px; border-radius: 50%;">
                <h4>Entrega Puntual</h4>
                <p>Nos aseguramos de que tus plantas lleguen puntualmente y en perfectas condiciones a tu hogar.</p>
              </div>
            </div>
            <!-- Atención al Cliente -->
            <div class="col-md-6 text-center">
              <div class="info-box">
                <img src="images/atencion.jpg" alt="Atención al Cliente" class="img-fluid mb-3" style="max-height: 100px; border-radius: 50%;">
                <h4>Atención al Cliente</h4>
                <p>Nuestro equipo está disponible para resolver tus dudas y ofrecerte consejos sobre el cuidado de tus plantas.</p>
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
                    <p class="box-icon-text">Ofrecemos plantas seleccionadas de la más alta calidad, cultivadas con cuidado por expertos y vendedores confiables, garantizando su salud y belleza.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-leaf"></div>
                      <h3 class="box-icon-title">Variedad y exclusividad</h3>
                    </div>
                    <p class="box-icon-text">Encuentra una amplia variedad de plantas, desde populares suculentas hasta ejemplares únicos. Todo en un solo lugar gracias a nuestra comunidad de vendedores y proveedores.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-chef"></div>
                      <h3 class="box-icon-title">Experiencia</h3>
                    </div>
                    <p class="box-icon-text">Nuestro equipo y nuestra comunidad comparten años de experiencia en el cuidado, cultivo y comercialización de plantas, asegurando confianza en cada compra.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-icon">
                    <div class="box-icon-header">
                      <div class="icon novi-icon icon-lg linearicons-egg2"></div>
                      <h3 class="box-icon-title">Atención personalizada</h3>
                    </div>
                    <p class="box-icon-text">Estamos aquí para ayudarte en cada paso: desde elegir la planta ideal hasta asegurar su entrega en perfecto estado.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-custom-3">
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/suculentas.jpg') }}" alt="" width="382" height="187"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/ornamentales.png') }}" alt="" width="382" height="187"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/frutales.jpg') }}" alt="" width="382" height="187"/>
          </div>
          <div class="box-custom-3-img-wrap"><img src="{{ asset('images/unica.jpg') }}" alt="" width="382" height="187"/>
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
                        <dd><a href="mailto:#">losbotanicos99@gmail.com</a></dd>
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