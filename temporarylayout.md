@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Users</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

@endsection

## Posts
    **permision**
    <ul>
    <li>post-list</li>
    <li>post-create</li>
    <li>post-edit</li>
    <li>post-view</li>
    <li>post-delete</li>
    </ul>
## Category
    **permision**
    <ul>
    <li>category-list</li>
    <li>category-create</li>
    <li>category-edit</li>
    <li>category-view</li>
    <li>category-delete</li>
    </ul>
## Tag
    **permision**
    <ul>
    <li>tag-list</li>
    <li>tag-create</li>
    <li>tag-edit</li>
    <li>tag-view</li>
    <li>tag-delete</li>
    </ul>

================================================================================
Pending Work
1. Role management (Role with having permission/Permission)*
2. SweetAlert add for message*
3. CMS Part complete
    3.1 photo add in post
    3.2 subcategory add
4. Additional Features add
    4.1 save as draft post
    4.2 views count post
    4.3 
