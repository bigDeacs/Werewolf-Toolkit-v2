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
                    <div id="root">
                        <h1 >Hello World</h1>
                        <p v-cloak>@{{ message }}</p>

                        <ul>
                            <li v-for="name in names" v-text="name"></li>
                        </ul>

                        <input type="text" v-model="newName">
                        <button @click="addName" v-bind:title="title">Add Name</button>
                    </div>
                    
                    <script>
                        var app = new Vue({
                            el: '#root',
                            data: {
                                message: 'You are logged in!',
                                newName: '',
                                names: ['Brent', 'Hannah', 'Caleb', 'Jordi'],
                                title: 'Now the title is being set through JavaScript',
                                isLoading: false
                            },
                            methods: {
                                addName() {
                                    this.names.push(this.newName);
                                    this.newName = '';
                                }
                            }
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
