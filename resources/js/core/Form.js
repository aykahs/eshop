import Errors from './Errors';
import swal from 'sweetalert';
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
              .catch( this.onfail.bind(this)
              );


  }
  delete(requestType, url)
  {
            axios[requestType](url)
            .then(this.onsucessdel.bind(this))
            .catch( this.onfail.bind(this)
    );


}
          onsucess(response)
          {

          //  alert(response.data.message);
            swal("Product Is Added", "success");
            this.errors.clear();
            this.reset();

          }

          onsucessdel(response)
          {

          //  alert(response.data.message);
          swal("Product Is Deleted", "success");
          this.errors.clear();
          this.reset();

          }


          onfail(error)
          {
            this.errors.record(error.response.data.errors);
          }
    }

    export default Form;
