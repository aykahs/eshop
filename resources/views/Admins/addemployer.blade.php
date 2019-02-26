@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="addemp">
                    <Addmployer></Addmployer>
                    {{--  <div>
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

                          </div>  --}}
            </div>

        </div>

    </div>
</div>

@endsection
@section('style')
<style>
        #addemp
        {
            margin-top: 50px;
            margin-right: 200px;
        }
</style>
@endsection
