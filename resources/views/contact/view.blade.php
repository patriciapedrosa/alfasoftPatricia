@extends('layouts.app')
@section('content')

<div class="container">
   <b> Nome:</b> {{$contact->name}}
   <br>
   <b> Contato:</b> {{$contact->contact }}
   <br>
    <b>Email: </b>{{$contact->email}}
</div>
@endsection