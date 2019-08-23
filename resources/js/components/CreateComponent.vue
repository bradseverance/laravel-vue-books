// CreateComponent.vue

<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header">Add New Book To Inventory</div>
        <div class="card-body">
          <form @submit.prevent="addBook">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Part Number:</label>
                  <input type="text" class="form-control" v-model="book.partno">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Title:</label>
                  <input type="text" class="form-control" v-model="book.title">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Author:</label>
                  <input type="text" class="form-control" v-model="book.author">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <button class="btn btn-primary">Add Book To Inventory</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data () {

      return {
        book: {

        }
      }
    },
    methods: {

      addBook () {        

        // let's trim our inputs first
        this.book.partno = $.trim(this.book.partno);
        this.book.title = $.trim(this.book.title);
        this.book.author = $.trim(this.book.author);        

        let uri = `${process.env.MIX_APP_URL}/api/book/create`;
  
        this.axios.post(uri, this.book).then((response) => {

          console.log(response);
          // this.$router.push({name: 'books'});
        });

      }

    }
  }
</script>