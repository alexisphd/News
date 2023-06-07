<section class="fetured-post-section">
    <div class="row">
        <div class="col-md-12 sidebar" data-aos="fade-left">
            <div class="widget widget-post-carousel">
                <h5 class="widget-title">Популярные </h5>
                <div class="post-carousel">
                    <div id="carouselId" class="carousel slide" data-ride="carousel">
                        {{--                         <ol class="carousel-indicators">
                                                     <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                                     <li data-target="#carouselId" data-slide-to="1"></li>
                                                     <li data-target="#carouselId" data-slide-to="2"></li>
                                                 </ol>--}}
                        <div class="carousel-inner" role="listbox">
                            @foreach($popular_posts as $k=>$p)
                                <figure class="carousel-item  {{$k==1?'active':''}}">
                                    <img src="{{asset('storage/'.$p->preview_image)}}" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="#!">{{$p->title}}</a>
                                    </figcaption>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>