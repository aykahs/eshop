@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div id="addemp">
                <Addproduct></Addproduct>
                    {{--  <div>
                        <h1>Add Employer</h1>
                              <form @submit.prevent="onsubmitproduct" @keydown="product.errors.clear($event.target.name)">
                                  <div class="field">
                            <label class="label">Title</label>
                            <div class="control has-icons-left has-icons-right">
                           <input class="input" v-model="product.title" name="title" type="text" placeholder="Title">
                          <span class=" help is-danger" v-if="product.errors.has('title')" v-text="product.errors.get('title')"></span>
                           </div>
                        </div>
                          <div class="field">
                            <label class="label">Price</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input" name="price" v-model="product.price" type="text" placeholder="Price ">
                          <span class=" help is-danger"  v-if="product.errors.has('price')" v-text="product.errors.get('price')"></span>
                            </div>
                          </div>
                            <div class="field">
                                <label class="label">Categories</label>
                                <div class="control has-icons-left has-icons-right">
                                <input class="input" name="categories" v-model="product.categories" type="text" placeholder=" Categories">
                            <s  pan class=" help is-danger"  v-if="product.errors.has('categories')" v-text="product.errors.get('categories')"></span>
                                </div>
                            </div>
                          <div class="field">
                            <label class="label">Add pic</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input" name="imagepath" v-model="product.imagepath" type="text" placeholder="Text input">
                          <span class=" help is-danger"  v-if="product.errors.has('imagepath')" v-text="product.errors.get('imagepath')"></span>
                            </div>
                          </div>

                          <div class="field is-grouped">
                            <div class="control">
                              <button class="button is-primary" :disabled = "product.errors.any()">Submit</button>
                            </div>

                          </div>

                              </form>

                          </div>  --}}

        </div>
    </div>
</div>

@endsection
@section('style')
<style>
        #addemp
        {
            margin-top: 50px;
            margin-right: 250px;

        }
</style>
@endsection
