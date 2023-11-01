@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Hasil Akhir <a href="{{ url('print/hasil') }}" class="btn btn-outline btn-primary btn-sm">print</a></h2>
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
                
                <table class="table table-compact w-full">

                    <thead>
                        <tr>
                            <th></th>
                            <th>Kecamatan</th>
                            <th>Cluster</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $item)

                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $item->kecamatan }}</td>
                            <td>Cluster {{ $item->index }}</td>
                            <td>
                                @switch($item->index)
                                @case(1)
                                <span class="text-rose-500 font-semibold">Jumlah IKM Rendah</span>
                                @break
                                @case(2)
                                <span class="text-amber-500 font-semibold">Jumlah IKM Sedang</span>
                                @break
                                @case(3)
                                <span class="text-teal-500 font-semibold">Jumlah IKM Tinggi</span>
                                @break
                                @default
                                <span>Kategori Belum Diberikan</span>
                                @endswitch
                            </td>
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

                {{-- nilai SSW  --}}
                <div class="p-6 m-20 rounded shadow-md">
                    <span class="font-bold">SSW</span>
                    
                        <table class="table table-compact w-full mb-10">
                    
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Centroid</th>
                                    <th>SSW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($ssw as $item)
                    
                                <tr>
                                    <th>{{ $no }}</th>
                                    <td>{{ $item->centroid }}</td>
                                    <td>{{ number_format($item->nilai_s, 3) }}</td>
                                </tr>
                                <?php $no++; ?>
                    
                                @endforeach
                    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Centroid</th>
                                    <th>SSW</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                    
                        </table>

                        {{-- nilai ssb --}}

                        <span class="font-bold">SSB</span>
                        
                        <table class="table table-compact w-full mb-10">
                        
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Inisialisasi</th>
                                    <th>SSB</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($ssb as $item)
                        
                                <tr>
                                    <th>{{ $no }}</th>
                                    <td>{{ $item->inisialisasi }}</td>
                                    <td>{{ number_format($item->nilai_m, 3) }}</td>
                                </tr>
                                <?php $no++; ?>
                        
                                @endforeach
                        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Inisialisasi</th>
                                    <th>SSB</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        
                        </table>

                        {{-- nilai rasio --}}
                        
                        <span class="font-bold">Rasio</span>
                        
                        <table class="table table-compact w-full mb-10">
                        
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Centroid</th>
                                    <th>SSB</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($rasio as $item)
                        
                                <tr>
                                    <th>{{ $no }}</th>
                                    <td>{{ $item->centroid }}</td>
                                    <td>{{ number_format($item->nilai_r, 3) }}</td>
                                </tr>
                                <?php $no++; ?>
                        
                                @endforeach
                        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>centroid</th>
                                    <th>nilai_r</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        
                        </table>
                    
                        {{-- nilai dbi --}}
                        <div class="p-6 m-20 rounded shadow-md">
                            <span class="font-bold">Davies-Bouldin Index</span>
                            @foreach ($dbi as $value)
                            <p>
                                Nilai DBI adalah {{ number_format($value->dbi,3) }}
                            </p>
                            @endforeach
                        </div>
                    
                        <div class="p-6 m-20 rounded shadow-md">
                            {!! $chart->container() !!}
                        </div>
                        <div class="p-6 m-20 rounded shadow-md">
                            {!! $chartIndustri->container() !!}
                        </div>
                    
                        <div class="p-6 m-20 rounded shadow-md">
                            <span class="font-bold">Kesimpulan</span>
                            <br><br>
                            <?php $no = 1; ?>
                            @foreach ($kesimpulan as $item1)
                            <p>
                                <span class="font-semibold">Cluster {{ $item1 }} adalah:</span>
                                <br>
                                @foreach ($data->where('index', $item1) as $item)
                                {{ $item->kecamatan }},
                                @endforeach
                                <br>
                                <br>
                            </p>
                            @endforeach
                        </div>
                    
                    
                    </div>
                </div>

                <div class="p-6 m-20 rounded shadow-md">
                    {!! $chart->container() !!}
                </div>
                <div class="p-6 m-20 rounded shadow-md">
                    {!! $chartIndustri->container() !!}
                </div>

                <div class="p-6 m-20 rounded shadow-md">
                    <span class="font-bold">Kesimpulan</span>
                    <br><br>
                    <?php $no = 1; ?>
                    @foreach ($kesimpulan as $item1)
                        <p>
                            <span class="font-semibold">Cluster {{ $item1 }} adalah:</span> 
                            <br>
                            @foreach ($data->where('index', $item1) as $item)
                                {{ $item->kecamatan }}, 
                            @endforeach
                            <br>
                            <br>
                        </p>
                    @endforeach
                </div>

                
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