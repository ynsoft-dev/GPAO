@extends('adminlte::page')

@section('content')


    <br>
  

    <div class="row">
    <div class="col-md-11 mx-auto">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Modifier ce rôle</h3>
                </div>


<form method="POST" action="{{ route('roles.update', $role->id) }}">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                    <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Role:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{$role->name }}">
    </div>
</div>

                    </div>
                    <div class="row">
                     
                        <div class="col-lg-4">
                         
                        <li><a href="#">Permissions :</a>
                                    
                                        
                                            @foreach($permission as $value)
                                            <label><input type="checkbox" name="permission[]" class="name" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                                {{ $value->name }}</label>
                                            <br />
                                            @endforeach
                                        

                        </div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer  </button>
                    </div>
</form>

</div>

@endsection

