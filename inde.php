<?php
$pdo = new PDO('mysql:host=localhost;dbname=Bootstrap_projeto','root','');
$sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
$sobre->execute();
$sobre = $sobre->fetch()['sobre'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de controle</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-fixed-top navbar-inverse ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" name="Indie">
            <span class="sr-only">Painel de Controle</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Painel de controle</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul id="menu-principal"class="nav navbar-nav">
            <li class="active " ><a href="#"ref_sys="sobre">Editar Sobre</a></li>
            <li><a href="#"ref_sys="lista_equipe">Lista Equipe</a></li>
            <li><a href="#"ref_sys="cadastrar_equipe">Cadastrar Equipe</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li ><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg> Sair</li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div style="position:relative;top:50px"class="box">
    <header id ="header">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
              <h2><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
  <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
</svg>Painel de Controle</h2>
</div><div class="col-md-3">
             <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"/>
  <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"/>
</svg>       Seu Ultimo login foi dia 08/12/2020</p>
</div>
</div>
</div>


    </header>
   <section class="principal">
     <div class="container">
      <div class="row">
        <div class="col-md-3">
        <div class="list-group">

  <button type="button" class="list-group-item list-group-item-action active cor-padrao"ref_sys="sobre">Sobre</button>
  <button type="button" class="list-group-item list-group-item-action" ref_sys="cadastrar_equipe">Cadastrar Equipe</button>
  <button type="button" class="list-group-item list-group-item-action "ref_sys="lista_equipe">
    Lista Equipe
</button>
</div>
</div>
<div class="col-md-9">
<?php if(isset($_POST['editar_sobre'])){
  $sobre = $_POST['sobre'];
  $pdo->exec("DELETE FROM`tb_sobre`");
  $sql = $pdo->prepare("INSERT INTO `tb_sobre`VALUES(null,?)");
  $sql->execute(array($sobre));
  echo '<div class="alert alert-success" role="alert">
 O codigo Html sobre foi editado com sucesso
</div>';
$sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
$sobre->execute();
$sobre = $sobre->fetch()['sobre'];
}
else if(isset($_POST['cadastrar_equipe'])){
  $nome = $_POST['nome_membro'];
  $descricao = $_POST['descricao'];
  $sql = $pdo->prepare("INSERT INTO `tb_equipe`VALUES(null,?,?)");
  $sql->execute(array($nome,$descricao));
  echo '<div class="alert alert-success" role="alert">
  foi Adicionado com sucesso
</div>';

}
?>
<div id= "sobre_section" class="panel panel-default">
  <div class="panel-heading cor-padrao">
    <h3 class="panel-title active">Sobre</h3>
</div>
<div class="panel-body">
<form method="post">
  <div class="form-group">
    <label for="email">Codigo Html:</label>
 <textarea name="sobre" class="form-control" style="height:140px;resize:vertical;"> <?php echo $sobre; ?></textarea>
  <input type="hidden" name="editar_sobre" value="">
  <button type="submit" name="acao" class="btn btn-default">Enviar</button>
</form>
</div>
</div>
<div id="cadastrar_equipe_section" class="panel panel-default">
  <div class="panel-heading cor-padrao">
    <h3 class="panel-title active">Cadastrar Equipe:</h3>
</div>
      <div class="panel-body">
      <form method="post">
      <div class="form-group">
          <label for="email">Nome do Membro:</label>
            <input type="text" name="nome_membro" class="form-control">
        <div class="form-group">
          <label for="email">Descrição do Membro:</label>
      <textarea name="descricao" class="form-control" style="height:140px;resize:vertical;"></textarea>
        <input type="hidden" name="cadastrar_equipe"/>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
      </div>
      </div>

</div>
<div id="lista_equipe_section" class="panel panel-default">
  <div class="panel-heading cor-padrao">
    <h3 class="panel-title active">Membros da Equipe:</h3>
</div>
      <div class="panel-body">
      <table class="table">
      <thead>
        <tr>  
          <th>ID</th>
          <th>Nome</th>
          </tr>
      
      </thead>
      <tbody>
      <?php 
        $selecionarmembros = $pdo->prepare("SELECT `id`,`nome` FROM `tb_equipe`");
        $selecionarmembros->execute();
        $membros = $selecionarmembros->fetchAll();
        foreach($membros as $key=>$value){
      
      ?>
        <tr>
          <td><?php echo $value['id']?></td>
          <td><?php echo $value['nome']?></td>
          <td><button type="button" class="btn btn-danger deletar_membro" id_membro="<?php echo $value['id'] ?>">Excluir</button></td>
        </tr>
        <?php 
  
      }
      ?>
      </tbody>
     
      </table>
      </div>

     </div>
     
     
</section>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function(){

          cliquemenu();
          rolar();

        function cliquemenu(){
            $('#menu-principal a, .list-group button').click(function(){
              $('#menu-principal a, .list-group button').removeClass('active').removeClass('cor-padrao');
              $('#menu-principal a').parent().removeClass('active');
              $('#menu-principal a[ref_sys='+$(this).attr('ref_sys')+']').parent().addClass('active');
              $('.list-group button[ref_sys='+$(this).attr('ref_sys')+']').addClass('active').addClass('cor-padrao');
              return false;
            })
        }
        function rolar(){
          $('#menu-principal a, .list-group button').click(function(){
            var ref ='#'+$(this).attr('ref_sys')+'_section';
            var offset = $(ref).offset().top; 
            $('html,body').animate({'scrollTop':offset-50});
           if($(window)[0].innerWidth <= 768){
           $('.icon-bar').click();}
          });
      

        }


      
        
       $('button.deletar_membro').click(function(){
         var id_membro = $(this).attr('id_membro');
         $(this).parent().parent().remove();
          
        $.ajax({
          method:'post',
          data:{'id_membro':id_membro},
          url:'deletar.php'
        }).done(function(){
         
        })
        
          
         })
        



      })
    </script>
  </body>
</html>
