@extends('personal.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-3">Добавление Комментария</h1>
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
                        <form class="container-fluid" action="{{route('personal.comments.store')}}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group container-fluid">
                                <label for="comment_text">Текст</label>
                                <textarea class="form-control" type="text" id="summernote" name="text">
                                 {{old('text')}}
                                </textarea>
                                @error('text')
                                <div class="text-danger">Это поле нужно заполнить!</div>
                                @enderror
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
