<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            line-height: 1.5;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Data Pengclusteran Industri Kecil Menengah Dengan K-Means</h1>
            <p>Tanggal: <span id="currentDate"></span></p>
        </div>
        <div class="content">
            {{-- <h2>Data Statistik:</h2>
            <ul>
                <li>Jumlah Usaha Terdaftar: 150</li>
                <li>Omset Bulan Ini: $50,000</li>
            </ul> --}}
            <h2>Data Hasil Cluster:</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Kecamatan</th>
                        <th>Cluster</th>
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
            </table>
        </div>

        <div class="p-6 m-20 rounded shadow-md">
            {!! $chart->container() !!}
        </div>
        <div class="p-6 m-20 rounded shadow-md">
            {!! $chartIndustri->container() !!}
        </div>
        <div class="footer">
        </div>
    </div>
</body>



<script src="{{ $chartIndustri->cdn() }}"></script>
{{ $chartIndustri->script() }}

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

<script>
    // Mengisi tanggal hari ini
    var currentDate = new Date();
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById("currentDate").textContent = currentDate.toLocaleDateString('id-ID', options);

    window.onload = function() {
    setTimeout(function() {
    window.print();
    }, 1500); // 500 milidetik (5 detik)
    };
</script>

</html>