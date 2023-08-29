@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body overflow-auto ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Iterasi: </h2>
            </div>
            <div class="flex mt-4 md:mt-0">
                <div class="form-control">
                    <form action="{{ url('hasil/iterasi') }}" class="input-group">

                        <div class="join flex">

                            <select class="select select-sm select-bordered join-item rounded-l-full" name="iterasi">

                            </select>
                            <button type="submit" class="btn btn-sm join-item rounded-none">filter</button>
                            <a href="{{ url('hasil/akhir') }}"
                                class="btn btn-sm join-item rounded-r-full">Hasil</a>

                        </div>

                    </form>

                </div>
            </div>

        </div>

        <div class="h-full mt-8">
            <div class="overflow-x-auto">
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
<script src="./src/js/alert.js"></script>

@endsection
