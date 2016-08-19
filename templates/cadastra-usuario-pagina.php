<?php
include_once 'includes/header.php';

$dao = new UsuarioDao();
$obj = new Entidade();
$obj->login = "";
$obj->senha = "";
$obj->usuario_id = "";
$obj->paginas_id = "";
$obj->acesso_tipo = "inserir";

$paginaDao = new PaginaDao();
$listaAcessos = $paginaDao->listar("", "");
$listaPaginas = $paginaDao->listar("", "");
if (count($_POST) > 0) {
    // monta o obj
    $obj = Entidade::getObject($_POST);
    $listaAcessos = $paginaDao->listar("", $obj->usuario_id);

    if ($obj->submit == "Conceder acesso"){
        $usuarioPaginaDao = new UsuarioPaginaDao();
        if($obj->acesso_tipo == "inserir") {
            $usuarioPaginaDao->inserir($obj);
        } else {
            $usuarioPaginaDao->alterar($obj);
        }
        header("Location: cadastra-usuario-pagina.php?op=carregar&id=$obj->usuario_id");
    } else {
    
        // verifica o que deve ser feito
        if ($obj->usuario_id == "") {
            $dao->inserir($obj);
            header("Location: lista-usuario-pagina.php");
        } else {
            $dao->alterar($obj);
            header("Location: lista-usuario-pagina.php");
        }
    }
} else if (count($_GET) > 0) {
    // variável p verificar tipo da operação
    $op = isset($_GET["op"]) ? $_GET["op"] : "";
    $usuario_id = isset($_GET["id"]) ? $_GET["id"] : "";
    $paginas_id = isset($_GET["paginas_id"]) ? $_GET["paginas_id"] : "";
    
    if ($op == "carregar" && $usuario_id != "") {
        
        $obj = $dao->carregar($usuario_id);
        $obj->paginas_id = $paginas_id;
        $obj->acesso_tipo = "inserir";
        $listaAcessos = $paginaDao->listar($usuario_id, "");
    } else if ($op == "excluir") {
        $dao->excluir($usuario_id);
        header("Location: lista-usuario-pagina.php");
    
        
    } else if($op == "excluir_acesso"){
        $obj = new Entidade();
        $obj->usuario_id = $usuario_id;
        $obj->paginas_id = $paginas_id;        
        
        $usuarioPaginaDao = new UsuarioPaginaDao();
        $usuarioPaginaDao->excluir($obj);
        header("Location: cadastra-usuario-pagina.php?op=carregar&id=$obj->usuario_id");
    
        
    } else if ($op == "carregar_acesso" && $usuario_id != "") {
        
        $obj = $dao->carregar($usuario_id);
        $obj->paginas_id = $paginas_id;
        $obj->acesso_tipo = "alterar";
        $listaAcessos = $paginaDao->listar($usuario_id, "");
    }
}
// BD8CBC0782 / LABS 22 E 14
// 2A5BFC7135 / WIFI FACCAR

?>


<h1>Permissões</h1>
<form name="form-acesso" method="post" action="" class="form-inline col-md-10">
    <input type="hidden" name="usuario_id" value="<?= $obj->usuario_id ?>" />
    <input type="hidden" name="acesso_tipo" value="<?= $obj->acesso_tipo ?>" />
    <input type="hidden" name="paginas_id_antiga" value="<?= $obj->paginas_id ?>" />
    
    
    <div class="form-group col-md-9">
        <label for="pagina">Página</label>
        <select name="paginas_id" class="col-md-12">
            <option value="" selected="selected">Selecione</option>
            <? foreach ($listaPaginas as $keyP => $pagina) { ?>
                <option value="<?= $pagina->paginas_id?>" 
                 <?= ($obj->paginas_id == $pagina->paginas_id 
                     ? 'selected="selected"' : "" )?>
                > 
                    <?= $pagina->nome ?>
                </option>
            <? } ?>
        </select>
    </div>
    <div class="form-group col-md-3">
        <input type="submit" name="submit" value="Conceder acesso" />
    </div>
</form>
<table class="table table-hover table-striped table-bordered col-md-12">
    <thead>
        <tr>
            <th class="col-md-2">ID</th>
            <th class="col-md-8">Nome</th>
            <th class="col-md-1">Excluir</th>
            <th class="col-md-1">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?foreach ($listaAcessos as $contP => $pagina) { ?>
            <tr>
                <td class="col-md-2"><?= $pagina->paginas_id ?></td>
                <td class="col-md-10"><?= $pagina->nome ?></td>
                <td class="text-center col-md-1">
                    <a href="<?= $templates_path ?>cadastra-usuario-pagina.php?op=excluir_acesso&id=<?= $obj->usuario_id ?>&paginas_id=<?= $pagina->paginas_id ?>" title="X">X</a>
                </td>
                <td class="text-center col-md-1">
                    <a href="<?= $templates_path ?>cadastra-usuario-pagina.php?op=carregar_acesso&id=<?= $obj->usuario_id ?>&paginas_id=<?= $pagina->paginas_id ?>" title="X">A</a>
                </td>
            </tr>
        <? } ?>
    </tbody>
</table>

<? include_once 'includes/footer.php' ?>

