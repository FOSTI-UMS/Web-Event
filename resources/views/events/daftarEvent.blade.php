<table border="0">
    <thead>
        <tr>
            <th>Nama Event</th>
            <th>Max Peserta</th>
            <th>Waktu</th>
            <th>Lihat</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($events as $event)
                <td> {{ $event->nama_event }} </td>
                <td> {{ $event->max_partic }} </td>
                <td> {{date('d'.'/'.'M'.'/'.'Y', strtotime($event->waktu))}} at {{ date('g:ia', strtotime($event->waktu))}} </td>
                <td><a href="/omah/event/{{ $event->slug }}">Lihat</a></td>
                <td>
                    <a href="/omah/event/{{$event->id}}/edit" role="button" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <form class="" action="/omah/event/{{ $event->id }}" method="post">
                        {{ method_field('DELETE') }}
                        {{-- <input class="btn btn-danger" type="submit" name="delete" value="DELETE"> --}}
                        <button class="btn btn-danger" type="submit" name="delete" value="DELETE">HAPUS</button>
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>