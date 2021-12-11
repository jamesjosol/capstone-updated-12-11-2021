
  <div class="modal fade" id="editSectionModal" tabindex="-1" role="dialog" aria-labelledby="editSectionModal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editSectionModal-label"><i class="fas fa-edit"></i> Edit Section</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.sections", 'method' => 'patch', 'id' => 'edit-form']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'modal-input-id']) !!}


            <div class="mb-3 form-group @error('name') has-error @enderror">
                {!! Form::label('name','Section Name',[],false) !!}
                @error('name')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'modal-input-section', 'required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('name') }}</span>
            </div>
        
            <div class="mb-3 form-group @error('room') has-error @enderror">
                {!! Form::label('room','Section Room',[],false) !!}
                @error('room')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('room', null, ['class'=>'form-control', 'id'=>'modal-input-room','required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('room') }}</span>
            </div>

            <div class="mb-3 form-group @error('teacher_id') has-error @enderror">
                {!! Form::label('teacher_id','Adviser',[],false) !!}  
                {{Form::select('teacher_id', \App\Models\Teacher::list(), null, ['class'=>'form-control form-select', 'id'=>'modal-input-teacher', 'required' => '', 'placeholder'=>'Select Adviser'])}}
                <span class="errspan" id="errspan">{{ $errors->first('teacher_id') }}</span> 
            </div>
        
            <div class="mb-3 form-group @error('level_id') has-error @enderror">
                {!! Form::label('level_id','Grade Level',[],false) !!}  
                {{Form::select('level_id', \App\Models\Level::list(), null, ['class'=>'form-control form-select', 'id'=>'modal-input-level', 'required' => '', 'placeholder'=>'Select Grade Level'])}}
                <span class="errspan" id="errspan">{{ $errors->first('level_id') }}</span> 
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

        $(document).on('click', "#edit-section", function() {
            $(this).addClass('edit-section-trigger-clicked');

            var options = {
            'backdrop': 'static'
            };
            $('#editSectionModal').modal(options)
        })

        // on modal show
        $('#editSectionModal').on('show.bs.modal', function() {
            var el = $(".edit-section-trigger-clicked"); 
            var row = el.closest(".data-row");

            var id = el.data('section-id');
            var section = row.children(".section").text();
            var room = row.children(".room").text();
            var teacher = row.children(".teacher").val();
            var level = row.children(".level").val();

            var prevrow = el.parents('tr')
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var section = prevrow.prev().children(".section").text();
                var room = prevrow.prev().children(".room").text();
                var teacher = prevrow.prev().children(".teacher").val();
                var level = prevrow.prev().children(".level").val();
            }

            $("#modal-input-id").val(id);
            $("#modal-input-section").val(section);
            $("#modal-input-room").val(room);
            $("#modal-input-teacher").val(teacher);
            $("#modal-input-level").val(level);

        })

        $('#editSectionModal').on('hide.bs.modal', function() {
            $('.edit-section-trigger-clicked').removeClass('edit-section-trigger-clicked')
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