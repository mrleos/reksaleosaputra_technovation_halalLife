@extends('app')

@section('banner')

<div class="container-xxl py-5 bg-dark hero-header mb-3">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Forum</h1>
    </div>
</div>
@endsection

@section('content')  
  <!-- Modal Post -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Postingan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="modal-body">
            <input type="hidden" name='user_id' value="{{ Auth::user()->id }}">
            <div class="input-group mb-3">
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Deskripsi" class="form-control rounded-3"></textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control rounded-3" name="image">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary rounded-pill">Kirim</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<form action="{{ route('post.search') }}" method="post">
@csrf
<div class="container d-flex">
    <a href="{{ route('profile.edit') }}"><img src="https://bootdey.com/img/Content/user_1.jpg" class="align rounded-circle mx-2" alt="user profile image" style="width: 40px"></a>
    <input class="form-control me-2 rounded-pill" type="search" placeholder="Cari Postingan" aria-label="Search" name="search">
    <button class="btn btn-outline-primary rounded-pill" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    <button class="btn btn-outline-primary rounded-pill mx-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-circle-plus"></i></button>
</div>
</form>
<hr>

@forelse ($post as $item)
<div class="container bootstrap snippets bootdey my-3">
    <di class="col-md-8">
        <div class="col-sm-12">
            <div class="panel panel-white post panel-shadow rounded-3">
                <div class="post-heading d-flex">
                    <div class="pull-left image">
                        <a href="{{ route('profile.edit') }}"><img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar rounded-circle" alt="user profile image"></a>
                    </div>
                    <div class="pull-left meta">
                        <div class="title">
                            <a href="#"><b>{{ $item->user->name }}</b></a>
                            made a post.
                        </div>
                        <h6 class="text-muted time">{{ $item->updated_at->diffForHumans() }}</h6>
                    </div>
                </div>
                @if ($item->image != '')
                    <div class="post-image">
                        <img src="{{ asset('storage/'.$item->image) }}" class="image" alt="image post">
                    </div>
                @else
                @endif
                <div class="post-description">
                    <p>{{ $item->description }}</p>
                    <div class="stats d-flex">
                        <form action="{{ route('post.like', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-primary rounded-pill like-button mx-1" type="submit">
                                <i class="fa fa-thumbs-up icon"></i> <span class="like-count">{{ $item->likes->count() }}</span>
                            </button>
                        </form>
                        <a class="btn btn-outline-primary rounded-pill" href="" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}"><i class="fa fa-comment icon"></i>{{ $item->commentsCount() }}</a>
                    </div>
                </div>
            </div>
        </div>
    </di>
</div> 

  {{-- Modal Comment --}}
  <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Komentar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul>
                @forelse ($item->post_comment as $com)
                <li class="comment d-flex shadow rounded-3" style="margin-bottom:1rem">
                    <img class="avatar rounded-circle" src="https://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                    <div class="comment-body">
                        <div class="comment-heading">
                            <h5 class="user">{{ $com->user->name }}</h5>
                            <h6 class="text-muted time">{{ $com->updated_at->diffForHumans() }}</h6>
                        </div>
                        <p>{{ $com->message }}</p>
                    </div>
                </li>
                @empty
                Belum ada komentar
                @endforelse
            </ul>
        </div>
        <form action="{{ route('commentPost.store', $item->id) }}" method="POST">
        @csrf
        <div class="modal-footer">
            <div class="input-group"> 
                <input class="form-control rounded-pill" placeholder="Add a comment" type="text" name="message">
                <span class="input-group-addon px-1">
                    <button type="submit" class="btn btn-outline-primary rounded-pill"><i class="fa fa-edit"></i></button>  
                </span>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@empty
<div class="text-center">
Postingan Tidak Ditemukan!
</div>
@endforelse

@endsection