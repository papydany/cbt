<table>
    <thead>
    <tr>
        <th>seria number</th>
        <th>center number</th>
          <th>Pin</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pin as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->user_id }}</td>
             <td>{{ $p->pin }}</td>
        </tr>
    @endforeach
    </tbody>
</table>