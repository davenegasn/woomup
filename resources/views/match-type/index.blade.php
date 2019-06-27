@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">

                <h1>Tipos de match</h1>
                   
                        <a href="{{ url('/match-type/create') }}" class="btn btn-success btn-sm" title="Add New MatchType">
                            Añadir nuevo tipo de match
                        </a>

                        <form method="GET" action="{{ url('/match-type') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                @foreach($matchtype as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/match-type/' . $item->id . '/edit') }}" title="Edit MatchType"><button class="btn btn-primary btn-sm">Editar</button></a>

                                            <form method="POST" action="{{ url('/match-type' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete MatchType" onclick="return confirm(&quot;Confirm delete?&quot;)"> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $matchtype->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
