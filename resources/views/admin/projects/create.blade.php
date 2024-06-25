@extends('layouts.admin')

@section('content')
   <div class="container">

      <div class="row justify-content-center">

         <div class="col-md-8 mt-4">

            <div class="card">

               {{-- Header --}}
               <div class="card-header d-flex justify-content-between">

                  {{-- Project Table Title --}}
                  <div class="col-9 fw-bold fs-3 text-primary">

                     {{ __('Add New Project') }}

                  </div>

                  {{-- Button to Projects Table --}}
                  <div class="col-3 d-flex justify-content-end align-items-end">

                     <a type="button"
                        class="btn btn-outline-primary h-75 w-100 d-flex align-items-center justify-content-center"
                        href="{{ route('admin.projects.index') }}">

                        <i class="fa-solid fa-angles-left"></i> Go to Projects Table

                     </a>

                  </div>

               </div>

               {{-- Form Section --}}
               <section class="card-body">

                  <form class="border rounded p-3 my-4" action="{{ route('admin.projects.store') }}" method="POST">
                     @csrf

                     <div class="row g-3">

                        {{-- Title Input --}}
                        <div class="col-12">

                           <label for="title" class="form-label fw-bold">Project Title</label>
                           <input type="text"
                              class="form-control
                              @error('title')
                              is-invalid
                              @enderror"
                              id="title"
                              name="title"
                              value="{{ old('title') }}">

                           @error('title')
                              <div class="alert alert-danger mt-1">
                                 {{ $message }}
                              </div>
                           @enderror

                        </div>

                        {{-- Select Type --}}
                        <div class="col-12">

                           <select class="form-select"
                              aria-label="Select Type"
                              id="type_id"
                              name="type_id">

                              <option @selected(old('type_id') == null)>Choose a type...</option>

                              @foreach ($typesCollection as $type)
                                 <option @selected(old('type_id') == $type->id) value="{{ $type->id }}" >
                                    {{ $type->name }}
                                 </option>
                              @endforeach

                           </select>

                        </div>

                        {{-- Description Input --}}
                        <div class="col-12">

                           <label for="description" class="form-label">Description</label>
                           <textarea
                              class="form-control
                              @error('description')
                              is-invalid
                              @enderror"
                              id="description"
                              name="description"
                              rows="5"
                              placeholder="Insert here a description...">{{ old('description') }}</textarea>

                           @error('description')
                              <div id="title-empty-error" class="invalid-feedback">
                                 {{ $message }}
                              </div>
                           @enderror

                        </div>

                     </div>

                     <hr class="my-4">

                     {{-- Submit Button --}}
                     <div class="col-4">

                        <button class="w-100 btn btn-primary btn-lg mb-4" type="submit">Create</button>

                     </div>

                  </form>

               </section>

            </div>

         </div>

      </div>

   </div>
@endsection
