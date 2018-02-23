<!--suppress ALL -->
<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Create New Student</div>
            <div class="panel-body">
                <div class="form-control">
                    <label for="name">Name</label>
                    <input id="name" v-model="name">
                </div>
                <div class="form-control">
                    <label for="email">Email</label>
                    <input id="email" v-model="email">
                </div>
                <button class="btn btn-success btn-sm" @click="Create">Create</button>
                <button class="btn btn-warning btn-sm" @click="Cancel">Cancel</button>
            </div>
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
        Cancel(){
          this.$emit('createcanceled');
        },

        Create(){
          let url = '/users/create';

          let details = {
            name : this.name,
            email: this.email
          };

          axios.post(url, details)
            .then(({data}) => {
                this.$emit('add', data);
                this.$emit('cancel', false);
          });
        }

    }
  }
</script>

<style scoped>

</style>