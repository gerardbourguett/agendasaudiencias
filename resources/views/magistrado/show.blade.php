@extends('layouts.app')

@section('template_title')
    {{ $magistrado->name ?? "{{ __('Show') Magistrado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Magistrado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('magistrados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $magistrado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $magistrado->apellido }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
