@section('mytitle', '| Dashboard')

@extends('layouts.app')

@section('content')
<div class="container">

    @include('component.user-sidebar')
    @include('component.info_msg')
    <div class="dashboard-content">
        <div class="text">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row justify-content-center mt-4">
                            <div class="col">
                                <div>
                                    
                                    <div>
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        {{ __('You are logged in!') }}
                                    </div>

                                    @if (auth()->user()->email_verified_at == null)
                                    <div class="alert alert-warning d-flex align-items-center" role="alert" id="alertbtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        <div>
                                            Your email is not verified yet.
                                        </div>    
                                    </div>
                                    @endif

                                    @if (auth()->user()->student()->exists())
                                        asdasda
                                            
                                    @else
                                    <div>
                                        <div class="alert alert-warning d-flex align-items-center" role="alert" id="alertbtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div>
                                                You still didn't have fill up your personal information
                                            </div>    
                                        </div>

                                        <a href="{{ route('user.personalinfo') }}" class="btn btn-primary">Click here to Fill up</a>

                                    </div>    
                                    @endif
                                                                    
                                </div>
                            </div>
                        </div>
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
        $('#example').DataTable();
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );        
    </script>
</div>
@endsection
