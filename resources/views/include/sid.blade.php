<!-- start slider -->

    <div class="container">
                    <div class="exclusive-posts">
                          
                            <div class='marquee' data-speed='80000'
                                 data-gap='0' data-duplicated='true' data-direction="">
                                 @foreach($posts as $post)
                                    <a href="/post/{{$post->id}}"> 
                                       
                                    <span class="circle-marq">
                                    {{$post->subject}}  
                                    <img src="/storage/post_image/{{$post->post_image}}" alt="image"  class="img-thumbnail"> 
                                    </span>
                                   
                                    </a>
                                    @endforeach
                           
                        </div>
                    </div>
                </div>
            
   <!-- end  slider -->
        