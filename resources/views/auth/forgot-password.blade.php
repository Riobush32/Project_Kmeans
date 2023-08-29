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


@if (session('status'))
<div class="alert alert-info shadow-lg absolute z-[99999] top-5 right-5 w-72" id="hide">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('status') }}!</span>
    </div>
    <div class="flex-none">
        <button class="btn btn-sm btn-ghost">
            <span class="material-symbols-sharp" id="toggleButton">
                close
            </span>
        </button>
    </div>
</div>

@endif

<div class="flex items-center w-[100vw] h-[100vh] justify-center">
    <div class="card w-96 bg-base-100 shadow-xl h-[60vh]">
        <div class="card-body relative">
            <h2 class="card-title">Give Me Your Email</h2>

            <div class="flex items-center justify-center mt-8">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <label class="input-group">
                            <span class="material-symbols-sharp">
                                mail
                            </span>
                            <input type="email" placeholder="info@site.com" value="{{ old('email') }}"
                                class="input input-bordered" name="email" />
                        </label>
                    </div>


                    <div class="card-actions absolute bottom-5 right-5">
                        <button type="submit" class="btn btn-primary">Send Reset Link</button>
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