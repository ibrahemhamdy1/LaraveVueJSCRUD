<template>
  <div>
    <div class="container">
      <h2>Articles</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Articles
            <router-link to="/add" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Add Article</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="article in articles" :key="article.id">
                <td>{{ article.id }}</td>
                <td>{{ article.title }}</td>
                <td>{{ article.description }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'edit', params: { id: article.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteArticle(article.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      articles: [],
    };
  },
  created() {
    this.axios.get("/api/v1/articles").then((response) => {
      this.articles = response.data;
    });
  },
  methods: {
    deleteArticle(id) {
      this.axios
        .delete(`/api/v1/articles/${id}`)
        .then((response) => {
          let i = this.articles.map((data) => data.id).indexOf(id);
          this.articles.splice(i, 1);
        });
    },
  },
};
</script>
