
@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12 mx-auto">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Mettez votre contenu ici -->
                    @livewire('ligne-component')

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection