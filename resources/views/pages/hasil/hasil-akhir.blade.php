@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Hasil Akhir</h2>
            </div>

            <div class="form-control">
                <form action="{{ url('hasil/iterasi') }}" class="input-group">
            
                    <div class="join flex">
            
                        <select class="select select-sm select-bordered join-item rounded-l-full" name="iterasi">
                            <?php $p = 0; ?>
                            @foreach ($iterasi as $iterasi)
                            <option value="{{ $iterasi }}" {{ old('iterasi')==$p ? 'selected' : '' }}>Iterasi {{ $iterasi }}</option>
                            </option>
                            <?php $p++; ?>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm join-item rounded-none">filter</button>
                        <a href="{{ url('hasil/akhir') }}" class="btn btn-sm join-item rounded-r-full">Hasil</a>
            
                    </div>
            
                </form>
            
            </div>

        </div>

        <div class="h-full mt-8">
            
            
            <div class="overflow-x-auto h-[430px]">
                <div class="p-6 m-20 rounded shadow-md">
                    {!! $chart->container() !!}
                </div>
                <div class="p-6 m-20 rounded shadow-md">
                    {!! $chartIndustri->container() !!}
                </div>
                <table class="table table-compact w-full">

                    <thead>
                        <tr>
                            <th></th>
                            <th>Kecamatan</th>
                            <th>Cluster</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $item)

                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $item->kecamatan }}</td>
                            <td>Cluster {{ $item->index }}</td>
                        </tr>
                        <?php $no++; ?>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Kecamatan</th>
                            <th>Cluster</th>
                            <th></th>
                        </tr>
                    </tfoot>

                </table>


            </div>



        </div>
    </div>
</div>


<script src="{{ $chartIndustri->cdn() }}"></script>
{{ $chartIndustri->script() }}

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

<script src="./src/js/alert.js"></script>

@endsection