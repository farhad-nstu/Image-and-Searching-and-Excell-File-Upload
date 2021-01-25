<div class="main-panel">
    <div class="content-wrapper">        
        <div class="card">
            <div class="card-header">
                Order for Product
            </div>

            <div class="card-body">
                <form action="{{ route('order.store', $product->id) }}" method="post" style="border:1">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                        
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Size</label>
                        <input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                        
                    </div>

                    <button type="submit" class="btn btn-primary">Order Product</button>
                </form>
            </div>
        </div>
    </div>
</div>    

