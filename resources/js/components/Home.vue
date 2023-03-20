<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Главная</h1>
        <form  @submit.prevent="saveMessages">
          <span v-html="errors"></span>
          <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input id="name" v-model="name" type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label for="number" class="form-label">Номер телефона</label>
            <input id="number" v-model="number" type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label for="comment" class="form-label">Сообщение</label>
            <textarea id="comment" v-model="comment"  class="form-control" rows="3"></textarea>
          </div>
          <button @click="saveMessages" type="button" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: '',
      name: '',
      number: '',
      comment: '',
    }
  },
  methods: {
    saveMessages() {
      axios.post("/api/v1/feedbacks", {
        name: this.name,
        number: this.number,
        comment: this.comment,
      })
      .then(response => {
        console.log(response);
      }).catch(error => {
        this.getErrors(error);
      }).finally(() => {
            this.loading = false;
          })
    },
    getErrors(error) {
      this.errors = '';
      if (error.response.data.errors.name) {
        let data = error.response.data.errors;
        for (let key in data) {
          this.errors += data[key] + "<br>";
        }
      }
    },
  },
}
</script>

<style scoped>

</style>