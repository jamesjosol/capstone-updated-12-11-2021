<div class="card mb-5 mt-5 card-no-top-btm" id="cardss">
    <div class="card-header" style="height:70px;">
        <h3>Create School Year</h3>
    </div>
    <div class="card-body" id="teacher-card">
        <div class="mb-1 mt-1">
            <div class="col">
                {!! Form::open(["route" => "admin.schoolyear", 'method' => 'post']) !!}
                <div class="row">
                    <div class="col form-group @error('schoolYr_started') has-error @enderror">
                        {!! Form::text('schoolYr_started', null, ['class'=>'form-control datepicker', 'placeholder' => 'School Year Started' , 'required' => '', 'autocomplete'=>'off']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('schoolYr_started') }}</span>    
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group @error('schoolYr_ended') has-error @enderror">
                        {!! Form::text('schoolYr_ended', null, ['class'=>'form-control datepicker', 'placeholder' => 'School Year Ended', 'required' => '', 'autocomplete'=>'off']) !!}
                        <span class="errspan" id="errspan" style="font-size: .5em">{{ $errors->first('schoolYr_ended') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary px-3">Create Shool Year</button> 
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script>
    $(".datepicker").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        orientation: 'auto bottom',
        autoclose: true
    });
</script>
