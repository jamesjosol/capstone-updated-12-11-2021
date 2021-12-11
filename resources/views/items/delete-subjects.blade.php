<!-- Modal -->
<div class="modal fade" id="deleteSubjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="float-right pt-2 pr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
        {!! Form::open(["route" => "admin.subjects", 'method' => 'delete', 'class' => 'mb-2']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'delete-subject-id']) !!}

            <p class=""><i style="font-size: 5em;" class="fal fa-times-circle text-danger"></i></p>
            <h5 style="margin-top:-2%; color: rgb(46, 46, 46)">Delete Subject</h5>
            <p class="container">
                Are you sure you want to delete subject?
            <span id="subject-name"></span>
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
        $(document).on('click', "#delete-subject", function() {
            $(this).addClass('delete-subject-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
            'backdrop': 'static'
            };
            $('#deleteSubjectModal').modal(options)
        })

        $('#deleteSubjectModal').on('show.bs.modal', function() {
            var el = $(".delete-subject-trigger-clicked"); // See how its usefull right here? 

            var id = el.data('subject-id');
            var row = el.closest(".data-row");
            var subjname = row.children(".subjname").text();

            var prevrow = el.parents('tr')
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var subjname = prevrow.prev().children(".subjname").text();
            }
    

            $("#subject-name").text('ID#'+id + ' - ' + subjname);
            $("#delete-subject-id").val(id);
        })
        $('#deleteSubjectModal').on('hide.bs.modal', function() {
            $('.delete-subject-trigger-clicked').removeClass('delete-subject-trigger-clicked')
            $("#subject-name").text('');
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