@extends('layouts.user_type.auth')

@section('content')

<div>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 10pt;
            
		}
        th{
        font-size: 10pt;
        background-color:gray;
        text-align: center;
        }
        
	</style>

    <div class="row">
        <div>
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            @foreach ($student as $stud)
                                    <h5 class="mb-0">Detail Konseling {{$stud->Nama}}</h5>
                                @endforeach
                            
                        </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <br>
                        <div>
                        <strong>Konseling Sebelumnya</strong> <br>
                        <br>
                        <table class="table table-bordered" style="table-layout:fixed;">
                            <thead>   
                                <tr>
                                    <th scope="col">Deskripsi Umum</th>
                                    <th scope="col">Deskripsi Masalah</th>
                                    <th scope="col">Tanggal Konseling</th>
                                    <th scope="col">Tanggal Rencana tindak Lanjut</th>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php
                                    $previousNotes = \DB::table('noteindividu')->where('students_id', $studentId)->orderBy('tglKonseling', 'desc')->get();
                                    @endphp
                                    @forelse ($previousNotes as $notes)
                                    <tr>
                                        <td style="word-break: break-word; word-break: break-all; white-space: normal;text-align: center;vertical-align: middle">{!! $notes->deskripsiUmum !!}</td>
                                        <td style="word-break: break-word; word-break: break-all; white-space: normal;text-align: center;vertical-align: middle">{!! $notes->deskripsiMasalah !!}</td>
                                        <td style="word-break: break-word; word-break: break-all; white-space: normal;text-align: center;vertical-align: middle">{!! $notes->tglKonseling !!}</td>
                                        <td style="word-break: break-word; word-break: break-all; white-space: normal;text-align: center;vertical-align: middle">{!! $notes->tglRTL !!}</td>
                                    @empty
                                    @endforelse
                                    </tr>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <a href="/noteInd" style="float:right;margin-right:1.5%" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                              </svg>
                            Back
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
