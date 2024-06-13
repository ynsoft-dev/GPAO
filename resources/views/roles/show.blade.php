@extends('adminlte::page')

@section('content')

<div class="content-wrapper" style="margin-left: 180px;">
    <br>
  

    <div class="row">
        <div class="col-md-9">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Les permissions:</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                      
                            <li><a href="#">{{ $role->name }} :</a>
                                <ul>
                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $perm)
                                    <li>{{ $perm->name }}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>

</div>


@endsection