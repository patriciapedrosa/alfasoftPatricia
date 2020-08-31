<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Resources\Contact as ContactResource;

use App\Http\Requests\StoreEditContactRequest; 

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
            return abort(404);
        }else{
            return view('contact.view', compact('contact'));
        }
    	
    }


    public function edit($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);
        return view('contact.edit',compact('contact'));
    }

     public function update(StoreEditContactRequest $request, $id)
    {

        Contact::findOrFail($id)->update([
            'name' => $request->input('name'), 
            'contact' => $request->input('contact'),
            'email' => $request->input('email')
            
        ]);

        return redirect()
        ->route('index')
        ->with('success', 'Contato editado com sucesso');
    }




    public function create()
    {
        $contact = new Contact();
        return view('contact.add', compact('contact'));
    }


    public function store(Request $request)
    {
        $validated =  $request->validate([
                'name' => 'required|string|max:500|min:5',
                'email' => 'required|string|unique:contacts,deleted,0|email',
                'contact' => 'required|integer|unique:contacts,deleted,0|digits:9'
            ]);

        $contact = new Contact();
  
        $contact->fill($request->all());
        $contact->deleted = 0;
        $contact->save();

        return redirect()
            ->route('index', compact('contact'))->with('success', 'Contato adicionado com sucesso');
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
