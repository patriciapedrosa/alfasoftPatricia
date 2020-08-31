    @extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >
                        <h2>Lista de Contatos
                            <a class="btn btn-xs btn-success" style="float:right" href="{{ route('contact.add') }}" >Adicionar Contato</a>
                     
                        </h2>
                    </div>
                    @if (count($contacts)) 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Eliminar</th>
                                <th>Editar</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        @foreach ($contacts as $contact) 
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->contact }}</td>
                            <td>{{$contact->email}}</td>
                            <td>
                                 <form action="{{ route('contact.delete',$contact->id) }}" method="post" class="form-group">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <button type="submit" style="width:100;height:100" class="btn btn-xs btn-danger" name="ok">Eliminar</button>
                                        </div>
                                        </td>
                                    </form>
                        </td>
                      
                            <td><a class="btn btn-xs btn-primary" href="{{ route('contact.edit',$contact->id) }}">Editar</a></td>


                            <td><a class="btn btn-xs btn-primary" href="{{ route('contact.view',$contact->id) }}">Ver</a></td>
                      
                        </tr>
                        @endforeach
                    </table>
                    <div class="text-center"> 
                        {!!$contacts->links();!!}
                    </div>  
                    @else 
                    <h3>Não foram encontrados dispositivos</h3>
                    @endif
                    @endsection