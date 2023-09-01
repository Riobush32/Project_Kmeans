@extends('auth')

@section('auth')

@if ($errors->any())
<div class="card bg-error w-96 shadow-xl absolute top-8 right-8 z-30" id="hide">
    <div class="card-body">
        <h2 class="card-title">Error!!!</h2>

        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
        <div class="card-actions justify-end">
            <button class="btn btn-outline" id="toggleButton">close</button>
        </div>
    </div>
</div>
@endif

<div class="flex items-center w-[100vw] h-[100vh] justify-center">
    <div class="card w-96 bg-base-100 shadow-xl h-[60vh]">
        <div class="card-body relative">
            <h2 class="card-title">Login</h2>

            <div class="flex items-center justify-center mt-8">
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <label class="input-group">
                            <span class="material-symbols-sharp">
                                mail
                            </span>
                            <input type="email" placeholder="info@site.com" class="input input-bordered" name="email" />
                        </label>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <label class="input-group">
                            <span class="material-symbols-sharp">
                                key
                            </span>
                            <input type="password" placeholder="******" class="input input-bordered" name="password" />
                        </label>
                    </div>
                    <div class="form-control pt-4 mt-5">
                        <a href="{{ route('password.request') }}" class="link link-primary">Forgot Your Password?</a>
                    </div>
                    <div class="form-control pt-4">
                        {{-- <a href="{{ route('register') }}" class="link link-primary">Don't have an account?</a> --}}
                    </div>

                    <div class="card-actions absolute bottom-5 right-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const items = document.querySelector('#hide');
    const toggleButton = document.querySelector('#toggleButton');

    toggleButton.addEventListener('click', () =>{
        items.classList.toggle('hidden');
    });
</script>

@endsection