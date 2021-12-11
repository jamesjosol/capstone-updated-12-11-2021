
  <div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="editClassModal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editClassModal-label"><i class="fas fa-edit"></i> Edit Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.classes", 'method' => 'patch', 'id' => 'edit-form']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'modal-input-id']) !!}

            <div class="mb-3 form-group @error('subject_id') has-error @enderror">
                {!! Form::label('subject_id','Subject',[],false) !!}  
                {{Form::select('subject_id', \App\Models\Subject::list(), null, ['class'=>'form-control form-select', 'id'=>'modal-input-subject', 'required' => '', 'placeholder'=>'Select Subject'])}}
                <span class="errspan" id="errspan">{{ $errors->first('subject_id') }}</span> 
            </div>

            <div class="mb-3 form-group @error('teacher_id') has-error @enderror">
                {!! Form::label('teacher_id','Teacher',[],false) !!}  
                {{Form::select('teacher_id', \App\Models\Teacher::list(), null, ['class'=>'form-control form-select', 'id'=>'modal-input-teacher', 'required' => '', 'placeholder'=>'Select Teacher'])}}
                <span class="errspan" id="errspan">{{ $errors->first('teacher_id') }}</span> 
            </div>
        
            <div class="mb-4">
                <div class="row">
                    <div class="col form-group @error('schedule') has-error @enderror">
                        {!! Form::label('schedDay','Schedule',[],false) !!}
                        {!! Form::text('schedDay', null, ['class'=>'form-control', 'id'=>'modal-input-day','required' => '']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('schedDay') }}</span>    
                    </div>
                    <div class="col form-group @error('schedTime') has-error @enderror">
                        {!! Form::label('schedTime','Time',[],false) !!}
                        {!! Form::time('schedTime', 'null', ['class'=>'form-control', 'id'=>'modal-input-time','required' => '']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('schedTime') }}</span>    
                    </div>
                </div>
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

        $(document).on('click', "#edit-class", function() {
            $(this).addClass('edit-class-trigger-clicked');

            var options = {
            'backdrop': 'static'
            };
            $('#editClassModal').modal(options)
        })

        // on modal show
        $('#editClassModal').on('show.bs.modal', function() {
            var el = $(".edit-class-trigger-clicked"); 
            var row = el.closest(".data-row");

            var id = el.data('class-id');
            var teacher = row.children(".teacher").val();
            var subject = row.children(".subject").val();
            var day = row.children(".schedDay").val();
            var time = row.children(".schedTime").val();

            var prevrow = el.parents('tr')
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var teacher = prevrow.prev().children(".teacher").val();
                var subject = prevrow.prev().children(".subject").val();
                var day = prevrow.prev().children(".schedDay").val();
                var time = prevrow.prev().children(".schedTime").val();
            }
            
            $("#modal-input-id").val(id);
            $("#modal-input-teacher").val(teacher);
            $("#modal-input-subject").val(subject);
            $("#modal-input-day").val(day);
            $("#modal-input-time").val(time);

        })

        $('#editClassModal').on('hide.bs.modal', function() {
            $('.edit-class-trigger-clicked').removeClass('edit-class-trigger-clicked')
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