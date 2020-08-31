@extends('layouts.app')
@section('content')

<div class="container">
    Nome: {{$contact->name}}
    Contato: {{$contact->contact }}
    Email: {{$contact->email}}
</div>
@endsection