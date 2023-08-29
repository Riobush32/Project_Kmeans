@if (session('success'))
<div class="alert alert-success shadow-lg absolute z-[99999] top-5 right-5 w-72" id="xsuccess">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>Data Anda Berhasil {{ session('success') }}!</span>
    </div>
    <div class="flex-none">
        <button class="btn btn-sm btn-ghost" onclick="location.reload()">
            <span class="material-symbols-sharp" id="successToggle">
                close
            </span>
        </button>
    </div>
</div>

@elseif (session('delete'))
<div class="alert alert-error shadow-lg absolute z-[99999] top-5 right-5 w-72" id="xsuccess">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>Data Anda Berhasil {{ session('delete') }}!</span>
    </div>
    <div class="flex-none">
        <button class="btn btn-sm btn-ghost" onclick="location.reload()">
            <span class="material-symbols-sharp" id="successToggle">
                close
            </span>
        </button>
    </div>
</div>

@elseif (session('update'))
<div class="alert alert-info shadow-lg absolute z-[99999] top-5 right-5 w-72" id="xsuccess">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>Data Anda Berhasil {{ session('update') }}!</span>
    </div>
    <div class="flex-none">
        <button class="btn btn-sm btn-ghost" onclick="location.reload()">
            <span class="material-symbols-sharp" id="successToggle">
                close
            </span>
        </button>
    </div>
</div>

@endif
