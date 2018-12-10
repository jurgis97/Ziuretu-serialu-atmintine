<template>
  <div class="card" style="margin-top: 15px;">
    <div class="card-header">
      <div class="col" style="margin: 4px;">Serialo kūrimas</div>
    </div>
    <div class="card-body">
      <form @submit.prevent="updateSeries" class="col s12">
        <div class="card-body">
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">Pavadinimas</label>

            <div class="col-md-6">
              <input
                v-model="name"
                type="text"
                class="form-control"
                required
                autofocus
              >
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">Metai</label>

            <div class="col-md-6">
              <input v-model="year" id="type" type="number" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="form-group row mb-0">
          <div class="col-md-8 offset-md-4">
            <router-link to="/Series" class="btn btn-secondary">Grįžti</router-link>
            <button type="submit" class="btn btn-primary">Patvirtinti</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "editExercise",
  data() {
    return {
      _id: null,
      name: null,
      year: null
    };
  },
  methods: {
    updateSeries() {
      const token = "Bearer ".concat(this.$auth.getToken());

      var data = {
        name: this.name,
        year: this.year
      };
      axios
        .post("http://127.0.0.1:8000/api/series", data, {
          headers: { Authorization: token }
        })
        .then(response => {
          console.log(response);
          if (response.status == 201) {
            this.$router.push("/Series");
          }
        });
    }
  }
};
</script>