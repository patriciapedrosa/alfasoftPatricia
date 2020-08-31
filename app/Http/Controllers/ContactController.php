<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Resources\Contact as ContactResource;

use App\Http\Requests\StoreContactRequest; 

class ContactController extends Controller
{

	public function index()
    {
        $contacts = Contact::where('deleted', '0')->orderBy('id')->paginate(10);
        return view('contact.index', compact('contacts'));
    }

    public function viewContact($id){
    	$contact = Contact::find($id);
        if($contact->deleted == 1){
            return view('/');
        }else{
            return view('contact.view', compact('contact'));
        }
    	
    }


    public function edit(Contact $contact)
    {
        return view('contact.edit',compact('contact'));
    }

     public function update(Request $request, $id)
    {
        
        Contact::where('id',$id)->update([
            'name' => $request->input('name'), 
            'contact' => $request->input('contact'),
            'email' => $request->input('email')
            
        ]);

        return redirect()
        ->route('contact.index')
        ->with('success', 'Dispositivo editado com sucesso');
    }




    public function create()
    {
        $contact = new Contact();
        return view('contact.add', compact('contact'));
    }


    public function store(StoreContactRequest $request)
    {
        var_dump($request);die;
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->deleted = 0;
        $contact->save();
        return redirect()
        ->route('contact.index')
        ->with('success', 'Contato adicionado com sucesso');
    }



    public function delete($id)
    {
        Contact::where('id',$id)->update([
            'deleted'=>1
        ]);

        return redirect()
        ->route('contact.index')
        ->with('success', 'Contato eliminado com sucesso');
    }

}
