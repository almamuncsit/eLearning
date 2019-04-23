@extends('layouts.website')

@section('content')



<div class="container">

    <div class="row clearfix">
        
        <div class="col-md-4">
                @foreach ($lesson->course->sections as $section)
                <div class="mb-2">
                    <ul class="list-group">
                        <li class="list-group-item active"> {{ $section->title }} </li>
                        @foreach ($section->lessons as $lsn)
                            <li class="list-group-item"> 
                                <a href="{{ route('lesson-details', [$lsn->id, str_slug($lsn->title)] ) }}">
                                    {{ $lsn->title }}
                                </a>
                            </li>
                        @endforeach  
                    </ul>
                </div>
            @endforeach
        </div>


        <div class="col-md-8">
            <h1> {{ $lesson->title }} </h1> 
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $lesson->video_url }}" allowfullscreen></iframe>
            </div>
            <div class="mt-4">
                {!! $lesson->description !!}
            </div>

            <div>
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
                    s.src = 'https://elearning-6.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                                        
            </div>

        </div>
    </div>

</div>




@endsection
