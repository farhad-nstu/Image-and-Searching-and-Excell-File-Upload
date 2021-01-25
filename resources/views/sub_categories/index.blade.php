<li>
    <a href="{{ route('home') }}"><b>Back to Home</b></a>
</li>  
    
    <div class="card-body">                  
        <table class="table table-hover table-striped" style="width: 70%; margin-top: 50px;" border="1" align="center" >                   
            <a href="{{ route('sub_categories.create') }}" style="margin-left: 1000px; padding-top: 30px">Add new</a>                   
            <tr>
            <th>#</th>
            <br>
            <th>Title</th>
            <th>Slug</th>                          
            <th>Action</th>
            </tr>

            @foreach($sub_categories as $sub_category)
            <tr>
                <td>{{ $sub_category->id }}</td>
                <td>{{ $sub_category->name }}</td>
                <td>{{ $sub_category->slug }}</td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li class="mr-3"><a href="{{ route('sub_categories.edit',[ $sub_category->id ])}}" class="btn btn-primary">Edit</a></li>

                        <li><a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $sub_category->id }}').submit();" >Delete</a></li>

                        <form id="delete-form-{{ $sub_category->id }}" action="{{ route('sub_categories.destroy',$sub_category->id) }}" method="POST" style="display: none;">
                            @csrf @method('delete')
                        </form>
                    </ul>
                </td>
            </tr>

            @endforeach 
        </table>
    </div>
            

