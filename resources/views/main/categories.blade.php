@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="intro-title text-center p-3" data-aos="fade-up">Записи по категории </h3>
            <section>
                <div class="row blog-post-row">
                    @foreach($needed_posts as $np)
                        <div class="col-md-4 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{asset('storage/'.$np->preview_image)}}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{$np->category->title}}</p>
                            <a href="{{route('single.post.show', $np->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$np->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

@endsection