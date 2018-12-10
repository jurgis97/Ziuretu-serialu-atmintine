<template>
  <div class="card" style="margin-top: 15px;">
    <div class="card-header">
      <div class="col" style="margin: 4px;">Serialo peržiūra</div>
    </div>
    <div class="card-body">
      <form @submit.prevent="updateSeries" class="col s12">
        <div class="card-body">
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">Pavadinimas</label>

            <div class="col-md-6">
              <input
                v-model="name"
                id="email"
                type="text"
                class="form-control"
                name="email"
                disabled
                autofocus
              >
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">Metai</label>

            <div class="col-md-6">
              <input v-model="year" id="type" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="form-group row mb-0">
          <div class="col-md-8 offset-md-4">
            <router-link to="/Series" class="btn btn-secondary">Grįžti</router-link>
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
  mounted() {
    console.log(this.$route.params.series_id);
    const token = "Bearer ".concat(this.$auth.getToken());
    axios
      .get(
        "http://127.0.0.1:8000/api/series/".concat(
          this.$route.params.series_id
        ),
        { headers: { Authorization: token } }
      )
      .then(response => {
        console.log(response);

        (this._id = response.data._id), (this.name = response.data.name);
        this.year = response.data.year;
      });
  }
};
</script>