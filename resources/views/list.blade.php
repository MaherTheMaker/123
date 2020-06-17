@extends('layout')

@section('content')
<h1> Restaurant List page is here</h1>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">

 <strong>   {{Session::get('status')}} </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">@sortablelink('id')</th>
        <th scope="col">@sortablelink('name')</th>
        <th scope="col">@sortablelink('email')</th>
        <th scope="col">@sortablelink('address')</th>
        <th>Operation</th>
      </tr>

    </thead>
    <tbody>
        @foreach($data as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->address}}</td>
        <td><a href="/delete/{{$item->id}}"><i class="fa fa-trash"></i></a>
        <a href="/edit/{{$item->id}}"><i class="fa fa-edit"></i></a></td>
      </tr>

      @endforeach

    </tbody>
  </table>
  {{ $data->links() }}



@stop
