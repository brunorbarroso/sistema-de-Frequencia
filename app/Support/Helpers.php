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
        echo date('d/m/Y', strtotime($data));
    }
}

if( !function_exists( 'getCrianca' ) ) {
    
    function criancaIsChecked( $presencas, $crianca_id ){
        if(isset($presencas) && count($presencas) > 0 ){
            foreach($presencas as $presenca){
                if( $crianca_id == $presenca->crianca_id && $presenca->presenca == 1 )
                    echo "checked";
            }
        }
    }
}