@extends('app')
@section('content')
<h2 class="page-header">{{ ucfirst('[[model_plural]]') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('[[model_plural]]') }}
    </div>
    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
                <thead>
                    <tr>
                        [[foreach:columns]]
                        <th>[[i.display]]</th>
                        [[endforeach]]
                        <th style="width:50px"></th>
                        <th style="width:50px"></th>
                    </tr>
                </thead>
                <tbody>
                    [[foreach:columns]]
                    <tr>
                        [[i.name]]
                    </tr>
                    [[endforeach]]
                </tbody>
            </table>
        </div>
        <a href="{{url('[[route_path]]/create')}}" class="btn btn-primary" role="button">Add [[model_singular]]</a>
    </div>
</div>
@endsection
