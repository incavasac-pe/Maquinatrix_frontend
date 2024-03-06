<?php include 'header.php' ?>
<?php include 'menu.php' ?>


<div class="user-details-container">
  <div class="d-flex align-items-start ">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <p class="menu-text">MENÚ DE CUENTA</p>
      <!-- <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"> <img src="./assets/img/profile2.png" alt="profile2">  Mi cuenta</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"> <img src="./assets/img/note.png" alt="note">  Mis Publicaciones</button> -->

      <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
        role="tab" aria-controls="v-pills-home" aria-selected="true">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24"
          viewBox="0 0 24 24">
          <defs>
            <clipPath id="clip-path-home">
              <rect id="Rectángulo_10764" data-name="Rectángulo 10764" width="24" height="24"
                transform="translate(-12719 -23540)" fill="#62646a" stroke="#707070" stroke-width="1" />
            </clipPath>
          </defs>
          <g id="Enmascarar_grupo_57911" data-name="Enmascarar grupo 57911" transform="translate(12719 23540)"
            clip-path="url(#clip-path-home)">
            <g id="person-circle" transform="translate(-12719 -23540)">
              <path id="Trazado_63455" data-name="Trazado 63455" d="M16.5,9A4.5,4.5,0,1,1,12,4.5,4.5,4.5,0,0,1,16.5,9Z"
                fill="#62646a" />
              <path id="Trazado_63456" data-name="Trazado 63456"
                d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12ZM12,1.5A10.5,10.5,0,0,0,3.8,18.555C4.863,16.839,7.207,15,12,15s7.135,1.838,8.2,3.555A10.5,10.5,0,0,0,12,1.5Z"
                fill="#62646a" fill-rule="evenodd" />
            </g>
          </g>
        </svg>
        Mi cuenta
      </button>

      <button class="nav-link" id="v-pills-profile-tab" type="button" role="tab" data-bs-toggle="pill"
        data-bs-target="#v-pills-profile" aria-controls="v-pills-profile" aria-selected="false">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24"
          viewBox="0 0 24 24">
          <defs>
            <clipPath id="clip-path-profile">
              <rect id="Rectángulo_10913" data-name="Rectángulo 10913" width="24" height="24"
                transform="translate(-12646 -23409)" fill="#62646a" stroke="#707070" stroke-width="1" />
            </clipPath>
          </defs>
          <g id="Enmascarar_grupo_57916" data-name="Enmascarar grupo 57916" transform="translate(12646 23409)"
            clip-path="url(#clip-path-profile)">
            <g id="card-list" transform="translate(-12646 -23409)">
              <path id="Trazado_63465" data-name="Trazado 63465"
                d="M21.75,4.5a.75.75,0,0,1,.75.75v13.5a.75.75,0,0,1-.75.75H2.25a.75.75,0,0,1-.75-.75V5.25a.75.75,0,0,1,.75-.75ZM2.25,3A2.25,2.25,0,0,0,0,5.25v13.5A2.25,2.25,0,0,0,2.25,21h19.5A2.25,2.25,0,0,0,24,18.75V5.25A2.25,2.25,0,0,0,21.75,3Z"
                fill="#62646a" />
              <path id="Trazado_63466" data-name="Trazado 63466"
                d="M7.5,12a.75.75,0,0,1,.75-.75h10.5a.75.75,0,0,1,0,1.5H8.25A.75.75,0,0,1,7.5,12Zm0-3.75a.75.75,0,0,1,.75-.75h10.5a.75.75,0,0,1,0,1.5H8.25A.75.75,0,0,1,7.5,8.25Zm0,7.5A.75.75,0,0,1,8.25,15h10.5a.75.75,0,0,1,0,1.5H8.25A.75.75,0,0,1,7.5,15.75ZM6,8.25a.75.75,0,1,1-.75-.75A.75.75,0,0,1,6,8.25ZM6,12a.75.75,0,1,1-.75-.75A.75.75,0,0,1,6,12Zm0,3.75A.75.75,0,1,1,5.25,15,.75.75,0,0,1,6,15.75Z"
                fill="#62646a" />
            </g>
          </g>
        </svg>
        Mis Publicaciones
      </button>
      <button class="publication-create-btn" data-bs-toggle="modal" data-bs-target="#exampleModalPublication">+ Crear
        Publicación</button>
    </div>
    <div class="tab-content content" id="v-pills-tabContent ">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
        tabindex="0">
        <h1>Mi cuenta</h1>
        <div class="user-profile-main">
          <div class="profile-details-container">
            <div class="profile-details-wrapper">
              <img src="./assets/img/profile-img.png" alt="profile-mg">
              <div class="user-details">
                <p class="top-title">Lucas Torres Gonzales</p>
                <p class="verify-warning"><i class="fa-solid fa-circle-exclamation"></i>Verificación pendiente</p>
                <div class="company-wrapper">
                  <div class="company-detail">
                    <p class="main-title">Empresa</p>
                    <p class="sub-title">
                      Tipo de Cuenta
                    </p>
                  </div>
                  <div class="company-wrapper">
                    <div class="company-detail">
                      <p class="main-title">24</p>
                      <p class="sub-title">
                        Publicaciones
                      </p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="verify-btns-wrapper">
              <button type="button" class="profile-edit-btn">Editar Perfil</button>
              <button type="button" class="verify-btn"> <img src="./assets/img/verify.png" alt="verify"> Verificar mi
                cuenta</button>
            </div>
          </div>
          <ul class="nav user-detail-tab nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link user-detail-link active" id="pills-home-tab" data-bs-toggle="pill"
                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                aria-selected="true">Generales</button>
            </li>

          </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <div class="row-class tab-pane fade show active" id="pills-home" role="tabpanel"
            aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row ">
              <div class="col-md-6  col-lg-6 col-sm-6  ">
                <div class="user-detail-box">
                  <div class="table-title">
                    <p class="top-title">Datos de Cuenta</p>
                  </div>
                  <div class="user-detail-table">

                    <table>
                      <tr>
                        <td>Correo</td>
                        <td>ejemplo@gmail.com</td>
                        <td><button type="button"> <img src="./assets/img/edit.png" alt="edit"> </button></td>
                      </tr>
                      <tr>
                        <td>Dirección</td>
                        <td>Av. República de Venezuela 1829, Lima 15083</td>
                        <td><button type="button"> <img src="./assets/img/edit.png" alt="edit"> </button></td>
                      </tr>
                      <tr>
                        <td>Contraseña</td>
                        <td>Ejemplos de Nombres</td>
                        <td><button type="button"> <img src="./assets/img/edit.png" alt="edit"> </button></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-6  ">
                <div class="user-detail-box">
                  <div class="table-title-2">
                    <p class="top-title2">Información adicional</p>
                    <button type="button" class="profile-edit-btn">Editar Perfil</button>
                  </div>
                  <div class="user-detail-table">

                    <table class="additional-table">
                      <tr>
                        <td>ID Usuario</td>
                        <td>798456123</td>

                      </tr>
                      <tr>
                        <td>Razón Social</td>
                        <td>EJEMPLO DE RAZÓN SOCIAL</td>

                      </tr>
                      <tr>
                        <td>RUT</td>
                        <td>2314123123</td>

                      </tr>
                      <tr>
                        <td>Nombres de representante</td>
                        <td>Ejemplos de Nombres</td>

                      </tr>
                      <tr>
                        <td>Apellidos de representante</td>
                        <td>Ejemplos de Apellidos</td>

                      </tr>
                      <tr>
                        <td>Documento</td>
                        <td>RUT</td>

                      </tr>
                      <tr>
                        <td>Núm. documento</td>
                        <td>7654321</td>

                      </tr>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>

      <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
        tabindex="0">
        <h1>Mis Publicaciones</h1>
        <div class="filter-wrapper">
          <div class="filter-btns">
            <p class="filter-text">Filtrar por:</p>
            <button type="button" class="filter-active-btn">Todos</button>
            <button type="button" class="filter-btn">Ventas</button>
            <button type="button" class="filter-btn">Arriendos</button>
            <button type="button" class="filter-btn">Borradores</button>
            <button type="button" class="filter-btn">Suspendidos</button>
          </div>
          <button type="button" class="publication-create-btn">+ Crear
            Publicación</button>
        </div>
        <div class="contruction-main-container">
          <div class="construction-left-container">
            <img src="./assets/img/construction.png" alt="construction">
            <div class="construction-details">
              <p class="grey-md-text">Construcción</p>
              <p class="contruction-text">Construcción Excavadora de las mejores del mundo</p>
              <div class="construction-stats">
                <div class="blue-md-text"><i class="fa-solid fa-circle fa-dot"></i> Arriendo</div>
                <div class="md-text">Maquinaria y vehículos</div>
              </div>
            </div>
          </div>
          <div class="construction-right-container">
            <div class="draft-details">
              <div class="grey-status"> <i class="fa-solid fa-circle fa-dot"></i>
                Publicación en Borrador
              </div>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                 Opciones <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="#">Publicar</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmation">Eliminar</a></li>
                </ul>
              </div>
            </div>
            <div class="publication-draft-wrapper">
              <div class="pub-container">
                <p class="grey-md-text">Visitas</p>
                <p class="bold-pub-text">24</p>
              </div>
              <div class="pub-container">
                <p class="grey-md-text">Interacción</p>
                <p class="bold-pub-text">24</p>
              </div>
            </div>
          </div>
        </div>
        <div class="id-detail">
          <p class="grey-md-text">ID Publicación #12312312</p>
          <p class="grey-md-text">Creado 23/05/2022</p>
        </div>

        <div class="contruction-main-container">
          <div class="construction-left-container">
            <img src="./assets/img/construction.png" alt="construction">
            <div class="construction-details">
              <p class="grey-md-text">Construcción</p>
              <p class="contruction-text">Construcción Excavadora de las mejores del mundo</p>
              <div class="construction-stats">
                <div class="grey-md-text-2"><i class="fa-solid fa-circle fa-dot"></i> Venta</div>
                <div class="md-text">Maquinaria y vehículos</div>
              </div>
            </div>
          </div>
          <div class="construction-right-container">
            <div class="draft-details">
              <div class="green-status"> <i class="fa-solid fa-circle fa-dot"></i>
                Publicación en Borrador
              </div>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                 Opciones <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="#">Publicar</a></li>
                  <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#confirmation"  href="#">Eliminar</a></li>
                </ul>
              </div>
            </div>
            <div class="publication-draft-wrapper">
              <div class="pub-container">
                <p class="grey-md-text">Visitas</p>
                <p class="bold-pub-text">24</p>
              </div>
              <div class="pub-container">
                <p class="grey-md-text">Interacción</p>
                <p class="bold-pub-text">24</p>
              </div>
            </div>
          </div>
        </div>
        <div class="id-detail">
          <p class="grey-md-text">ID Publicación #12312312</p>
          <p class="grey-md-text">Creado 23/05/2022</p>
        </div>

        <div class="contruction-main-container">
          <div class="construction-left-container">
            <img src="./assets/img/construction.png" alt="construction">
            <div class="construction-details">
              <p class="grey-md-text">Construcción</p>
              <p class="contruction-text">Construcción Excavadora de las mejores del mundo</p>
              <div class="construction-stats">
                <div class="blue-md-text"><i class="fa-solid fa-circle fa-dot"></i> Arriendo</div>
                <div class="md-text">Maquinaria y vehículos</div>
              </div>
            </div>
          </div>
          <div class="construction-right-container">
            <div class="draft-details">
              <div class="green-status"> <i class="fa-solid fa-circle fa-dot"></i>
                Publicación en Borrador
              </div>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                 Opciones <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="#">Publicar</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmation">Eliminar</a></li>
                </ul>
              </div>
            </div>
            <div class="publication-draft-wrapper">
              <div class="pub-container">
                <p class="grey-md-text">Visitas</p>
                <p class="bold-pub-text">24</p>
              </div>
              <div class="pub-container">
                <p class="grey-md-text">Interacción</p>
                <p class="bold-pub-text">24</p>
              </div>
            </div>
          </div>
        </div>
        <div class="id-detail">
          <p class="grey-md-text">ID Publicación #12312312</p>
          <p class="grey-md-text">Creado 23/05/2022</p>
        </div>



        <div class="contruction-main-container">
          <div class="construction-left-container">
            <img src="./assets/img/construction.png" alt="construction">
            <div class="construction-details">
              <p class="grey-md-text">Construcción</p>
              <p class="contruction-text">Construcción Excavadora de las mejores del mundo</p>
              <div class="construction-stats">
                <div class="blue-md-text"><i class="fa-solid fa-circle fa-dot"></i> Arriendo</div>
                <div class="md-text">Maquinaria y vehículos</div>
              </div>
            </div>
          </div>
          <div class="construction-right-container">
            <div class="draft-details">
              <div class="yellow-status"> <i class="fa-solid fa-circle fa-dot"></i>
                Publicación en Borrador
              </div>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                 Opciones <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="#">Publicar</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmation">Eliminar</a></li>
                </ul>
              </div>
            </div>
            <div class="publication-draft-warning">
              <i class="fa-solid fa-circle-exclamation"></i>
              <div>
                <p class="draft-warning-text-main">Publicación suspendida</p>
                <p class="draft-warning-text-sub">El administrador suspendió tu publicación. <span class="span-blue">
                    Contactarlo..</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="id-detail">
          <p class="grey-md-text">ID Publicación #12312312</p>
          <p class="grey-md-text">Creado 23/05/2022</p>
        </div>

        <div class="contruction-main-container">
          <div class="construction-left-container">
            <img src="./assets/img/construction.png" alt="construction">
            <div class="construction-details">
              <p class="grey-md-text">Construcción</p>
              <p class="contruction-text">Construcción Excavadora de las mejores del mundo</p>
              <div class="construction-stats">
                <div class="grey-md-text-2"><i class="fa-solid fa-circle fa-dot"></i> Venta</div>
                <div class="md-text">Maquinaria y vehículos</div>
              </div>
            </div>
          </div>
          <div class="construction-right-container">
            <div class="draft-details">
              <div class="green-status"> <i class="fa-solid fa-circle fa-dot"></i>
                Publicación en Borrador
              </div>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                 Opciones <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="#">Publicar</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmation">Eliminar</a></li>
                </ul>
              </div>
            </div>
            <div class="publication-draft-wrapper">
              <div class="pub-container">
                <p class="grey-md-text">Visitas</p>
                <p class="bold-pub-text">24</p>
              </div>
              <div class="pub-container">
                <p class="grey-md-text">Interacción</p>
                <p class="bold-pub-text">24</p>
              </div>
            </div>
          </div>
        </div>
        <div class="id-detail">
          <p class="grey-md-text">ID Publicación #12312312</p>
          <p class="grey-md-text">Creado 23/05/2022</p>
        </div>

        <div class="contruction-main-container">
          <div class="construction-left-container">
            <img src="./assets/img/construction.png" alt="construction">
            <div class="construction-details">
              <p class="grey-md-text">Construcción</p>
              <p class="contruction-text">Construcción Excavadora de las mejores del mundo</p>
              <div class="construction-stats">
                <div class="blue-md-text"><i class="fa-solid fa-circle fa-dot"></i> Arriendo</div>
                <div class="md-text">Maquinaria y vehículos</div>
              </div>
            </div>
          </div>
          <div class="construction-right-container">
            <div class="draft-details">
              <div class="green-status"> <i class="fa-solid fa-circle fa-dot"></i>
                Publicación en Borrador
              </div>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                 Opciones <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="#">Publicar</a></li>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmation">Eliminar</a></li>
                </ul>
              </div>
            </div>
            <div class="publication-draft-wrapper">
              <div class="pub-container">
                <p class="grey-md-text">Visitas</p>
                <p class="bold-pub-text">24</p>
              </div>
              <div class="pub-container">
                <p class="grey-md-text">Interacción</p>
                <p class="bold-pub-text">24</p>
              </div>
            </div>
          </div>
        </div>
        <div class="id-detail">
          <p class="grey-md-text">ID Publicación #12312312</p>
          <p class="grey-md-text">Creado 23/05/2022</p>
        </div>

      </div>
    </div>
  </div>



</div>

</div>
</div>

<?php include 'publication_type.php' ?>

<?php include 'confirmation.php' ?>
<?php include 'footer.php' ?>


<script>

  function getQueryParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
  }
  var tab = getQueryParam('tab');
  
  function setActiveClass(tabName) {
    return tab === tabName ? "nav-link active" : "nav-link";
  }
  var homeTabButton = document.getElementById("v-pills-home-tab");
  homeTabButton.className = setActiveClass('profile');
  var profileTabButton = document.getElementById("v-pills-profile-tab");
  profileTabButton.className = setActiveClass('publication');
</script>