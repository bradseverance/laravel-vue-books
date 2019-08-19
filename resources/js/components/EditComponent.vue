// EditComponent.vue

<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header">Edit Book</div>
        <div class="card-body">
          <form @submit.prevent="updateBook">
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
                  <button class="btn btn-primary">Update Book</button>
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

    created () {

      let uri = `process.env.MIX_APP_URL/api/book/edit/${this.$route.params.id}`;

      this.axios.get(uri).then((response) => {
        this.book = response.data;
      });

    },

    methods: {

      updateBook () {

        let uri = `process.env.MIX_APP_URL/api/book/update/${this.$route.params.id}`;
  
        this.axios.post(uri, this.book).then((response) => {
          this.$router.push({name: 'books'});
        });

      }

    }
  }
</script>