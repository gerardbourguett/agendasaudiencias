@extends('layouts.app')

@section('template_title')
    Magistrado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Magistrado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('magistrados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Apellido</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($magistrados as $magistrado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $magistrado->nombre }}</td>
											<td>{{ $magistrado->apellido }}</td>

                                            <td>
                                                <form action="{{ route('magistrados.destroy',$magistrado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('magistrados.show',$magistrado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('magistrados.edit',$magistrado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $magistrados->links() !!}
            </div>
        </div>
    </div>
@endsection
