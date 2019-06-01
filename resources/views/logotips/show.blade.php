@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="text-center border-bottom">
            <img style="width:20%" src="{{ asset('/storage/' . $logotip->image) }}" alt="Card image cap">
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Название</h5>
                    </div>
                    <div class="col-md-6">
                        {{ $logotip->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Автор</h5>
                    </div>
    
                    <div class="col-md-6">
                        {{ $logotip->creator->name }}
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <h5>Категория</h5>
                    </div>
                    <div class="col-md-6">
                        {{ $logotip->category->name }}
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ route('logotips.index') }}" class="btn btn-outline-secondary btn-sm mt-2">Назад</a>
                    </div>
                    <div>
                        <a class="btn btn-success btn-sm" href="{{ asset('/storage/' . $logotip->image) }}" download="{{  $logotip->name }}">Скачать</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
