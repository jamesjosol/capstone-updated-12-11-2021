
  <div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editSubjectModal-label"><i class="fas fa-edit"></i> Edit Subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.subjects", 'method' => 'patch', 'id' => 'edit-form']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'modal-input-id']) !!}
            <div class="mb-3 form-group @error('subjectName') has-error @enderror">
                {!! Form::label('subjectName','Subject Name',[],false) !!}
                @error('subjectName')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('subjectName', null, ['class'=>'form-control', 'id'=>'modal-input-subjname', 'required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('subjectName') }}</span>
            </div>
        
            <div class="mb-3 form-group @error('subjectDescription') has-error @enderror">
                {!! Form::label('subjectDescription','Subject Description',[],false) !!}
                @error('subjectDescription')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('subjectDescription', null, ['class'=>'form-control', 'id'=>'modal-input-subjdesc','required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('subjectDescription') }}</span>
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

        $(document).on('click', "#edit-subject", function() {
            $(this).addClass('edit-subject-trigger-clicked');

            var options = {
            'backdrop': 'static'
            };
            $('#editSubjectModal').modal(options)
        })

        // on modal show
        $('#editSubjectModal').on('show.bs.modal', function() {
            var el = $(".edit-subject-trigger-clicked"); 
            var row = el.closest(".data-row");

            var id = el.data('subject-id');
            var subjname = row.children(".subjname").text();
            var subjdesc = row.children(".subjdesc").text();

            var prevrow = el.parents('tr')
            console.log('prevrow: ',prevrow.prev())
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var subjname = prevrow.prev().children(".subjname").text();
                var subjdesc = prevrow.prev().children(".subjdesc").text();
            }

            $("#modal-input-id").val(id);
            $("#modal-input-subjname").val(subjname);
            $("#modal-input-subjdesc").val(subjdesc);

        })

        $('#editSubjectModal').on('hide.bs.modal', function() {
            $('.edit-subject-trigger-clicked').removeClass('edit-subject-trigger-clicked')
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