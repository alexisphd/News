<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar Menu -->
        <div class="sidebar">
            <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('index')}}" class="nav-link">
                        <i class="nav-icon fa fa-magic"></i>
                        <p>
                            Главная страница
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.comments')}}" class="nav-link">
                        <i class="nav-icon fa fa-sticky-note"></i>
                        <p>
                            Комментарии
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.likes')}}" class="nav-link">
                        <i class="nav-icon fa fa-heart"></i>
                        <p>
                            Избранное
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