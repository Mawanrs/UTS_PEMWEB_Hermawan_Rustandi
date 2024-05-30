<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenilaianRequest;
use App\Http\Requests\UpdatePenilaianRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyPenilaianRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PenilaianController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('penilaian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penilaians = Penilaian::with(['media'])->get();

        return view('admin.penilaians.index', compact('penilaians'));
    }

    public function create()
    {
        abort_if(Gate::denies('penilaian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penilaians.create');
    }

    public function store(StorePenilaianRequest $request)
    {
        $penilaians = Penilaian::create($request->all());

        // if ($request->input('image', false)) {
        //     $Tambah_siswa->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $Tambah_siswa->id]);
        // }

        return redirect()->route('admin.penilaians.index');
    }

    public function edit(Penilaian $penilaians)
    {
        abort_if(Gate::denies('penilaian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penilaian.edit', compact('penilaians'));
    }

    public function update(UpdatepenilaianRequest $request, penilaian $penilaians)
    {
        $penilaians->update($request->all());

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

        return redirect()->route('admin.penilaians.index');
    }

    public function show(penilaian $penilaians)
    {
        abort_if(Gate::denies('penilaian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.penilaians.show', compact('penilaians'));
    }

    public function destroy(Penilaian $penilaians)
    {
        abort_if(Gate::denies('penilaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penilaians->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenilaianRequest $request)
    {
        $penilaians = penilaian::find(request('ids'));

        foreach ($penilaians as $penilaian) {
            $penilaians->delete();
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