@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body overflow-auto ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Data Industri </h2>
            </div>
            
            <div class="ml-2">
                    <a href="{{ url('/data/industri')}}" class="btn btn-outline btn-sm">
                        <span class="material-symbols-sharp">
                            arrow_back
                        </span>
                    </a>
            </div>
            <div class="ml-2">
                <a href="{{ url("/dataIndustri/$tahun/dataPilihan/")}}" class="btn btn-outline btn-sm tooltip tooltip-bottom" data-tip="Proses Data Ini">
                    <span class="material-symbols-sharp">
                        smb_share
                    </span>
                </a>
            </div>
        </div>

        <div class="h-full mt-8">

            <div class="overflow-x-auto">
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
                        <?php 
                            $no++; 
                        ?>
                    
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

        </div>
        <div class="justify-end">
            <div class="laptop:hidden">{{ $data->links('pagination::simple-tailwind') }}</div>
            <div class="hidden laptop:block">{{ $data->links('pagination::tailwind') }}</div>
        </div>
    </div>
</div>

<script src="./src/js/alert.js"></script>

@endsection