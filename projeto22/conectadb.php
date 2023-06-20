<?php
    ## ARQUIVO DE ACESSO AO BD ##
    ## ALERTA EM MODO PROFISSIONAL ARUQIVO DEVE-SE MANTER OCULTO E PROTEGIDO ##

    ## LOCALIZA O PC OU SERVIDOR COM O BANCO DE(NOME DO COMPUTADOR)
    $servidor = "localhost";
    ##NOME DO BANCO
    $banco = "projeto22";
    #USUARIO DE ACESSO
    $usuario = "administrador";
    ##SENHA DO USUARIO
    $senha = "123";

    ##LINK DE CONEXÃO
    $link = mysqli_connect($servidor, $usuario, $senha, $banco);
    
?>