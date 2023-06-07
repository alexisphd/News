@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Назад</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
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
                        <form class="w-25" action="{{route('admin.users.store')}}"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <label for="user_name">Имя</label>
                                <input class="form-control" type="text" id="user_name" name="name">
                                @error('name')
                                <div class="text-danger">Это поле нужно заполнить!</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="user_email">Почта</label>
                                <input class="form-control" type="email" id="user_email" name="email">
                                @error('email')
                                <div class="text-danger">Это поле нужно заполнить! {{$message}}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                 <label for="password">Пароль</label>
                                 <input class="form-control" type="password" id="password" name="password">
                                 @error('password')
                                 <div class="text-danger">Это поле нужно заполнить!</div>
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <label for="confirm">Подтвердите пароль</label>
                                 <input class="form-control" type="password" id="confirm" name="password_confirmation">
                                 @error('password_confirmation')
                                 <div class="text-danger">Это поле нужно заполнить!</div>
                                 @enderror
                             </div>--}}
                            <div class="form-group">
                                <label>Роль</label>
                                <select class="select2" data-placeholder="Выбрать роль"
                                        style="width: 100%;" name="role">
                                    @foreach($roles as $key => $role)
                                        <option value="{{$key}}">{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
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