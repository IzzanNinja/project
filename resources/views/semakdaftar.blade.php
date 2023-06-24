@extends('navigation')

@section('navigation')

    <h1>Daftar Details</h1>

    <table>
        <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $daftar->id }}</td>
            </tr>
            <tr>
                <th>Pemohon:</th>
                <td>{{ $daftar->pemohon }}</td>
            </tr>
            <tr>
                <th>No. Kad Pengenalan:</th>
                <td>{{ $daftar->nokp }}</td>
            </tr>
            <tr>
                <th>Alamat:</th>
                <td>{{ $daftar->alamat }}</td>
            </tr>
            <tr>
                <th>Poskod:</th>
                <td>{{ $daftar->poskod }}</td>
            </tr>
            <tr>
                <th>Daerah ID:</th>
                <td>{{ $daftar->daerah_id }}</td>
            </tr>
            <tr>
                <th>No. Telefon:</th>
                <td>{{ $daftar->notel }}</td>
            </tr>
            <tr>
                <th>No. Telefon Bimbit:</th>
                <td>{{ $daftar->nohp }}</td>
            </tr>
            <tr>
                <th>No. Kad:</th>
                <td>{{ $daftar->nokad }}</td>
            </tr>
            <tr>
                <th>Tahun Pohon:</th>
                <td>{{ $daftar->tahunpohon }}</td>
            </tr>
            <tr>
                <th>Rumah Daftar:</th>
                <td>{{ $daftar->rd_daftar }}</td>
            </tr>
            <tr>
                <th>Cuti Musim:</th>
                <td>{{ $daftar->ch_musim }}</td>
            </tr>
            <tr>
                <th>Cuti Musim 2:</th>
                <td>{{ $daftar->ch_musim2 }}</td>
            </tr>
            <tr>
                <th>Tarikh:</th>
                <td>{{ $daftar->tarikh }}</td>
            </tr>
        </tbody>
    </table>
@endsection
