<template>
<div>
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
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody >
            <tr  v-for="employer in employers" v-bind:key="employer.id">
                <td>{{ employers}}</td>
                <td>{{ employer.Name}}</td>
                <td>{{ product.email }}</td>
                <td>{{ product.role }}</td>

            <td><button @click="editproduct(product)" class="button is-sucess"><i class="far fa-edit"></i></button></td>
            <th> <button @click="deleteproduct(product.id)" class="button is-danger"><i class="fas fa-trash-alt"></i></button></th>
            </tr>

            </tbody>
        </table>
</div>
</div>
</template>
<script>
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
            employers:[],
            pagination:{},
            edit:false,
            employer_id:'',
            }

        },
        methods:
        {
            onsubmit()
            {
                this.form.submit('post','http://127.0.0.1:8000/api/Admin/create/employer');
                },
                 fetchproduct(page_url)
                  {
               page_url = page_url || 'http://127.0.0.1:8000/api/Admin/employers';
               var app = this;
              axios.get(page_url)
                .then((response) => {
                    app.employers = response.data.data,
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
                     this.del.delete('delete','http://127.0.0.1:8000/api/Admin/destroy/employer/'+id);
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
};
</script>
