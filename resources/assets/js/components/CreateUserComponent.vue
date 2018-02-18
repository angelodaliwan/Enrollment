<!--suppress ALL -->
<template>
    <div>
        <div class="form-group">
            <div class="form-control">
                <label for="name">Name</label>
                <input id="name" v-model="name">
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input id="email" v-model="email">
            </div>
            <button class="btn btn-success btn-sm" @click="Create">Create</button>
        </div>
    </div>
</template>

<script>
  export default {

    data() {
      return {
        name : null,
        email : null,
      }
    },

    methods: {
        Create(){
          let url = '/users/create';

          let details = {
            name : this.name,
            email: this.email
          };

          axios.post(url, details)
            .then(({data}) => {
              console.log(data);
              this.$emit('add', data)
          });
        }

    }
  }
</script>

<style scoped>

</style>