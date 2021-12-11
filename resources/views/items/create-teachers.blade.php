<div class="modal fade" id="createTeacherModal" tabindex="-1" role="dialog" aria-labelledby="createTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header removehr">
            <h5 class="modal-title text-center" id="createTeacherModalLabel"><i class="fal fa-user-plus"></i> Create Teacher</h5>
            <button type="button" class="close" id="create-teacher-close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(["route" => "admin.teachers", 'method' => 'post', 'id' => 'createteacher-form']) !!}
            @include('items._teacher-form')
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary" id="actionBtn" onclick="btnload()">Create Teacher</button>
            </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    @if (count($errors) > 0)
        // var myModal = new bootstrap.Modal(document.getElementById("createTeacherModal"), {});
        // document.onreadystatechange = function () {
        //     myModal.show();
        // };
        $('#createTeacherModal').modal({
            backdrop: 'static',
            keyboard: true, 
            show: true
        });
    @endif
    $(document).on('click', "#create-teacher-close-modal", function() {
        @if (count($errors) > 0)
            $('.form-group input').parent().removeClass('has-error');
            $('.form-group input').parent().find('span.errspan').remove()
            $('.form-group input').parent().find('span.errspanicon').remove()
            $("#contactNo").removeAttr('value');
        @endif
    })
</script>