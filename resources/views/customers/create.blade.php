<div class="main-panel">
    <div class="content-wrapper">        
        <div class="card">
            <div class="card-header">
                Add Product
            </div>

            <div class="card-body">
                <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data" style="border:1">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>                        
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">                       
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">            
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>    

