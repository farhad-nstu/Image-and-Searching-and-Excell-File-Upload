<div class="main-panel">
    <div class="content-wrapper">       
        <div class="card">
            <div class="card-header">
                Update Product
            </div>

            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->name }}">                        
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->price }}">                        
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Select Category</label>
                        <select class="form-control" name="category_id" >
                            @foreach($categories as $category)
                                <option {{ $category->id == $product->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Select Sub Category</label>
                        <select class="form-control" name="sub_category_id" >
                            @foreach($sub_categories as $sub_category)
                                <option {{ $sub_category->id == $product->sub_category->id ? 'selected' : '' }} value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                            @endforeach                            
                        </select>
                    </div>
                   
                    <input type="submit" name="submit" value="submit">                   
                </form>
            </div>
        </div>
    </div>
</div>   


