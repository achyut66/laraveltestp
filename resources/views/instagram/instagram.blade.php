<x-app-layout>
    <form method="post" action="{{ route('instagram.save') }}">
        @csrf
        <div class="container">
            <div id="instagram_data">
                <div class="col-md-12">
                    <div class="row" id="row_1">
                        <div class="col-md-3">
                            <div class="titleInput">Instagram Username:<span><input class="form-control" type="text" name="i_name[]"></span></div>
                        </div>
                        <div class="col-md-3">
                            <div class="titleInput">Instagram Profile Link:<span><input class="form-control" type="text" name="i_p_link[]"></span></div>
                        </div>
                        <div class="col-md-3">
                            <div class="titleInput">No of Friends:<span><input type="number" name="i_friends[]"></span></div>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary add_more_btn" data-row-id="1"><i class="fa fa-plus"> Add</i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center"><button class="btn btn-secondary">Save</button></div>
            <div class="card">
                <div class="card-header">Instagram Information</div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-responsive striped">
                        <tr>
                            <th>s.n</th>
                            <th>Instagram username</th>
                            <th>Instagram profile link</th>
                            <th>Number of friends on Instagram</th>
                        </tr>
                        @php $i = 1; @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td>{{$i++;}}</td>
                                <td>{{$d->i_name}}</td>
                                <td>{{$d->i_p_link}}</td>
                                <td>{{$d->i_friends}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>

<script>
    $(document).ready(function () {
        var rowCount = 1;  // Initialize row count for dynamically added rows

        // Handle click event for "Add" button
        $(document).on('click', '.add_more_btn', function () {
            rowCount++;  // Increment row count

            // Create a new row with unique row ID and attach "Remove" button for this row
            var newRow = `
                <div class="row" id="row_${rowCount}">
                    <div class="col-md-3">
                        <div class="titleInput">Instagram Username:
                            <span><input class="form-control" type="text" name="i_name[]"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="titleInput">Instagram Profile Link:
                            <span><input class="form-control" type="text" name="i_p_link[]"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="titleInput">No of Friends:
                            <input type="number" name="i_friends[]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary add_more_btn" data-row-id="${rowCount}"><i class="fa fa-plus"> Add</i></button>
                        <button type="button" class="btn btn-danger remove_more_btn" data-row-id="${rowCount}"><i class="fa fa-minus"> Remove</i></button>
                    </div>
                </div>
            `;
            // Append the new row to the container
            $('#instagram_data').append(newRow);
        });

        // Handle click event for "Remove" button
        $(document).on('click', '.remove_more_btn', function () {
            var rowId = $(this).data('row-id');  // Get the unique row ID to remove
            $('#row_' + rowId).remove();  // Remove the row with the matching ID
        });
    });
</script>
