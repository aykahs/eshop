<template>
<div>
  <h1>Add Employer</h1>
    <form @submit.prevent="onsubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="field">
  <label class="label">Name</label>
  <div class="control has-icons-left has-icons-right">
 <input class="input" v-model="form.name" name="name" type="text" placeholder="Text input">
<span class=" help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
 </div>
</div>

<div class="field">
  <label class="label">Role</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" name="role"  v-model="form.role" type="text" placeholder="Text input">
<span class=" help is-danger"  v-if="form.errors.has('role')" v-text="form.errors.get('role')"></span>
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" name="email" v-model="form.email" type="email" placeholder="Email input">
<span class=" help is-danger"  v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
  </div>
</div>
<div class="field">
  <label class="label">Password</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input" name="password" v-model="form.password" type="password" placeholder="Text input">
<span class=" help is-danger"  v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-primary" :disabled = "form.errors.any()">Submit</button>
  </div>

</div>

    </form>

</div>
</template>
<script>
class Errors{
     constructor()
    {
        this.errors={};
    }
    get(field){
        if(this.errors[field]){
           return this.errors[field][0];
        }

    }
    record(errors)
       {
            this.errors = errors;
       }

    clear(field)
    {
        if(field){
            delete this.errors[field];
            return;
        }
        this.errors = {};

    }

    has(field)
    {
        return this.errors.hasOwnProperty(field);
    }

    any()
    {
        return Object.keys(this.errors).length > 0;

    }

}
class Form{

  constructor(data)
  {

      this.orgdata = data;
      for(let field in data)
      {
        this[field] = data[field];
      }
    this.errors = new Errors();

  }

  data()
  {

      let data = Object.assign({}, this);
      delete data.orgdata;
      delete data.errors;
        return data;
  }

  reset()
  {
      for(let field in this.orgdata)
      {
          this[field] ='';
      }
  }
  submit(requestType, url)
  {
            axios[requestType](url,this.data())
            .then(this.onsucess.bind(this))
            .catch( this.onfail.bind(this));


}
        onsucess(response)
        {

        alert('sucess');
        this.errors.clear();
        this.reset();

        }

        onfail(error)
        {
        this.errors.record(error.response.data.errors);
        }
  }


    export default
     {
        data()
        {
            return{
              form : new Form({

                'name':'',
                'email':'',
                'password':'',
                'role':''
              }),


            }

        },
        methods:
        {
            onsubmit()
            {
                this.form.submit('post','http://127.0.0.1:8000/api/Admin/create/employer');
                }

    }
};
</script>
