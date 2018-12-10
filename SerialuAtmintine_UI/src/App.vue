<template>
  <div id="app">
    <NavBar/>
    <div class="container">
      <router-view/>
    </div>
    <Footer/>
  </div>
</template>

<script>
import NavBar from "./components/NavBar.vue";
import Footer from "./components/Footer.vue";
import Login from "./components/Login.vue";

export default {
  name: "App",
  components: {
    NavBar,
    Footer,
    Login
  }
};
</script>

<style>
body {
  background-image: url("./assets/images/main_background.jpg");
}

@media only screen and (max-width: 600px) {
  .display-4 {
    font-size: 20pt;
  }
}
</style>
