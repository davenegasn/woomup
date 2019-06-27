@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row">

            @include('layouts.sidebar')

            <div class="col-md-9">

                <h1>Match</h1>
            
                <a href="{{ url('/match/create') }}" class="btn btn-outline-success" title="Add New Match">
                    Añadir nuevo match
                </a>

                <form method="GET" action="{{ url('/match') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                <th>Usuaria 1</th>
                                <th>Usuaria 2</th>
                                <th>Tipo de match</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($match as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->girl1->name }}</td>
                                <td>{{ $item->girl2->name }}</td>
                                <td>{{ $item->match_type->name }}</td>
                                <td>
                                    
                                    <a href="{{ url('/match/' . $item->id . '/edit') }}" title="Edit Match">
                                        <button class="btn btn-primary btn-sm">Editar</button>
                                    </a>

                                    <form method="POST" action="{{ url('/match' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Match" onclick="return confirm(&quot;¿Seguro deseas eliminar esto?&quot;)">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    <div class="pagination-wrapper"> 
                        {!! $match->appends(['search' => Request::get('search')])->render() !!} 

                    </div>

                </div>

            </div><!-- /col-md-9 -->

        </div><!-- /row -->

       
    </div><!-- /container -->
@endsection
