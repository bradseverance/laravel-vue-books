// HomeComponent.vue

<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-body">
          <h2>Administrate All The Books</h2>
          <p>You may list the books, add some books, edit some books,
            delete books ... pretty much any book related activity
            is within your purview.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    mounted() {
      console.log('Component mounted.')
    }
  }
</script>