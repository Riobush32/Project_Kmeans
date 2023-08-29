@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body overflow-auto ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Data user: {{ $user->total() }}</h2>
            </div>
            <div class="flex mt-4 md:mt-0">
                <div class="form-control">
                    <form action="{{ url('/user') }}" class="input-group">
                        <input type="text" placeholder="Search…" class="input input-bordered"
                            value="{{ request('search') }}" name="search" />
                        <button type="submit" class="btn btn-square btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <div class="h-full mt-8">

            <div class="overflow-x-auto">
                <table class="table table-compact w-full">

                    <thead>
                        <tr>
                            <th></th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($user as $itemUser)
                        @if ($itemUser->role != 'superadmin')
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $itemUser->name }}</td>
                            <td>{{ $itemUser->email }}</td>
                            <td>{{ $itemUser->role }}</td>
                            <td>
                                <form action="{{ url("/user/$itemUser->id") }}" method="POST">
                                    @csrf @method('DELETE')

                                    <a href="{{ url("/user/$itemUser->id/info")}}"
                                        class="btn btn-outline btn-info btn-sm">
                                        <span class="material-symbols-sharp">
                                            info
                                        </span>
                                    </a>

                                    <a href="{{ url("/user/$itemUser->id/edit") }}"
                                        class="btn btn-outline btn-warning btn-sm">
                                        <span class="material-symbols-sharp">
                                            edit
                                        </span>
                                    </a>
                                    {{-- delete button --}}
                                    <!-- The button to open modal -->
                                    <label for="my-modal" class="btn btn-error btn-outline  btn-sm">
                                        <span class="material-symbols-sharp">
                                            delete
                                        </span>
                                    </label>

                                    <!-- Put this part before </body> tag -->
                                    <input type="checkbox" id="my-modal" class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box bg-warning">
                                            <h3 class="font-bold text-lg">
                                                <span class="material-symbols-sharp">
                                                    warning
                                                </span>
                                                Warning!
                                            </h3>
                                            <p class="py-4">yakin hapus data ini?!</p>
                                            <div class="modal-action">
                                                <label for="my-modal" class="btn btn-sm  btn-outline">cancel</label>
                                                <button type="submit" class="btn btn-error btn-outline  btn-sm">
                                                    <span class="material-symbols-sharp">
                                                        delete
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endif
                        @endforeach



                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>

                            <th></th>
                        </tr>
                    </tfoot>
                </table>


            </div>

        </div>
        <div class="justify-end">
            <div class="laptop:hidden">{{ $user->links('pagination::simple-tailwind') }}</div>
            <div class="hidden laptop:block">{{ $user->links('pagination::tailwind') }}</div>
        </div>
    </div>
</div>

<script src="./src/js/alert.js"></script>

@endsection