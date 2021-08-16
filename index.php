<?php
/*
Plugin Name: Cadastro
Description: Plugin para cadastro de Pessoas no site
Version: 1.0
Author: Jussimar Leal
Text Domain: cadastro
*/

//criando tabela no banco de dados do wordpress
function cadastro_create_table(){
    //variavel global que leva ao objeto de gestão do banco de dados do wordpress
    global $wpdb;

    //criando nome da tabela
    //prefix é o prefixo de tabela criado na instalação do wordpress 
    $nomeDaTabela = $wpdb->prefix .'cd_cadastro'; 

    //verificando se a tabela existe
    if($wpdb->get_var("SHOW TABLES LIKE '$nomeDaTabela'") != $nomeDaTabela){
        //se não existe vamos executar esse sql
        $sql = "
            CREATE TABLE $nomeDaTabela(
                cd_cadastro int auto_increment primary key,
                nm_cadastro varchar(100),
                dt_nascimento date,
                ds_relatorio varchar(200)
            );
        ";

        //chamando função dbDelta para executar a query
        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        
        //execunta a query criada
        dbDelta($sql);
    }
}
//comando para executar a função cadastro_create_table ao iniciar o plugin
add_action('init', 'cadastro_create_table');