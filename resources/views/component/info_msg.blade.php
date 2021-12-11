@if($error = Session::get('Error'))
<script>
    $(document).ready(function(){
       $("#msg_modal").modal("show"); 
    });
    
    setTimeout(function(){
       $("#msg_modal").modal("hide")
    }, 3000);
 </script>
 
<div class="modal fade bd-example-modal-sm" id="msg_modal" tabindex="-1" role="dialog" aria-labelledby="success_reg_modal" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center">
        <div class="modal-content">
            <p class="mt-3"><i style="font-size: 5em;" class="fal fa-times-circle text-danger"></i></p>
            <h5 style="margin-top:-3%; color: rgb(46, 46, 46)">Error</h5>
            <p class="text-dark">{{ $error }}</p>
            <p><button type="button" data-dismiss="modal" aria-label="Close" class="btn ok-close-btn">OK</button></p>
        </div>
        
    </div>
</div>

@endif

@if(Session::get('status') == 'We have emailed your password reset link!' || Session::get('status') == 'Your password has been reset!' || Session::get('status') == 'Your account has been verified.')
{{$message = Session::get('status')}}
<script>
    $(document).ready(function(){
       $("#success_msg_modal").modal("show"); 
    });
    
    setTimeout(function(){
       $("#success_msg_modal").modal("hide")
    }, 3000);
 </script>
 
<div class="modal fade bd-example-modal-sm" id="success_msg_modal" tabindex="-1" role="dialog" aria-labelledby="success_reg_modal" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center">
        <div class="modal-content">
            <p class="mt-3 fw-lighter"><i style="font-size: 5em;" class="fal fa-check-circle text-success fw-lighter"></i></p>
            <h5 style="margin-top:-3%; color: rgb(46, 46, 46)">Success</h5>
            <p class="mx-2">{{ $message }}</p>
            <p><button type="button" data-dismiss="modal" aria-label="Close" class="btn ok-close-btn">OK</button></p>
        </div>
    </div>
</div>

@endif


@if($message = Session::get('Message'))

<script>

    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true,
        // "positionClass": "toast-bottom-right",
    }
    toastr.success("{{ session('Message') }}", "", {"iconClass": 'custom-success'});

    // $(document).ready(function(){
    //    $("#success_msg_modal").modal("show"); 
    // });

    // $(document).ready(function(){
    //    $("#success_msg_modal").modal("show"); 
    // });
    
    // setTimeout(function(){
    //    $("#success_msg_modal").modal("hide")
    // }, 3000);
 </script>
 
<div class="modal fade bd-example-modal-sm" id="success_msg_modal" tabindex="-1" role="dialog" aria-labelledby="success_reg_modal" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center">
        <div class="modal-content">
            <p class="mt-3 fw-lighter"><i style="font-size: 5em;" class="fal fa-check-circle text-success fw-lighter"></i></p>
            <h5 style="margin-top:-3%; color: rgb(46, 46, 46)">Success</h5>
            <p class="mx-2">{{ $message }}</p>
            <p><button type="button" data-dismiss="modal" aria-label="Close" class="btn ok-close-btn">OK</button></p>
        </div>
    </div>
</div>

@endif