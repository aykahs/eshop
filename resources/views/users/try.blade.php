@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
         
            <div v-for="product in products" v-bind:key="product.id">
                    <div class="card" style="width: 18rem;" id="boxx">
                        <a  @click=" open_model(product)">
                        <figure class="image is-3by2">
                        <img class="card-img-top"  :src="product.imagepath" >
                        </figure>
                        </a>
                    <div class="card-body">
                        <span>
                        Title:<h5 class="card-title">{{ product.title }}</h5>
                        </span>
    
                        <p class="card-text">
                            <span class="icon is-small">
                                <i class="fas fa-dollar-sign"></i> {{ product.price }}
                                </span>
                        </p>
                        <a class="button is-primary" @click="add_to_cart(product.id)">Add to cart</a>
                    </div>
                    </div>
    
            </div>
        </div>
    </div>
</div>
@endsection
