@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                
                <h1>Empresa</h1>
               
                <a href="{{ url('/company/create') }}" class="btn btn-outline-success " title="Añadir nueva empresa">
                    Añadir nueva empresa
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($company as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                   
                                    <a href="{{ url('/company/' . $item->id . '/edit') }}" title="Edit Company"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                    <form method="POST" action="{{ url('/company' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm(&quot;Confirm delete?&quot;)">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $company->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
