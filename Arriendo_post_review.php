<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php 


if (isset($_POST['id'])&& $_POST['id']!='') {
    $id = $_POST['id']; 
    $tpublicacion = '2'; 
}  
if (isset($_POST['title'])&& $_POST['title']!='') {
    $title = $_POST['title'];  
} 
?> 
<section class="post-view">
    <div class="container">
        <div class="post-view-container1">
            <p class="white-xsm-text">GRACIAS POR COMPLETAR</p>
            <p class="white-lg-text">¡Revisaremos tu publicación!</p>
            <img src="./assets/img/post.png" alt="post">
            <p class="white-md-text"><?= $title ?> </p>
            <p class="white-sm-text">Estamos verificando tu publicación para asegurar que cumpla con nuestros Términos y Condiciones. Te notificaremos tan pronto como tu aviso sea aprobado y esté listo para ser publicado. ¡Gracias por tu paciencia!</p>
        </div>
        <div class="post-view-container2">
        <button class="post-view-btn-grey" onclick="goPublication()">Ver mis publicaciones</button>
        <button class="post-view-btn" onclick="seePublication('<?= $id ?>')">Ver publicación</button>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>

    <script> 
        function goPublication(){
            window.location.href = 'user_details.php?tab=profile';
        }
        
        function seePublication(id){
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'purchase_publication.php';

            var input3= document.createElement('input');
            input3.type = 'hidden';
            input3.name = 'id';
            input3.value = id;
            form.appendChild(input3); 

            document.body.appendChild(form);
            form.submit();
        }

</script>




