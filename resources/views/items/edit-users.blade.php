
  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="edit-modal-label"><i class="fas fa-edit"></i> Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.users", 'method' => 'patch', 'id' => 'edit-form']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'modal-input-id']) !!}
            <div class="mb-4">
                <label for="email" class="form-label">Student's Name</label>
                <div class="row">
                    <div class="col form-group @error('firstName') has-error @enderror">
                        {!! Form::text('firstName', null, ['class'=>'form-control', 'placeholder'=>'First name', 'required' => '', 'id'=>'modal-input-fname']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('firstName') }}</span>
                    </div>
                    <div class="col form-group @error('lastName') has-error @enderror">
                        {!! Form::text('lastName', null, ['class'=>'form-control', 'placeholder'=>'Last name', 'required' => '', 'id'=>'modal-input-lname']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('lastName') }}</span>
                    </div>
                    <div class="col form-group @error('middleName') has-error @enderror">
                        {!! Form::text('middleName', null, ['class'=>'form-control', 'placeholder'=>'Middle name', 'required' => '', 'id'=>'modal-input-mname']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('middleName') }}</span>
                    </div>
                </div>
            </div>
            <div class="mb-3 form-group @error('username') has-error @enderror">
                {!! Form::label('username','Username',[],false) !!}
                {!! Form::text('username', null, ['class'=>'form-control', 'id'=>'modal-input-username', 'required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
            </div>
            <div class="mb-3 form-group @error('email') has-error @enderror">
                {!! Form::label('email','Email',[],false) !!}
                {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'modal-input-email','required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('email') }}</span>
            </div>
            <div class="mb-3 form-group @error('password') has-error @enderror">
                {!! Form::label('password', 'Password',[],false) !!}
                {!! Form::password('password', ['class'=>'form-control','placeholder'=>"leave blank if you don't want to change password"]) !!}
                <span class="errspan" id="errspan">{{ $errors->first('password') }}</span>
            </div>
            <div class="mb-3 form-group @error('contactNo') has-error @enderror">
                {!! Form::label('contactNo', 'Mobile Number',[],false) !!}
                {!! Form::number('contactNo', null, ['class'=>'form-control', 'placeholder'=>'example: 09123....','required' => '', 'id'=>'modal-input-contact']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('contactNo') }}</span>
            </div>
            <div class="mb-3 form-group @error('role') has-error @enderror">
                {!! Form::label('role','Role',[],false) !!}
                {{Form::select('role', [
                    2 => 'Normal',
                    1 => 'Administrator',
                ], null, ['class'=>'form-control form-select', 'id'=>'modal-input-role'])}}
                <span class="errspan" id="errspan">{{ $errors->first('role') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" id="actionBtn" onclick="btnload()" type="submit">Done</button>
            </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $(document).on('click', "#edit-user", function() {
            $(this).addClass('edit-user-trigger-clicked');

            var options = {
            'backdrop': 'static'
            };
            $('#edit-modal').modal(options)
        })

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
            var el = $(".edit-user-trigger-clicked") 
            var row = el.closest(".data-row");

            var id = el.data('user-id');
            var fname = row.children(".fname").val();
            var lname = row.children(".lname").val();
            var mname = row.children(".mname").val();
            var username = row.children(".username").text();
            var email = row.children(".email").text();
            var contact = row.children(".contact").text();
            var role = row.children(".role").val();
            
            var prevrow = el.parents('tr')
            console.log('prevrow: ',prevrow.prev())
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var fname = prevrow.prev().children(".fname").val();
                var lname = prevrow.prev().children(".lname").val();
                var mname = prevrow.prev().children(".mname").val();
                var username = prevrow.prev().children(".username").text();
                var email = prevrow.prev().children(".email").text();
                var contact = prevrow.prev().children(".contact").text();
                var role = prevrow.prev().children(".role").val();
            }

            console.log('row: ', row)
            
            console.log(id, fname, lname, role)
           
            // alert(fname)
            $("#modal-input-id").val(id);
            $("#modal-input-fname").val(fname);
            $("#modal-input-lname").val(lname);
            $("#modal-input-mname").val(mname);
            $("#modal-input-username").val(username);
            $("#modal-input-email").val(email);
            $("#modal-input-contact").val(contact);
            $("#modal-input-role").val(role);

        })

        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-user-trigger-clicked').removeClass('edit-user-trigger-clicked')
            $("#edit-form").trigger("reset");
        })
       
    })
</script>

<style>
.modal-header {
    border-bottom: 0 none;
}

.modal-footer {
    border-top: 0 none;
}
</style>