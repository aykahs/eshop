<template>
    <div class="container">
    <div class="tile" >
        <p>
            <strong>Total price: ${{ totalcost }}</strong><br>
        </p>
    </div>
    <form @submit.prevent="onsubmitpayment" @keydown="card.errors.clear($event.target.name)">
    <div class="field">
        <label class="label">Enter credit card number</label>
        <div class="control has-icons-left has-icons-right">
        <input class="input" v-model="card.cardno" name="cardno" type="number" placeholder="Enter credit card number">
        <span class=" help is-danger" v-if="card.errors.has('cardno')" v-text="card.errors.get('cardno')"></span>
        </div>
    </div>
    <div class="field">
        <label class="label">Expire date</label>
        <div class="control has-icons-left has-icons-right">
        <input class="input" v-model="card.expire_date" name="expire_date" type="date" >
        <span class=" help is-danger" v-if="card.errors.has('expire_date')" v-text="card.errors.get('expire_date')"></span>
        </div>
    </div>
       <div class="field">
        <label class="label">Security Number</label>
        <div class="control has-icons-left has-icons-right">
        <input class="input" v-model="card.security_code" name="security_code" type="number" >
        <span class=" help is-danger" v-if="card.errors.has('security_code')" v-text="card.errors.get('security_code')"></span>
        </div>
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button class="button is-primary" :disabled = "card.errors.any()">Submit</button>
        </div>
    </div>
    </form>
    </div>
</template>

<script>
    export default {
          data(){
            return{
                   totalcost:[],
                   card:  new Form({
                       'cardno':'',
                       'expire_date':'',
                       'security_code':''
                   }),

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
               axios.get('http://127.0.0.1:8000/api/cart/paymentinfo')
                .then((response) => {
                    app.totalcost = response.data.data
                })
                .catch(error =>console.log(error)
                 );
           },
            onsubmitpayment()
                {
                    this.card.submit('post','http://127.0.0.1:8000/api/cart/pay');
                },

       }
    }
</script>
