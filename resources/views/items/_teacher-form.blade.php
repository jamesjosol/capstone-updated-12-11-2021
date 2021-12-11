
    <div class="mb-3 form-group @error('lastName') has-error @enderror">
        {!! Form::label('lastName','LastName',[],false) !!}
        @error('lastName')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
        {!! Form::text('lastName', null, ['class'=>'form-control', 'id'=>'lastName', 'required' => '']) !!}
        <span class="errspan" id="errspan">{{ $errors->first('lastName') }}</span>
    </div>

    <div class="mb-3 form-group @error('firstName') has-error @enderror">
        {!! Form::label('firstName','FirstName',[],false) !!}
        @error('firstName')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
        {!! Form::text('firstName', null, ['class'=>'form-control', 'id'=>'firstName','required' => '']) !!}
        <span class="errspan" id="errspan">{{ $errors->first('firstName') }}</span>
    </div>

    <div class="mb-3 form-group @error('contactNo') has-error @enderror">
        {!! Form::label('contactNo', 'Contact Number',[],false) !!}
        {!! Form::number('contactNo', null, ['class'=>'form-control', 'placeholder'=>'example: 09123....','id'=>'modal-input-contact']) !!}
        <span class="errspan" id="errspan">{{ $errors->first('contactNo') }}</span>
    </div>

    <div class="mb-3 form-group @error('subj_teaching') has-error @enderror">
        {!! Form::label('subj_teaching','Subject Teaching',[],false) !!}
        {!! Form::text('subj_teaching', null, ['class'=>'form-control', 'id'=>'subj_teaching', 'required' => '']) !!}
        <span class="errspan" id="errspan">{{ $errors->first('subj_teaching') }}</span>
    </div>

