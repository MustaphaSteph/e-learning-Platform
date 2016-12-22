@extends('course.yield')

@section('class','single-blog')


@section('content')


    <div id="content" class="site-content">
        <div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/placeholder/blog-title.jpg">
            <div class="container">
                <h1>Blog Details</h1>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span class="current">Blogs Details</span></li>
                    </ul>
                </div><!-- .breadcrumb -->
            </div><!-- .container -->
        </div><!-- .page-title -->
        <div class="container">
            <div class="row">
                <main id="main" class="site-main col-md-12">
                    <div class="row">
                        <article class="col-md-12 post">
                            <div class="inner-post">
                                <div class="post-thumb shadow">
                                    <img src="/images/{{$blog->picture}}" alt="" />
                                </div><!-- .post-thumb -->

                                <div class="post-info">
                                    <h2 class="post-title">Top 10 Universities have the best quality</h2>

                                    <ul class="post-meta">
                                        <li><a href="#"><i class="fa fa-clock-o"></i> {{$blog->created_at}}</a></li>
                                        <li><a href="#"><i class="fa fa-user"></i> {{$blog->user->name}}</a></li>
                                        <li><a href="#"><i class="fa fa-eye"></i> 16</a></li>
                                    </ul>

                                    <div class="post-desc">
                                            {!!$blog->content!!}
                                    </div>

                                    <div class="entry-footer">
                                        <div class="row">
                                            <div class="col-md-7 col-sm-7 col-xs-7">
													<span class="tags-links">Tags:
														<a rel="tag" href="#">business</a>,
														<a rel="tag" href="#">biological</a>,
														<a rel="tag" href="#">e-book</a>
													</span>
                                            </div>

                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="single-share">
                                                    <span>Share:</span>
                                                    <div class="socials">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .single-share -->
                                            </div>
                                        </div><!-- .row -->
                                    </div>
                                </div><!-- .post-info -->
                            </div><!-- .inner-post -->
                        </article>
                    </div>

                    <div class="comments-area" id="comments">

                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                             var disqus_config = function () {
                             this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                             this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                             };
                             */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = '//codetogrowth.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                    </div><!-- .comments-area -->
                </main><!-- .site-main -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-content -->

@endsection

@section('js')
    <script id="dsq-count-scr" src="//codetogrowth.disqus.com/count.js" async></script>
@endsection