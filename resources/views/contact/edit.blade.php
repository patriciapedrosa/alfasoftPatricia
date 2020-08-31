@extends('layouts.app')
@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



     <form action="{{route('contact.update', $contact->id)}}" method="post" class="form-group" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nome</label>
            <input
            type="text" class="form-control"
            name="name" id="name"
            placeholder="name" value="{{old('name', $contact->name)}}" />
        </div>
        <div class="form-group">
            <label for="contact">Telefone</label>
            <input
            type="text" class="form-control"
            name="contact" id="contact"
            placeholder="contact" value="{{old('contact', $contact->contact)}}" />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input
            type="text" class="form-control"
            name="email" id="email"
            placeholder="email" value="{{old('email', $contact->email)}}" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
            <a class="btn btn-danger" href="{{route('index')}}" id="cancel">Cancel</a>
        </div>
        {{csrf_field()}}
    </form>
</div>
@endsection