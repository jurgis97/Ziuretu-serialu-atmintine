<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <router-link tag="a" to="/" class="navbar-brand">Serialų atmintinė</router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link tag="a" to="/Series" class="nav-link">Žiūrėti serialai</router-link>
        </li>
      </ul>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
          <router-link
            tag="a"
            to="/Login"
            class="nav-link"
            v-if="!this.$store.state.logedIn"
          >Prisijungti</router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link" v-if="this.$store.state.logedIn" @click="logout">Atsijungti</a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$auth.destroy();
      this.$router.push("/login");
      this.$store.commit("doLogIn", false);
      //console.log(this.$store.state.logedIn)
    }
  }
};
</script>