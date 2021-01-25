<div class="main-panel">
    <div class="content-wrapper">        
        <div class="card">
            <div class="card-header">
                Add Product
            </div>

            <br>
            @if(session('errors'))
                @foreach($errors as $error)
                <li>{{$error}}</li>
                @endforeach
            @endif
            @if(session('success'))
                {{session('success')}}
            @endif
            <br>

            <div class="card-body">
                <form action="{{ route('excel.import') }}" method="post" enctype="multipart/form-data" style="border:1">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Excel File to Upload</label>
                        <input type="file" name="file" id="file">                            
                    </div>

                    <button type="submit" class="btn btn-primary">Upload File</button>
                    <br><br>
                    <a href="{{ url('/sample/products.xlsx') }}">Download File</a>
                </form>
            </div>
        </div>
    </div>
</div>    

