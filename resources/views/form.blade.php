
<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('title', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userMobileHelpBlock',
            'placeholder' => 'Post Title'
        ]) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('body', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userMobileHelpBlock',
            'placeholder' => 'Body'
        ]) !!}
    </div>
</div>

{{ Form::token() }}