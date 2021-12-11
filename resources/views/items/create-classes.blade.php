<div class="modal fade" id="createClassModal" tabindex="-1" role="dialog" aria-labelledby="createClassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header removehr">
            <h5 class="modal-title text-center" id="createClassModalLabel"><i class="fal fa-book-reader"></i><i class="fas fa-plus"  style="margin-left: -5px; font-size:0.8em;"></i> Create Class</h5>
            <button type="button" class="close" id="create-class-close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.classes", 'method' => 'post', 'id' => 'createClass-form']) !!}
            <div class="mb-3 form-group @error('subject_id') has-error @enderror">
                {!! Form::label('subject_id','Subject',[],false) !!}  
                {{Form::select('subject_id', \App\Models\Subject::list(), null, ['class'=>'form-control form-select', 'id'=>'subject_id', 'required' => '', 'placeholder'=>'Select Subject'])}}
                <span class="errspan" id="errspan">{{ $errors->first('subject_id') }}</span> 
            </div>

            <div class="mb-3 form-group @error('teacher_id') has-error @enderror">
                {!! Form::label('teacher_id','Teacher',[],false) !!}  
                {{Form::select('teacher_id', \App\Models\Teacher::list(), null, ['class'=>'form-control form-select', 'id'=>'teacher_id', 'required' => '', 'placeholder'=>'Select Teacher'])}}
                <span class="errspan" id="errspan">{{ $errors->first('teacher_id') }}</span> 
            </div>

            <div class="mb-4">
                <div class="row">
                    <div class="col form-group @error('schedule') has-error @enderror">
                        {!! Form::label('schedule','Schedule',[],false) !!}
                        @error('schedule')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                        {!! Form::text('schedule', null, ['class'=>'form-control', 'id'=>'schedule','required' => '']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('schedule') }}</span>    
                    </div>
                    <div class="col form-group @error('time') has-error @enderror">
                        {!! Form::label('time','Time',[],false) !!}
                        @error('time')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                        {!! Form::time('time', 'null', ['class'=>'form-control', 'id'=>'time','required' => '']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('time') }}</span>    
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary" id="actionBtn" onclick="btnload()">Create Class</button>
            </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    @if (count($errors) > 0)

        $('#createClassModal').modal({
            backdrop: 'static',
            keyboard: true, 
            show: true
        });
    @endif
    $(document).on('click', "#create-class-close-modal", function() {
        @if (count($errors) > 0)
            $('.form-group input').parent().removeClass('has-error');
            $('.form-group input').parent().find('span.errspan').remove()
            $('.form-group input').parent().find('span.errspanicon').remove()
        @endif
    })
</script>