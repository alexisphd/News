@extends('personal.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0">{{$comment->post->title}}</h1>
                        <a href="{{route('personal.comments.edit', $comment->id)}}"><i class="fa fa-pen pl-3"></i></a>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.home')}}">Назад</a></li>
                            <li class="breadcrumb-item active">Сообщения</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$comment->id}}</td>
                                </tr>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$comment->post->title}}</td>
                                </tr>
                                <tr>
                                    <td>Комментарий</td>
                                    <td>{{$comment->text}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="container-fluid w-50">
                                            <label> Превью </label>
                                            <img class="img-fluid"
                                                 src="{{url('storage/'.$comment->post->preview_image)}}"
                                                 alt="{{$comment->post->title}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="container-fluid w-50">
                                            <label> Главное </label>
                                            <img class="img-fluid" src="{{url('storage/'.$comment->post->main_image)}}"
                                                 alt="{{$comment->post->title}}">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection