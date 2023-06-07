<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar Menu -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{route('index')}}" class="nav-link">
                    <i class="nav-icon fa fa-magic"></i>
                    <p>
                        Главная страница
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.categories')}}" class="nav-link">
                    <i class="nav-icon fa fa-book"></i>
                    <p>
                            Категории
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.tags')}}" class="nav-link">
                        <i class="nav-icon fa fa-tag"></i>
                        <p>
                            Теги
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.posts')}}" class="nav-link">
                        <i class="nav-icon fa fa-address-card"></i>
                        <p>
                            Публикации
                        </p>
                    </a>
                </li>
            <li class="nav-item">
                <a href="{{route('admin.users')}}" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
            </ul>
            <div class="nav nav-pills nav-sidebar flex-column">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <input type="submit" class="btn btn-outline-warning ml-3 mt-4" value="Выйти">
            </form>
            </div>
        </div>
    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</aside>