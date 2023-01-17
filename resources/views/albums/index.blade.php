
@extends('layout.metronic')

@section('content')
<div class="card" style="margin: 8px;
padding: 2px;">
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet p-5">
<div class="kt-portlet p-2">
    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
        <thead>
            <tr>
                <th style="margin-left:30px;">ID </th>
                <th>Name </th>
                <th>Action </th>
            </tr>
        </thead>
    </table>
</div>
</div>
</div>
</div>
    <!--begin::Page Vendors(used by this page) -->
    @endsection
    @section('js')
    <script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
   
    <script>
        var KTDatatablesDataSourceAjaxServer = function() {
            var initTable1 = function() {
                var table = $('#kt_table_1');
                // begin first table
                table.DataTable({
                    responsive: true,
                    processing: true,
                    searching:false,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('album.albumDatatable') }}",
                        data: function(d) {
                            d.title = $('#title').val();
                            d.owner = $('#owner').val();
                        }
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'action'
                        }
                    ]
                });
                $('#name').keyup(function() {
                    table.DataTable().draw();
                });
                $('#owner').change(function() {
                    table.DataTable().draw();
                });
                $('#kt_table_1 tbody').on('click', '.delete', function() {
                    var value = $(this).attr("value");
                    console.log(value)
                    Swal.fire({
                        title: ' سيتم مسح الحجز بكافة سنداته ان وجد   ',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'تأكيد !'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('album.albumdelete') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'تم مسح الحجز بنجاح',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        table.DataTable().draw();
                                    }
                                },
                                error: function(reject) {
                                    console.log(reject)
                                }
                            })
                        }
                    })
                    // console.log($(this).attr("value"));
                });
            };
            return {
                //main function to initiate the module
                init: function() {
                    initTable1();
                },
            };
        }();
        jQuery(document).ready(function() {
            KTDatatablesDataSourceAjaxServer.init();
        });
    </script>
@endsection