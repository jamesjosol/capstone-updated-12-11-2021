
  <div class="modal fade" id="editTeacherModal" tabindex="-1" role="dialog" aria-labelledby="editTeacherModal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTeacherModal-label"><i class="fas fa-edit"></i> Edit Teacher</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.teachers", 'method' => 'patch', 'id' => 'edit-form']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'modal-input-id']) !!}
            <div class="mb-3 form-group @error('lastName') has-error @enderror">
                {!! Form::label('lastName','LastName',[],false) !!}
                @error('lastName')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('lastName', null, ['class'=>'form-control', 'id'=>'modal-input-lname', 'required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('lastName') }}</span>
            </div>
        
            <div class="mb-3 form-group @error('firstName') has-error @enderror">
                {!! Form::label('firstName','FirstName',[],false) !!}
                @error('firstName')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('firstName', null, ['class'=>'form-control', 'id'=>'modal-input-fname','required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('firstName') }}</span>
            </div>
            
            <div class="mb-3 form-group @error('contactNo') has-error @enderror">
                {!! Form::label('contactNo', 'Contact Number',[],false) !!}
                {!! Form::number('contactNo', null, ['class'=>'form-control', 'placeholder'=>'example: 09123....', 'id'=>'modal-input-contactNo','required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('contactNo') }}</span>
            </div>

            <div class="mb-3 form-group @error('subj_teaching') has-error @enderror">
                {!! Form::label('subj_teaching','Subject Teaching',[],false) !!}
                {!! Form::text('subj_teaching', null, ['class'=>'form-control', 'id'=>'modal-input-subj', 'required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('subj_teaching') }}</span>
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

        $(document).on('click', "#edit-teacher", function() {
            $(this).addClass('edit-teacher-trigger-clicked');

            var options = {
            'backdrop': 'static'
            };
            $('#editTeacherModal').modal(options)
        })

        // on modal show
        $('#editTeacherModal').on('show.bs.modal', function() {
            var el = $(".edit-teacher-trigger-clicked"); 
            var row = el.closest(".data-row");

            var id = el.data('teacher-id');
            var fname = row.children(".fname").text();
            var lname = row.children(".lname").text();
            var subj = row.children(".subj").text();
            var contact = row.children(".contact").text();

            var prevrow = el.parents('tr')
            console.log('prevrow: ',prevrow.prev())
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var fname = prevrow.prev().children(".fname").text();
                var lname = prevrow.prev().children(".lname").text();
                var subj = prevrow.prev().children(".subj").text();
                var contact = prevrow.prev().children(".contact").text();
            }
            console.log('row: ', row)

            $("#modal-input-id").val(id);
            $("#modal-input-fname").val(fname);
            $("#modal-input-lname").val(lname);
            $("#modal-input-subj").val(subj);
            $("#modal-input-contactNo").val(contact);

            console.log(id, fname, lname, subj, contact);

        })

        $('#editTeacherModal').on('hide.bs.modal', function() {
            $('.edit-teacher-trigger-clicked').removeClass('edit-teacher-trigger-clicked')
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