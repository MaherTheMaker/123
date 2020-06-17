@extends('layout')

@section('content')

<div class="col-sm6">
<form method="post" action={{route('restaurant.update',$data->id)}}>
        @csrf
        <div class="form-group">
          <label >Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value={{$data->name}}>
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value={{$data->email}}>
          </div>
          <div class="form-group">
            <label >Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value={{$data->address}}>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@stop
