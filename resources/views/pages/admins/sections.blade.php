@section('mytitle', '| Sections')

@extends('layouts.app')

@section('content')

<div class="wrapper">
	
    @include('component.sidebar')
    @include('component.info_msg')
    @include('items.create-sections')
    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row p-3">
                    <h1 class="fw-light" id="dashusers"><i class="fad fa-school"></i> Sections</h1>
                    <div class="mb-3">
                        <button class="btn btn-outline-primary float-end px-3" data-backdrop="static" data-toggle="modal" data-target="#createSectionModal">
                            <i class="fal fa-school"></i><i class="fas fa-plus"  style="margin-left: -2px; font-size:0.8em;"></i>  New Section
                        </button>
                    </div>
                    <div class="col-md-12 offset-md-0 mb-5 p-5 card-table">
                        <table id="example" class="table table-striped table-hover table-bordered display nowrap" cellspacing="0" width="100%";>
                            <thead>
                                <tr>
                                    <th>Section Name</th>
                                    <th>Room</th>
                                    <th>Adviser</th>
                                    <th>Grade Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr class="data-row">
                                    <td class="section">{{$section->name}}</td>
                                    <td class="room">{{$section->room}}</td>
                                    <input type="hidden" name="" class="teacher" value="{{$section->teacher->id}}">
                                    <td>{{$section->teacher->firstName}} {{$section->teacher->lastName}}</td>
                                    <input type="hidden" name="" class="level" value="{{$section->level->id}}">
                                    <td>{{$section->level->level}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-primary tooltip-actbtn" href="{{route('admin.students.view', ['student' => "$section->id"])}}"><i class="far fa-eye"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">View</p>
                                            </div>
                                        </a>
                                        
                                        <div class="btn btn-outline-success tooltip-actbtn" id="edit-section" data-section-id="{{$section->id}}"><i class="fas fa-pencil-alt"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">Edit</p>
                                            </div>
                                        </div>

                                        <div class="btn btn-outline-danger tooltip-actbtn"  id="delete-section" data-section-id="{{$section->id}}"><i class="fal fa-user-times"></i>
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
                                    <th>Section Name</th>
                                    <th>Room</th>
                                    <th>Adviser</th>
                                    <th>Grade Level</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('items.edit-sections')
    @include('items.delete-sections')

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