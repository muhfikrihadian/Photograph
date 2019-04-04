@extends('layouts.gallery')
@section('title','Jepret.Id')
@section('content')
<div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Welcome To {{ Auth::user()->name}} Gallery
      </h1>

      <div class="row">
      @if(isset($posts))
      @foreach($posts as $post)
        <div class="col-lg-4 col-sm-6 portfolio-item wow bounce">
          <div class="card h-100">
            <a href="{{route('post', ['id' => $post->id])}}"><img class="card-img-top" src="{{ asset('upload/'.$post->file)}}" alt=""></a>
            <div class="card-body">
              <h5 class="card-title">
                {{ $post->caption }}
              </h5>
              <p class="card-text">{{ $post->description }}</p>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>

@endsection