@section('mytitle', '| Approve Student Page')
    
@extends('layouts.app')

@section('content')

<div class="wrapper">
	
    @include('component.sidebar')

    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        @include('items.approved-enrolee-form')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let btn = document.querySelector("#btn-menu");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function(){
            sidebar.classList.toggle("active");
        }

        jQuery(document).ready(function($) {
        $('#example').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 0 }
            ],
            responsive: true,
        });
        
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );   

        /** CheckBox / Button Validation */
        $('.check_uncheck:checkbox').click(function () {
            var checked = !$(this).data('checked');
            $('input:checkbox').prop('checked', checked);
            $('.delete:button').prop('disabled', !checked)
            $(this).data('checked', checked);
            if (checked == true) {
                $(this).val('Uncheck All');
            } else if (checked == false) {
                $(this).val('Check All');
            }
        });
        
        /** Checked checkbox when checkbox td clicked */
        $(".checkbox-td").click(function(e) {
            var chk = $(this).closest("tr").find("input:checkbox").get(0);
            if(e.target != chk)
            {
                chk.checked = !chk.checked;
            }
            $('.delete:button').prop('disabled', $('input:checkbox:checked').length == 0)
        });
    </script>

</div>
@endsection