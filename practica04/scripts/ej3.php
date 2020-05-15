<?php
        if(isset($_POST['enviar']))
        {
            $_POST['email'] = trim($_POST['email']);
            
            if(strstr($_POST['email'],'@'))
            {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div><strong>Nombre: </strong>' , $_POST['nombre'] ,'</div>
        <div><strong>Correo Electrónico: </strong>' , $_POST["email"], '</div>
        <div><strong>Pagina Web: </strong>' , $_POST["web"] , ' </div>
        <hr>
        <div><strong>Comentario: </strong>' , $_POST["comentario"] , '</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
        
            }
            else
            {
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div>Correo electrónico incorrecto</div>
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }    
        }
    ?>