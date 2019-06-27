@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                
               <h1>Roles</h1>
                   
                        <a href="{{ url('/roles/create') }}" class="btn btn-outline-success " title="Add New Role">
                            Añadir nuevo rol
                        </a>

                        <form method="GET" action="{{ url('/roles') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Rol</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                           
                                            <a href="{{ url('/roles/' . $item->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/roles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Role" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $roles->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    
                </div>
            </div>
        </div>
    </div>
@endsection
