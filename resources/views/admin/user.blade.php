@extends('template.admin')
@section('content-title')
    <i class="fa fa-users"></i>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Tambah</a>


        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">

            <div class="table-responsive">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Foto</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Enumerator</th>
                            <th>Role</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        @endsection
    </div>
</div>
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: "text-center"
                    },
                    {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        render: function(data) {
                            return '<img src="' + data +
                                '" width="50px" class="img-fluid mx-auto d-block">';
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'enumerator',
                        name: 'enumerator',
                        render: function(data) {
                            if (data === null) {
                                return '-';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        render: function(data) {
                            if (data == 'admin') {
                                return '<div class="badge badge-primary">Admin</div>';
                            } else {
                                return '<div class="badge badge-warning">User</div>';
                            }
                        },
                        className: "text-center"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: "text-center",
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
