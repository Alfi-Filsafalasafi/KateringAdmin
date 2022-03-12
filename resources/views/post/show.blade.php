@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-8 col-md-offset-2 ">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{$post ->title}} | <small>{{ $post->category->name }}</small>
                            
                        </div>
                        <div class="panel-body">
                            <p>{{ $post -> content }}</p>
                        </div> 
                    </div>
           
                    <div class="panel panel-default">
                        <div class="panel-heading">tambahkan Komentar</div>

                            @foreach($post->comments()->get() as $comment)   
                                <div class="panel-body">
                                    <h4>{{$comment->user->name}} - {{$comment->created_at->diffForHumans() }}</h4>
                                    <p>{{$comment->message }}</p>
                                </div>
                            @endforeach

                            <div class="panel-body">
                                <form action="{{ route('post.comment.store', $post) }}" method="POST" class="form-horizontal">

                                {{ csrf_field() }}
                                <textarea  name="message" cols="30" rows="5" class="form-control"  placeholder =" Berikan Komentar ......"></textarea>
                            
                                <input type="submit" value="Komentar" class="btn btn-primary">
                                </form>
                            </div>
                        </div> 
                    </div>
           </div>
           
       </div>
    </div>
@endsection