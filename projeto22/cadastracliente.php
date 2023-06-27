<?php 
include("conectadb.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$nome = $_POST['nome'];
$senha =$_POST['senha'];
$datanasc = $_POST['datanasc'];
$CPF =$_POST['cpf'];
$telefone = $_POST['telefone'];
$cidade =$_POST['cidade'];
$logradouro = $_POST['logradouro'];
$numero =$_POST['numero'];

#VERIFICA SE CLIENTE JA EXISTE
$sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_nome = '$nome' AND cli_senha = '$senha'";
$retorno = mysqli_query($link, $sql);

##TODO RETORNO DO BANCO É RETORNADO EM ARRAY EM PHP
while($tbl = mysqli_fetch_array($retorno))
{
$cont = $tbl[0];
}

##VALIDAÇÃO DE TRUE E FALSE


if($cont ==1 )
{
    echo"<script>window.alert('CLIENTE JÁ EXISTE');</script>";    

}
else
{
    $sql = "INSERT INTO clientes (cli_nome, cli_senha, cli_ativo, cli_datanasc, cli_cpf, cli_telefone,cli_cidade ,cli_logradouro ,cli_numero)
    VALUES('$nome','$senha','s','$datanasc','$CPF','$telefone','$cidade','$logradouro','$numero')";
    mysqli_query($link, $sql);
    echo"<script>window.location.href='admhome.php';</script>";
    echo"<script>window.alert('CLIENTE CADASTRADO');</script>";   
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Document</title>
</head>
<body>

<div>
<ul class="menu">
    <li>
    <li><a href="cadastrausuario.php">CADASTRA USUARIO</a></li>
    <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
    <li><a href="listausuario.php">LISTA USUARIO</a></li>
    <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>    
    <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
    <li><a href="listacliente.php">LISTA CLIENTE</a></li>
    <li class="menuloja"><a href="./areacliente/loja.php">LOJA<a><li>
    </li>
</ul>
</div>

<div>
    <form action="cadastracliente.php" method="post">
        <input type="text" name="nome" id="nome" placeholder="NOME ">
            <br>
            <input type="password" name="senha" id="senha" placeholder="SENHA">
            <br>
            <input type="date" name="datanasc" id="datanasc" placeholder="DATA DE NASCIMENTO">
            <br>
            <input type="number" name="cpf" id="cpf" placeholder="CPF">
            <br>
            <input type="number" name="telefone" id="telefone" placeholder="TELEFONE">
            <br>
            <input type="text" name="cidade" id="cidade" placeholder="CIDADE">
            <br>
            <input type="text" name="logradouro" id="logradouro" placeholder="LOGRADOURO">
            <br>
            <input type="number" name="numero" id="numero" placeholder="NUMERO RESIDENCIA">
            <br>
            <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR"> 
    </form>
</div>

</body>
</html>

