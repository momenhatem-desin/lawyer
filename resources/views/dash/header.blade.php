<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme Admin </title>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('public/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('public/dash/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- Sidebar CSS-->
  <link href="{{asset('public/dash/css/sidebar-menu.css')}}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{asset('public/css/app.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('public/dash/css/dash.css')}}" rel="stylesheet" type="text/css">

  
</head>
<?php
       
       if (isset($_GET['color'])) {
           $maincolor= $_GET['color'];
           setcookie('Background',$maincolor,time()+3600,'/');
       }else{
           if (isset($_COOKIE['Background'])) {
               $maincolor=$_COOKIE['Background'];}
       }

       if (isset($_GET['theme'])) {
        $theme= $_GET['theme'];
        setcookie('themes',$theme,time()+3600,'/');
         }else{
            if (isset($_COOKIE['themes'])) {
               $theme=$_COOKIE['themes'];}
           }

       ?>
<body class="<?php if (isset($maincolor)) {}elseif(isset($theme)){echo "bg-theme bg-" . $theme;} else {echo "bg-theme bg-theme1";}?>" style="background-color: <?php echo $maincolor ?? ''; ?>">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true" >
     <div class="brand-logo">
      <a href="{{route('dashboard')}}">
       <img src="{{asset('public/dash/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text hidden-sm">Dashtreme Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li class="">
        <a href="{{route('dashboard')}}">
        <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="drop">
        <a href="#">
          <span>  Category</span>
          <i class="fas fa-book"></i>
          <ul class="dropdown dropdown-menu-right list-unstyled">
            <li> <a href="{{route('category.create')}}"> Create </a></li>
            <li> <a href="{{route('category')}}">category </a></li>
            
          </ul>
        </a>
      </li>
      <li class="drop">
        <a href="#">
        <i class="fas fa-upload"></i> <span>Posts</span>
          <ul class="dropdown dropdown-menu-right list-unstyled">
            <li> <a href="{{route('aposts.index')}}"> Post </a></li>
            <li> <a href="{{route('aposts.create')}}">Create</a> </li>
            <li> <a href="{{route('comment')}}">Comments</a> </li>
            <li> <a href="{{route('aposts.trashed')}}">post delete</a></li>

          </ul>
        </a>
      </li>

      <li class="drop">
        <a href="#">
        <i class="fas fa-tags"></i> <span>Tags</span>
          <ul class="dropdown dropdown-menu-right list-unstyled">
            <li> <a href="{{route('tags')}}"> tags </a></li>
            <li> <a href="{{route('tags.create')}}">Create</a> </li>
          </ul>
        </a>
      </li>

     
      @if(Auth::user()->admin)

      <li class="drop">
        <a href="#">
        <i class="fas fa-user-friends"></i> <span>users</span>
          <ul class="dropdown dropdown-menu-right list-unstyled">
            <li> <a href="{{route('users.index')}}"> users </a></li>
            <li> <a href="{{route('users.create')}}">Create</a> </li>
          </ul>
        </a>
      </li>

    
      <li>
        <a href="{{route('settings')}}" >
        <i class="fas fa-tools"></i> <span> Settings</span>
        </a>
      </li>
@endif

      

      <li>
        <a href="{{route('contact')}}">
        <i class="fas fa-mail-bulk"></i> <span>Mail</span>
         
        </a>
      </li>

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->

<?php
        
        if (isset($_GET['delete'])) {
          setcookie('Background_nav',"",time()-3600,'/');// do delet cookie
          setcookie('Background',"",time()-3600,'/');// do delet cookie
          setcookie('themes',"",time()-3600,'/');// do delet cookie
      }
       
        if (isset($_GET['color_nav'])) {
            $nav= $_GET['color_nav'];
            setcookie('Background_nav',$nav,time()+3600,'/');
        }else{
            if (isset($_COOKIE['Background_nav'])) {
                $nav=$_COOKIE['Background_nav'];}
        }
        ?>

<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top" style="background-color: <?php echo $nav ?? ''; ?>">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item one">
      <a class="nav-link toggle-menu" href="javascript:void();">
      <i class="fas fa-5 fa-compass"></i>
     </a>
    </li>
    <li class="nav-item two">
      <form class="search-bar" method="Get" action="{{route('aposts.search')}}">
      {{csrf_field()}}
        <input type="text" class="form-control"  name="search" placeholder="Enter keywords" Style="color:#fff;">
         <i class="icon-magnifier"></i>
      </form>
    </li>
    <li class="three"> <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
     <?php if (isset(Auth::user()->profile->avatar)) {?>
     <span class="user-profile"><img src="{{Auth::user()->profile->avatar}}" class="img-circle" alt="user avatar"></span>
    <?php }else{?>
      <i class="fas fa-user-friends"></i>
   <?php }?>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
          
           <?php if (isset(Auth::user()->profile->avatar)) {?>
            <div class="avatar"><img class="align-self-start mr-3" src="{{Auth::user()->profile->avatar}}" alt="user avatar"></div>
            <?php }?>
  
            <div class="media-body">
            <h6 class="mt-2 user-title"></h6>
            <p class="user-subtitle">{{Auth::user()->email}}</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class=""></i> <a href="{{route('users.profile',['id'=> Auth::user()->id])}}"> .... Profile</a> </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item">
        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        
      </ul></li>

  </ul>
     
 
    </li>
  </ul>
</nav>

</header>

           
<!--End topbar header-->

<div class="clearfix"></div>
