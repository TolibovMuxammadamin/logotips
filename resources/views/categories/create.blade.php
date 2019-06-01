@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ isset($category) ? 'Изменение' : 'Создание' }} Категории
        </div>

        <div class="card-body">
            <form action="{{ isset($category) ? route('categories.update', $category->slug) : route('categories.store') }}" method="post">
                @csrf

                @if (isset($category))
                    @method('PUT')                    
                @endif

                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ isset($category) ? $category->name : '' }}">
                </div>
                
                <button type="submit" class="btn btn-success">
                    {{ isset($category) ? 'Изменить' : 'Добавить' }}
                </button>
            </form>            

        </div>
    </div>

@endsection
