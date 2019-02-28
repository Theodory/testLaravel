@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @role('Admin')

                       {!! Form::model($post, [
                            'method' => 'PATCH',
                            'route' => ['update', $post->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include('form')

                        <div class="col-md-12">

                          {!!
                             Form::button(
                                 'Edit Post',
                                 [
                                 'type' => 'submit',
                                 'class' => 'btn btn-primary',
                                 'title' => 'Edit',
                             ])
                         !!}
                        </div>
                        {!! Form::close() !!}

                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
