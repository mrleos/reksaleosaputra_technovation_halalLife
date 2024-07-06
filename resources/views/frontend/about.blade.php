@extends('app')

@section('banner')

<div class="container-xxl py-5 bg-dark hero-header mb-3">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Forum</h1>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <form class="d-flex" role="search" method="POST" action="{{ route('search') }}">
    @csrf
    <a href="{{ route('profile.edit') }}"><img src="https://bootdey.com/img/Content/user_1.jpg" class="align rounded-circle mx-2" alt="user profile image" style="width: 40px"></a>
    <input class="form-control me-2 rounded-pill" type="search" placeholder="Add a post" aria-label="Search" name="search">
    <button class="btn btn-outline-primary rounded-pill" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
    </form>
</div>
<hr>

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
                            <a href="#"><b>Brian cartelly</b></a>
                            made a post.
                        </div>
                        <h6 class="text-muted time">5 seconds ago</h6>
                    </div>
                </div>
                <div class="post-image">
                    <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" class="image" alt="image post">
                </div>
                <div class="post-description">
                    <p>Put here your foto description</p>
                    <div class="stats">
                        <button class="btn btn-outline-primary rounded-pill" type="submit"><i class="fa fa-thumbs-up icon"></i> 137</button>
                        <button class="btn btn-outline-primary rounded-pill" type="submit"><i class="fa fa-comment icon"></i>128</button>
                    </div>
                </div>
                <div class="post-footer">
                    <div class="input-group"> 
                        <input class="form-control rounded-pill" placeholder="Add a comment" type="text">
                        <span class="input-group-addon px-1">
                            <a href="#" class="btn btn-outline-primary rounded-pill"><i class="fa fa-2x fa-edit"></i></a>  
                        </span>
                    </div>
                    <ul class="comments-list">
                        <li class="comment d-flex shadow rounded-3" style="margin-bottom:1rem">
                            <a href="#">
                                <img class="avatar rounded-circle" src="https://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                            </a>
                            <div class="comment-body">
                                <div class="comment-heading">
                                    <h4 class="user">Full name 1</h4>
                                    <h5 class="time">7 minutes ago</h5>
                                </div>
                                <p>This is a comment bla bla bla</p>
                            </div>
                        </li>
                        <li class="comment d-flex shadow rounded-3" style="margin-bottom:1rem">
                            <a class="" href="#">
                                <img class="avatar rounded-circle" src="https://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                            </a>
                            <div class="comment-body">
                                <div class="comment-heading">
                                    <h4 class="user">Full name 1</h4>
                                    <h5 class="time">7 minutes ago</h5>
                                </div>
                                <p>This is a comment bla bla bla</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </di>
</div>  
@endsection