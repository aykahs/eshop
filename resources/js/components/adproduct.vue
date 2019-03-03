<template>
<div>
                   <div>
                        <h1>Add Product</h1>
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
                            <span class=" help is-danger"  v-if="product.errors.has('categories')" v-text="product.errors.get('categories')"></span>
                                </div>
                            </div>
                          <div class="field">
                            <label class="label">Add pic</label>
                            <div class="control has-icons-left has-icons-right">
                              <input class="input" name="imagepath" v-model="product.imagepath" type="text" placeholder="Text input">
                          <span class=" help is-danger"  v-if="product.errors.has('imagepath')" v-text="product.errors.get('imagepath')"></span>
                            </div>
                          </div>
                          <div class="field">
                            <label class="label">Description</label>
                            <div class="control has-icons-left has-icons-right">
                              <textarea class="textarea" name="description" v-model="product.description" type="text" placeholder="Description" rows="10"></textarea>
                          <span class=" help is-danger"  v-if="product.errors.has('description')" v-text="product.errors.get('description')"></span>
                            </div>
                          </div>

                          <div class="field is-grouped">
                            <div class="control">
                              <button class="button is-primary" :disabled = "product.errors.any()">Submit</button>
                            </div>

                          </div>

                              </form>

                          </div>
<div>
    <nav class="pagination is-right" role="navigation" aria-label="pagination">
    <a class="pagination-previous" v-bind:class="[{disabled: !pagination.prev_page_url}]" @click="fetchproduct(pagination.prev_page_url)">Previous</a>
    <a class="pagination-next" v-bind:class="[{disabled: !pagination.next_page_url}]"  @click="fetchproduct(pagination.next_page_url)">Next page</a>
    <ul class="pagination-list">
    <li><a class="pagination-link" aria-label="Goto page 1"> {{ pagination.current_page }}</a></li>
  </ul>
</nav>
 </div>
        <div>
            <table class="table table-striped">
            <thead>
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Categories</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image path</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody >
            <tr  v-for="product in products" v-bind:key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.title}}</td>
                <td>{{ product.categories }}</td>
                <td>{{ product.description }}</td>
                <td>{{ product.price }}</td>
                <td>
                    <figure class="image is-64x64">
                    <img  :src="product.imagepath" >
                    </figure>
            </td>
            <td><button @click="editproduct(product)" class="button is-sucess"><i class="far fa-edit"></i></button></td>
            <th> <button @click="deleteproduct(product.id)" class="button is-danger"><i class="fas fa-trash-alt"></i></button></th>
            </tr>

            </tbody>
        </table>
</div>
</div>



</template>

<script>

    export default {

         data()
        {
            return{
            products:[],
            pagination:{},
            edit:false,
            product_id:'',
              product : new Form({
                  'title':'',
                  'description':'',
                  'price':'',
                  'imagepath':'',
                  'categories':''
              }),
              del: new Form(),



            }

        },
         created()
       {
            this.fetchproduct();
       },
         methods:
        {
              onsubmitproduct()
                {
                    if(this.edit === false)
                        {

                            this.product.submit('post','http://127.0.0.1:8000/api/Admin/create/products');
                            this.fetchproduct();

                        }
                        else
                        {
                            this.product.submit('put','http://127.0.0.1:8000/api/Admin/update/products/'+this.product_id);
                            this.fetchproduct();

                        }

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
        deleteproduct(id)
       {
           swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                     this.del.delete('delete','http://127.0.0.1:8000/api/Admin/destroy/products/'+id);
                     this.fetchproduct();
                } else {
                    swal("Your imaginary file is safe!");
                }
                });


       },
        editproduct(product)
       {
           this.edit = true;
           this.product_id = product.id;
           this.product.title = product.title;
           this.product.description = product.description;
           this.product.price = product.price;
           this.product.categories = product.categories,
           this.product.imagepath = product.imagepath;

       }
        }
    }
</script>
