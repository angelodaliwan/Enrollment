<!--suppress ALL -->
<template>
    <div class="row">
        <div class="col-md-6">
            <div v-if="!create">
                <button class="btn btn-primary btn-sm" @click="Create">Create New User</button>
                <table class="table">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                            <td>{{ user.name}}</td>
                            <td>{{ user.email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="create">
                <button class="btn btn-info btn-sm" @click="Cancel">Cancel</button>
                <create-user @add="added"></create-user>
            </div>
        </div>
    </div>
</template>

<script>
  import CreateUser from '../components/CreateUserComponent.vue';

  export default {
    components: {CreateUser},
    props: ['data'],


    data() {
        return {
          users: this.data,
          create: false,
      }
    },

    methods: {

        Create(){
            this.create = true;
        },

        Cancel(){
            this.create = false;
        },

        added(user){
          this.data.push(user);
          this.create = false;
        }
    }
  }
</script>

<style scoped>

</style>