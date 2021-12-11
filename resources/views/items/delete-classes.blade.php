<!-- Modal -->
<div class="modal fade" id="deleteClassModal" tabindex="-1" role="dialog" aria-labelledby="deleteClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="float-right pt-2 pr-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
        {!! Form::open(["route" => "admin.classes", 'method' => 'delete', 'class' => 'mb-2']) !!}

            {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'delete-class-id']) !!}

            <p class=""><i style="font-size: 5em;" class="fal fa-times-circle text-danger"></i></p>
            <h5 style="margin-top:-2%; color: rgb(46, 46, 46)">Delete Class</h5>
            <p class="container">
                Are you sure you want to delete class <span id="class-name"></span>?
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
        $(document).on('click', "#delete-class", function() {
            $(this).addClass('delete-class-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
            'backdrop': 'static'
            };
            $('#deleteClassModal').modal(options)
        })

        $('#deleteClassModal').on('show.bs.modal', function() {
            var el = $(".delete-class-trigger-clicked"); // See how its usefull right here? 

            var id = el.data('class-id');
            var row = el.closest(".data-row");
            var subject = row.children(".subjname").text();
            var day = row.children(".schedDay").val();
            var time = row.children(".schedTime").val();

            var prevrow = el.parents('tr')
            // check if is responsive
            if(prevrow.hasClass('child')) {
                var subject = prevrow.prev().children(".subjname").text();
                var day = prevrow.prev().children(".schedDay").val();
                var time = prevrow.prev().children(".schedTime").val();
            }

            const timearr = time.split(":");

            let hours = timearr[0];
            let minutes = timearr[1];
            let ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes.toString().padStart(2, '0');
            let strTime = hours + ':' + minutes + ' ' + ampm;

            $("#class-name").text(subject + ' - ' + day + ' | ' + strTime);
            $("#delete-class-id").val(id);
        })
        $('#deleteClassModal').on('hide.bs.modal', function() {
            $('.delete-class-trigger-clicked').removeClass('delete-class-trigger-clicked')
            $("#class-name").text('');
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