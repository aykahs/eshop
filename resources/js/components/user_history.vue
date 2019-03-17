<template>

       <div>

           <a @click="restore()" class="button is-success">Recover all transaction</a>
           {{ recover.getmessage() }}
        <article class="message"  v-for="user in fetch.get()" v-bind:key="user.id" id="message">
             <div class="message-header" >
                <p> Payment Id: {{ user.payment_id}}</p>
                <a  aria-label="like" @click="drop(user.id)">
                    <span class="icon is-small">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </span>
                    </a>
            </div>
            <div class="message-body">
                <div  v-for="carts in user" v-bind:key="carts.id">
                    <div  v-for="item in  user" v-bind:key="item.id">
                  <div v-for="items in item" v-bind:key="items.id">
                        <div v-for="item in items" v-bind:key="item.id">

                            {{ item.title }}

                        </div>
                      <small> Total item:  {{ items.qty }}</small><br>
                       <small> Price: {{ items.price}}</small>

                  </div>
                    </div>

            </div>
             <small> {{ user.totalprice}}</small>
            </div>
        </article>
        </div>


</template>

<script>
    export default {
  data(){
            return{
                  fetch : new Fetch(),
                  recover:new Fetch(),

                del: new Form(),
            }
            },

         created()
       {

            this.getdata();

       },
        methods:
       {
           getdata()
           {
               this.fetch.Get('get','http://127.0.0.1:8000/api/profile');
           },


           drop(id)
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
                     this.del.delete('delete','http://127.0.0.1:8000/api/transaction/'+id);
                       this.getdata();
                } else {
                    swal("Your imaginary file is safe!");
                }
                });
           },
           restore()
           {
                this.recover.Get('get','http://127.0.0.1:8000/api/transaction/recover');
                this.getdata();
           }
       }
    }
</script>
<style>

#message{
     margin-top: 20px;
    margin-bottom: 30px;
}
</style>

