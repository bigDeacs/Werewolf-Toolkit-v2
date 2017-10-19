import Errors from './Errors';

class Form {
  constructor(data) {
    this.originalData = data;
    for (let field in data) {
      this[field] = data[field];
    }

    this.errors = new Errors();
  }

  data() {
    let data = {};

    for (let property in this.originalData) {
        data[property] = this[property];
    }

    return data;
  }

  reset() {
    for (let field in this.originalData) {
      this[field] = '';
    }

    this.errors.clear();
  }

  post(url) {
    return this.submit('post', url).then(flash('Role Added Successfully'));
  }

  delete(url) {
    return this.submit('delete', url).then(flash('Role Deleted Successfully'));
  }

  submit(requestType, url) {
      return new Promise((resolve, reject) => {
        axios[requestType](url, this.data())
          .then(response => {
            this.onSuccess(response.data);
            resolve(response.data);
          })
          .catch(error => {
            this.onFail(error.response.data);
            reject(error.response.data);
          });
      });

  }

  onSuccess(data) {
    this.reset();
  }

  onFail(errors) {
      this.errors.record(errors);
  }
}

export default Form;