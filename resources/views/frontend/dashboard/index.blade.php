@extends('frontend.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cars.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Model</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($cars as $car)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $car->name }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->detail }}</td>
            <td>
                <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('cars.edit',$car->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $cars->links() !!}
      
@endsection