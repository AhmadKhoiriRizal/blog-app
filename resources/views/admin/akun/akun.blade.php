@extends('admin.layouts.layouts')

@section('content')
<section>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
           <div class="col-sm-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                      <div class="header-title">
                          <h4 class="card-title mb-0">Data Akun Management</h4>
                        </div>
                        <div class="">
                                 <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
                                     <i class="btn-inner">
                                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                         </svg>
                                     </i>
                                     <span class="fa fa-plus">Add New Admin</span>
                                 </a>
                                 <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title" id="staticBackdropLabel">Create New Admin</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="form-group">
                                                    <form action="{{ route('add.admin') }}" method="POST">
                                                        @csrf
                                                            <input type="email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="name@example.com">
                                                            @error('email')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror

                                                            <input type="text" class="form-control mb-2 @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="your name">
                                                            @error('name')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror

                                                            <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                                            @error('password')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror


                                                            <input type="password" class="form-control mb-2 @error('confirm-password') is-invalid @enderror" name="confirm-password" id="confirm-password" placeholder="confirm-password">
                                                            @error('confirm-password')
                                                            <div class="invalid-feedback">
                                                            {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="text-start mt-2">
                                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Create</button>
                                                            <a href="/akun" type="button" class="btn btn-danger">Cancel</a>
                                                        </div>
                                                    </form>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                 <div class="card-body">
                    <div class="table-responsive">
                       <table id="datatable" class="table table-bordered" data-toggle="data-table">
                          <thead class="table-info">
                             <tr>
                                 <th class="text-center">NO</th>
                                 <th class="text-center">NAME</th>
                                 <th class="text-center">EMAIL</th>
                                 <th class="text-center">PASSWORD</th>
                                 <th class="text-center">ACTION</th>
                             </tr>
                          </thead>
                          <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($akuns as $akun)
                             <tr>
                                 <td class="text-center">{{ $no++ }}</td>
                                 <td class="">{{ $akun->name }}</td>
                                 <td class="">{{ $akun->email }}</td>
                                 <td class="text-center">**************</td>
                                 <td class="text-center">
                                     <div style="float:center;">
                                         <a class="btn btn-sm btn-icon text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $akun->id }}" title="Edit User" href="">
                                             <span class="btn-inner">
                                                 <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                                     <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                     <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                     <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                 </svg>
                                             </span>
                                         </a>
                                         <div class="modal fade" id="staticBackdrop-{{ $akun->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Update Admin</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <form action="{{ route('update.admin', $akun->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                {{-- @method('PUT') --}}
                                                                    <input type="email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{ old('email', $akun->email) }}" id="email" name="email" placeholder="name@example.com">
                                                                    @error('email')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <input type="text" class="form-control mb-2 @error('name') is-invalid @enderror" value="{{ old('name', $akun->name) }}" id="name" name="name" placeholder="your name">
                                                                    @error('name')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" id="password" placeholder="new password" required>
                                                                    @error('password')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                    @enderror

                                                                    <input type="password" class="form-control mb-2 @error('confirm-password') is-invalid @enderror" name="confirm-password" id="confirm-password" placeholder="confirm new password">
                                                                    @error('confirm-password')
                                                                    <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="text-start mt-2">
                                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                                                                    <a href="/akun" type="button" class="btn btn-danger">Cancel</a>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <form action="{{ route('destroy.admin', $akun->id) }}" method="POST" onsubmit="return confirm('Apakah yakin akan dihapus?')">
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
                                 <th class="text-center">NO</th>
                                 <th class="text-center">NAME</th>
                                 <th class="text-center">EMAIL</th>
                                 <th class="text-center">PASSWORD</th>
                                 <th class="text-center">ACTION</th>
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
