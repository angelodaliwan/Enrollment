<!--suppress ALL -->
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div v-if="!show_edit">
                            <div v-if="!show_create">
                                <button class="btn btn-primary btn-sm" @click="showCreate">Create New User</button>
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
                            <div v-if="show_create">
                                <create-user @add="added" @createcanceled="cancel_Create"></create-user>
                            </div>
                        </div>
                        <div v-if="show_edit">
                            <edit-user-component :data="(this.edit_details)" @updated="update" @editcanceled="cancel_Edit"></edit-user-component>
                        </div>
                    </div>
                </div>
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
            CreateUser
        },

        props: ['data'],

        data() {
            return {
              users: this.data,
              show_create: false,
              show_edit: false,
              this_details: null,
              edit_details: null,


            }
        },

        methods: {
            showCreate(){
                this.show_create = true;
            },

	        cancel_Edit(){
		        this.show_edit = false;
	        },
	        cancel_Create(){
		        this.show_create = false;
	        },

            added(user){
                this.data.push(user);
                this.show_create = false;
            },

            showEdit(user){
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