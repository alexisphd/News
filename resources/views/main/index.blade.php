@extends('layouts.main')
@section('content')

    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Новости</h1>
            @include('main.slider')
            <section class="featured-posts-section">
                <h5>Текущие новости</h5>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{asset('storage/'.$post->preview_image)}}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{$post->category->title}}</p>

                                @guest()

                                    <i class="fa{{ $post->likes_count ? 's':'r'}} fa-heart">
                                        <span>{{$post->likes_count}}</span></i>
                                @endguest
                                @auth()
                                    <form action="{{route('single.post.like', $post->id)}}" method="post">
                                        @csrf
                                        <button class="btn border-0 bg-transparent" type="submit">

                                            <i class="fa{{auth()->user()->likedPosts->contains($post->id) ? 's':'r'}} fa-heart">
                                                <span>{{$post->likes_count}}</span>
                                            </i>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                            <a href="{{route('single.post.show', $post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="m-auto pb-4">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
        </div>
    </main>

@endsection