<x-app-layout>
    <form method="post" action="{{ route('facebook.save')}}">
        @csrf
        <div class="container">
            <div class="col-md-12">
                <!-- This is where new rows will be appended -->
                <div id="facebook_data">
                    <!-- Initial Row -->
                    <div class="row" id="row_1">
                        <div class="col-md-3">
                            <div class="titleInput">Facebook Username(Username):
                                <span><input class="form-control" type="text" name="f_name[]"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="titleInput">Facebook Profile Link:
                                <span><input class="form-control" type="text" name="f_p_link[]"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="titleInput">No of Friends:
                                <input type="number" name="f_friends[]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary add_more_btn" data-row-id="1"><i
                                    class="fa fa-plus"> Add</i></button>
                        </div>
                    </div>
                </div>

                <div class="text-center"><button class="btn btn-secondary">Save</button></div>
            </div>

            <div class="card">
                <div class="card-header">Facebook Information <span>
                        <form method="POST" action="{{ route('facebook.search') }}">
                            @csrf
                            <input type="text" name="name" placeholder="Search by first name" value="{{ old('name') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>


                    </span></div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-responsive striped">
                        <tr>
                            <th>s.n</th>
                            <th>Facebook username</th>
                            <th>Facebook profile link</th>
                            <th>no of friends in Facebook</th>
                            <th>#</th>
                        </tr>
                        @php $i = 1; @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $d->f_name }}</td>
                                <td>{{ $d->f_p_link }}</td>
                                <td>{{ $d->f_friends }}</td>
                                <td>
                                    <a href="{{ route('facebook.edit', $d->id) }}">
                                        <button class="btn btn-warning">Edit</button>
                                    </a>
                                    <span>
                                        <a href="#"><button class="btn btn-danger">Delete</button></a>
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        var rowCount = 1;  // To track the current row number

        // Function to add a new row with dynamically generated HTML
        $(document).on('click', '.add_more_btn', function () {
            rowCount++;  // Increment the row count for a new row

            // Create HTML for a new row
            var newRow = `
                <div class="row" id="row_${rowCount}">
                    <div class="col-md-3">
                        <div class="titleInput">Facebook Username:
                            <span><input class="form-control" type="text" name="f_name[]"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="titleInput">Facebook Profile Link:
                            <span><input class="form-control" type="text" name="f_p_link[]"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="titleInput">No of Friends:
                            <input type="number" name="f_friends[]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary add_more_btn" data-row-id="${rowCount}"><i class="fa fa-plus"> Add</i></button>
                        <button type="button" class="btn btn-danger remove_more_btn" data-row-id="${rowCount}"><i class="fa fa-minus"> Remove</i></button>
                    </div>
                </div>
            `;

            // Append the new row to the container
            $('#facebook_data').append(newRow);
        });

        // Function to remove a row
        $(document).on('click', '.remove_more_btn', function () {
            var rowId = $(this).data('row-id');  // Get the unique ID of the row
            $('#row_' + rowId).remove();  // Remove the row from the form
        });
    });
</script>