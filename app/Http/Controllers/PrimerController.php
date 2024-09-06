<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
class PrimerController extends Controller
{
    function index(){
        throw new \Exception("test de error");
        return view('mis-views.primer-view', [
            'texto' => 'Hola Mundo'
        ]);
    }
    function show(Request $request, $texto='nada'){
        
        
        $validator = Validator::make(
            $request->input(),
            array('name' => array('required', 'min:5'),
            'email' => 'email:rfc,dns'),
        );
        $messages = [];
        if ($validator->fails()){
            $messages = $validator->getMessageBag()->getMessages();
            $failed = $validator->failed();
        }
        $header = $request->header('accept-language');
        $url = route('mi-controller', ['texto' => 'hola-mundo']);
        $records = [];
        $contador = session('contador',0);
        $contador++;
        session(['contador'=>$contador]);
        Cache::put('key', 'value', 600);
        $contadorCache = cache('contador',0);
        $contadorCache++;
        cache(['contador'=>$contadorCache]);
        Artisan::call('mail:send Pedro -n');
        $users = [
            (object)['id'=>1,'name'=>"Pedro"],
            (object)['id'=>2,'name'=>"Juan"],
            (object)['id'=>3,'name'=>"Sandra"],
        ];
        $request->flash();
        return view('mis-views.primer-view', [
            'texto' => '<script>alert(document.cookie);</script>Hola Mundo = ' . $texto . ' - ' . $header . ' - ' . $url,
            'records' => $records,
            'users' => $users,
            'contador' => $contador,
            'contadorCache' => $contadorCache,
            'messages' => $messages,
        ]);
    }
}
