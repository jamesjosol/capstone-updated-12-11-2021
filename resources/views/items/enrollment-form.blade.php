<div class="card mb-3 mt-3" >
    <div class="card-header" id="enrollment-header">
        <h1>Program</h1>
    </div>
    <div class="card-body">
        <div class="mb-1 mt-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 form-group @error('level_id') has-error @enderror">
                            {!! Form::label('level_id','Level',[],false) !!}
                            {{Form::select('level_id',\App\Models\Level::list(), $enrollment->level_id ?? '', ['class'=>'form-control form-select level'])}}
                            <span class="errspan" id="errspan">{{ $errors->first('level_id') }}</span>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group @error('student_type') has-error @enderror">
                            {!! Form::label('student_type','Student Type',[],false) !!}
                            {{Form::select('student_type', [
                                'New Student' => 'New Student',
                                'Transferee' => 'Transferee',
                                'Regular Student' => 'Regular Student',
                            ], $enrollment->student_type ?? '', ['class'=>'form-control form-select'])}}
                            <span class="errspan" id="errspan">{{ $errors->first('student_type') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group" id="SeniorHigh-details">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group @error('track') has-error @enderror">
                                {!! Form::label('track','Track',[],false) !!}
                                {{Form::select('track', [
                                    'ACADEMICS' => 'ACADEMICS',
                                ], null, ['class'=>'form-control form-select track'])}}
                                <span class="errspan" id="errspan">{{ $errors->first('track') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-group @error('strand') has-error @enderror">
                                {!! Form::label('strand','Strand',[],false) !!}
                                {{Form::select('strand', [
                                    'ABM' => 'ABM',
                                    'HUMSS' => 'HUMSS',
                                    'GAS' => 'GAS',
                                ], $enrollment->strand ?? '', ['class'=>'form-control form-select strand', 'placeholder'=>'Select strand'])}}
                                <span class="errspan" id="errspan">{{ $errors->first('strand') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="card-header" id="enrollment-header">
    <h1>Documents</h1>
    </div>
    <div class="card-body">
        <div class="mb-1 mt-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3 form-group @error('title') has-error @enderror">
                            {!! Form::label('title', 'Title',[],false) !!}
                            {!! Form::text('title', $enrollment->title ?? '', ['class'=>($errors->has('title') ? 'form-control is-invalid' : 'form-control')]) !!}
                            <span class="errspan docErr" id="errspan">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="mb-3 form-group @error('remarks') has-error @enderror">
                            {!! Form::label('remarks', 'Remarks',[],false) !!}
                            {!! Form::text('remarks', $enrollment->remarks ?? '', ['class'=>($errors->has('remarks') ? 'form-control is-invalid' : 'form-control')]) !!}
                            <span class="errspan docErr" id="errspan">{{ $errors->first('remarks') }}</span>
                        </div>


                        <div class="doc mt-5">
                            <h5 class="doctext">Requirements:</h5>
                        </div>
        
                            @if (isset($enrollment->requirement_images))
                                @foreach(json_decode($enrollment->requirement_images) as $requiredFileImg)
                                    <img alt="Requirement Image" class="p-1 requirementImages" src='{{url("temp/$requiredFileImg")}}'/>
                                @endforeach
                                
                                <div class="input-group control-group increment mt-2" >
                                    <input type="file" name="requiredFile[]" value="" disabled class="form-control">
                                    <span class="errspan" id="errspan">{{ $errors->first('requiredFile') }}</span>
                                </div>
                                <button type="submit" class="btn btn-danger float-end my-2" form="removeimageform"><i class="fas fa-times"></i> Remove Image</button>
                            @else
                                <div class="input-group control-group increment mt-2 @error('requiredFile') has-error @enderror @error('requiredFile.*') has-error @enderror" >
                                    <input type="file" name="requiredFile[]" value="" multiple class="form-control" accept="image/png, image/svg, image/jpeg, image/jpg">
                                </div>
                                <span class="errspan errimgfile" id="errspan">{{ $errors->first('requiredFile') }}</span>
                                <span class="errspan errimgfile" id="errspan">{{ $errors->first('requiredFile.*') }}</span>
                            @endif
                            
                    </div>

                    <div class="col-md-7">
                        <div class="card requirements float-end">
                            <div class="card-body">
                                <h2>Requirements</h2>
                                <p>For New Students & Transferee</p>
                                <ul>
                                    <li>PSA Birth Certificate</li>
                                    <li>Certificate of Good Moral Character</li>
                                    <li>Report Card</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mt-4">
            <div class="col-md-2">
                <button class="btn btn-primary form-control" id="enrollbtn" type="submit" form="enrollment-form">Proceed to Payments <i class="fad fa-chevron-double-right"></i></button> 
            </div>   
        </div>
        
    </div>
</div>