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

if( !function_exists( 'getStatusChamada' ) ) {
    
    function getStatusChamada( $id ){
        switch($id){
            case 0: return "<span class='label label-danger'>Não finalizada</span>"; break;
            case 1: return "<span class='label label-success'>Concluida</span>"; break;
            default: return "<span class='label label-danger'>Não finalizada</span>"; break;
        }
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
    
    function getIdade( $data_nasc ){
        $data_nasc=explode("/", $data_nasc);
        $data=date("d/m/Y");
        $data=explode("/",$data);
        
        $dt_nascimento = $data_nasc[0].'-'.$data_nasc[1].'-'.$data_nasc[2];
        $dt_hoje = $data[2].'-'.$data[1].'-'.$data[0];

        $diff = abs(strtotime($dt_hoje) - strtotime($dt_nascimento));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if((int)$years > 0){
            return "$years ano(s), $months mes(es), $days dia(s)"; //, $years, $months, $days);
        } else if((int)$years == 0 && (int)$months > 0){
            return "$months mes(es), $days dia(s)";
        } else if((int)$years == 0 && (int)$months == 0 && (int)$days > 0){
            return "$days dia(s)";
        }

    }
}




