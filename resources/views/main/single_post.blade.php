@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                • {{$date->translatedFormat('D d-F-Y')}}
                • Комментарии: {{$post->comments->count()}} </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'. $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->text !!}
                    </div>
                </div>
            </section>
            <section>
                <div class="d-flex justify-content-around">
                    @guest()

                        <i class="fa{{ $post->likes_count ? 's':'r'}} fa-heart">
                            <span>{{$post->likes_count}}</span>
                        </i>
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
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if(!empty($related_posts))
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">По данной категории</h2>
                            <div class="row">
                                @foreach($related_posts as $rp)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{asset('storage/'.$rp->preview_image)}}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{$rp->category->title}}</p>
                                        <a href="{{route('single.post.show', $rp->id)}}"><h5
                                                    class="post-title">{{$rp->title}}</h5></a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    @if(!empty($post->comments))
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Комментарии</h2>
                            <div class="row">
                                @foreach($post->comments as $comment)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <p class="post-category">{{$comment->text}}</p>
                                        <span> Оставил: <i class="post-title">{{$comment->user->name}}</i></span>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    @auth()
                        <section class="comment-section mt-4">
                            <h2 class="section-title mb-5" data-aos="fade-up">Оставьте комментарий</h2>
                            <form action="{{route('single.post.store', $post->id)}}" method="post">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Комментарий</label>
                                        <textarea name="text" id="comment" class="form-control"
                                                  placeholder="Комментарий"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Оставить комментарий" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection