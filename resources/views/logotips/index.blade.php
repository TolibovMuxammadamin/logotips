@extends('layouts.app')

@section('content')

    <a href="{{ route('logotips.create') }}" class="btn btn-outline-info btn-block">Добавить Логотип</a>

    @if ($logotips->count() > 0)
        <div class="card">
            <div class="card-header">
                <strong>Логотипы</strong>
            </div>
            
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Название</h5>
                        </div>
                        
                        <div class="col-md-4">
                            <h5>Автор</h5>
                        </div>
                    </div>
                    @foreach ($logotips as $logotip)
                        <div class="row mb-2">
                            <div class="col-md-4">
                                {{ $logotip->name }}
                            </div>
                            
                            <div class="col-md-4">
                                {{ $logotip->creator->name }}
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <a href="{{ route('logotips.show', $logotip->id) }}" class="btn btn-primary btn-sm mr-1">Подробно</a>
                                    @if (auth()->user()->id === $logotip->creator->id)
                                        <a href="{{ route('logotips.edit', $logotip->id) }}" class="btn btn-success btn-sm mr-1">
                                            Изменить
                                        </a>
                                        
                                        <form action="{{ route('logotips.destroy', $logotip->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Удалить
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                    @endforeach
                    {{ $logotips->appends(['search' => request()->query('search')])->links() }}

                </div>
                
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">
                    Логотипы не найдены
                </h4>
            </div>
        </div>
    @endif
@endsection