    @if(count($errors)>0)
    <div class="container">
    <div class="row">
    <div class="col">

    @foreach($errors->all() as $error)<!-- all this is function and errors is stitic-->

    <div class="btn btn-danger btn-lg">
    {{$error}}
    </div>
        
    @endforeach
    </div>
    </div>
    </div>
    @endif

 @if(session('success'))<!--stitic-->
 <div class="container">
    <div class="row">
    <div class="col">
 <div class="btn btn-success btn-lg">
 {{session('success')}}
 </div>
 </div>
    </div>
    </div>
 @endif

 @if(session('error'))<!--stitic-->
 <div class="container">
    <div class="row">
    <div class="col">
 <div class="btn btn-danger btn-lg">
 {{session('error')}}
 </div>
 </div>
    </div>
    </div>
 @endif