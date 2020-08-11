@extends("admin.layouts.app")


@section("content")
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="caption">
                                <i class="fa fa-globe"></i> Students
                                <div class="actions pull-right">
                                    <a href="{{ route("student.create") }}" class="btn btn-primary">
                                        <i class="fa fa-plus"></i>
                                        <span class="hidden-480">Add Student </span>
                                    </a>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">
                            @include('admin.shared.messages')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="user-datatable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th >Age</th>
                                        <th >Gender</th>
                                        <th>Birth Date</th>
                                        <th>Pin</th>
                                        <th>Program</th>
                                        <th>Session</th>
                                        <th>Department</th>
                                        <th >Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection


@section("styles")

@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var $datatable = $('#user-datatable');
            var table = $datatable.DataTable({
                scrollResize: true,
                scrollY: window.innerHeight-400,
                scrollCollapse: true,
                pageResize: true,
                scrollX:true,
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data":"age"},
                    {"data":"gender"},
                    {"data":"dob"},
                    {"data":"pin"},
                    {"data":"program","name":"program.name"},
                    {"data":"session_type","name":"session_type.name"},
                    {"data":"department","name":"department.name"},
                    {
                        "data": "id",
                        "className": "center",
                        "render": function(id){
                            var s = '<a class="btn btn-info btn-sm" href="{{ url("/student" ) }}/'+id+'/edit"><i class="fa fa-edit"></i> View/Edit</a>&nbsp;';
                            s = s + `<button class="btn btn-sm btn-danger" onclick="deleteObj(${id})"><i class="fa fa-trash-o"></i> Delete</button>`;
                            s+=`<form id="form`+id+`" style="display:none" action="/student/${id}" method="POST">@csrf @method("DELETE")</form>`;
                            return s;
                        }
                    }
                ],
                'processing': true,
                'stateSave': false,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route("student-list-ajax") }}',
                    'type': 'POST'
                },
                'order': [[ 0, 'desc' ]],
                'columnDefs': [
                    { "orderable": false, "targets": [-1] },
                    { "searchable": false, "targets": [-1] }
                ]
            });
            $( table.table().container() ).removeClass( 'form-inline' );
            setInterval( function () {

                let page = table.page.info().page;
                let scrollTop =$('.dataTables_scrollBody').scrollTop();
                if(page===0 && scrollTop===0 && document.readyState=="complete" && $.active === 0)
                    table.ajax.reload();
            }, 5000 );
        });

        function deleteObj(id) {

            if(window.confirm("Are You Sure ... ?")){
                $('#form'+id).submit();
            }
        }
    </script>
@endsection
