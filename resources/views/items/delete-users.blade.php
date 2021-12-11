<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="float-right pt-2 pr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
        {!! Form::open(["route" => "admin.users", 'method' => 'delete', 'class' => 'mb-2']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'delete-user-id']) !!}

            <p class=""><i style="font-size: 5em;" class="fal fa-times-circle text-danger"></i></p>
            <h5 style="margin-top:-2%; color: rgb(46, 46, 46)">Delete User</h5>
            <p class="container">
                Are you sure you want to delete user?
            <span id="user-name"></span>
            </p>
            <div class="d-inline mt-1">
                <button type="submit" class="btn btn-danger px-4 mr-2">YES</button>
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-info px-4 ml-2 text-white">NO</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', "#delete-user", function() {
            $(this).addClass('delete-user-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
            'backdrop': 'static'
            };
            $('#deleteUserModal').modal(options)
        })

        $('#deleteUserModal').on('show.bs.modal', function() {
            var el = $(".delete-user-trigger-clicked"); // See how its usefull right here? 

            var id = el.data('user-id');
            var row = el.closest(".data-row");
            var name = row.children(".username").text();

            var prevrow = el.parents('tr')
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var name = prevrow.prev().children(".username").text();
            }

            $("#user-name").text('ID#'+id + ' - ' + name);
            $("#delete-user-id").val(id);
        })
        $('#deleteUserModal').on('hide.bs.modal', function() {
            $('.delete-user-trigger-clicked').removeClass('delete-user-trigger-clicked')
            $("#user-name").text('');
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