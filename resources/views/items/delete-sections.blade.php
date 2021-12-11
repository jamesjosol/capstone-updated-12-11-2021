<!-- Modal -->
<div class="modal fade" id="deleteSectionModal" tabindex="-1" role="dialog" aria-labelledby="deleteSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="float-right pt-2 pr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
        {!! Form::open(["route" => "admin.sections", 'method' => 'delete', 'class' => 'mb-2']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'delete-section-id']) !!}

            <p class=""><i style="font-size: 5em;" class="fal fa-times-circle text-danger"></i></p>
            <h5 style="margin-top:-2%; color: rgb(46, 46, 46)">Delete Section</h5>
            <p class="container">
                Are you sure you want to delete section <span id="section-name"></span>?
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
        $(document).on('click', "#delete-section", function() {
            $(this).addClass('delete-section-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
            'backdrop': 'static'
            };
            $('#deleteSectionModal').modal(options)
        })

        $('#deleteSectionModal').on('show.bs.modal', function() {
            var el = $(".delete-section-trigger-clicked"); // See how its usefull right here? 

            var id = el.data('section-id');
            var row = el.closest(".data-row");
            var section = row.children(".section").text();

            var prevrow = el.parents('tr')
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var section = prevrow.prev().children(".section").text();
            }

            $("#section-name").text(section);
            $("#delete-section-id").val(id);
        })
        $('#deleteSectionModal').on('hide.bs.modal', function() {
            $('.delete-section-trigger-clicked').removeClass('delete-section-trigger-clicked')
            $("#section-name").text('');
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