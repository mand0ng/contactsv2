<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class ContactController extends Controller
{
    public function store(Request $request){
        
        
        $contact = new Contact($request->all());
        $contact = Contact::firstOrCreate($contact->getAttributes());
        $user = Auth::user();
        $user->Contacts()->attach($contact->id);
        $saved = $user->containsContact($contact->id);
        
        return Response::json($contact);

        // if($saved){
        //     $res = 'saved';
        // }else{
        // $res = 'tryiagain!';
        // }
        // return response($res)->header('Refresh','5;url=/home');
    }
    
    public function getContact($id){
        $contact = Contact::find($id);
        return Response::json($contact);
    }

    public function update(Request $request, $id){
        $contact = Contact::find($id);
        $contact->fill($request->all());
        $contact->save();

        return Response::json($contact);
    }

    public function delete($id){
        $cotact = Contact::destroy($id);
        return Response::json($cotact);
    }

    public function search(Request $request){
        $contact = Contact::where('name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
        ->orWhere('phone_number', 'LIKE', '%' . $request->search . '%')
        ->get();
        return Response::json($contact);
    }

}
