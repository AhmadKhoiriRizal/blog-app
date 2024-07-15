@extends('admin.layouts.layouts')

@section('content')
<section>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
           <div class="col-sm-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                      <div class="header-title">
                          <h4 class="card-title mb-0">Data Blog</h4>
                        </div>
                        <div class="">
                                 <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
                                     <i class="btn-inner">
                                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                         </svg>
                                     </i>
                                     <span class="fa fa-plus">Add New Blog</span>
                                 </a>
                                 <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title" id="staticBackdropLabel">Create New Category</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="form-group">
                                                    @php
                                                    use App\Models\Category;
                                                    $categories = Category::all();
                                                    @endphp
                                                    <form action="{{ route('add.bloga') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                            <input type="text" class="form-control mb-2 @error('nama_uploader') is-invalid @enderror" value="{{ old('nama_uploader') }}" id="nama_uploader" name="nama_uploader" placeholder="Input nama uploader">
                                                            @error('nama_uploader')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror

                                                            <input type="file" class="form-control mb-2 @error('foto') is-invalid @enderror" value="{{ old('foto') }}" id="foto" name="foto" placeholder="Input Image">
                                                            @error('foto')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror

                                                            <input type="date" class="form-control mb-2 @error('tanggal_upload') is-invalid @enderror" value="{{ old('tanggal_upload') }}" id="tanggal_upload" name="tanggal_upload" placeholder="Input date upload">
                                                            @error('tanggal_upload')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror

                                                            <input type="text" class="form-control mb-2 @error('judul') is-invalid @enderror" value="{{ old('judul') }}" id="judul" name="judul" placeholder="Input title name">
                                                            @error('judul')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror

                                                            <select class="form-control mb-2 @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                                                <option value="">Pilih Kategori</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror

                                                            <textarea class="form-control" rows="10" name="deskripsi" id="summernote" placeholder="Input Description">{{ old('deskripsi') }}</textarea>
                                                            @error('deskripsi')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="text-start mt-2">
                                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ceate</button>
                                                            <a href="" type="button" class="btn btn-danger">Cancel</a>
                                                        </div>
                                                    </form>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <span> *masukkan fahmi@1 untuk menampilkan Aplikasi Populer, fahmi@2: Trending, fahmi@3: Latest</span>
                 <div class="card-body">
                    <div class="table-responsive">
                       <table id="add-row" class="table table-bordered" data-toggle="data-table">
                          <thead class="table-info">
                             <tr>
                                 <th class="col-xl-1 text-center">NO</th>
                                 <th class="col-xl-2 text-center">FOTO</th>
                                 <th class="col-xl-1 text-center">NAME</th>
                                 <th class="col-xl-1 text-center">DATE</th>
                                 <th class="col-xl-1 text-center">JUDUL</th>
                                 <th class="col-xl-1 text-center">CATEGORY</th>
                                 <th class="col-xl-4 text-center">DESCRIPTION</th>
                                 <th class="col-xl-1 text-center">ACTION</th>
                             </tr>
                          </thead>
                          <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($blogs as $blog)
                             <tr>
                                 <td class="col-xl-1 text-center">{{ $no++ }}</td>
                                 <td class="col-xl-2 "><img src="{{ asset('storage/blog/'. $blog->foto) }}" height="100" alt=""></td>
                                 <td class="col-xl-1 text-break">{{ $blog->nama_uploader }}</td>
                                 <td class="col-xl-1 text-break">{{ \Carbon\Carbon::parse($blog->tanggal_upload)->format('d/m/Y') }}</td>
                                 <td class="col-xl-1 text-break">{{ $blog->judul }}</td>
                                 <td class="col-xl-1 text-break">{{ $blog->category->kategori }}</td>
                                 <td class="col-xl-4 text-break" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; text-align: justify; text-justify: inter-word;">{{ $blog->deskripsi }}</td>
                                 <!-- <td class="col-xl-1 text-center">**************</td> -->
                                 <td class="col-xl-1 text-center">
                                     <div style="float:center;">
                                         <a class="btn btn-sm btn-icon text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $blog->id }}" title="Edit User" href="">
                                             <span class="btn-inner">
                                                 <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                                     <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                     <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                     <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                 </svg>
                                             </span>
                                         </a>
                                         <div class="modal fade" id="staticBackdrop-{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Update Blog</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <form action="{{ route('update.bloga', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                    <input type="text" class="form-control mb-2 @error('nama_uploader') is-invalid @enderror" value="{{ old('nama_uploader', $blog->nama_uploader) }}" id="nama_uploader" name="nama_uploader" placeholder="Input nama uploader">
                                                                    @error('nama_uploader')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <img src="{{ asset('storage/blog/'. $blog->foto) }}" height="100" alt="">
                                                                    <input type="file" class="form-control mb-2 @error('foto') is-invalid @enderror" id="foto" name="foto" placeholder="Input Image">
                                                                    @error('foto')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <input type="date" class="form-control mb-2 @error('tanggal_upload') is-invalid @enderror" value="{{ old('tanggal_upload', $blog->tanggal_upload) }}" id="tanggal_upload" name="tanggal_upload">
                                                                    @error('tanggal_upload')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <input type="text" class="form-control mb-2 @error('judul') is-invalid @enderror" value="{{ old('judul', $blog->judul) }}" id="judul" name="judul" placeholder="Input title name">
                                                                    @error('judul')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <select class="form-control mb-2 @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                                                        <option value="">Pilih Kategori</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>{{ $category->kategori }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('category_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <textarea class="form-control" rows="10" name="deskripsi" id="deskripsi" placeholder="Input Description">{{ old('deskripsi', $blog->deskripsi) }}</textarea>
                                                                    @error('deskripsi')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="text-start mt-2">
                                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                                                                    <a href="/bloga" type="button" class="btn btn-danger">Cancel</a>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <form action="{{ route('destroy.bloga', $blog->id) }}" method="POST" onsubmit="return confirm('Apakah yakin akan dihapus?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-icon text-danger" data-bs-toggle="tooltip" title="Delete User">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </form>
                                     </div>
                                 </td>
                             </tr>
                             @endforeach
                          </tbody>
                          <tfoot class="table-info">
                             <tr>
                                <th class="col-xl-1 text-center">NO</th>
                                <th class="col-xl-2 text-center">FOTO</th>
                                <th class="col-xl-1 text-center">NAME</th>
                                <th class="col-xl-1 text-center">DATE</th>
                                <th class="col-xl-1 text-center">JUDUL</th>
                                <th class="col-xl-1 text-center">CATEGORY</th>
                                <th class="col-xl-4 text-center">DESCRIPTION</th>
                                <th class="col-xl-1 text-center">ACTION</th>
                                {{-- <th class="col-xl-1 text-center">ACTION</th> --}}
                             </tr>
                          </tfoot>
                       </table>
                    </div>
                 </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection
