@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penilaian.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penilaians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaian.fields.id') }}
                        </th>
                        <td>
                            {{ $penilaians->id }}
                        </td>
                    </tr>
                    <tr>
                        {{-- <th>
                            {{ trans('cruds.penilaian.fields.image') }}
                        </th> --}}
                        {{-- <td>
                            @if($penilaian->image)
                                <a href="{{ $penilaian->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $penilaian->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td> --}}
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaian.fields.nama_siswa') }}
                        </th>
                        <td>
                            {{ $penilaians->nama_siswa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaian.fields.prestasi') }}
                        </th>
                        <td>
                            {{ $penilaians->prestasi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaian.fields.nilai_displin') }}
                        </th>
                        <td>
                            {{ $penilaians->nilai_displin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penilaian.fields.nilai_absensi') }}
                        </th>
                        <td>
                            {{ $penilaians->nilai_absensi }}
                        </td>
                        <th>
                            {{ trans('cruds.penilaian.fields.nilai_mpe  ') }}
                        </th>
                        <td>
                            {{ $penilaians->nilai_mpe }}
                        </td>
                        <th>
                            {{ trans('cruds.penilaian.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $penilaians->keterangan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penilaians.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection