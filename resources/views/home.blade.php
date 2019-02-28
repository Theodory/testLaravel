@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                  <example-component/>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @role('Admin')
                       {!! Form::open([
                            'route' => 'store'
                        ])!!}

                       {{-- {!! Form::model($user, [
                            'method' => 'PATCH',
                            'route' => ['users.update', $user->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!} --}}

                        @include('form')

                        <div class="col-md-12">

                          {!!
                             Form::button(
                                 'Submit',
                                 [
                                 'type' => 'submit',
                                 'class' => 'btn btn-primary',
                                 'title' => 'Submit',
                             ])
                         !!}
                        </div>
                        {!! Form::close() !!}

                        <hr>
                        @foreach($posts as $p)
                            <div class="list-group">
                              <a href="#" class="list-group-item list-group-item-action active">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1">{{$p->title}}</h5>
                                  <small>3 days ago</small>
                                </div>
                                <p class="mb-1">{{$p->body}}</p>
                              <a class="btn btn-xs btn-primary" href="{{url('edit/'.$p->id)}}">Edit</a>
                              </a>
                            </div>
                        @endforeach
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
