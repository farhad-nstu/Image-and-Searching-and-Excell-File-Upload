<div class="main-panel">
    <div class="content-wrapper">
        
        <div class="card">
            <div class="card-header">
                Update SubCategory
            </div>

            <div class="card-body">
                <form action="{{ route('sub_categories.update', $sub_category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $sub_category->name }}">                           
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $sub_category->slug }}">                           
                    </div>
                    <button type="submit" class="btn btn-primary">Update SubCategory</button>
                </form>
            </div>
        </div>
    </div>
</div>    

