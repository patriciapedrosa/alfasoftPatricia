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
        $contacts = Contact::orderBy('id')->paginate(10);
        return view('contact.index', compact('contacts'));
    }

    public function view($id){
    	$contact = Contact::find($id);

        return View::make('contact.view', array('contact' => $contact));

    	//return view('contact.view');
    }


    public function edit(Contact $contact)
    {

    	//var_dump("hdsgjk");die;
        return view('contact.edit',compact('contact'));
    }



    public function create()
    {
    	//var_dump("hgsefkjl");die;
    	 /*$request->validate([
                'table_number' => 'required|integer|unique:tables'
            ]);*/
        $contact = new Contact();
        return view('contact.add', compact('contact'));
    }






    public function update(Request $request, $id)
    {
        
        Contact::where('id',$id)->update([
            /*'location' => $request->input('location'), 
            'updated_at' => Carbon::now()*/
        ]);

        return redirect()
        ->route('contact.index')
        ->with('success', 'Dispositivo editado com sucesso');
    }

    public function store(StoreContactRequest $request)
    {
        //dd($request);
        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();
        return redirect()
        ->route('contact.index')
        ->with('success', 'Contato added successfully');
    }



    public function delete($id)
    {
    	var_dump($id);die;
        $contato = Contact::findOrFail($id);
        $contato->deleted == 1;
        $contato->save();
        /*return redirect()
            ->route('sensor.index', compact('thing_id'))
            ->with('success', 'Sensor removido com sucesso');*/
    }

}
