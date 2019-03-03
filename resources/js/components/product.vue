
<template >
<div>
<div id="navbar">
  <navbar></navbar>
</div>

<div id="cart">
    <nav class="level navbar is-white" role="navigation" aria-label="pagination">
  <!-- Left side -->

  <div class="level-left">


  </div>

  <!-- Right side -->
  <div class="level-right" id="cart">
      <span>
          <i class="fas fa-shopping-cart"></i>
      </span>

  </div>
</nav>

    <div class="container">
        <nav class="pagination is-right" role="navigation" aria-label="pagination">
         <div class="level-left">
             <div class="level-item">

                    <a class="pagination-previous" v-bind:class="[{disabled: !pagination.prev_page_url }]" @click="fetchproduct(pagination.prev_page_url )">Previous</a>
                    <a class="pagination-next" v-bind:class="[{disabled: !pagination.next_page_url}]"  @click="fetchproduct(pagination.next_page_url)">Next page</a>

                    <a class="pagination-link" aria-label="Goto page 1"> {{ pagination.current_page }}</a>


                </div>
         </div>
     <div class="level-right" >
    <div class="level-item">
                <div class="field has-addons" id="button" >
                        <p class="control">
                        <input class="input" type="text" placeholder="Find a product" v-model="search">
                        </p>

                        <p class="control">
                        <button class="button">
                            Search
                        </button>
                        </p>
                </div>
        </div>
     </div>
</nav>
</div>
<hr>

<div class="modal is-active" v-if="showmodel">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"  v-text="product.title"></p>
      <button class="delete" aria-label="close"  @click="close_model"></button>
    </header>
    <section class="modal-card-body">
   <div class="columns">
  <div class="column">
   <!-- image -->


      <figure class="image is-3by4">
       <img  :src="product.imagepath" >
      </figure>

  </div>
  <div class="column">
<!-- title -->
<p v-text="product.title"></p>
<p  v-text="product.categories">categories</p>
<p  v-text="product.description">description</p>

<span class="icon is-small">
                  <i class="fas fa-dollar-sign"></i><p v-text="product.price"></p>
            </span>
  </div>
   </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="add_to_cart">Add to cart</button>
      <button class="button"  @click="close_model">Cancel</button>
    </footer>
  </div>
</div>
<div id="product_box">
            <div v-for="product in filteredproduct" v-bind:key="product.id">
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
</template>



<script>
import axios from 'axios';
    export default {

        data(){
            return{

            showmodel: false,
            products:[],
            search:'',
            pagination:{},
             product:{
                title:'',
                description:'',
                price:'',
                imagepath:'',
                categories:'',
            },
            }
       },
       created()
       {
            this.fetchproduct();
       },

       methods:
       {
           add_to_cart(id)
           {
               console.log(id);

           },

           fetchproduct(page_url)
           {
               page_url = page_url || 'http://127.0.0.1:8000/api/products';
               var app = this;
              axios.get(page_url)
                .then((response) => {
                    app.products = response.data.data,
                    app.makepagination(response.data.meta, response.data.links)
                });


       },

       makepagination(meta, links)
       {
           let pagination = {
               current_page : meta.current_page,
               last_page_url : meta.last_page,
               next_page_url : links.next,
               prev_page_url : links.prev
           }

           this. pagination =  pagination;


       },
        open_model(product)
       {
           this.showmodel = true;
           this.product.id =  product.id;
           this.product.title = product.title;
           this.product.description = product.description;
           this.product.price = product.price;
           this.product.imagepath = product.imagepath;
            this.product.categories = product.categories;


       },
       close_model()
       {
           this.showmodel = false;
       }
    },
       computed:
       {
           filteredproduct:function()
           {
               return this.products.filter((p) =>
               {
                   return p.title.match(this.search) ||  p.description.match(this.search) ;
               });
           }
        }

 };
</script>
<style>
#product_box{
    margin-left: 30px;
}
#boxx{
    width: auto;
    height: auto;
    margin-top: 10px;
    margin-bottom: 50px;
    float: left;
    margin-left: 50px;
    margin-right: 30px;

}
li {
    list-style-type: none;
}
#desc
{
width: 100px;
}
#button
{
    margin-left: 20px;
}
#cart{
    margin-right:30px;
}
#cart
{
    margin-top: 10px;
}
#navbar
{
    margin-top: 10px;
}
</style>
