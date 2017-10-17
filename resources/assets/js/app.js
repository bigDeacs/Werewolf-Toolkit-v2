
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

class Errors {
  constructor() {
    this.errors = {};
  }

  get(field) {
    if (this.errors[field]) {
      return this.errors[field][0]
    }
  }

  record(errors) {
    this.errors = errors;
  }

  clear(field) {
    delete this.errors[field];
  }

  has(field) {
    return this.errors.hasOwnProperty(field);
  }

  any() {
    return Object.keys(this.errors).length > 0;
  }
}

window.onload = function () {
  var roles = new Vue({
      el: '#app',
      data: {
          name: '',
          description: '',
          errors: new Errors(),
          roles: []
      },
      created() {
          axios.get('/api/roles')
            .then(({data}) => this.roles = data);
      },
      methods: {
        onSubmit() {
          axios.post('/api/roles', this.$data)
            .then(this.onSuccess)
            .catch(error => this.errors.record(error.response.data));
        },

        onSuccess(response) {
          alert(response.data.message);
          this.name = '';
          this.description = '';
        }
      }
  });
}
