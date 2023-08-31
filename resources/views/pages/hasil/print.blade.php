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

        .double-hr {
        display: flex;
        align-items: center;
        width: 100%;
        }
        
        .line {
        flex-grow: 1;
        height: 1px;
        background-color: #151212;
        }

        .signature {
        border-top: 1px solid #000;
        padding-top: 20px;
        width: 200px;
        float:right;
        margin-right:20px;
        }
        
        .signature p {
        margin-bottom: 5px;
        text-align: left;
        }
    </style>

    
</head>

<body>
    <div class="container">
        <div class="header" style="display:flex; align-items:center;">
            <div style="margin-right:20px">
                <img src="{{ asset('img/kabasahan.png') }}" alt="Logo Kabupaten Asahan" style="width:70px">
            </div>
            <div style="">
                <h2 style="margin:auto 0; text-transform: uppercase; font-size:20px;">Pemerintah Kabupaten Asahan</h2>
                <h1 style="margin:auto 0; text-transform: uppercase; font-size:25px;">Dinas Koperasi Perdagangan dan Perindustrian</h1>
                <p style="margin:auto 0;"><span style="text-transform: uppercase;">JL. Prof. H. M. Yamin, S.H NO. 44 Tel/Fax: (0623) 41406</span> Website:</p>
                <p style="margin:auto 0;">www.diskopdagin.asahankab.go.id | Email: diskopdagin@asahankab.go.id</p>
                <p style="margin:auto 0;">KISARAN-21224</p>
                
            </div>
            
        </div>
        <div class="double-hr">
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <div class="content">
            
            <h3><u>Data pengclusteran kecamatan berdasarkan jumlah industri kecil menegah Kab Asahan</u></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
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

        <div style="margin-top:20px;">
            {!! $chart->container() !!}
        </div>
        <div style="margin-top:20px;">
            {!! $chartIndustri->container() !!}
        </div>
        <div class="footer">
        </div>
    </div>

    <div class="signature">
            <p>An. KEPALA DINAS,</p>
            <p style="margin-bottom: 70px">Kabid Perindustrian</p>
            <p>KAMALUDDIN, S.E, M.Si</p>
            <p>NIP.197909172009041006</p>
        </div>

        <p>Tanggal: <span id="currentDate"></span></p>
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