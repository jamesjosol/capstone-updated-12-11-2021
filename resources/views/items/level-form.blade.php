<div class="card mb-5 mt-5" id="cardss">
    <div class="card-header" style="height:70px;">
        <h1 class="form-title">Level Form</h1>
    </div>
    <div class="card-body" id="teacher-card">
        <div class="mb-1 mt-1">
            <div class="row">
                <div class="mb-3 form-group @error('level') has-error @enderror">
                    {!! Form::label('level','Level',[],false) !!}
                    {{Form::select('level', [
                        7 => 'Grade 7',
                        8 => 'Grade 8',
                        9 => 'Grade 9',
                        10 => 'Grade 10',
                        11 => 'Grade 11',
                        12 => 'Grade 12',
                    ], null, ['class'=>'form-control form-select', 'id'=>'modal-input-level'])}}
                    <span class="errspan" id="errspan">{{ $errors->first('level') }}</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary form-control">Submit</button> 
        </div>
        
    </div>
    
</div>


