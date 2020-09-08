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


# Role List
    ### superadmin
    ### admin
    ### user


# Permissions Lists
## Users
    **users**
    <ul>
    <li>user-create</li>
    <li>all-users</li>
    </ul>

## Posts
    **permision**
    <ul>
    <li>list-post</li>
    <li>create-post</li>
    <li>edit-post</li>
    <li>view-post</li>
    <li>delete-post</li>
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
## Tag
    **subcategory**
    <ul>
    <li>subcategory-lists</li>
    <li>subcategory-create</li>
    <li>subcategory-edit</li>
    <li>subcategory-view</li>
    <li>subcategory-delete</li>
    </ul>

================================================================================
Pending Work

# Dashboard Section
    # User Datatable
        confirm mail => done
        active/inactive => middleware check web (isActive column)
        profile pic
    # Post
        draft => column add
=================================================================================    
# Front Side section
    # Landing Page
        body part => [all post
        ]
        side part => [cat list
                      tag list
                      archive*
        ]

    # Internal page
        main content having[
            category, tag, author, created_at, post_views
        ]
    
    # Landing && Internal common part => 
            [ 
                Search Field (Livewire apply) OR 
                save search keyword*.
            ]

# challenging task
    priority_wise_sort
        # save post => [auth_user]
        # like dislike => last_end
        # print post => not mandatory
===================================================================================
# Note=> * means after major part done then do this.
