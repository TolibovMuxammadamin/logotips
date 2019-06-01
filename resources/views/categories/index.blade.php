@extends('layouts.app')

@section('content')

    <a href="{{ route('categories.create') }}" class="btn btn-outline-info btn-block">Добавить Категорию</a>

    @if ($categories->count() > 0)
        <div class="card">
            <div class="card-header">Категории</div>
            
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Название</h5>
                        </div>
                        <div class="col-md-3">
                            <h5>Автор</h5>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                        </div>
                    </div>
                    @foreach ($categories as $category)
                        <div class="row mb-2">
                            <div class="col-md-3">
                                {{ $category->name }}
                            </div>
                            <div class="col-md-3">
                                {{ $category->author->name }}
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="row">
                                    @if (auth()->user()->id === $category->author->id)
                                        <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-success btn-sm mr-2">
                                            Изменить
                                        </a>
    
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" onclick="handleDelete($category->id)" data-toggle="modal" data-target="#deleteModal">
                                            Удалить
                                        </button>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">
                    Категории не найдены
                </h4>
            </div>
        </div>
    @endif

        
      
      <!-- Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Вы точно хотите удалить эту категорию
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer">
                <form action="" method="post" class="deleteCategoryForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Да</button>
                </form>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Нет</button>
            </div>
          </div>
        </div>
      </div>
    
@endsection

@section('script')
    <script>
        function handleDelete(id)
        {
            let form = document.querySelector('.deleteCategoryForm');
            form.action = '/categories/' + id;
            document.querySelector('#deleteModal').modal('show');
        }
    </script>
@endsection