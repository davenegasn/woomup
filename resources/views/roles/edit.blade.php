@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">

               <h1>Editar Rol #{{ $role->id }}</h1>
                    
                    <a href="{{ url('/roles') }}" title="Back">
                        <button class="btn btn-warning btn-sm">Volver</button>
                    </a>
                    <br />
                    <br />

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/roles/' . $role->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('roles.form', ['formMode' => 'edit'])

                    </form>
              
            </div>
        </div>
    </div>
@endsection
