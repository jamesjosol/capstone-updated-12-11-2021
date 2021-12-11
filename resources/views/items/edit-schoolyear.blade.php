<!-- Modal -->
<div class="modal fade" id="editSYModal" tabindex="-1" role="dialog" aria-labelledby="editSYModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="float-right pt-2 pr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
        {!! Form::open(["route" => "admin.schoolyear", 'method' => 'patch', 'class' => 'mb-2']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'edit-sy-id']) !!}

            <p class=""><i style="font-size: 5em;" class="fal fa-question-circle text-info"></i></p>
            <h5 style="margin-top:-2%; color: rgb(46, 46, 46)">Confirmation</h5>
            <p class="container">
                Are you sure you want to set <span id="schoolyear"></span> as current school year?
            </p>
            <div class="d-inline mt-1">
                <button type="submit" class="btn btn-info text-white px-4 mr-2">YES</button>
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary px-4 ml-2">NO</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', "#edit-sy", function() {
            $(this).addClass('edit-sy-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
            'backdrop': 'static'
            };
            $('#editSYModal').modal(options)
        })

        $('#editSYModal').on('show.bs.modal', function() {
            var el = $(".edit-sy-trigger-clicked"); // See how its usefull right here? 

            var id = el.data('sy-id');
            var row = el.closest(".data-row");
            var start = row.children(".start").text();
            var end = row.children(".end").text();

            var prevrow = el.parents('tr')
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var start = prevrow.prev().children(".start").text();
                var end = prevrow.prev().children(".end").text();
            }

            $("#schoolyear").text(start + ' - ' + end);
            $("#edit-sy-id").val(id);
        })
        $('#editSYModal').on('hide.bs.modal', function() {
            $('.edit-sy-trigger-clicked').removeClass('edit-sy-trigger-clicked')
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