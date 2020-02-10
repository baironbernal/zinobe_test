@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Digite documento o email" aria-label="Example text with button addon" aria-describedby="button-addon1" name="search">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Buscar</button>
                              </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <h1>Logs de consultas</h1>
            <table class="table table-bordered" id="laravel">
                <thead>
                   <tr>
                      <th>Id</th>
                      <th>Name</th> 
                      <th>Response API</th>
                      <th>Created at</th>
                   </tr>
                </thead>
                <tbody>
                   @forelse ($logs as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td style="width:20px">{{ trim($item->response_query)}}</td>
                        <td>{{ $item->created_at }}</td>
                        <td></td>
                    </tr>
                   @empty
                       <span>
                           No existen logs por el momento.
                       </span>
                   @endforelse
                </tbody>
             </table>
             {!! $logs->links() !!}
        </div>

        
    </div>
</div>
@endsection
