@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<a class="nav-link" href="{{  URL::temporarySignedRoute('register', now()->addMinutes(30));  }}">{{ __('Register page') }}</a>

start testing merge

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                                @include('alerts.error')
                        <section class="vh-100">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col">
                                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                                    <div class="card-body py-4 px-4 px-md-5">

                                        <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                        <i class="fas fa-check-square me-1"></i>
                                        <u>Rebase and Merge </u>
                                        </p>
                                        <form action="{{route('tasks.store')}}" method="POST">
                                                @csrf
                                        <div class="pb-2">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="d-flex flex-row align-items-center">
                                                <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Add new..." name="task">
                                                <div>
                                                <input type="submit" class="btn btn-primary" value="Add">

                                                </div>

                                            </div>

                                            </div>

                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        </div>
                                        </form>

                                        <hr class="my-4">
                                        @foreach($tasks as $task)
                                        <ul class="list-group list-group-horizontal rounded-0 bg-transparent">

                                            <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                                                <p class="lead fw-normal mb-0">{{$task->task}}</p>
                                            </li>
                                            <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                                <div class="d-flex flex-row justify-content-end mb-1">
                                                <a href="{{route('edit',$task->id)}}" class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
                                                <a href="{{route('delete',$task->id)}}" class="text-danger" data-mdb-toggle="tooltip" title="Delete todo"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                                <div class="text-end text-muted">
                                                </div>
                                            </li>
                                        </ul>
                                         @endforeach
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </section>

                </div>

        </div>
    </div>
</div>

@endsection
