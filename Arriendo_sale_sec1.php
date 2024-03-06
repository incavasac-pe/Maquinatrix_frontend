<div class="container">
          <div class="category-product">
            <h1>Categoría y tipo de producto</h1>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link " id="pills-publish1-tab" data-bs-toggle="pill" data-bs-target="#pills-publish1"
                  type="button" role="tab" aria-controls="pills-publish1" aria-selected="true"><img
                    src="./assets/img/excavator.png" alt="excavator" />
                  <p>Maquinaria y<br /> vehículos</p>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-publish2-tab" data-bs-toggle="pill" data-bs-target="#pills-publish2"
                  type="button" role="tab" aria-controls="pills-publish2" aria-selected="false"><img
                    src="./assets/img/hand-drill.png" alt="hand-drill" />
                  <p>Equipos y<br /> herramientas </p>
                </button>
              </li>
             
            </ul>

            <p>Tipo de producto</p>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                  <select required>
                    <option value="" selected disabled hidden>Seleccionar industria*</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>

                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="mb-3">
                  <select required>
                    <option value="" selected disabled hidden>Tipo de máquina*</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>

                </div>
              </div>
            </div>
          </div>
         
        </div>
       

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade " id="pills-publish1" role="tabpanel" aria-labelledby="pills-publish1-tab"
            tabindex="0">
            <?php include 'Arriendo_sale1.php' ?>
          </div>

          <div class="tab-pane fade" id="pills-publish2" role="tabpanel" aria-labelledby="pills-publish2-tab"
            tabindex="0">
            <?php include 'Arriendo_sale2.php' ?>
          </div>
          
        </div>