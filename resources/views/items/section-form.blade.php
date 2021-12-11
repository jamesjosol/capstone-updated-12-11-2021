<div class="card mb-5 mt-5" id="cardss">
    <div class="card-header" style="height:70px;">
        <h1 class="form-title">Section Form</h1>
    </div>
    <div class="card-body" id="teacher-card">
        
        <div class="mb-3 form-group @error('teacher_id') has-error @enderror">
            {!! Form::label('teacher_id','Teacher ID',[],false) !!}
            {{Form::select('teacher_id', [
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
            ], null, ['class'=>'form-control form-select', 'id'=>'modal-input-teacher_id'])}}
            <span class="errspan" id="errspan">{{ $errors->first('teacher_id') }}</span>
        </div>

        <div class="mb-3 form-group @error('level_id') has-error @enderror">
            {!! Form::label('level_id','Level ID',[],false) !!}
            {{Form::select('level_id', [
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
            ], null, ['class'=>'form-control form-select', 'id'=>'modal-input-level_id'])}}
            <span class="errspan" id="errspan">{{ $errors->first('level_id') }}</span>
        </div>

        <div class="mb-3 form-group @error('name') has-error @enderror">
            {!! Form::label('name','Name',[],false) !!}
            @error('name')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
            {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name','required' => '']) !!}
            <span class="errspan" id="errspan">{{ $errors->first('name') }}</span>
        </div>

        <div class="mb-3 form-group @error('room') has-error @enderror">
            {!! Form::label('room', 'Room',[],false) !!}
            {!! Form::number('room', null, ['class'=>'form-control','required' => '', 'id'=>'modal-input-contact']) !!}
            <span class="errspan" id="errspan">{{ $errors->first('room') }}</span>
        </div>


        <div class="form-group">
            <button class="btn btn-primary form-control">Submit</button> 
        </div>
        
    </div>
    
</div>


