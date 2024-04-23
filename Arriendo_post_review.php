<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<?php 
$baseUrl = getenv('URL_API');
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; 
$host = $_SERVER['HTTP_HOST']; 
$uri = $_SERVER['REQUEST_URI']; 
$url_publi = $protocol . '://' . $host;
 
if (isset($_POST['id'])&& $_POST['id']!='') {
    $id = $_POST['id'];      
}  
if (isset($_POST['title'])&& $_POST['title']!='') {
    $title = $_POST['title'];  
} 

$count_imagen = 0;
$url  = $baseUrl.'/list_publications_imagen?id='.$id;

$responseimg = file_get_contents($url);
if ($responseimg !== false) {
// Decodificar la respuesta JSON
$dataimg = json_decode($responseimg, true);
if (!$dataimg['error']) {
    // Obtener la lista de $categories
    $detalle_img = $dataimg['data'] ;
    $count_imagen = $dataimg['count'];
}  
} else {
    echo 'Error al realizar la solicitud a la API';
}
?> 
<section class="post-view">
    <div class="container">
        <div class="post-view-container1">
            <p class="white-xsm-text">GRACIAS POR COMPLETAR</p>
            <p class="white-lg-text">¡Revisaremos tu publicación!</p> 
            <img  src="<?= $baseUrl ?>/see_image?image=<?= $detalle_img[0]["image_name"]!=null ? $detalle_img[0]["image_name"]: 'sin_producto.jpg'?>">
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
            window.location.href = 'user_details.php?tab=publication';
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




