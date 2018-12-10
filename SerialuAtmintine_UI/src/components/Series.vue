<template>
  <div class="card" style="margin-top: 15px;">
    <div class="card-header">
      <div class="row">
        <div class="col" style="margin: 4px;">Išsaugoti serialai</div>
        <div class="col">
          <div class="container">
            <router-link
              to="/Create"
              tag="button"
              class="btn btn-secondary btn-sm"
              style="float: right;"
            >Prideti naują</router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <ul class="list-group">
        <li v-for="(item, index) in series" class="list-group-item">
          <div class="row">
            <div class="col">
              <a style="margin-top: 2px;" href="#">
                <router-link
                  v-bind:to="{name: 'previewSeries', params:{series_id: item._id}}"
                >{{item.name}}</router-link>
              </a>
            </div>
            <div class="col">
              <router-link
                v-bind:to="{name: 'editSeries', params:{series_id: item._id}}"
                tag="button"
                style="margin-right: 2px; float: right;"
                class="btn btn-outline-success btn-sm"
              >
                <span>
                  <i class="fas fa-edit"></i> Redaguoti
                </span>
              </router-link>
              <button
                @click="deleteSeries(item, index)"
                type="button"
                style="margin-right: 2px; float: right;"
                class="btn btn-outline-danger btn-sm"
              ><span>
                  <i class="fas fa-trash-alt"></i> Pašalinti
                </span>
                </button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      series: []
    };
  },
  mounted() {
    const token = "Bearer ".concat(this.$auth.getToken());

    axios
      .get("http://127.0.0.1:8000/api/series", {
        headers: { Authorization: token }
      })
      .then(response => {
        this.data = response.data;

        this.data.forEach(item => {
          this.series.push(item);
        });
      })
      .catch(err => {
        this.$router.push("/");
      });
  },
  methods: {
    deleteSeries(series, index) {
      if (confirm("Ar tikrai norite pašalinti?")) {
        const token = "Bearer ".concat(this.$auth.getToken());
        axios
          .delete("http://127.0.0.1:8000/api/series/".concat(series._id), {
            headers: { Authorization: token }
          })
          .then(response => {
            this.series.splice(index, 1);
          })
          .catch(err => {});
      }
    }
  }
};
</script>
