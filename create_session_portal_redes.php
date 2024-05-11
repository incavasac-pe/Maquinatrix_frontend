<?php
include('config.php');
@session_start();
$baseUrl = getenv('URL_API');   
 
if (isset($_GET['register']) &&  $_GET['register']=== 'true') {
    $_SESSION['type']= 0;
    echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
    echo "<script>
            $(document).ready(function() { 
                var id_type_user = '1';
                var credencials = 0;
                 var formData = {
                        email: '{$_SESSION['email']}',
                        password:'{$_SESSION['firstname']}',
                        firstname :'{$_SESSION['firstname']}',
                        lastname :'{$_SESSION['lastname']}',
                        id_type_user :id_type_user,
                        type_doc: '1',
                        num_doc: '-',
                        address:'-',
                        status_id : 6,
                        credencials:credencials
                    };
                
                    var formDataCompany = {
                        id_type_user: id_type_user,
                        email:  '{$_SESSION['email']}',
                        emailRepreLegal: '{$_SESSION['email']}',
                        password: '{$_SESSION['firstname']}',
                        FullNameRepreLegal: '{$_SESSION['firstname']}',
                        LastNameRepreLegal: '{$_SESSION['lastname']}',
                        rutCompany: '-',
                        RutRepreLegal: '-',
                        address: '-',
                        status_id:6,
                        credencials:credencials
                        };
                $.ajax({
                    url: 'https://maquinatrix.com/api/register_account',
                    type: 'POST',
                    data: id_type_user == 1 ? formData:formDataCompany,
                    success: function(response, textStatus, xhr){
                        var statusCode = xhr.status; 
                        if (statusCode === 201 && !response.error)  {             
                          window.location.href = 'login.php?register=true';
                         } else{
                            window.location.href ='login.php?register=false';
                         }
                    },
                    error: function(xhr, status, error) {
                        // Manejar el error de AJAX aquí
                    }
                });
            });
        </script>";
} 

if (isset($_GET['validate']) &&  $_GET['validate']=== 'true') {  
        echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
        echo "<script>
                $(document).ready(function() {
                    $.ajax({
                        url: 'https://maquinatrix.com/api/login_account',
                        type: 'POST',
                        data: { 
                            email: '{$_GET['email']}',
                            password:'password',
                            credencials :0
                        },
                        success: function(response, textStatus, xhr){
                            var statusCode = xhr.status; 
                            console.log('statusCodestatusCode',response);
                            if (statusCode === 200 && !response.error)  {             
                           window.location.href = 'create_session_portal.php?email=' + response.data.email_User+'&token='+response.data.token+'&loggin=true&username='+response.data.full_name+'&photo='+response.data?.photo+'&id_user_ext='+response.data?.id_user_ext+'&id_user='+response.data?.id_user;
                             } else{
                            window.location.href ='login.php';
                             }
                        },
                        error: function(xhr, status, error) {
                            // Manejar el error de AJAX aquí
                        }
                    });
                });
            </script>";
    } 
?>
