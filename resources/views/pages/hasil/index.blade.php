@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Centroid</h2>
            </div>

            @if (!$data->isEmpty())
            <form action="{{ url('/kmeans/proses') }}" class="join join-vertical lg:join-horizontal">
                <button class="btn btn-sm join-item rounded-l-full" type="submit">proses</button>
                <input type="number" class="input input-bordered input-sm join-item w-20" placeholder="K" name="maxLoop" min="2"
                    />
                @if (!$cluster->isEmpty())
                <a href="{{ url('/hasil/iterasi') }}" class="btn btn-sm join-item rounded-r-full" type="submit">iterasi</a>
                @endif
            </form>
            @endif

        </div>

        <div class="h-full mt-8">

            @if ($data->isEmpty())
            <div class="hero bg-transparent overflow-x-auto mt-16">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">Warning!</h1>
                        <p class="py-6">Tidak bisa memproses dikarenakan tidak dapat menemukan nilai K silahkan tekan tombol dibawah untuk melakukannya</p>
                        <a href="{{ url('/kmeans') }}" class="btn btn-primary">Tentukan Nilai K</a>
                    </div>
                </div>
            </div>

            @else
            <div class="overflow-x-auto h-[430px]">
                <table class="table table-compact w-full">

                    <thead>
                        <tr>
                            <th></th>
                            <th>Kecamatan</th>
                            <th>BerIzin</th>
                            <th>Tidak Berizin</th>
                            <th>Total</th>
                            <th>Tahun</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $item)

                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $item->kecamatan }}</td>
                            <td>{{ $item->berizin }}</td>
                            <td>{{ $item->tidak_berizin }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->tahun }}</td>
                        </tr>
                        <?php $no++; ?>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Kecamatan</th>
                            <th>BerIzin</th>
                            <th>Tidak Berizin</th>
                            <th>Total</th>
                            <th>Tahun</th>
                            <th></th>
                        </tr>
                    </tfoot>

                </table>


            </div>
            @endif



        </div>
        <div class="justify-end">
            {{-- <div class="laptop:hidden">{{ $data->links('pagination::simple-tailwind') }}</div>
            <div class="hidden laptop:block">{{ $data->links('pagination::tailwind') }}</div> --}}
        </div>
    </div>
</div>

<script src="./src/js/alert.js"></script>

@endsection