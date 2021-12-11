<div class="modal fade" id="createSectionModal" tabindex="-1" role="dialog" aria-labelledby="createSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header removehr">
            <h5 class="modal-title text-center" id="createSectionModalLabel"><i class="fal fa-school"></i><i class="fas fa-plus"  style="margin-left: -5px; font-size:0.8em;"></i> Create Section</h5>
            <button type="button" class="close" id="create-subject-close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.sections", 'method' => 'post', 'id' => 'createsection-form']) !!}
            <div class="mb-3 form-group @error('name') has-error @enderror">
                {!! Form::label('name','Section Name',[],false) !!}
                @error('name')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('name') }}</span>
            </div>
        
            <div class="mb-3 form-group @error('room') has-error @enderror">
                {!! Form::label('room','Section Room',[],false) !!}
                @error('room')<span class="errspanicon" id="errspanicon"><i class="fal fa-exclamation-circle"></i></span>@enderror
                {!! Form::text('room', null, ['class'=>'form-control', 'id'=>'room','required' => '']) !!}
                <span class="errspan" id="errspan">{{ $errors->first('room') }}</span>
            </div>

            <div class="mb-3 form-group @error('teacher_id') has-error @enderror">
                {!! Form::label('teacher_id','Adviser',[],false) !!}  
                {{Form::select('teacher_id', \App\Models\Teacher::list(), null, ['class'=>'form-control form-select', 'id'=>'teacher_id', 'required' => '', 'placeholder'=>'Select Adviser'])}}
                <span class="errspan" id="errspan">{{ $errors->first('teacher_id') }}</span> 
            </div>

            <div class="mb-3 form-group @error('level_id') has-error @enderror">
                {!! Form::label('level_id','Grade Level',[],false) !!}  
                {{Form::select('level_id', \App\Models\Level::list(), null, ['class'=>'form-control form-select', 'id'=>'level_id', 'required' => '', 'placeholder'=>'Select Grade Level'])}}
                <span class="errspan" id="errspan">{{ $errors->first('level_id') }}</span> 
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary" id="actionBtn" onclick="btnload()">Create Section</button>
            </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    @if (count($errors) > 0)

        $('#createSectionModal').modal({
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