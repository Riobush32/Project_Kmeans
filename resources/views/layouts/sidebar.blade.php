<div
    class="z-50 w-64 h-[94vh] rounded-3xl mt-[3vh] ml-6 font-sans overflow-hidden shadow-2xl bg-base-100 font-medium text-md fixed">
    <div class="flex items-center h-20 w-full">
        <a href="{{ url('/') }}" class="text-center w-full">
            <div class="items-center flex text-md ml-8">

                <span class="material-symbols-sharp ml-1">
                    <span class="material-symbols-sharp text-3xl ml-1">
                        data_thresholding
                    </span>
                </span>
                <span class="ml-2">
                    Clustering
                </span>
            </div>
        </a>

    </div>
    <hr class="border-none h-[.5px] bg-gradient-to-r from-base-100 via-base-300 to-base-100">

    <div class="">

        {{-- @if (Auth::user()->role == 'superadmin')
        <a href="{{ url('/user') }}" class="sidebar-button items-center flex  {{ $active == 'user_data' ? 'bg-primary' : '' }}">
            <div class="ml-5 items-center flex text-sm">
                <span class="material-symbols-sharp ml-1">
                    manage_accounts
                </span>
                <span class="ml-3">
                    User Data
                </span>
            </div>
        </a>
        @endif --}}

        <a href="{{ url('/data/industri') }}" class="sidebar-button items-center flex {{ $active == 'dataIndustri' ? 'bg-primary' : '' }}">
            <div class="ml-5 items-center flex text-sm">
                <span class="material-symbols-sharp">
                    folder_open
                </span>
                <span class="ml-3">
                    Data
                </span>
            </div>
        </a>

        <a href="{{ route('kmeans') }}"
            class="sidebar-button items-center flex {{ $active == 'Kmeans' ? 'bg-primary' : '' }}">
            <div class="ml-5 items-center flex text-sm">
                <span class="material-symbols-sharp">
                    rebase_edit
                </span>
                <span class="ml-3">
                    Kmeans
                </span>
            </div>
        </a>

        <a href="{{ url('/hasil') }}" class="sidebar-button items-center flex {{ $active == 'hasil' ? 'bg-primary' : '' }}">
            <div class="ml-5 items-center flex text-sm">
                <span class="material-symbols-sharp">
                    assignment_turned_in
                </span>
                <span class="ml-3">
                    Hasil
                </span>
            </div>
        </a>

    </div>

</div>
