@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, and Remove Notes Data!</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Students</h5>
                        </div>
                        <div class="ms-md-3 pe-md-3 d-flex align-items-left">
                            <div class="input-group">
                                <span class="input-group-text text-body"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                  </svg></span>
                                <input type="text" class="form-control form-control-navbar" name="" id="search-item" placeholder="Search by Name" onkeyup="search()">
                            </div>
                            <script>
                                function search(){
                                    var td, tr, searchbox, table, filter, textvalue;
                                    searchbox = document.getElementById("search-item")
                                    filter = searchbox.value.toUpperCase()
                                    table = document.getElementById("table-data")
                                    tr = table.getElementsByTagName("tr")

                                    for(var i = 0; i < tr.length; i++){
                                        td = tr[i].getElementsByTagName('td')[1];
                                        if(td){
                                            textvalue = td.textContent || td.innerText;

                                            if(textvalue.toUpperCase().indexOf(filter) > -1){
                                                tr[i].style.display = "";
                                            }else{
                                                tr[i].style.display = "none";
                                            }
                                        }
                                    }
                                }
                            </script>
                            </div>
                            @auth
                            @if(auth()->user()->role != "User")
                        <a href="{{route('noteind.step1')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Note</a>
                            @endif 
                            @endauth
                    </div>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-responsive" id ="table-data">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nama Pembimbing
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nama Siswa
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tanggal Konseling
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Deksripsi Umum
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Jenis Konseling
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    @auth
                                    @if(auth()->user()->role != "User")
                                    
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    @endif
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($notes as $note)
                                <tr>
                                        <td class="ps-4 text-s font-weight-bold mb-0">
                                            {{$note->user->namaUser}}
                                        </td>
                                        <td class="ps-4 text-s font-weight-bold mb-0">
                                            {{ $note->student->Nama }}
                                        </td>
                                        <td class="p-2 text-center text-s font-weight-bold mb-0">
                                            {{ $note->tglKonseling }}
                                        </td>
                                        <td class="p-2 text-center text-s font-weight-bold mb-0">
                                            {{ $note->deskripsiUmum }}
                                        </td>
                                        <td class="text-center text-s font-weight-bold mb-0">
                                            {{ $note->jenisKonseling }}
                                        </td>
                                        <td class="text-center text-s font-weight-bold mb-0">
                                            {{ $note->status }}
                                        </td>
                                        <td class="text-center ">
                                            @auth
                                            @if(auth()->user()->role != "User")
                                            <a href="{{route('noteind.editstep1', $note->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Note">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                                                  </svg>
                                            </a>
                                            <span>
                                            <a href="{{route('noteInd.destroy', $note->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Remove Note">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                    <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                                                </svg>
                                            </a>
                                            </span>
                                            @endif
                                            @endauth
                                        </td>
                                @empty

                                @endforelse
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        @auth
                        @if(auth()->user()->role != "User")
                        <a href = "{{route('noteInd.printPdf')}}" style = "float:right; margin-right:1.5%;" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                                <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                              </svg>
                            Export to PDF
                        </a>
                        <a href="{{route('noteind.detailstep1')}}" style="float:right;margin-right:1.5%" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                            Search Students
                        </a>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
