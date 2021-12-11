<div class="card mb-3 mt-3" >
    <div class="card-header" id="enrollment-header">
        <h1>Enroll Subjects</h1>
    </div>
    <div class="card-body">
        <div class="mb-1 mt-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-5 form-group @error('samples') has-error @enderror">
                            {!! Form::label('samples','Choose Classes',[],false) !!}
                            {{Form::select('samples', [
                                1 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                2 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                3 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                4 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                5 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                6 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                7 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                8 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                                9 => 'Mathematics | 8:00 - 9:00 AM | Josefina Pangan',
                            ], null, ['class'=>'form-control form-select selectpicker', 'id'=>'modal-input-samples'])}}
                            <span class="errspan" id="errspan">{{ $errors->first('samples') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


