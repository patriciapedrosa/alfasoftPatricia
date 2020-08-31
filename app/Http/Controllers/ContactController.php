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
        ->route('index')
        ->with('success', 'Dispositivo editado com sucesso');
    }




    public function create()
    {
        $contact = new Contact();
        return view('contact.add', compact('contact'));
    }


    public function store(Request $request)
    {

        $contact = new Contact();
        $validated = $this->validate($request,[
            'name' => 'required|string|max:500',
            'email' => 'required|string|email',
            'contact' => 'required|integer|max:9'
        ]);
        $contact->fill($validated);
        $contact->deleted = 0;
        $contact->save();

        return redirect()
            ->route('index', compact('contact'))->with('success', 'Contato adicionado com sucesso');


/*

        var_dump($request);die;
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->deleted = 0;
        $contact->save();
        return redirect()
        ->route('index')
        ->with('success', 'Contato adicionado com sucesso');*/
    }



    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->deleted = 1;
        $contact->save();
    
        return redirect()
        ->route('index')
        ->with('success', 'Contato eliminado com sucesso');
    }

}
