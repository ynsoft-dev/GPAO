@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12 mx-auto">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
              
                <div class="box-body">
                
                    @livewire('catalog-component')
                </div>
               
            </div>
           
        </div>
    </div>
</div>
@endsection