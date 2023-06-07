@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-3">Добавление Сообщения</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Назад</a></li>
                            <li class="breadcrumb-item active">Сообщения</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form class="container-fluid" action="{{route('admin.posts.store')}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group container-fluid">
                                <label for="post_title">Заголовок</label>
                                <input class="form-control" type="text" id="post_title" name="title"
                                       value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger">Это поле нужно заполнить!</div>
                                @enderror
                            </div>
                            <div class="form-group container-fluid">
                                <label for="post_text">Текст</label>
                                <textarea class="form-control" type="text" id="summernote" name="text">
                                 {{old('text')}}
                                </textarea>
                                @error('text')
                                <div class="text-danger">Это поле нужно заполнить!</div>
                                @enderror
                            </div>
                            <div class="form-group container-fluid">
                                <label for="exampleInputFile">Загрузка файлов</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="preview_image"
                                               name="preview_image">
                                        <label class="custom-file-label" for="preview_image">Выбрать файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="main_image" name="main_image">
                                        <label class="custom-file-label" for="main_image">Выбрать файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == old($category->id)?'selected':''}}>
                                                {{$category->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Теги</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Выбрать теги"
                                            style="width: 100%;" name="tag_ids[]">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group container-fluid">
                                <input type="submit" class=" btn btn-primary mt-2" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
