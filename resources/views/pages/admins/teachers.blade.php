@section('mytitle', '| Teacher list')

@extends('layouts.app')

@section('content')

<div class="wrapper">
	
    @include('component.sidebar')
    @include('component.info_msg')
    @include('items.create-teachers')
    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row p-3">
                    <h1 class="fw-light" id="dashusers"><i class="fad fa-chalkboard-teacher"></i> Teacher list</h1>
                    <div class="mb-3">
                        <button class="btn btn-outline-primary float-end px-3" data-backdrop="static" data-toggle="modal" data-target="#createTeacherModal">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> New Teacher
                        </button>
                    </div>
                    <div class="col-md-12 offset-md-0 mb-5 p-5 card-table">
                        <table id="example" class="table table-striped table-hover table-bordered display nowrap" cellspacing="0" width="100%";>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Subject Teaching</th>
                                    <th>Contact No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                <tr class="data-row">
                                    <td>{{$teacher->id}}</td>
                                    <td class="lname">{{$teacher->lastName}}</td>
                                    <td class="fname">{{$teacher->firstName}}</td>
                                    <td class="subj">{{$teacher->subj_teaching}}</td>
                                    <td class="contact">{{$teacher->contactNo}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-primary tooltip-actbtn" href="{{route('admin.students.view', ['student' => "$teacher->id"])}}"><i class="far fa-eye"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">View</p>
                                            </div>
                                        </a>
                                        
                                        <div class="btn btn-outline-success tooltip-actbtn" id="edit-teacher" data-teacher-id="{{$teacher->id}}"><i class="fas fa-pencil-alt"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">Edit</p>
                                            </div>
                                        </div>

                                        <div class="btn btn-outline-danger tooltip-actbtn"  id="delete-teacher" data-teacher-id="{{$teacher->id}}"><i class="fal fa-user-times"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">Delete</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Subject Teaching</th>
                                    <th>Contact No.</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('items.edit-teachers')
    @include('items.delete-teachers')

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
            responsive: true
        });
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );        
    </script>

</div>
@endsection