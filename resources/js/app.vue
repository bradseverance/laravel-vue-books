// App.vue

<template>
  <div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link to="/" class="nav-link">Admin Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/create" class="nav-link">Create Book</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/books" class="nav-link">Show Me All The Books!</router-link>
        </li>
      </ul>
    </nav>
    <br />
    <transition name="fade"  mode="out-in">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
  .fade-enter-active, .fade-leave-active {
    transition-duration: 0.3s;
    transition-property: opacity;
    transition-timing-function: ease;
  }

  .fade-enter, .fade-leave-active {
    opacity: 0
  }
</style>

<script>
  export default { }
</script>