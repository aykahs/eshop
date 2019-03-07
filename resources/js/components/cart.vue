<template>
<div id="cart_box">
<div class="box" v-for="cart in carts" v-bind:key="cart.id" id="cart">
                        <article class="media" >

                          <div class="media-left">
                            <figure class="image is-64x64">
                              <img :src=" cart.item.imagepath" alt="Image">
                            </figure>
                          </div>
                          <div class="media-content">
                            <div class="content">
                              <p>
                                <strong> {{ cart.item.title}}</strong><br>

                                  <small>Per product price: ${{ cart.item.price }}</small><br>
                                  <small>Per product total price: ${{  cart.price }}</small>


                              </p>
                            </div>
                            <nav class="level is-mobile">
                              <div class="level-left">

                                <a @click="increment(cart.item.id)" class="level-item" aria-label="reply">
                                  <span class="icon is-small">
                                     <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                </a>
                                <a  class="level-item" aria-label="retweet">
                                  <span class="icon is-small">
                                   {{ cart.qty }}
                                  </span>
                                </a>
                                <a @click="decrement(cart.item.id)" class="level-item" aria-label="like">
                                  <span class="icon is-small">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                  </span>
                                </a>
                                <a @click="deleteproduct(cart.item.id)" class="level-item" aria-label="like">
                                  <span class="icon is-small">
                                       <i class="fa fa-trash" aria-hidden="true"></i>
                                  </span>
                                </a>
                              </div>
                            </nav>
                          </div>
                        </article>
                      </div>
                            <div class="tile" >
                                <p>

                                    <strong>Total price: ${{ cartinfo.totalprice}}</strong><br>
                                    <small>Total products: {{ cartinfo.totalQty }}</small>  <br>
                                </p>

                                    <div class="navbar-end">
                                         <a href="/cart/payment" class="button is-success">Checkout</a>
                                    </div>

                            </div>
                    </div>
</template>

<script>
    export default {
         data(){
            return{
                   carts:[],
                   cartinfo:[],
            }
            },

         created()
       {
            this.cart();
       },
        methods:
       {
           cart()
           {
                 var app = this;
               axios.get('http://127.0.0.1:8000/api/cart')
                .then((response) => {
                    app.carts = response.data.data.items,
                    app.cartinfo = response.data.data
                })
                .catch(error =>console.log(error)
                 );
           },
           increment(id)
           {
                axios.get('http://127.0.0.1:8000/api/cart/increment/'+id)
                .then((response) => {
                    this.sucessupdata()
                })
                .catch(error =>console.log(error)
                 );

           },
           decrement(id)
           {
               axios.get('http://127.0.0.1:8000/api/cart/decrement/'+id)
                .then((response) => {
                    this.sucessupdata()
                })
                .catch(error =>console.log(error)
                 );
           },
             deleteproduct(id)
           {
               axios.get('http://127.0.0.1:8000/api/cart/delete/'+id)
                .then((response) => {
                    this.sucessupdata()
                })
                .catch(error =>console.log(error)
                 );
           },

           sucessupdata()
           {
               this.cart();
           },
       }

    }
</script>

<style>
#cart{
    margin-top: 20px;
    margin-bottom: 30px;
}
#cart_box{
    height: 500px;
}
  a {
      text-decoration:none;
   }
</style>

