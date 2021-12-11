<div class="mb-4">
    <label for="email" class="form-label">Student's Name</label>
    <div class="row">
        <div class="col form-group reg-form @error('firstName') has-error @enderror">
            {!! Form::text('firstName', null, ['class'=>($errors->has('firstName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'First name', 'required' => '']) !!}
            <span class="errspan" id="errspan">{{ $errors->first('firstName') }}</span>
        </div>
        <div class="col form-group reg-form @error('lastName') has-error @enderror">
            {!! Form::text('lastName', null, ['class'=>($errors->has('lastName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Last name', 'required' => '']) !!}
            <span class="errspan" id="errspan">{{ $errors->first('lastName') }}</span>
        </div>
        <div class="col form-group reg-form @error('middleName') has-error @enderror">
            {!! Form::text('middleName', null, ['class'=>($errors->has('middleName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Middle name', 'required' => '']) !!}
            <span class="errspan" id="errspan">{{ $errors->first('middleName') }}</span>
        </div>
    </div>
</div>
<div class="mb-3 form-group @error('username') has-error @enderror">
    {!! Form::label('username','Username',[],false) !!}
    {!! Form::text('username', null, ['class'=>($errors->has('username') ? 'form-control is-invalid' : 'form-control'), 'id'=>'username', 'required' => '']) !!}
    <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
</div>
<div class="mb-3 form-group @error('email') has-error @enderror">
    {!! Form::label('email','Email',[],false) !!}
    {!! Form::text('email', null, ['class'=>($errors->has('email') ? 'form-control is-invalid' : 'form-control'), 'id'=>'email','required' => '']) !!}
    <span class="errspan" id="errspan">{{ $errors->first('email') }}</span>
</div>
<div class="mb-3 form-group @error('password') has-error @enderror">
    {!! Form::label('password', 'Password',[],false) !!}
    {!! Form::password('password', ['class'=>($errors->has('password') ? 'form-control is-invalid' : 'form-control'),'required' => '']) !!}
    <span class="errspan" id="errspan">{{ $errors->first('password') }}</span>
</div>
<div class="mb-3 form-group @error('password_confirmation') has-error @enderror">
    {!! Form::label('password_confirmation', 'Confirm Password',[],false) !!}
    {!! Form::password('password_confirmation', ['class'=>($errors->has('password_confirmation') ? 'form-control is-invalid' : 'form-control'),'required' => '']) !!}
    <span class="errspan" id="errspan">{{ $errors->first('password_confirmation') }}</span>
</div>
<div class="mb-3 form-group @error('contactNo') has-error @enderror">
    {!! Form::label('contactNo', 'Mobile Number',[],false) !!}
    {!! Form::number('contactNo', null, ['class'=>($errors->has('contactNo') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'example: 09123....','required' => '', 'id'=>'contactNo']) !!}
    <span class="errspan" id="errspan">{{ $errors->first('contactNo') }}</span>
</div>