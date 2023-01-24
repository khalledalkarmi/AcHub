@extends('admin.master')
@section('content')
    {{--{{dd($courses)}}--}}
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>All Courses</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">All Courses</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!--Courses Table-->

        <section class="section ">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">

                    <div class="card border rounded">
                        <div class="card-body">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Trainer</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $c)
                                    @php
                                        $trainer = \App\Models\User::find($c['user_id'])
                                    @endphp
                                    <tr id="{{$c['id']}}">
                                        <th scope="row" >{{$c['id']}}</th>
                                        <td>{{$c['title']}}</td>
                                        <td>{{$c['category']}}</td>
                                        <td>{{$trainer['name']}}</td>
                                        <td>{{$c['start_at']}}</td>
                                        <td>{{$c['end_at']}}</td>
                                        <td>
                                            <i class="ri ri-edit-2-fill text-success"></i>
                                            <i class="ri ri-delete-bin-7-fill text-danger" onclick="deleteCourses({{$c['id']}})"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- End CCourses Table -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        function deleteCourses(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // TODO: delete course from database
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success',
                        document.getElementById(id).remove()

                    )
                }
            })
        }

    </script>
@endsection
