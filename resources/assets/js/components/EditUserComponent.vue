<!--suppress ALL -->
<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Edit</div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-control">
                        <label for="name">Name</label>
                        <input id="name" class="form-control"  v-model="user.name">
                    </div>
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input id="email" class="form-control"  v-model="user.email">
                    </div>
                </div>
            </div>
            <button class="btn btn-success btn-sm" @click="Update">Update</button>
        </div>
    </div>
</template>

<script>
  export default {
    props: ['data'],

    data() {
        return {
           user: this.data,
        }
    },

    methods: {
      Update() {
        let url = `/users/${this.user.id}/update`;

        let details = {
           name: this.user.name,
           email: this.user.email,
        }

        axios.patch(url, details)
          .then(({data}) => {
            console.log(data);
            this.$emit('updated', data);
        });
      }
    }
  }
</script>

<style scoped>

</style>