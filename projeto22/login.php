<?php

    #ABRE UMA VARIAVEL SESSAO

    session_start();

    #SOLICITA O ARQUIVO CONECTADB
    include("conectadb.php");

    #EVENTO APOS O CLICK NO BOTAO LOGAR
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];

        $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha = '$senha'";
        $retorno = mysqli_query($link, $sql);

        #TODO RETORNO DO BANCO É RETORNADO EM ARRAY EM PHP
        while ($tbl = mysqli_fetch_array ($retorno))
        {
            $cont= $tbl[0];

        }
        #VERIFICA SE O USUARIO EXISTE
        #SE $CONT ==1 ELE EXISTE E FAZ LOGIN
        #SE $CONT ==0 ELE NAO EXISTE E O USUARIO NAO ESTÁ CADASTRADO
        
        if($cont ==1)
        {
            $sql = "SELECT * FROM usuarios WHERE usu_nome = '$nome'
             AND usu_senha = '$senha' AND usu_ativo = 's'";
             #DIRECIONA USUARIO PARA O ADM
             echo "<script>window.location.href='admhome.php';</script>";
        }
        else
        {
            echo"<script>window.alert('USUARIO OU SENHA INVALIDOS'); </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>LOGIN USUARIO</title>
</head>
<body>
        <form action ="login.php" method="post">
            <h1>LOGIN DE USUARIO</h1>
            <input type="text" name= "nome" placeholder="NOME">
            <p></p>
            <input type="password" name= "senha" placeholder="SENHA">
            <p></p>
            <input type="submit" name= "login" value="LOGIN">

        </form>
</body>
</html>