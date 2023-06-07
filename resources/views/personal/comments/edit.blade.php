@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование комментария</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.home')}}">Назад</a></li>
                            <li class="breadcrumb-item active">Комментарии</li>
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
                        <form action="{{route('personal.comments.update', $comment->id)}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group container-fluid">
                                <label for="summernote">Текст комментария</label>
                                <textarea class="form-control" type="text" id="summernote" name="text">
                                    {{$comment->text}}
                                </textarea>
                                @error('title')
                                <div class="text-danger">Это поле нужно заполнить!</div>
                                @enderror
                            </div>
                            <div class="form-group container-fluid">
                                <input type="submit" class=" btn btn-primary mt-2" value="Обновить">
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