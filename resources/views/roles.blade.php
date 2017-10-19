@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
                      Create new role
                    </button>
                    <table class="table table-responsive table-hover" v-cloak>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th width="200px">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="role in roles">
                          <td>@{{ role.id }}</td>
                          <td>@{{ role.name }}</td>
                          <td>@{{ role.description }}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Edit</button>
                              <button type="button" class="btn btn-danger" @click="onDelete(role.id)">Delete</button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Create new role</h4>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="/api/roles" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                              <div class="form-group">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="form.name">
                                <span class="text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                              </div>
                              <div class="form-group">
                                <label for="description">Role Description:</label>
                                <input type="text" class="form-control" id="description" name="description" v-model="form.description">
                                <span class="text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                              </div>
                              <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Create</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit role</h4>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="/api/roles" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                              <div class="form-group">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="form.name">
                                <span class="text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                              </div>
                              <div class="form-group">
                                <label for="description">Role Description:</label>
                                <input type="text" class="form-control" id="description" name="description" v-model="form.description">
                                <span class="text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                              </div>
                              <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Create</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
