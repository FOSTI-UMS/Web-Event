<table>
    <thead>
        <tr>
            <th>Nama Event</th>
            <th>Max Peserta</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($events as $event)
                <td> {{ $event->nama_event }} </td>
                <td> {{ $event->max_partic }} </td>
                <td> {{date('d'.'/'.'M'.'/'.'Y', strtotime($event->waktu))}} at {{ date('g:ia', strtotime($event->waktu))}} </td>
                <td><a href="/event/{{ $event->slug }}/{{ $event->id }}">Daftar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>