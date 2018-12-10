<template>
  <div class="card" style="margin-top: 15px;">
    <div class="card-header">
      <div class="col" style="margin: 4px;">Prisijunkite</div>
    </div>
    <div class="card-body">
      <form class="form-signin">
        <label for="inputEmail" class="sr-only">El. Paštas</label>
        <input
          v-model="email"
          type="email"
          id="inputEmail"
          class="form-control"
          placeholder="El. Paštas"
          required
          autofocus
        >
        <label for="inputPassword" class="sr-only">Slaptažodis</label>
        <input
          v-model="password"
          type="password"
          id="inputPassword"
          class="form-control"
          placeholder="Slaptažodis"
          required
        >
        <button @click="login" class="btn btn-lg btn-primary btn-block" type="submit">Prisijungti</button>
      </form>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    login() {
      var data = {
        grant_type: "password",
        client_id: "5bec2701f5aa5e2d84000864",
        client_secret: "pyNaHsNxenpY3waRemYUiXua61Obq6P6TJDJatHV",
        username: this.email,
        password: this.password
      };

      console.log(data);
      Axios.post("http://localhost:8000/oauth/token", data)
        .then(response => {
          this.$auth.setToken(
            response.data.access_token,
            response.data.expires_in + Date.now()
          );
          //console.log(response);
          if (response.status == 200) {
            this.$store.commit("doLogIn", true);
            // console.log(this.$store.state.authorized)
            this.$router.push("/");
          } else {
            alert('Neteisingi prisijungimo duomenys!');
          }
        })
        .catch(err => {
          //console.log(err);
          alert('Neteisingi prisijungimo duomenys!');
        });
    }
  }
};
</script>


<style>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
