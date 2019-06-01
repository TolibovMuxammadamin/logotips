@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ isset($logotip) ? 'Изменение' : 'Создание' }} Логотипа
        </div>

        <div class="card-body">
            <form action="{{ isset($logotip) ? route('logotips.update', $logotip->id) : route('logotips.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if (isset($logotip))
                    @method('PUT')                    
                @endif

                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ isset($logotip) ? $logotip->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="image">
                        @if (isset($logotip))
                            <div>
                                <img src="{{ $logotip->image }}" alt="">
                            </div>
                        @else
                            Выберите Логотип
                        @endif        
                        
                    </label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (isset($logotip) && $category->id === $logotip->category->id)
                                    selected
                                @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    {{ isset($logotip) ? 'Изменить' : 'Добавить' }}
                </button>
            </form>            

        </div>
    </div>

@endsection

