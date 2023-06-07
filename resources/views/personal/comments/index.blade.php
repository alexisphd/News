@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
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
                <div class="row d-flex">
                    <div class="col-9">
                        <div class="card container-fluid">
                            <div class="card-body">
                                <table class="table table-hover text-wrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Публикация</th>
                                        <th>Текст комментария</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($comments))
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{$comment->id}}</td>
                                                <td>{{$comment->post->title}}</td>
                                                <td>{{$comment->text}}</td>
                                                <td><a href="{{route('personal.comments.show', $comment->id)}}"><i
                                                                class="fa fa-eye"></i></a></td>
                                                <td><a href="{{route('personal.comments.edit', $comment->id)}}"
                                                       class="text-green"><i
                                                                class="fa fa-pen"></i></a></td>
                                                <td>
                                                    <form action="{{route('personal.comments.delete', $comment->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fa fa-trash text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection