<template>
  <div>
    <div class="container">
      <h2>Update Article</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Article
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Article List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateArticle">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" v-model="article.title" />
            </div>
            <div class="form-group">
              <label>Description</label>
              <input
                type="description"
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
  created() {
    this.axios
      .get(`/api/v1/articles/${this.$route.params.id}`)
      .then((res) => {
        this.article = res.data;
      });
  },
  methods: {
    updateArticle() {
      this.axios
        .patch(
          `/api/v1/articles/${this.$route.params.id}`,
          this.article
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>
