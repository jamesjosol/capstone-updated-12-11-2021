<div class="mb-5">
    <div class="row">
        <div class="col-md-5">
            <div class="profile-card">
                <div class="row">
                    <div class="col-md-7">
                        <div class="profile">
                            @if(isset($student))
                            <img src="{{asset("images/" . $student->user->profile_pic)}}" id="upload-img">
                            @else 
                            <img src="{{asset('img/pp.png')}}" id="upload-img">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="upload-file">
                            <label for="fileupload">
                                <span class="links-name text-white"><i class="fad fa-camera" style="font-size: 0.95em"></i>{{isset($student) ? 'Change' : 'Upload'}} Photo</span>
                            </label>
                            {{-- <input type="file" id="fileupload"> --}}
                            {!! Form::file('profile_pic', ['id'=>'fileupload', 'accept' => "image/*"]) !!}
                            <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('profile_pic') }}</span>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="mb-1">
    @if (Request::is('admin/students/create') || Request::is('admin/students/edit/'))
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="col form-group @error('user_id') has-error @enderror">
                <label for="user_id" class="form-label">User:</label>
                {{Form::select('user_id', \App\Models\User::usersNotStudent(), null, ['class'=>'form-control form-select', 'id'=>'user_id', 'requiredxxx    ' => '', 'placeholder'=>'Select User'])}}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('user_id') }}</span>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="col form-group @error('firstName') has-error @enderror">
                <label for="firstName" class="form-label">First Name:</label>
                {!! Form::text('firstName', Request::is('admin/students/create') || isset($student) ? null : auth()->user()->firstName, ['class'=>($errors->has('firstName') ? 'form-control is-invalid' : 'form-control'), 'requiredxxx  ' => '']) !!}
                <span class="errspan  " id="errspan">{{ $errors->first('firstName') }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col form-group @error('lastName') has-error @enderror">
                <label for="lastName" class="form-label">Last Name:</label>
                {!! Form::text('lastName', Request::is('admin/students/create') || isset($student) ? null : auth()->user()->lastName, ['class'=>($errors->has('lastName') ? 'form-control is-invalid' : 'form-control'), 'requiredxxx    ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('lastName') }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col form-group @error('middleName') has-error @enderror">
                <label for="middleName" class="form-label">Middle Name:</label>
                {!! Form::text('middleName', Request::is('admin/students/create') || isset($student) ? null : auth()->user()->middleName, ['class'=>($errors->has('middleName') ? 'form-control is-invalid' : 'form-control'), 'requiredxxx    ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('middleName') }}</span>
            </div>
        </div>
    </div>
</div>
<div class="mb-1">
    <div class="row">
        <div class="col-md-2 @error('gender') has-error @enderror">
            {!! Form::label('gender','Gender:',[],false) !!}
            {{Form::select('gender', [
                'Male'   => 'Male',
                'Female' => 'Female',
            ], null, ['class'=>'form-control form-select', 'id'=>'gender'])}}
        </div>
        <div class="col-md-3">
            <div class="col form-group @error('birthDate') has-error @enderror">
                <label for="birthDate" class="form-label">Birth Date:</label>
                {!! Form::date('birthDate', null, ['class'=>'form-control', 'requiredxxx    ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('birthDate') }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col form-group @error('birthPlace') has-error @enderror">
                <label for="birthPlace" class="form-label">Birth Place:</label>
                {!! Form::text('birthPlace', null, ['class'=>($errors->has('birthPlace') ? 'form-control is-invalid' : 'form-control'), 'requiredxxx   ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('birthPlace') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="mb-1">
    <div class="row">
        <label for="address" class="form-label">Address:</label>
        <div class="col-md-4">
            <div class="col form-group @error('barangay') has-error @enderror">
                {!! Form::text('barangay', null, ['class'=>($errors->has('barangay') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Barangay', 'requiredxxx  ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('barangay') }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col form-group @error('town') has-error @enderror">
                {!! Form::text('town', null, ['class'=>($errors->has('town') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Town', 'requiredxxx  ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('town') }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col form-group @error('province') has-error @enderror">
                {!! Form::text('province', null, ['class'=>($errors->has('province') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Province', 'requiredxxx  ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('province') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="mb-1">
    <div class="row">
        <div class="col-md-4">
            <div class="col form-group @error('civilStatus') has-error @enderror">
                <label for="civilStatus" class="form-label">Civil Status:</label>
                {{Form::select('civilStatus', [
                'Single'   => 'Single',
                'Married' => 'Married',
                'Widow' => 'Widow',
                'Widower' => 'Widower',
            ], null, ['class'=>'form-control form-select', 'id'=>'civilStatus', 'requiredxxx    ' => '', 'placeholder'=>'Select Civil Status'])}}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('civilStatus') }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col form-group @error('nationality') has-error @enderror">
                <label for="nationality" class="form-label">Nationality:</label>
                {!! Form::text('nationality', null, ['class'=>($errors->has('nationality') ? 'form-control is-invalid' : 'form-control'),  'requiredxxx     ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('nationality') }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col form-group @error('religion') has-error @enderror">
                <label for="religion" class="form-label">Religion:</label>
                {!! Form::text('religion', null, ['class'=>($errors->has('religion') ? 'form-control is-invalid' : 'form-control'),  'requiredxxx    ' => '']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('religion') }}</span>
            </div>
        </div>
    </div>
</div>
<div class="mb-1">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col form-group @error('fatherName') has-error @enderror">
                    <label for="fatherName" class="form-label">Father:</label><br>
                    {!! Form::text('fatherName', null, ['class'=>($errors->has('fatherName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Father Name', 'requiredxxx     ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('fatherName') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col form-group @error('fatherOccup') has-error @enderror">
                    {!! Form::text('fatherOccup', null, ['class'=>($errors->has('fatherOccup') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Father Occupation', 'requiredxxx  ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('fatherOccup') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col form-group @error('fatherContact') has-error @enderror">
                    {!! Form::text('fatherContact', null, ['class'=>($errors->has('fatherContact') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Father Contact', 'requiredxxx   ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('fatherContact') }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col form-group @error('motherName') has-error @enderror">
                    <label for="motherName" class="form-label">Mother:</label><br>
                    {!! Form::text('motherName', null, ['class'=>($errors->has('motherName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Mother Name', 'requiredxxx     ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('motherName') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col form-group @error('motherOccup') has-error @enderror">
                    {!! Form::text('motherOccup', null, ['class'=>($errors->has('motherOccup') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Mother Occupation', 'requiredxxx  ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('motherOccup') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col form-group @error('motherContact') has-error @enderror">
                    {!! Form::text('motherContact', null, ['class'=>($errors->has('motherContact') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Mother Contact', 'requiredxxx   ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('motherContact') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-1">
    <div class="row">
        <label for="guardianName" class="form-label">Guardian:</label>
        <div class="col-md-5">
            <div class="col form-group @error('guardianName') has-error @enderror">
                {!! Form::text('guardianName', null, ['class'=>($errors->has('guardianName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Guardian Name']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('guardianName') }}</span>
            </div>
        </div>
        <div class="col-md-5">
            <div class="col form-group @error('guardianContact') has-error @enderror">
                {!! Form::text('guardianContact', null, ['class'=>($errors->has('guardianContact') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Guardian Contact']) !!}
                <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('guardianContact') }}</span>
            </div>
        </div>
        
    </div>
</div>

<div class="mt-5">
    <div class="row">
        <label for="elementary" class="form-label">Elementary:</label><br>
        <div class="col-md-12">
            <div class="row">
                <div class="col form-group @error('elemSchool') has-error @enderror">
                    {!! Form::text('elemSchool', null, ['class'=>($errors->has('elemSchool') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Elementary School', 'requiredxxx   ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('elemSchool') }}</span>
                </div>  
            </div>
            <div class="row">
                <div class="col form-group @error('elemSchlAddr') has-error @enderror">
                    {!! Form::text('elemSchlAddr', null, ['class'=>($errors->has('elemSchlAddr') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Elementary School Address', 'requiredxxx     ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('elemSchlAddr') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col form-group @error('elemYrAttnd') has-error @enderror">
                    {!! Form::text('elemYrAttnd', null, ['class'=>($errors->has('elemYrAttnd') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Elementary Year Attend', 'requiredxxx     ' => '']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('elemYrAttnd') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <div class="row">
        <label for="secondary" class="form-label">Secondary:</label><br>
        <div class="col-md-12">
            <div class="row">
                <div class="col form-group @error('secondarySchool') has-error @enderror">
                    {!! Form::text('secondarySchool', null, ['class'=>($errors->has('secondarySchool') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Secondary School']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('secondarySchool') }}</span>
                </div>  
            </div>
            <div class="row">
                <div class="col form-group @error('secondarySchlAddr') has-error @enderror">
                    {!! Form::text('secondarySchlAddr', null, ['class'=>($errors->has('secondarySchlAddr') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Secondary School Address']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('secondarySchlAddr') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col form-group mb-5 @error('secondaryYrAttnd') has-error @enderror">
                    {!! Form::text('secondaryYrAttnd', null, ['class'=>($errors->has('secondaryYrAttnd') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Secondary Year Attend']) !!}
                    <span class="errspan p-info-err-span" id="errspan">{{ $errors->first('secondaryYrAttnd') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary mb-5" id="submitBtn">Submit</button>