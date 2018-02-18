<!--suppress ALL -->
<template>
    <div class="row">
        <div class="col-md-6">
            <div v-if="!show_edit">
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
                                <td><button class="btn btn-warning btn-sm" @click="showEdit(user)">Edit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-if="create">
                    <button class="btn btn-info btn-sm" @click="Cancel">Cancel</button>
                    <create-user @add="added"></create-user>
                </div>
            </div>
            <div v-if="show_edit">
                <button class="btn btn-warning btn-sm" @click="CancelEdit">Cancel</button>
                <edit-user-component :data="(this.edit_details)" @updated="update"></edit-user-component>
            </div>
        </div>
    </div>
</template>

<script>
  import CreateUser from '../components/CreateUserComponent.vue';
  import EditUser from '../components/EditUserComponent.vue';
  import EditUserComponent from '../components/EditUserComponent'

  export default {
    components: {
      EditUserComponent,
      CreateUser},
    props: ['data'],


    data() {
        return {
          users: this.data,
          create: false,
          show_edit: false,
          this_details: null,
          edit_details: null,
      }
    },

    methods: {

        Create(){
            this.create = true;
        },

        Cancel(){
            this.create = false;
        },

        CancelEdit(){
           this.show_edit = false;
        },

        added(user){
          this.data.push(user);
          this.create = false;
        },

        showEdit(user){
          console.log(user);
          this.edit_details = user;
          this.show_edit = true;
        },

        update(user_details){
        this.data.push(user_details);
        this.show_edit = false;
        },

    }
  }
</script>

<style scoped>

</style>