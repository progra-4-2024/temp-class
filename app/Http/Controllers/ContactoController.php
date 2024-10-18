<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Mail\ContactoRecibido;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{
    public function index()
    {
        return view('mis-views.contacto');
    }
    public function send(Request $request)
    {
        
        DB::transaction(function () use ($request) {
            DB::beginTransaction();
        
            $request->validate([
                'nombre' => 'required|max:255',
                'email' => 'required|email:rfc,dns',
                'mensaje' => 'required',
            ]);
            $input = $request->input();
            $input['publicidad'] = isset($input['publicidad']);
            Contact::create($input);
            
            Mail::send(new ContactoRecibido($request->input()));
            
            throw new \Exception("error");
        

            return redirect(route('contactado'), 302);
        });

        
    }
    public function contacted(){
        return view('mis-views.contactado');
    }
}
