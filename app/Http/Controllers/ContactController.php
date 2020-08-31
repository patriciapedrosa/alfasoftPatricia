<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{

	 public function index()
    {
        /*$contacts = Contact::orderBy('id')->paginate(10);*/
        return view('contact.index');
    }

    public function create()
    {
    	 /*$request->validate([
                'table_number' => 'required|integer|unique:tables'
            ]);*/
        $contato = new Contact();
        return view('contact.add', compact('contact'));
    }

    public function delete($id)
    {
        $contato = Contact::findOrFail($id);
        $contato->deleted == 1;
        $contato->save();
        /*return redirect()
            ->route('sensor.list', compact('thing_id'))
            ->with('success', 'Sensor removido com sucesso');*/
    }

    



    /*public function store(Request $request)
    {
        $request->validate([
                'table_number' => 'required|integer|unique:tables'
            ]);
        $table = new RestaurantTable();
        $table->fill($request->all());
        $table->save();
        return new TableResource($table);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
                'table_number' => 'required|integer|unique:tables'
            ]);
        $table = RestaurantTable::findOrFail($id);
        $table->update($request->all());
        return new TableResource($table);
    }*/
}
