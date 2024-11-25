<x-app-layout>
    <form method="POST" action="{{ route('facebook.update', $facebookData->id) }}">
        @csrf
        <div class="container">
            <h2>Edit Facebook Data</h2>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="titleInput">Facebook Username:
                            <span><input class="form-control" type="text" name="f_name"
                                    value="{{ $facebookData->f_name }}"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="titleInput">Facebook Profile Link:
                            <span><input class="form-control" type="text" name="f_p_link"
                                    value="{{ $facebookData->f_p_link }}"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="titleInput">No of Friends:
                            <input type="number" name="f_friends" value="{{ $facebookData->f_friends }}">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-secondary">Update</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>