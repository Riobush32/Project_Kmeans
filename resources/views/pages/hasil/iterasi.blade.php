@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body overflow-auto ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Iterasi: {{ $ke }} </h2>
            </div>
            <div class="flex mt-4 md:mt-0">
                <div class="form-control">
                    <form action="{{ url('hasil/iterasi') }}" class="input-group">
                        
                        <div class="join flex">
                            
                            <select class="select select-sm select-bordered join-item rounded-l-full" name="iterasi">
                                <?php $p = 0; ?>
                                @foreach ($data as $iterasi)
                                <option value="{{ $iterasi }}" {{ old('iterasi')==$p ? 'selected' : '' }}>Iterasi {{ $iterasi }}</option>
                                <?php $p++; ?>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm join-item rounded-none">filter</button>
                            <a href="{{ url('hasil/akhir') }}" class="btn btn-sm join-item rounded-r-full">Hasil</a>
                            
                        </div>

                    </form>
                    
                </div>
            </div>

        </div>

        <div class="h-full mt-8">
            @if ($centroid->isEmpty())
            <div class="hero bg-transparent overflow-x-auto mt-16">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">Warning!</h1>
                        <p class="py-6">Tidak ada data yang dipilih untuk diproses, Silahkan tekan tombol berikut untuk memilih data
                            yang akan diproses</p>
                        <a href="{{ url('/data/industri/') }}" class="btn btn-primary">Pilih Data</a>
                    </div>
                </div>
            </div>
            
            @else
            
            <div class="overflow-x-auto">
                <div class="mt-3 font-semibold">
                    <h1>Centroid : {{ $ke }}</h1>
                </div>
                <table class="table table-compact w-full">
                
                    <thead>
                        <tr>
                            <th></th>
                            <th>BerIzin</th>
                            <th>Tidak Berizin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($centroid as $item)
                
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $item->berizin }}</td>
                            <td>{{ $item->tidak_berizin }}</td>
                        </tr>
                        <?php 
                                            $no++; 
                                        ?>
                
                        @endforeach
                
                
                
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>BerIzin</th>
                            <th>Tidak Berizin</th>
                        </tr>
                    </tfoot>
                
                </table>

                <div class="mt-5 font-semibold">
                    <h1>Iterasi : {{ $ke }}</h1>
                </div>
                <table class="table table-compact w-full">

                    <thead>
                        <tr>
                            <th></th>
                            <th>Kecamatan</th>
                            @for ($i = 1; $i <= $count; $i++)
                                <th>c{{ $i }}</th>
                            @endfor
                            <th>Jarak Terdekat</th>
                            <th>Cluster</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($viewData as $item)
                        
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $item->kecamatan }}</td>
                            @for ($i = 1; $i <= $count; $i++) 
                                <?php $c = 'c'.$i; ?>
                                <td>{{ number_format($item->$c, 4) }}</td>
                            @endfor
                            <td>{{ number_format($item->cluster,4) }}</td>
                            <td>{{ $item->index }}</td>
                        </tr>
                        <?php $no++; ?>
                        
                        @endforeach



                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Kecamatan</th>
                            @for ($i = 1; $i <= $count; $i++) 
                                <th>c{{ $i }}</th>
                            @endfor
                            <th>Jarak Terdekat</th>
                            <th>Cluster</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>

            </div>
@endif
        </div>
    </div>
</div>

<script src="./src/js/alert.js"></script>

@endsection