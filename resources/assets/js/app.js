
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import axios from 'axios';
import Form from './core/Form';

Vue.component('flash', require('./components/Flash.vue'));

window.axios = axios;
window.Form = Form;

require('./bootstrap');

window.events = new Vue();

window.flash = function (message) {
  window.events.$emit('flash', message);
};

new Vue({
    el: '#app',

    data: {
        form: new Form({
          name: '',
          description: ''
        }),
        roles: []
    },
    created() {
        axios.get('/api/roles')
          .then(({data}) => this.roles = data);
    },
    methods: {
      onSubmit() {
        this.form.post('/api/roles').then(role => this.$emit('completed', role));
        //this.form.post('/api/roles').then(data => console.log(data)).catch(error => console.log(error));
      },
      addRole(role) {
        this.roles.push(role);
        alert('A new role has been added');
      },
      onDelete(id) {
        this.form.delete('/api/roles/' + id);
      }
    }
});
