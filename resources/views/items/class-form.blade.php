<div class="card mb-5 mt-5" id="cardsss">
    <div class="card-header" style="height:70px;">
        <h1 class="form-title">Class Form</h1>
    </div>
    <div class="card-body" id="class-card">
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

        <div class="mb-3 form-group @error('subject_id') has-error @enderror">
            {!! Form::label('subject_id','Subject ID',[],false) !!}
            {{Form::select('subject_id', [
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
            ], null, ['class'=>'form-control form-select', 'id'=>'modal-input-subject_id'])}}
            <span class="errspan" id="errspan">{{ $errors->first('subject_id') }}</span>
        </div>

        <div class="mb-4">
            <div class="row">
                <div class="col form-group @error('schedule') has-error @enderror">
                    {!! Form::label('schedule','Schedule',[],false) !!}
                    @error('schedule')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                    {!! Form::text('schedule', null, ['class'=>'form-control', 'id'=>'schedule','required' => '']) !!}
                    <span class="errspan" id="errspan">{{ $errors->first('schedule') }}</span>    
                </div>
                <div class="col form-group @error('time') has-error @enderror">
                    {!! Form::label('time','Time',[],false) !!}
                    @error('time')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                    {!! Form::time('time', null, ['class'=>'form-control', 'id'=>'time','required' => '']) !!}
                    <span class="errspan" id="errspan">{{ $errors->first('time') }}</span>    
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary form-control">Submit</button> 
        </div>
        
    </div>
    
</div>


