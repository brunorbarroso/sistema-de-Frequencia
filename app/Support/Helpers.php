<?php

if( !function_exists( 'getFuncao' ) ) {
    
    function getFuncao( $id ){
        switch($id){
            case 0: echo "Tio(a)"; break;
            case 1: echo "Coordenador(a)"; break; 
        }
    }
}

if( !function_exists( 'getData' ) ) {
    
    function getData( $data ){
        return date('d/m/Y', strtotime($data));
    }
}

if( !function_exists( 'getCrianca' ) ) {
    
    function criancaIsChecked( $presencas, $crianca_id ){
        if(isset($presencas) && count($presencas) > 0 ){
            foreach($presencas as $presenca){
                if( $crianca_id == $presenca->crianca_id && $presenca->presenca == 1 )
                    return "checked";
            }
        }
    }
}

if( !function_exists( 'getImagem' ) ) {
    
    function getImagem( $imagem, $tamanho){
        $path = URL::to('/');
        return "<img src='{$path}/uploads/fotos/{$imagem}' width='$tamanho'>";
    }
}


if( !function_exists( 'getIdade' ) ) {
    
    function getIdade( $datanascimento ){
        $date = new DateTime( $datanascimento ); 
        $interval = $date->diff( new DateTime() );
        return $interval->format( '%Y Anos, %m Meses e %d Dias' );
    }
}


