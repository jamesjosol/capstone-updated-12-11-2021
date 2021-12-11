<div class="modal fade" id="createSubjectModal" tabindex="-1" role="dialog" aria-labelledby="createSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header removehr">
            <h5 class="modal-title text-center" id="createSubjectModalLabel"><i class="fal fa-books"></i><i class="fal fa-plus"  style="margin-left: -5px; font-size:0.8em;"></i> Create Subject</h5>
            <button type="button" class="close" id="create-subject-close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.subjects", 'method' => 'post', 'id' => 'createsubject-form']) !!}
            <div class="mb-3 form-group @error('subjectName') has-error @enderror">
                {!! Form::label('subjectName','Subject Name',[],false) !!}
                @error('subjectName')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('subjectName', null, ['class'=>'form-control', 'id'=>'subjectName', 'required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('subjectName') }}</span>
            </div>
        
            <div class="mb-3 form-group @error('subjectDescription') has-error @enderror">
                {!! Form::label('subjectDescription','Subject Description',[],false) !!}
                @error('subjectDescription')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('subjectDescription', null, ['class'=>'form-control', 'id'=>'subjectDescription','required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('subjectDescription') }}</span>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary" id="actionBtn" onclick="btnload()">Create Subject</button>
            </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    @if (count($errors) > 0)
        // var myModal = new bootstrap.Modal(document.getElementById("createSubjectModal"), {});
        // document.onreadystatechange = function () {
        //     myModal.show();
        // };
        $('#createSubjectModal').modal({
            backdrop: 'static',
            keyboard: true, 
            show: true
        });
    @endif
    $(document).on('click', "#create-subject-close-modal", function() {
        @if (count($errors) > 0)
            $('.form-group input').parent().removeClass('has-error');
            $('.form-group input').parent().find('span.errspan').remove()
            $('.form-group input').parent().find('span.errspanicon').remove()
            $("#contactNo").removeAttr('value');
        @endif
    })
</script>