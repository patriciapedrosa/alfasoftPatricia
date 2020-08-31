@extends('layouts.app')
@section('content')

<div class="container">
   <b> Nome:</b> {{$contact->name}}
   <br>
   <b> Contato:</b> {{$contact->contact }}
   <br>
    <b>Email: </b>{{$contact->email}}
    <div class="row">
      
   
    <div class="col-4">
        <a class="btn btn-default" href="{{route('index')}}" id="voltar">Voltar</a>
        <a class="btn btn-xs btn-primary" href="{{ route('contact.edit',$contact->id) }}">Editar</a>
        </div>
        <div class="col-4">
          <form action="{{ route('contact.delete',$contact->id) }}" method="post" class="form-group">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <button type="submit" style="width:100;height:100" class="btn btn-xs btn-danger" name="ok">Eliminar</button>
                                        </div>
                                        </div>
                                    </form>
        </div>
         
                                    
                                    
 </div>
    

</div>
@endsection