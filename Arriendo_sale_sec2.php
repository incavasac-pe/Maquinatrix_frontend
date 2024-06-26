
<div class="container">
      <div class="category-product">
        <h1>Sube fotos del producto</h1>
        <p class="sm-title">Carga entre 1 y 14 fotos. Una vez cargadas, arrastra y suelta para cambiarlas de orden. Se
          admiten los formatos jpg, jpeg y png desde 500 x 500px para adelante..</p>
          <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
            <div class="upload-container">
              <div id="image-container" class="image-row">
              
                <div class="upload-input-container">
                  <input type="file" id="file-input" class="upload-input" accept="image/*" multiple>
                  <label for="file-input" class="label-text">
                    <img src="./assets/img/camera.png" alt="Camera Icon">
                    Select Images
                  
                  </label>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-sm-12 col-md-4 col-lg-4">
              <div class="ideation">
                <img src="./assets/img/idea.png" alt="idea">
                <p class="ideation-text">
                Para que tu publicación tengas más visitas, te recomendamos cargar fotos nítidas y bien iluminadas. Evita incluir bordes, logos, marcas de agua o textos promocionales.
                </p>
              </div>
              <div class="error-container" id="error-container-photo">
                    <i class="fa-solid fa-circle-xmark"></i>
                    <div> 
                        <p class="sm-text text-msg-error">Debe al menos cargar 1 foto.</p>
                    </div>
                </div> 
      </div>
      
    </div>
    <div class="category-product2">
        <div class="category-btns-wrapper">
            <div><button type="button" class="grey-btn" onclick="navigateBackwardCancel()">Cancelar</button></div>
            <div><button type="button"  class="grey-btn save_public" data-publication-id="5" >Guardar y salir </button><button type="button"
                    class="yellow-btn btn-navigate-form-step" type="button" step_number="3">Continuar</button></div>
        </div>
    </div>
 </div>