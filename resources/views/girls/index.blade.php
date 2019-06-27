@extends('layouts.app')

@section('content')
    <div class="container-fuid">
        <div class="row">

            @include('layouts.sidebar')

            <div class="col-md-9">

                <h1>Usuarias</h1>
                    
                <a href="{{ url('/girls/create') }}" class="btn btn-outline-success " title="Add New Girl">
                    Añadir nueva usuaria
                </a>
                
                <form method="GET" action="{{ url('/company') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                Buscar
                            </button>
                        </span>
                    </div>
                </form>

                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Empresa</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($girls as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->role->title }}</td>
                                <td>{{ $item->company->name }}</td>
                                <td>
                                  
                                    <a href="{{ url('/girls/' . $item->id . '/edit') }}" title="Edit Girl"><button class="btn btn-primary btn-sm">Editar</button></a>

                                    <form method="POST" action="{{ url('/girls' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Girl" onclick="return confirm(&quot;Confirm delete?&quot;)"> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $girls->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
                
          
    </div>
@endsection
