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
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
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
                              <button type="button" class="btn btn-warning">Edit</button>
                              <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                          </td>
                        </tr>
                      </thead>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Create new role</h4>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="/api/roles" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
                              <div class="form-group">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="name">
                                <span class="text-danger" v-if="errors.has('name')" v-text="errors.get('name')"></span>
                              </div>
                              <div class="form-group">
                                <label for="description">Role Description:</label>
                                <input type="text" class="form-control" id="description" name="description" v-model="description">
                                <span class="text-danger" v-if="errors.has('description')" v-text="errors.get('description')"></span>
                              </div>
                              <button type="submit" class="btn btn-primary" :disabled="errors.any()">Create</button>
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
