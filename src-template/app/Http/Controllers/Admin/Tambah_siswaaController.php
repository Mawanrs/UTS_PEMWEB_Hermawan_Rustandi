<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Tambah_siswaa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storetambah_siswaaRequest;
use App\Http\Requests\Updatetambah_siswaaRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroytambah_siswaaRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tambah_siswaaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tambah_siswaa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tambah_siswaas = Tambah_siswaa::with(['media'])->get();

        return view('admin.tambah_siswaa.index', compact('tambah_siswaas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tambah_siswaa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tambah_siswaa.create');
    }

    public function store(StoreTambah_siswaaRequest $request)
    {
        $tambah_siswa = Tambah_siswaa::create($request->all());

        // if ($request->input('image', false)) {
        //     $Tambah_siswa->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $Tambah_siswa->id]);
        // }

        return redirect()->route('admin.tambah_siswaa.index');
    }

    public function edit(Tambah_siswaa $tambah_siswa)
    {
        abort_if(Gate::denies('tambah_siswaa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tambah_siswaa.edit', compact('tambah_siswa'));
    }

    public function update(UpdateTambah_siswaaRequest $request, Tambah_siswaa $tambah_siswaa)
    {
        $tambah_siswaa->update($request->all());

        // if ($request->input('image', false)) {
        //     if (! $Tambah_siswa->image || $request->input('image') !== $Tambah_siswa->image->file_name) {
        //         if ($Tambah_siswa->image) {
        //             $Tambah_siswa->image->delete();
        //         }
        //         $Tambah_siswa->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        //     }
        // } elseif ($Tambah_siswa->image) {
        //     $Tambah_siswa->image->delete();
        // }

        return redirect()->route('admin.tambah_siswaa.index');
    }

    public function show(Tambah_siswaa $tambah_siswaa)
    {
        abort_if(Gate::denies('tambah_siswaa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tambah_siswaa.show', compact('tambah_siswaa'));
    }

    public function destroy(Tambah_siswaa $tambah_siswaa)
    {
        abort_if(Gate::denies('tambah_siswaa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tambah_siswaa->delete();

        return back();
    }

    public function massDestroy(MassDestroyTambah_siswaaRequest $request)
    {
        $tambah_siswaas = Tambah_siswaa::find(request('ids'));

        foreach ($tambah_siswaas as $tambah_siswaa) {
            $tambah_siswaa->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // public function storeCKEditorImages(Request $request)
    // {
    //     abort_if(Gate::denies('Tambah_siswa_create') && Gate::denies('Tambah_siswa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $model         = new Tambah_siswa();
    //     $model->id     = $request->input('crud_id', 0);
    //     $model->exists = true;
    //     $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

    //     return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    // }
}