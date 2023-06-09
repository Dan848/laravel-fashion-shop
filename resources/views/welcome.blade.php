@extends('layouts.app')
@section('content')
<div class="h-100 d-flex justify-content-center align-items-center">
    <div class="d-flex align-items-center">
        <div class="display-1 fw-bolder d-inline align-middle m-0 p-0">
            Welcome to
            <span class="text-bg-primary p-3 rounded-start-3">Bug</span><span class="text-bg-secondary p-3 rounded-end-3">Makeup</span>
            {{-- <span class="text-primary">PRO</span><span class="text-secondary">JECT</span> --}}
        </div>
        <div class="img-box ms-2">
            <img class="img-fluid" src="/images/logo/cute_bug.png" alt="logo">
        </div>
    </div>
</div>

@endsection
