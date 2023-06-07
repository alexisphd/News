@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0">{{$post->title}}</h1>
                        <a href="{{route('admin.posts.edit', $post->id)}}"><i class="fa fa-pen pl-3"></i></a>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Назад</a></li>
                            <li class="breadcrumb-item active">Публикации</li>
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
                                    <td>{{$post->id}}</td>
                                </tr>
                                <tr>
                                    <td>Название</td>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                    <td>Текст</td>
                                    <td class="text-wrap">{{$post->text}}</td>
                                </tr>
                                <tr>
                                    <td>Комментарии</td>
                                    @if(!$post->comments->count())
                                        <td>Отсутствуют</td>
                                    @endif
                                    @foreach($post->comments as $comment)
                                        <td class="text-wrap">{{$comment->text}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>
                                        <div class="container-fluid w-50">
                                            <label> Превью </label>
                                            <a href="{{url('storage/'.$post->preview_image)}}" target="_blank"
                                               rel="noopener noreferrer">
                                                <img class="img-fluid" style="width: 150px; height: 150px;"
                                                     src="{{url('storage/'.$post->preview_image)}}"
                                                     alt="{{$post->title}}"> </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="container-fluid w-50">
                                            <label> Главное </label>
                                            <a href="{{url('storage/'.$post->main_image)}}" target="_blank"
                                               rel="noopener noreferrer">
                                                <img class="img-fluid" style="width: 150px; height: 150px;"
                                                     src="{{url('storage/'.$post->main_image)}}"
                                                     alt="{{$post->title}}">
                                            </a>
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