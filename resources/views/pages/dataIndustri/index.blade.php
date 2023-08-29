@extends('main')

@section('content')


<div class="card  bg-base-100 shadow-xl main-content w-[95vw] lg:w-[68vw] laptop:w-[95%] xl:w-[95%] h-[80vh]">
    <div class="card-body overflow-auto ">
        <div class="md:flex md:flex-warp ">
            <div class="md:w-2/3 w-full">
                <h2 class="card-title">Data Industri: </h2>
            </div>
            <div class="flex mt-4 md:mt-0">
                <div class="form-control">
                    <form action="{{ route('industri.store') }}" class="input-group" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs" name="excel" required/>
                        <input type="number" placeholder="Tahun.." class="input input-bordered input-primary w-28 max-w-xs" name="tahun" required/>
                        <button class="btn btn-active btn-primary w-10" type="submit">
                            <span class="material-symbols-sharp bg-transparent">
                                note_add
                            </span>
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
                            <th>No.</th>
                            <th>Tahun</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $item)
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $item}}</td>
                            <td>
                                <a href="{{ url("/dataIndustri/$item/filter") }}" class="btn btn-outline btn-primary btn-sm">
                                    <span class="material-symbols-sharp">
                                        docs_add_on
                                    </span>
                                </a>
                                <a href="{{ url("/dataIndustri/$item/truncate") }}" class="btn btn-outline btn-error btn-sm">
                                    <span class="material-symbols-sharp">
                                        delete
                                    </span>
                                </a>
                
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                
                
                
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Tahun</th>
                
                            <th></th>
                        </tr>
                    </tfoot>
                </table>


            </div>

        </div>
    </div>
</div>

<script src="./src/js/alert.js"></script>

@endsection