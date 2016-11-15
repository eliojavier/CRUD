@extends('layouts.app')

@section('content')
    <div id="app_vue">
        @{{ message }}
    </div>
    <div class="form-group row add">
        <div class="col-md-12">
            <h1>Simple CRUD</h1>
        </div>
        <div class="col-md-12">
            <button type="button" data-toggle="modal" data-target="#create-item" class="btn btn-primary">
                Create new post
            </button>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <tr v-for="item in items">
                    <td>@{{item.title }}</td>
                    <td>@{{item.description }}</td>
                    <td><button class="edit-modal btn btn-warning" @click.prevent="editItem(item)">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="edit-modal btn btn-warning" @click.prevent="deleteItem(item)">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Create new post</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" v-model="newItem.title"/>
                            <span v-if="formErrors['title']" class="error text-danger">
                                @{{ formErrors['title'] }}
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" v-model="newItem.description">

                            </textarea>
                            <span v-if="formErrors['description']" class="error text-danger">
                                @{{ formErrors['description'] }}
                            </span>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
@endsection