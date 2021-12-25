<template>
  <div>
    <div class="container">
      <h2>Add Article</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Article
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Article List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addArticle">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" v-model="article.title" />
            </div>
            <div class="form-group">
              <label>Description</label>
              <input
                type="text"
                class="form-control"
                v-model="article.description"
              />
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      article: {},
    };
  },
  methods: {
    addArticle() {
      this.axios
        .post("/api/v1/articles", this.article)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
