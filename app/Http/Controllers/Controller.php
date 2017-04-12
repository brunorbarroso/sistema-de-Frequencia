<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function salvar_foto( $foto ){
        $path = public_path().'/uploads/fotos/';
        $name_photo = md5( date('Y-m-d H:i:s') );

        if (isset($foto)) {
            $file_name = $name_photo . '.' . $foto->getClientOriginalExtension();
            $foto->move( $path, $file_name );
            return $file_name;
	    }
    }

}
