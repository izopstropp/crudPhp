<?php



    print_r($this);
    $usuarioController = new App\Controllers\UsuarioController();
    if(isset($_POST['salvar'])){
        
        if($_POST['id']){
           $usuarioController->atualizar(array('name'=>$_POST['name'],'email'=>$_POST['email'],'id'=>$_POST['id'])); 
        }else{
           $usuarioController->salvar(array('name'=>$_POST['name'],'email'=>$_POST['email']));
        }
        header('Location:http://localhost:8080');
    }

    if(isset($_GET['acao']) and $_GET['acao']=='deletar'){
        $usuarioController->deletar(array('id'=>$_GET['id'])); 
        header('Location:http://localhost:8080');
    }

   // $usuarioEdit = isset($_GET['id']) ? $usuarioController->buscar($_GET['id']) : null;
    $usuarioEdit= (isset($_GET['acao']) and $_GET['acao']=='editar') ? $usuarioController->buscar($_GET['id']):NULL;
    print_r($usuarioEdit);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>


    <div class="container col-5">
    
        <div class="row">
            <form method="post" action="">
                <input type="hidden" name="id" value=<?php echo !empty($usuarioEdit)? $usuarioEdit['id'] : null;  ?>>
                <input type="text" name="name" placeholder="name" required value=<?php echo !empty($usuarioEdit)? $usuarioEdit['name']:null;  ?>>
                <input type="email" name="email" placeholder="email" required value= <?php echo !empty($usuarioEdit)?$usuarioEdit['email']: null ?>>
                <button name="salvar" class="btn">Enviar</button>
            </form>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($usuarioLista as $usuario){  ?>
                    <tr>
                        <td><?php echo $usuario['name']?></td>
                        <td><?php echo $usuario['email']?></td>
                        <td><?php echo "<a href='/?acao=editar&id=".$usuario['id']."'>Editar</a>"?></td>
                        <td><?php echo "<a onclick = 'return confirm(\"Deseja realmente excluir?\")' href='/?acao=deletar&id=".$usuario['id']."' >Excluir</a>"?></td>
                    </tr>
                <?php 
                    } 
                ?>
                </tbody>
            </table>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
</body>
</html>