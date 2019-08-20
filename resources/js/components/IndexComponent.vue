<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header">
          <div class="float-left">All The Books</div>
          <div class="float-right">
            <router-link
              :to="{ name: 'create' }"
              class="btn btn-primary btn-sm">Create Book</router-link>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-bordered table-sm">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Part Number</th>
                <th>Title</th>
                <th>Author</th>
                <th style="text-align: center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="book in books" :key="book.id">
                <td>{{ book.id }}</td>
                <td>{{ book.partno }}</td>
                <td>{{ book.title }}</td>
                <td>{{ book.author }}</td>
                <td style="text-align: center">
                  <router-link
                    :to="{name: 'edit', params: { id: book.id }}"
                    class="btn btn-primary btn-sm">Edit</router-link>
                  <button
                    class="btn btn-danger btn-sm"
                    @click.prevent="deleteBook(book.id)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        books: []
      }
    },
    created () {
      let uri = `${process.env.MIX_APP_URL}/api/books`;
        this.axios.get(uri).then(response => {
        this.books = response.data.data;
      });
    },
    methods: {
      deleteBook(id) {
        let uri = `${process.env.MIX_APP_URL}/api/book/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.books.splice(this.books.findIndex(book => book.id === id), 1);
        });
      }
    }
  }
</script>