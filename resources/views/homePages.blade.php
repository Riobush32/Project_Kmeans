<table class="table table-compact w-full">

    <thead>
        <tr>
            <th></th>
            <th>Kecamatan</th>
            @for ($i = 1; $i <= $count; $i++) <th>c{{ $i }}</th>
                @endfor
                <th>Jarak Terdekat</th>
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
            @for ($i = 1; $i <= $count; $i++) <?php $c='c' .$i; ?>
                <td>{{ $item->$c }}</td>
                @endfor
                <td>{{ $item->cluster }}</td>
                <td>{{ $item->index }}</td>
        </tr>
        <?php $no++; ?>

        @endforeach
        {{ $iterasi }}



    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>Kecamatan</th>
            @for ($i = 1; $i <= $count; $i++) <th>c{{ $i }}</th>
                @endfor
                <th>Jarak Terdekat</th>
                <th>Cluster</th>
                <th></th>
        </tr>
    </tfoot>
</table>