<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<div>

  <div id="multi-step-form-container">
    <!-- Form Steps / Progress Bar -->
    <?php include 'Arriendo_sale_timeline.php' ?>
    <!-- Step Wise Form Content -->
    <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
      <!-- Step 1 Content -->

      <section id="step-1" class="form-step">


        <?php include 'Arriendo_sale_sec1.php' ?>


      </section>
      <!-- Step 2 Content, default hidden on page load. -->
      <section id="step-2" class="form-step d-none">
        <?php include 'Arriendo_sale_sec2.php' ?>
        <!-- <div class="mt-3">
      Step 2 input fields goes here..
    </div>
    <div class="mt-3">
      <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
      <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
    </div> -->
      </section>
      <!-- Step 3 Content, default hidden on page load. -->
      <section id="step-3" class="form-step d-none">
        <?php include 'Arriendo_sale_sec3.php' ?>
        <!-- <div class="mt-3">
      <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
      <button class="button submit-btn" type="submit">Save</button>
    </div> -->
      </section>
    </form>
  </div>
</div>
<?php include 'footer.php' ?>
<script>
  document.getElementById('Cancelar_continue-btn').addEventListener('click', function () {
    window.location.href = 'Arriendo_post_review.php';
  });
</script>



<script>
  const navigateBackward = () => {
    const currentStep = getCurrentStep();
    if (currentStep > 1) {
      navigateToFormStep(currentStep - 1);
    }
  };

  const getCurrentStep = () => {
    const visibleStep = document.querySelector('.form-step:not(.d-none)');
    return parseInt(visibleStep.id.split('-')[1]);
  };

  const navigateToFormStep = (stepNumber) => {
    /**
     * Hide all form steps.
     */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
      formStepElement.classList.add("d-none");
    });
    /**
     * Mark all form steps as unfinished.
     */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
      formStepHeader.classList.add("form-stepper-unfinished");
      formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });
    /**
     * Show the current form step (as passed to the function).
     */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");
    /**
     * Select the form step circle (progress bar).
     */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
     * Mark the current form step as active.
     */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
     * Loop through each form step circles.
     * This loop will continue up to the current step number.
     * Example: If the current step is 3,
     * then the loop will perform operations for step 1 and 2.
     */
    for (let index = 0; index < stepNumber; index++) {
      /**
       * Select the form step circle (progress bar).
       */
      const formStepCircle = document.querySelector('li[step="' + index + '"]');
      /**
       * Check if the element exist. If yes, then proceed.
       */
      if (formStepCircle) {
        /**
         * Mark the form step as completed.
         */
        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
        formStepCircle.classList.add("form-stepper-completed");
      }
    }
  };

  document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    formNavigationBtn.addEventListener("click", () => {
      const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
      navigateToFormStep(stepNumber);
    });
  });

  const backBtn = document.querySelector('.btn-navigate-form-step-back');
  if (backBtn) {
    backBtn.addEventListener('click', navigateBackward);
  }
</script>


<script>
  document.getElementById('exampleFormControlTextarea1').addEventListener('input', function () {
    var maxLength = 10000; // Set your maximum character count
    var currentLength = this.value.length;

    // Update the character count inside brackets
    document.getElementById('charCount').innerText = 'Caracteres (' + currentLength + '/' + maxLength + ')';
  });
</script>


<script>
  const fileInput = document.getElementById('file-input');
  const imageContainer = document.getElementById('image-container');

  fileInput.addEventListener('change', handleImageUpload);

  function handleImageUpload() {
    const files = fileInput.files;

    for (const file of files) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const imageUrl = e.target.result;
        const imgContainer = document.createElement('div');
        imgContainer.classList.add('uploaded-image');

        const imgElement = document.createElement('img');
        imgElement.src = imageUrl;
        imgElement.alt = 'Uploaded Image';

        const heartIcon = document.createElement('div');
        heartIcon.classList.add('heart-icon');
        const heartIconImg = document.createElement('img');
      
        heartIcon.appendChild(heartIconImg);

        const galleryIcon = document.createElement('div');
        galleryIcon.classList.add('gallery-icon');
        const galleryIconImg = document.createElement('img');
       
        galleryIcon.appendChild(galleryIconImg);


        heartIcon.addEventListener('click', function () {
          imgContainer.remove();
        });

        imgContainer.appendChild(imgElement);
        imgContainer.appendChild(heartIcon);
        imgContainer.appendChild(galleryIcon);

        imageContainer.insertBefore(imgContainer, imageContainer.firstChild);
      };

      reader.readAsDataURL(file);
    }
  }
</script>