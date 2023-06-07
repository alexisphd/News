@extends('personal.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование Лайка</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.home')}}">Назад</a></li>
                            <li class="breadcrumb-item active">Теги</li>
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
                        <form class="w-25" action="{{route('personal.likes.update', $tag->id)}}"
                              method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <input class="form-control" type="text" id="tag_title" name="title"
                                       value="{{$tag->title}}">
                                @error('title')
                                <div class="text-danger">Это поле нужно заполнить!</div>
                                @enderror
                                <input type="submit" class=" btn btn-primary mt-2" value="Изменить">
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