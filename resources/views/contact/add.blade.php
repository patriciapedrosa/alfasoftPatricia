@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('device.store', $device)}}" method="post" class="form-group" enctype="multipart/form-data">
       <!--  <div class="form-group">
            <label for="location">Location</label>
            <input
            type="text" class="form-control"
            name="location" id="location"
            placeholder="location" value="{{old('location', $device->location)}}" />
        </div>
        <div class="form-group">
                <label for="owner_id">Utilizador</label>
                <select name="owner_id" id="owner_id" class="form-control">
                    <option disabled selected> -- select an option -- </option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name}}</option>
                    @endforeach
                </select>
            </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
            <a class="btn btn-default" href="{{route('home')}}" id="cancel">Cancel</a>
        </div> -->
        {{csrf_field()}}
    </form>
</div>
@endsection