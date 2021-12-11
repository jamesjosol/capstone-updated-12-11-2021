<div class="row">
    <div class="col-md-12">
        <table id="example" class="table table-striped table-hover table-bordered display nowrap" cellspacing="0" width="100%";>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SY Started</th>
                    <th>SY Ended</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schoolyears as $schoolyear)
                <tr class="data-row @if($schoolyear->status == 'active') currentYr @endif">
                    <td>{{$schoolyear->id}}</td>
                    <td class="start">{{$schoolyear->schoolYr_started}}</td>
                    <td class="end">{{$schoolyear->schoolYr_ended}}</td>
                    <td>
                        @if ($schoolyear->status == 'inactive')
                        <span class="badge border bg-secondary p-2">inactive</span>
                        @elseif ($schoolyear->status == 'active')
                        <span class="badge border bg-success p-2">Current Year</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($schoolyear->status == 'inactive')
                            <div class="btn btn-outline-primary tooltip-actbtn" id="edit-sy" data-sy-id="{{$schoolyear->id}}">Set as current
                                <div class="top">
                                    <p class="tooltiptxt">Set</p>
                                </div>
                            </div>
                            <div class="btn btn-outline-danger tooltip-actbtn"  id="delete-sy" data-sy-id="{{$schoolyear->id}}"><i class="fas fa-times"></i>
                                <div class="top">
                                    <p class="tooltiptxt">Delete</p>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>SY Started</th>
                    <th>SY Ended</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>


