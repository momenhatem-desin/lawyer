<!-- start  navbar -->

        <?php
        
        if (isset($_GET['delete'])) {
          setcookie('Background_nav',"",time()-3600,'/');// do delet cookie
          setcookie('Background',"",time()-3600,'/');// do delet cookie
      }
       
        if (isset($_GET['color_nav'])) {
            $nav= $_GET['color_nav'];
            setcookie('Background_nav',$nav,time()+3600,'/');
        }else{
            if (isset($_COOKIE['Background_nav'])) {
                $nav=$_COOKIE['Background_nav'];}
        }
        ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: <?php echo $nav ?? ''; ?>">
  <div class="container">
  <a class="navbar-brand" href="{{route('index')}}">
  <span>Home</span>
  <?php // echo $_SERVER['HTTP_REFERER'];
  ?>
    <span class="color-hide">Page</span>
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
    
  </button>
  <div class="collapse navbar-collapse" id="main-nav">
    <ul class="navbar-nav ml-auto">
    <li  class="nav-item"><a href="/dashboard" class="nav-link">dash</a></li>
    <li class="nav-item dropdown">
      <a class= "nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         Category
     </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
       <a class="dropdown-item" href="{{route('category.create')}}">
        Create
       </a>
       <a class="dropdown-item" href="{{route('category')}}">
         category
       </a>
      <div class="dropdown-divider"></div>
     </div>
    </li>

    <li class="nav-item dropdown">
    <a class= "nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    posts
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
    <a class="dropdown-item" href="{{route('aposts.create')}}">
     Create
    </a>
    <a class="dropdown-item" href="{{route('aposts.index')}}">
     posts
    </a>
    <a class="dropdown-item" href="{{route('comment')}}">
     Comments
    </a>
    <a class="dropdown-item" href="{{route('contact')}}">
     contact
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{route('aposts.trashed')}}">
     post soft delete
    </a>
    </div>
    </li>
    <li class="nav-item dropdown">
      <a class= "nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         tags
     </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
       <a class="dropdown-item" href="{{route('tags')}}">
        tags
       </a>
       <a class="dropdown-item" href="{{route('tags.create')}}">
       Create
       </a>
      <div class="dropdown-divider"></div>
     </div>
    </li>
  @if(Auth::user()->admin)
    <li class="nav-item dropdown">
      <a class= "nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         users
     </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
       <a class="dropdown-item" href="{{route('users.index')}}">
        users
       </a>
       <a class="dropdown-item" href="{{route('users.create')}}">
         create
       </a>
      <div class="dropdown-divider"></div>
     </div>
    </li>

    <li class="nav-item dropdown">
      <a class= "nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         Settings
     </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
       <a class="dropdown-item" href="{{route('settings')}}">
        Show
       </a>
     </div>
    </li>

@endif
    </ul>
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('users.profile',['id'=> Auth::user()->id])}}">
                                      Profile
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
  </div>
  </div>
</nav>
 <!-- end  navbar -->
